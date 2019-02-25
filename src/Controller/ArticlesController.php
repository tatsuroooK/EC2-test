<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Statics\User;
use Cake\Routing\Router;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    public $paginate = [
        'limit' => 10,
        'order' => [
            'Articles.created' => 'desc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $articles = $this->Articles->find('all')
            ->contain(['Users'])
            ->all();

        // 各々の振返りタイムライン要素はThinkBacks/loadTimelinesアクションとThinkBacks/loadTimelines.ctpによって作られる。
        // $thumbupUrl = Router::url([
        //     'controller' => 'ThinkBacks',
        //     'action' => 'decideThumbupPossibility'
        // ]);
        // on/offそれぞれの時のアイコンを取得
        // $thumbupImage['on'] = ThumbUp::THUMB_UP_ON_ICON;
        // $thumbupImage['off'] = ThumbUp::THUMB_UP_OFF_ICON;
        // $this->Pack->set(compact('thumbupUrl', 'thumbupImage'));
        $query = $this->Articles->find()
            ->contain(['Users']);
        $articles = $this->paginate($query);
        
        $this->set(compact('articles'));
    }

    /**
     * イイね可能かどうか判定する関数
     * AjaxでPOSTされた値を元に判定
     * on/offの情報、イイねの数を表示するためのHTML、イイねの数を返す
     */
    private function decideThumbupPossibility()
    {
        if (!$this->request->is('ajax')) {
            throw new BadRequestException(__('不正なアクセスです'));
        }
        $this->autoRender = false;
        $articleId = $this->request->getData('article_id');
        $thumbups = TableRegistry::getTableLocator()->get('Thumbups');
        $thumup = $thumups->thumbupResult(User::$id, $articleId);

        // 以下はOJTのコード
        $thinkBackThumbUp = $thinkBackThumbUps->returnThumbUp($thinkBackId, $userId);
        // ログインユーザーが振返りに良いねをしていなかった場合、エンティティを保存（イイね実行）
        if(is_null($thinkBackThumbUp)) {
            $thinkBackThumbUp = $thinkBackThumbUps->newEntity();
            $dataForPatchEntity = $this->appendThinkBackThumbUpNotificationAttributes($thinkBackId);
            $thinkBackThumbUps->saveThinkBackThumbUp($thinkBackThumbUp, $dataForPatchEntity);
            $thumbupNum = $thinkBackThumbUps->countThinkBackThumbUps($thinkBackId, $userId);
            $data = ['thumbUpType' => 'on'];
        } else { // 既にイイねを押していたとき、エンティティを削除（イイね取り消し）
            $thinkBackThumbUps->softDelete($thinkBackThumbUp, true);
            $thumbupNum = $thinkBackThumbUps->countThinkBackThumbUps($thinkBackId, $userId);
            $data = ['thumbUpType' => 'off'];
        }
        $data['thumbupNumHtml'] = ThumbUp::THUMB_UP_NUM_HTML;
        $data['thumbupNum'] = $thumbupNum;
        $this->set('data', $data);
        $this->set('_serialize', ['data']);
        $result = json_encode($data);
        $this->response->type('json');
        $this->response->body($result);
        return $this->response;
    }

    public function myArticles()
    {
        $articles = $this->Articles->find('all')
            ->contain(['Users'])
            ->where(['Articles.user_id' => User::$id])
            ->all();
        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Users', 'Comments', 'Thumbups']
        ]);

        $thumbupUrl = Router::url(['controller' => 'Thumbups', 'action' => 'ajax']);

        $this->set(compact('article', 'thumbupUrl'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $data = $this->Articles->generateArticleData($this->request->getData());

            $article = $this->Articles->patchEntity($article, $data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('記事が投稿されました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('記事の投稿に失敗しました。もう一度試してください。'));
        }
        $this->set(compact('article'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $this->set(compact('article'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

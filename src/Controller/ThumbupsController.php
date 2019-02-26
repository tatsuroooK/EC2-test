<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Thumbups Controller
 *
 * @property \App\Model\Table\ThumbupsTable $Thumbups
 *
 * @method \App\Model\Entity\Thumbup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ThumbupsController extends AppController
{
    public function ajax()
    {
        $data = $this->request->getData();

        $result = true;
        if($result) {
            $responseData = [
                'error' => [],
            ];
        } else {
            $responseData = [
                'error' => [
                    'code' => 2,
                    'message' => 'エラーが発生しました'
                ],
            ];
        }
        $this->set(compact('responseData'));
        $this->set('_serialize', 'responseData');
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

}

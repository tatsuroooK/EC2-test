<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Accounts Controller
 *
 * @property \App\Model\Table\AccountsTable $Accounts
 *
 * @method \App\Model\Entity\Account[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    /**
     * Login method
     *
     * @return \Cake\Http\Response|void
     */
    public function login()
    {
        if ($this->request->is('post')) {

            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('アカウントIDかパスワードが間違っています。'));
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
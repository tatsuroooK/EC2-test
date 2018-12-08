<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'username' => '管理者',
                'password' => $this->_setPassword('admin'),
                'loginid' => 'admin',
                'mail_address' => 'tktktk0805@gmail.com',
                'created' => 'now()',
                'modified' => 'now()',
            ],
            [
                'username' => 'かわの',
                'password' => $this->_setPassword('kawano'),
                'loginid' => 'kawano',
                'mail_address' => 'tktktk0805@gmail.com',
                'created' => 'now()',
                'modified' => 'now()',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }

    /**
     * ハッシュ化されたパスワードを返す
     * @param $value
     * @return bool|string
     */
    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}

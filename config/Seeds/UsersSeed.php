<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Accounts seed.
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
                'login_name' => 'admin',
                'password' => $this->_setPassword('admin'),
                'username' => '管理者',
                'mail_address' => 'tktktk0805@gmail.com',
                'role' => '1',
                'created' => 'now()',
                'modified' => 'now()',
            ],
        ];
        $table = $this->table('Users');
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

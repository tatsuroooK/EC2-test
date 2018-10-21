<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $this->table('users')
            ->addColumn('user_name', 'text', [
                'comment' => 'ユーザー名',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('mail', 'text', [
                'comment' => 'メール',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('registered', 'timestamp', [
                'comment' => '登録日時',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'timestamp', [
                'comment' => '更新日時',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'timestamp', [
                'comment' => '削除日時',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
    }

    public function down()
    {
        $this->dropTable('users');
    }
}
<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * @return void
     */
    public function up()
    {
        $this->table('users')
            ->addColumn('username', 'text', [
                'comment' => 'ユーザー名',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('password', 'text', [
                'comment' => 'パスワード',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('loginid', 'text', [
                'comment' => 'ログインID',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('mail_address', 'text', [
                'comment' => 'メールアドレス',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'timestamp', [
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
            ->addColumn('deleted', 'timestamp', [
                'comment' => '削除日時',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('articles')
            ->addColumn('title', 'text', [
                'comment' => 'タイトル',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('body', 'text', [
                'comment' => '本文',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('draft_flag', 'boolean', [
                'comment' => '下書きフラグ',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'timestamp', [
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
            ->addColumn('deleted', 'timestamp', [
                'comment' => '削除日時',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('tags')
            ->addColumn('tag_name', 'text', [
                'comment' => 'タグ名',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'timestamp', [
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
            ->addColumn('deleted', 'timestamp', [
                'comment' => '削除日時',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('comments')
            ->addColumn('user_id', 'integer', [
                'comment' => 'ユーザーID',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('article_id', 'integer', [
                'comment' => '記事ID',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('content', 'text', [
                'comment' => 'コメント内容',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'timestamp', [
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
            ->addColumn('deleted', 'timestamp', [
                'comment' => '削除日時',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('thumbups')
            ->addColumn('user_id', 'integer', [
                'comment' => 'ユーザーID',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('article_id', 'integer', [
                'comment' => '記事ID',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'timestamp', [
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
            ->addColumn('deleted', 'timestamp', [
                'comment' => '削除日時',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
    }

    public function down()
    {
        $this->table('users')->drop()->save();
        $this->table('articles')->drop()->save();
        $this->table('tags')->drop()->save();
        $this->table('comments')->drop()->save();
        $this->table('thumbups')->drop()->save();
    }
}
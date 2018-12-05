<?php
use Migrations\AbstractMigration;

class ArticlesTagsTable extends AbstractMigration
{
    /**
     * @return void
     */
    public function up()
    {
        $this->table('articles_tags')
            ->addColumn('article_id', 'integer', [
                'comment' => '記事ID',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('tag_id', 'integer', [
                'comment' => 'タグID',
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
        $this->table('articles_tags')->drop()->save();
    }
}

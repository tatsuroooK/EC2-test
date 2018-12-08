<?php
use Migrations\AbstractMigration;

class AddYoutubeUrlColumnToArticles extends AbstractMigration
{
    /**
     * @return void
     */
    public function up()
    {
        $this->table('articles')
            ->addColumn('youtube_url', 'text', [
                'comment' => 'YoutubeのURL',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->update();
    }

    public function down()
    {
        $this->table('articles')
            ->removeColumn('youtube_url')
            ->save();
    }
}

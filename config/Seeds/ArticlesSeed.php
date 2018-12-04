<?php
use Migrations\AbstractSeed;

/**
 * Articles seed.
 */
class ArticlesSeed extends AbstractSeed
{
    /**
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => '初記事1（seed）',
                'body' => '初記事です。\nこんにちは。',
                'draft_flag' => false,
                'created' => 'now()',
                'modified' => 'now()',
            ],
            [
                'title' => '初記事2（seed）',
                'body' => '初記事2です。\nこんにちは。',
                'draft_flag' => false,
                'created' => 'now()',
                'modified' => 'now()',
            ],
        ];

        $table = $this->table('articles');
        $table->insert($data)->save();
    }
}

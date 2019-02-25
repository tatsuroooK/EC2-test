<?php
use Migrations\AbstractMigration;

class AddSelfIntroductionToUsers extends AbstractMigration
{
    /**
     * @return void
     */
    public function up()
    {
        $this->table('users')
            ->addColumn('self_introduction', 'text', [
                'comment' => '自己紹介',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->update();
    }

    public function down()
    {
        $this->table('users')
            ->removeColumn('self_introduction')
            ->save();
    }
}

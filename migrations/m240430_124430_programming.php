<?php

use yii\db\Schema;
use yii\db\Migration;

class m240430_124430_programming extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%programming}}',
            [
                'code'=> $this->char(2)->notNull(),
                'name'=> $this->char(52)->notNull(),
                'ratings'=> $this->double()->notNull()->defaultValue("0"),
            ],$tableOptions
        );
        $this->addPrimaryKey('pk_on_programming','{{%programming}}',['code']);

    }

    public function safeDown()
    {
    $this->dropPrimaryKey('pk_on_programming','{{%programming}}');
        $this->dropTable('{{%programming}}');
    }
}

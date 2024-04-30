<?php

use yii\db\Schema;
use yii\db\Migration;

class m240430_174512_user extends Migration
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
            '{{%user}}',
            [
                'id'=> $this->primaryKey(11),
                'email'=> $this->string(255)->notNull(),
                'auth_key'=> $this->string(32)->notNull(),
                'password_hash'=> $this->string(20)->notNull(),
                'access_token'=> $this->string(100)->null()->defaultValue(null),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}

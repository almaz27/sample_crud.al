<?php

use yii\db\Schema;
use yii\db\Migration;

class m240430_191205_backendUser extends Migration
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
            '{{%backendUser}}',
            [
                'Id'=> $this->primaryKey(10)->unsigned(),
                'firstName'=> $this->string(15)->null()->defaultValue(null),
                'lastName'=> $this->string(20)->null()->defaultValue(null),
                'userName'=> $this->string(15)->null()->defaultValue(null),
                'password'=> $this->string(30)->notNull(),
                'authKey'=> $this->string(50)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%backendUser}}');
    }
}

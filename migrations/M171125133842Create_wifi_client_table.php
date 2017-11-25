<?php

namespace yuncms\wifi\migrations;

use yii\db\Migration;

class M171125133842Create_wifi_client_table extends Migration
{

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%wifi_client}}', [
            'id' => $this->primaryKey()->unsigned()->comment('Id'),
            //'user_id' => $this->integer()->unsigned()->comment('User Id'),
            'status' => $this->smallInteger(1)->defaultValue(0)->comment('Status'),
            //'published_at' => $this->integer(10)->unsigned()->comment('发布时间'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('Created At'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('Updated At'),
        ], $tableOptions);
        //$this->addForeignKey('{{%test_fk_1}}', '{{%test}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable('{{%wifi_client}}');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M171125133842Create_wifi_client_table cannot be reverted.\n";

        return false;
    }
    */
}

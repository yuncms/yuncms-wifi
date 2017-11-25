<?php

namespace yuncms\wifi\migrations;

use yii\db\Migration;

class M171125133100Create_wifi_router_table extends Migration
{

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%wifi_router}}', [
            'id' => $this->primaryKey()->unsigned()->comment('Gateway Id'),
            'user_id' => $this->integer()->unsigned()->comment('User Id'),
            'gw_mac' => $this->string()->comment('Gateway Mac'),
            'gw_address' => $this->string()->comment('Gateway Address'),
            'status' => $this->smallInteger(1)->defaultValue(0)->comment('Status'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('Created At'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('Updated At'),
        ], $tableOptions);
        $this->addForeignKey('{{%wifi_router_fk_1}}', '{{%wifi_router}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable('{{%wifi_router}}');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M171125133100Create_wifi_router_table cannot be reverted.\n";

        return false;
    }
    */
}

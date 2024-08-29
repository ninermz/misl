<?php

use yii\db\Migration;

/**
 * Class m240524_200519_User_table
 */
class m240524_200519_User_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240524_200519_User_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240524_200519_User_table cannot be reverted.\n";

        return false;
    }
    */
}

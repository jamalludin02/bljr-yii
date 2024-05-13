<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m240509_144225_users
 */
class m240509_144225_position extends Migration
{
    /**
     * {@inheritdoc}
     */
    // public function safeUp()
    // {
    // }

    /**
     * {@inheritdoc}
     */
    // public function safeDown()
    // {
    //     echo "m240509_144225_users cannot be reverted.\n";

    //     return false;
    // } 

    public function up()
    {
        $this->createTable('position', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'status' => $this->boolean()->defaultValue(0),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    public function down()
    {
        $this->dropTable('position');
    }
}

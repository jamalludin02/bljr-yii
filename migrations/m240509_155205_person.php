<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m240509_155205_person
 */
class m240509_155205_person extends Migration
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
    //     echo "m240509_155205_person cannot be reverted.\n";

    //     return false;
    // }

    public function up()
    {
            $this->createTable('person', [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'email' => $this->string()->notNull(),
                'position_id' => $this->integer(),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
            ]);
            $this->addForeignKey('fk_person_position_id', 'person', 'position_id', 'position', 'id', 'SET NULL' , 'CASCADE');
    }

    public function down()
    {
        echo "m240509_155205_person cannot be reverted.\n";

        return false;
    }
}

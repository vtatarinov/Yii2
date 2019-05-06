<?php

use yii\db\Migration;

/**
 * Class m190504_152444_createActivityTable
 */
class m190504_152444_createActivityTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity', [
            'id' => $this->primaryKey(),
            'title' => $this->string(150)->notNull(),
            'description' => $this->text(),
            'dateStart' => $this->date()->notNull(),
            'email' => $this->string(150),
            'useNotification' => $this->tinyInteger()->notNull()->defaultValue(0),
            'isBlocking' => $this->tinyInteger()->notNull()->defaultValue(0),
            'isRepeat' => $this->tinyInteger()->notNull()->defaultValue(0),
            'repeatInterval' => $this->tinyInteger(),
            'dateCreated' => $this->timestamp()->notNull()
                ->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190504_152444_createActivityTable cannot be reverted.\n";

        return false;
    }
    */
}

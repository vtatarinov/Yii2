<?php

use yii\db\Migration;

/**
 * Class m190504_152531_createFilesTable
 */
class m190504_152531_createFilesTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('files', [
            'id' => $this->primaryKey(),
            'fileName' => $this->string(300)->notNull(),
            'activityId' => $this->integer()->notNull(),
            'dateCreated' => $this->timestamp()->notNull()
                ->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('files');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190504_152531_createFilesTable cannot be reverted.\n";

        return false;
    }
    */
}

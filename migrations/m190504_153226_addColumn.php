<?php

use yii\db\Migration;

/**
 * Class m190504_153226_addColumn
 */
class m190504_153226_addColumn extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity', 'userId',
            $this->integer()->notNull());

        $this->addForeignKey('activity_userId',
            'activity', 'userId', 'users', 'id',
            'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('activity_userId', 'activity');

        $this->dropColumn('activity', 'userId');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190504_153226_addColumn cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m190504_154230_createActivityFilesFK
 */
class m190504_154230_createActivityFilesFK extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('files_activityId',
            'files', 'activityId', 'activity', 'id',
            'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('files_activityId', 'files');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190504_154230_createActivityFilesFK cannot be reverted.\n";

        return false;
    }
    */
}

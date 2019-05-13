<?php

use yii\db\Migration;

/**
 * Class m190512_225449_addColumnDateEnd
 */
class m190512_225449_addColumnDateEnd extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity', 'dateEnd', $this->date()->after('dateStart'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity', 'dateEnd');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190512_225449_createDateEndCol cannot be reverted.\n";

        return false;
    }
    */
}

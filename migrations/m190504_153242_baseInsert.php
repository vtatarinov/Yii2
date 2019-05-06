<?php

use yii\db\Migration;

/**
 * Class m190504_153242_baseInsert
 */
class m190504_153242_baseInsert extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users', [
            'id' => 1,
            'username' => 'User1',
            'email' => 'test1@mail.ru',
            'passwordHash' => 'qwertyuiopkde'
        ]);

        $this->insert('users', [
            'id' => 2,
            'username' => 'User2',
            'email' => 'test2@mail.ru',
            'passwordHash' => 'qwertyuiophgh'
        ]);

        $this->batchInsert('activity',[
            'title','dateStart','userId','useNotification'],[
            ['title 1',date('Y-m-d'),1,0],
            ['title 2',date('Y-m-d'),2,0],
            ['title 3',date('Y-m-d'),2,1],
            ['title 4',date('Y-m-d'),1,1],
            ['title 5','2019-03-01',1,0],
            ['title 6','2019-03-02',2,1],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190504_153242_baseInsert cannot be reverted.\n";

        return false;
    }
    */
}

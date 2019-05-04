<?php

use yii\db\Migration;

/**
 * Class m190504_152517_createUsersTable
 */
class m190504_152517_createUsersTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(150)->notNull(),
            'email' => $this->string()->notNull(),
            'passwordHash' => $this->string('300')->notNull(),
            'authKey' => $this->string('300'),
            'accessToken' => $this->string('300'),
            'dateCreated' => $this->timestamp()->notNull()
                ->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->createIndex('usersEmailInd', 'users', 'email', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190504_152517_createUsersTable cannot be reverted.\n";

        return false;
    }
    */
}

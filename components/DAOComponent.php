<?php


namespace app\components;


use yii\base\Component;
use yii\db\Connection;
use yii\db\Query;

class DAOComponent extends Component
{
    /** @var Connection */

    public $connection;

    /**
     * @return Connection
     */

    public function getDb(){
        return $this->connection;
    }

    public function getActivityNotification()
    {
        $query = new Query();
        $query->select(['title', 'dateStart', 'userId'])
            ->from('activity')
            ->andWhere(['useNotification' => 1])
            ->andWhere('userId = :user', [':user' => 2])
            ->limit(2)
            ->orderBy(['title' => SORT_DESC]);

        return $query->all();
    }

    public function getFirstActivity()
    {
        $query = new Query();
        return $query->from('activity')
            ->limit(3)
            ->one();
    }

    public function getCountActivity()
    {
        $query = new Query();
        return $query->from('activity')
            ->select('count(id) as count')
            ->scalar();
    }

    public function getActivityUser($userId)
    {
        $sql = 'SELECT * from activity WHERE userId = :user';

        return $this->getDb()->createCommand($sql, [':user' => $userId])->queryAll();
    }

    public function testInsert()
    {
        $trans = $this->getDb()->beginTransaction();

        try {
            $this->getDb()->createCommand()
                ->insert('activity', ['title' => 'testTitle',
                    'dateStart' => date('Y-m-d'),
                    'userId' => 1])
                ->execute();
            $id = $this->getDb()->getLastInsertID();

            $this->getDb()->createCommand()
                ->update('activity', ['userId' => 2], ['id' => $id])
                ->execute();

            $trans->commit();
        } catch (\Exception $e) {
            $trans->rollBack();
        }
    }

    public function getAllUsers()
    {
        $sql = 'SELECT * from users';

        return $this->getDb()->createCommand($sql)->queryAll();
    }
}
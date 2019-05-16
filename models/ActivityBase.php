<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $dateStart
 * @property string $dateEnd
 * @property string $email
 * @property int $useNotification
 * @property int $isBlocking
 * @property int $isRepeat
 * @property int $repeatInterval
 * @property string $dateCreated
 * @property int $userId
 *
 * @property Users $user
 * @property Files[] $files
 */
class ActivityBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'dateStart', 'userId'], 'required'],
            [['description'], 'string'],
            [['dateStart', 'dateEnd', 'dateCreated'], 'safe'],
            [['useNotification', 'isBlocking', 'isRepeat', 'repeatInterval', 'userId'], 'integer'],
            [['title', 'email'], 'string', 'max' => 150],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'dateStart' => Yii::t('app', 'Date Start'),
            'dateEnd' => Yii::t('app', 'Date End'),
            'email' => Yii::t('app', 'Email'),
            'useNotification' => Yii::t('app', 'Use Notification'),
            'isBlocking' => Yii::t('app', 'Is Blocking'),
            'isRepeat' => Yii::t('app', 'Is Repeat'),
            'repeatInterval' => Yii::t('app', 'Repeat Interval'),
            'dateCreated' => Yii::t('app', 'Date Created'),
            'userId' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'userId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(Files::className(), ['activityId' => 'id']);
    }
}

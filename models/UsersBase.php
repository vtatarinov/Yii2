<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $passwordHash
 * @property string $authKey
 * @property string $accessToken
 * @property string $dateCreated
 *
 * @property Activity[] $activities
 */
class UsersBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'passwordHash'], 'required'],
            [['dateCreated'], 'safe'],
            [['username'], 'string', 'max' => 150],
            [['email'], 'string', 'max' => 255],
            [['passwordHash', 'authKey', 'accessToken'], 'string', 'max' => 300]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'E-mail'),
            'passwordHash' => Yii::t('app', 'Password Hash'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'accessToken' => Yii::t('app', 'Access Token'),
            'dateCreated' => Yii::t('app', 'Date Created'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['userId' => 'id']);
    }
}

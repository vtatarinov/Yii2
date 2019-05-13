<?php


namespace app\components;


use app\models\Users;
use yii\base\Component;

class AuthComponent extends Component
{
    public function getModel()
    {
        return new Users();
    }

    /**
     * @param $model Users
     * @return bool
     */
    public function authUser(&$model):bool
    {
        $model->setAuthorizationScenario();

        if (!$model->validate(['email', 'password'])) {
            return false;
        }

        $user = $this->getUserFromEmail($model->email);

        if (!$this->checkPassword($model->password, $user->passwordHash)) {
            $model->addError('password', 'Неверный пароль');
        }

        return  \Yii::$app->user->login($user, 3600);
    }

    /**
     * @param $email
     * @return Users|array|\yii\db\ActiveRecord|null
     */
    private function getUserFromEmail($email)
    {
        return Users::find()->andWhere(['email' => $email])->one();
    }

    private function checkPassword($password, $passwordHash)
    {
        return \Yii::$app->security->validatePassword($password, $passwordHash);
    }

    /**
     * @param $model Users
     * @return bool
     */
    public function createUser(&$model):bool
    {
        $model->setRegistrationScenario();
        $model->passwordHash = $this->generateHashPassword($model->password);
        $model->authKey = $this->generateAuthKey();

        if ($model->save()) {
            return true;
        }

        return false;
    }

    private function generateAuthKey()
    {
        return \Yii::$app->security->generateRandomString();
    }

    private function generateHashPassword($password)
    {
        return \Yii::$app->security->generatePasswordHash($password);
    }
}
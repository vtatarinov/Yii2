<?php


namespace app\components;


use yii\base\Component;
use app\models\Activity;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class ActivityComponent extends Component
{
    public $activityClass;

    public function init()
    {
        parent::init();

        if (empty($this->activityClass)){
            throw new \Exception('Need activityClass param');
        }

    }

    /**
     * @return Activity
     */

    public function getModel()
    {
        return new $this->activityClass;
    }

    /**
     * @param $model Activity
     * @return bool
     */

    public function createActivity(&$model):bool
    {
        $model->files = $this->getUploadedFile($model, 'files');
        $model->userId = \Yii::$app->user->id;

        if (!$model->save()) {
            return false;
        }
        if ($model->files) {
            foreach ($model->files as $file) {
                $path = $this->genFilePath($this->genFileName($file));
                if (!$this->saveUploadedFile($file, $path)) {
                    $model->addError('file','Не удалось сохранить файл');
                    return false;
                } else {
                    $model->filesView[] = basename($path);
                }
            }
        }
        return true;
    }

    public function getAllActivities()
    {
        $sql = 'SELECT * from activity';
        return \Yii::$app->db->createCommand($sql)->queryAll();
    }

    private function saveUploadedFile(UploadedFile $file, $path):bool
    {
        return $file->saveAs($path);
    }

    private function genFileName(UploadedFile $file)
    {
        $file = uniqid().'.'.$file->getExtension();
        return $file;
    }

    private function genFilePath($fileName)
    {
        FileHelper::createDirectory(\Yii::getAlias('@webroot/images'));
        $path = \Yii::getAlias('@webroot/images/'.$fileName);
        return $path;
    }

    /**
     * @param Activity $model
     * @param $attr
     * @return UploadedFile|null
     */

    private function getUploadedFile(Activity $model, $attr)
    {
        return UploadedFile::getInstances($model, $attr);
    }
}
<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadImage extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload($id_serial)
    {
        if ($this->validate()) {
            $nameImage = '/serial-' . $id_serial;
            $this->imageFile->saveAs(\Yii::getAlias('@webroot'). '/images'. $nameImage . '.png');
            return true;
        } else {
            return false;
        }
    }
}
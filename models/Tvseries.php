<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tvseries".
 *
 * @property int $id
 * @property string $description
 * @property string $name
 *
 * @property Season[] $seasons
 */
class Tvseries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tvseries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeasons()
    {
        return $this->hasMany(Season::className(), ['tvseries_id' => 'id']);
    }
    static public function getTvseriesWithStartFinishSeoson(){
        return Yii::$app->db->createCommand('
            SELECT tvseries.id, MIN(season.dateStart) AS ds, MAX(season.dateFinish) AS dt
            FROM tvseries 
            JOIN season ON tvseries.id = season.tvseries_id 
            GROUP BY tvseries.id;
            ')->queryAll();
    }
}

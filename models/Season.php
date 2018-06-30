<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "season".
 *
 * @property int $id
 * @property string $name
 * @property string $dateStart
 * @property string $dateFinish
 * @property int $tvseries_id
 *
 * @property Episode[] $episodes
 * @property Tvseries $tvseries
 */
class Season extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'season';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'dateStart', 'dateFinish', 'tvseries_id'], 'required'],
            [['dateStart', 'dateFinish'], 'safe'],
            [['tvseries_id'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['tvseries_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tvseries::className(), 'targetAttribute' => ['tvseries_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'dateStart' => 'Date Start',
            'dateFinish' => 'Date Finish',
            'tvseries_id' => 'Tvseries ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEpisodes()
    {
        return $this->hasMany(Episode::className(), ['season_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTvseries()
    {
        return $this->hasOne(Tvseries::className(), ['id' => 'tvseries_id']);
    }
}

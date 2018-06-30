<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "episode".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $season_id
 *
 * @property Season $season
 */
class Episode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'episode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['season_id'], 'required'],
            [['season_id'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['season_id'], 'exist', 'skipOnError' => true, 'targetClass' => Season::className(), 'targetAttribute' => ['season_id' => 'id']],
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
            'description' => 'Description',
            'season_id' => 'Season ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeason()
    {
        return $this->hasOne(Season::className(), ['id' => 'season_id']);
    }
}

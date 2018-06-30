<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seasons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="season-index">

    <h1><?= (isset($serial->name)) ? ('TvSerial: '.$serial->name.' | ') : ('') ?><?=Html::encode($this->title) ?></h1>

    <p>
        <?php if(isset($tvseries_id) && !is_null($tvseries_id)) : ?>
            <?= Html::a('Add new Season', ['create', 'tvseries_id' => $tvseries_id], ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'dateStart',
            'dateFinish',
            'tvseries_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

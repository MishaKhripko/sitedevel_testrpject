<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Episodes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="episode-index">

    <h1><?= (isset($season->name)) ? ('Season: '.$season->name.' | ') : ('') ?><?=Html::encode($this->title) ?></h1>

    <p>
        <?php if(isset($season->id) && !is_null($season)) : ?>
            <?= Html::a('Create Episode', ['create', 'season_id' => $season->id], ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

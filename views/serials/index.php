<?php use yii\helpers\Url; 
$this->title = 'Все сериалы';
?>
<style>
h3{display: inline-block;}
</style>
<div class="site-index">
    <div class="body-content">
        <div class="row">
        <?php
        foreach ($dp as $key => $value) : 
            foreach ($query as $query_key => $query_value) : 
                if ($value->id == $query_value['id']) : ?>
                <div class="col-lg-4">
                    <a href='<?=Url::to(['/serials/view','id'=>$value->id])?>'>
                        <img src="/web/images/serial-<?=$value->id?>.png" width=100px height=100px>
                        <h2><?=$value->name;?></h2>
                    </a>
                	<p><h3>Years: </h3><?=substr($query_value['ds'],0,4).'-'.substr($query_value['dt'],0,4);?></p>
                    <p><h3>Info: </h3><?=$value->description;?></p>
                </div>
                <?php
                endif;
            endforeach; 
        endforeach;?>
        </div>
    </div>
</div>
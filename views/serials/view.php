<?php use yii\helpers\Url;
$this->title = 'Сериал '.$serial->name;
 ?>
<style>
.col{
	background-color: #F2F1F0;
	margin: 5px;
}
.seasons, .episodes{
    width: 100%;
    display: flow-root;
}
</style>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script>
episodes = document.getElementById("episodes");
function getEpisodes(id){
    setTimeout(function(){
        $.ajax({
            url: '/serials/episodes',
            data: {
                id: id,
            },
            type: 'POST',
            success: function(e){
                console.log(e);
                document.getElementById("episodes").innerHTML = '';
                e.forEach(addEpisod);
            },
            error: function(){
                console.log(e);
            }
        })
    },0);
}
function addEpisod(item, index){
    console.log(item.name);
    document.getElementById("episodes").innerHTML = document.getElementById("episodes").innerHTML + '<div class="col col-lg-2"><img src="/web/images/serial-episode-'+item.id+'.png" width=100px height=100px><h2>'+item.name+'</h2>'+'<p>'+item.description+'</p></div>';
}
</script>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="seasons">
            <h1><?=$serial->name?></h1>
            <?php $i = 0;
            foreach ($dp as $key => $value) : $i++; ?>
                <div class="col col-lg-3">
                	<h2 onclick="getEpisodes(<?=$value->id?>)"><?=$i?><p style="font-size: 14px; display: inline-block;">(click)</p></h2>
                	<p>Name seoson: <strong><?=$value->name?></strong></p>
                	<p>Start year: <strong><?=substr($value->dateStart,0,4)?></strong></p>
                	<p>Finish year: <strong><?=substr($value->dateFinish,0,4)?></strong></p>
                </div>
            <?php endforeach;?>
            </div>
            <p id="episodes"></p>
        </div>
    </div>
</div>

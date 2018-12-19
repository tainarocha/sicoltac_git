<?php

use app\components\GridView;
/* @var $this yii\web\View */

$this->title = 'SICOLTAC';
$date = date('d-m-Y');
?>

<img  src="imagens/leite.jpeg" height="300" width="100%" /> <br>
<div class="site-index">

    <div class="jumbotron">
        
        
        <p class="lead">Entregas de hoje -> <?php echo $date; ?> </p>
        
    </div>

    <div class="body-content">

 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'botaoAdicionar' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           
            [
                'attribute' => 'produtor_id',               
                'value' => function($model){
                    return $model->produtor->nome;
                }
            ],
            [
                'attribute' => 'quantidade',               
                'value' => function($model){
                    return $model->quantidade . " litros";
                }
            ],
            'dat',
            'hora',
           
        ],
    ]); ?>

    </div>
</div>

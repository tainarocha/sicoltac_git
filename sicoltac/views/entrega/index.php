<?php

use yii\helpers\Html;
use app\components\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EntregaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Entregas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entrega-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Nova Entrega', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'botaoAdicionar' => false,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'produtor_id',               
                'value' => function($model){
                    return $model->produtor->nome;
                },
                'headerOptions' => ['style' => 'width:15%' ],
            ],

            [
                'attribute' => 'quantidade',               
                'value' => function($model){
                    return $model->quantidade . " litros";
                }
            ],
            'dat',
            'hora',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

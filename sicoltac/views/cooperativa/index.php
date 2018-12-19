<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CooperativaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cooperativa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cooperativa-index">
    
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Cadastrar nova Cooperativa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'cnpj',
            //'endereco',
            //'numero',
            //'bairro',
            //'cidade',
            //'cep',
            'telefone',
            //'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

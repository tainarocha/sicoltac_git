<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProdutorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Cadastrar novo Produtor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'cpf',
            'id',
            //'endereco',
            //'numero',
            //'bairro',
            //'cidade',
            //'cep',
            'telefone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

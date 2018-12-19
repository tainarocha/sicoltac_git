<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProdutorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produtor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

   <div class="row">
        <br>
         <div class="col-md-3">
             <?= $form->field($model, 'nome') ?>
        </div>
        <div class="col-md-3">
             <?= $form->field($model, 'cpf') ?>
        </div>
        
    </div>

    <?php // $form->field($model, 'id') ?>

    <?php // $form->field($model, 'endereco') ?>

    <?php // $form->field($model, 'numero') ?>

    <?php // echo $form->field($model, 'bairro') ?>

    <?php // echo $form->field($model, 'cidade') ?>

    <?php // echo $form->field($model, 'cep') ?>

    <?php // echo $form->field($model, 'telefone') ?>

    <div class="form-group">
        <?= Html::submitButton('Consultar', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Limpar',['produtor/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

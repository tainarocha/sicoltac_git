<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CooperativaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cooperativa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

      <div class="row">
        <br>
         <div class="col-md-3">
            <?= $form->field($model, 'nome') ?>
        </div>
        
    </div>
    
    
    <?php // $form->field($model, 'id') ?>
    
    <?php // $form->field($model, 'cnpj') ?>

    <?php // $form->field($model, 'endereco') ?>

    <?php // $form->field($model, 'numero') ?>

    <?php // echo $form->field($model, 'bairro') ?>

    <?php // echo $form->field($model, 'cidade') ?>

    <?php // echo $form->field($model, 'cep') ?>

    <?php // echo $form->field($model, 'telefone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Consultar', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Limpar',['cooperativa/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

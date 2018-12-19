<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cooperativa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cooperativa-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        
        <div class="col-md-4">
            <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class="col-md-3">
            <?= $form->field($model, 'cnpj')->textInput(['maxlength' => true]) ?>
        </div>
      
        
    </div>
    <br>
     <div class="row">
         
        <div class="col-md-4">
            <?= $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-1">
            <?= $form->field($model, 'numero')->textInput() ?> 
        </div>
         
        <div class="col-md-2">
            <?= $form->field($model, 'bairro')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class="col-md-2">
            <?= $form->field($model, 'cidade')->textInput(['maxlength' => true]) ?>
        </div>
         
        <div class="col-md-2">
            <?= $form->field($model, 'cep')->textInput(['maxlength' => true]) ?>
        </div>
         
    </div>
    <br>
    
     <div class="row">
         
        <div class="col-md-2">
            <?= $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?>
        </div>
         
        <div class="col-md-3">
             <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
         
    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

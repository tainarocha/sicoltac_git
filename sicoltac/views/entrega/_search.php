<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;


/* @var $this yii\web\View */
/* @var $model app\models\EntregaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entrega-search">

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
              <?= $form->field($model, 'id') ?>
        </div>
    </div>
   

    <?php // $form->field($model, 'quantidade') ?>

    <?php // $form->field($model, 'dat') ?>

    <?php /* $form->field($model, 'hora')->widget(DateControl::classname(), [
    'type'=>DateControl::FORMAT_TIME
    ]);*/ ?>

    <?php // $form->field($model, 'produtor_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Consultar', ['class' => 'btn btn-primary']) ?>
       <?= Html::a('Limpar',['entrega/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

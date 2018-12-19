<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Produtor;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;


/* @var $this yii\web\View */
/* @var $model app\models\Entrega */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entrega-form">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <br>
         <div class="col-md-4">
            <?= $form->field($model, 'produtor_id')->
               dropDownList(ArrayHelper::map(Produtor::find()
              ->orderBy('nome')
              ->all(),'id','nome'),
              ['prompt' => 'Selecione um produtor'])            
            ?>
        </div>
        
        <div class="col-md-2">
            <?= $form->field($model, 'quantidade')->textInput() ?>
        </div>
         <div class="col-md-3">
        
           <?= $form->field($model, 'dat')->widget(DateControl::classname(), [
                'type'=>DateControl::FORMAT_DATE,
                'ajaxConversion'=>false,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'autoclose' => true
                     ]
                ]      
            ]);
           ?>
         </div>
     
        <div class="col-md-2">
           <?= $form->field($model, 'hora')->widget(DateControl::classname(), [
             'type'=>DateControl::FORMAT_TIME
            ]); ?>
  
        </div>
      
    </div>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

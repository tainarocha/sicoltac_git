<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cooperativa */

$this->title = 'Alterar dados da Cooperativa: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Cooperativas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cooperativa-update">
    <br>
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

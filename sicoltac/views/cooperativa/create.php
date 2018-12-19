<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cooperativa */

$this->title = 'Nova Cooperativa';
$this->params['breadcrumbs'][] = ['label' => 'Cooperativas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cooperativa-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

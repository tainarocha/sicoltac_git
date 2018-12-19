<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Produtor */

$this->title = 'Novo Produtor';
$this->params['breadcrumbs'][] = ['label' => 'Produtores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php
/* @var $this yii\web\View */

$this->title = 'SICOLTAC';
?>
<div class="site-index">

    <div class="body-content">
        <h1>Entregas do dia</h1>

        <?php
        foreach ($data as $row) {
            ?>
        <p> <?= $row['quantidade'] ?> </p>

            <?php
        }
        ?>


    </div> 
</div>

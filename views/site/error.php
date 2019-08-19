<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use app\assets\MainErrorAsset;

MainErrorAsset::register($this);

$this->title = $name;
?>
<div class="site-error">

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p class="boneco">
        ¯\_(ツ)_/¯
    </p>
    <p class="texto">
        Uma rua sem saída é um bom lugar para se dar a volta.
    </p>

</div>

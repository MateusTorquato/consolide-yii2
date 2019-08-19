<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Marca */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marcas-form card-body">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group required">
                <?= $form->field($model, 'codigo_identificacao')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group required">
                <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group required">
                <?= $form->field($model, 'cpf')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::className(), [
                    'mask' => '999.999.999-99',
                    'clientOptions' => [
                        'removeMaskOnSubmit' => true
                    ]
                ]) ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group required">
                <?= $form->field($model, 'telefone')->widget(\yii\widgets\MaskedInput::className(), [
                    'mask' => '(99) 99999-9999',
                    'clientOptions' => [
                        'removeMaskOnSubmit' => true
                    ]
                ]) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group required">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group required">
                <?= $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group required">
                <?= $form->field($model,'data_registro')->widget(DatePicker::className(), [
                    'model' => $model,
                    'attribute' => 'data_registro',
                    'name' => 'data_registro',
                    'dateFormat' => 'dd/MM/yyyy',
                    'options' => [
                        'class' => 'form-control'],
                ]) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

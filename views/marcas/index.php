<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-header"></i> Marcas</div>
<div class="card-body">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <?= $form->field($model, 'codigo_identificacao') ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?= $form->field($model, 'nome') ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <?= Html::submitButton('<i class="fa fa-search"></i> Pesquisar', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa fa-plus"></i> Nova marca', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="table-responsive">
        <table class="table table-bordered" style="margin-top: 20px;">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Data registro</th>
                <th width="280px">Ações</th>
            </tr>
    
            <?php foreach ($marcas as $marca) : ?>
                <tr>
                    <td> <?= $marca->codigo_identificacao?> </td>
                    <td> <?= $marca->nome?> </td>
                    <td> <?= Yii::$app->formatter->asCpf($marca->cpf) ?> </td>
                    <td> <?= Yii::$app->formatter->asTelefone($marca->telefone) ?> </td>
                    <td> <?= $marca->email?> </td>
                    <td> <?= Yii::$app->formatter->asDate($marca->data_registro, 'd/MM/Y'); ?></td>
                    <td>
                        <?= Html::a('Editar', ['update', 'id' => $marca->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Excluir', ['delete', 'id' => $marca->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Deseja realmente excluir este item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
    
    
        </table>
    </div>
    <?= LinkPager::widget(['pagination' => $pagination]); ?>
</div>

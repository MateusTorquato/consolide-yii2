<?php

namespace app\models;

use DateTime;
use Yii;

class Marca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marcas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo_identificacao', 'nome', 'cpf', 'data_registro'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['email'], 'email'],
            [['codigo_identificacao', 'nome', 'telefone', 'email', 'endereco'], 'string', 'max' => 255],
            [['cpf'], 'string', 'min' => 11],
            ['data_registro', 'date', 'format' => 'dd/MM/yyyy'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo_identificacao' => 'Código de identificação',
            'nome' => 'Nome',
            'cpf' => 'CPF',
            'telefone' => 'Telefone',
            'email' => 'Email',
            'data_registro' => 'Data de registro',
            'endereco' => 'Endereco',
            'created_at' => 'Criado em',
            'updated_at' => 'Atualizado em',
        ];
    }

    public function beforeSave($insert) {
        if ($this->data_registro) {
            $date = DateTime::createFromFormat('d/m/Y', $this->data_registro);
            $this->data_registro = $date->format('Y-m-d');
        }

        return parent::beforeSave($insert);
      }
}

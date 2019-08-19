<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Marcas;

/**
 * MarcasSearch represents the model behind the search form of `app\models\Marcas`.
 */
class MarcasSearch extends Marcas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['codigo_identificacao', 'nome', 'cpf', 'telefone', 'email', 'endereco', 'created_at', 'updated_at', 'data_registro'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Marcas::find();

        $this->load($params);

        $query->andFilterWhere(['like', 'codigo_identificacao', $this->codigo_identificacao])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cpf', $this->cpf])
            ->andFilterWhere(['like', 'telefone', $this->telefone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'endereco', $this->endereco]);

        return $query;
    }
}

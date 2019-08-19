<?php

use yii\db\Migration;

/**
 * Class m190819_003114_create_table_marcas
 */
class m190819_003114_create_table_marcas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('marcas', [
            'id' => $this->primaryKey(),
            'codigo_identificacao' => $this->string()->notNull(),
            'nome' => $this->string()->notNull(),
            'cpf'  => $this->string('11')->notNull(),
            'telefone' => $this->string(),
            'email' => $this->string(),
            'endereco' => $this->string(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'data_registro' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('marcas');
    }
}

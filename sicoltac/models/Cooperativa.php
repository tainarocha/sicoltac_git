<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cooperativa".
 *
 * @property int $id
 * @property string $nome
 * @property string $cnpj
 * @property string $endereco
 * @property int $numero
 * @property string $bairro
 * @property string $cidade
 * @property string $cep
 * @property string $telefone
 * @property string $email
 */
class Cooperativa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cooperativa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cnpj', 'telefone', 'email'], 'required'],
            [['numero'], 'integer'],
            [['nome'], 'string', 'max' => 100],
            [['cnpj'], 'string', 'max' => 18],
            [['endereco'], 'string', 'max' => 40],
            [['bairro', 'cidade'], 'string', 'max' => 25],
            [['cep'], 'string', 'max' => 10],
            [['telefone'], 'string', 'max' => 14],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cnpj' => 'Cnpj',
            'endereco' => 'Rua/Av',
            'numero' => 'Número',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'cep' => 'Cep',
            'telefone' => 'Telefone',
            'email' => 'Email',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produtor".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $endereco
 * @property int $numero
 * @property string $bairro
 * @property string $cidade
 * @property string $cep
 * @property string $telefone
 *
 * @property Entrega[] $entregas
 */
class Produtor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cpf', 'telefone'], 'required'],
            [['numero'], 'integer'],
            [['nome'], 'string', 'max' => 100],
            [['cpf', 'telefone'], 'string', 'max' => 14],
            [['endereco'], 'string', 'max' => 40],
            [['bairro', 'cidade'], 'string', 'max' => 25],
            [['cep'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'endereco' => 'Endereço',
            'numero' => 'Número',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'cep' => 'Cep',
            'telefone' => 'Telefone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntregas()
    {
        return $this->hasMany(Entrega::className(), ['produtor_id' => 'id']);
    }
}

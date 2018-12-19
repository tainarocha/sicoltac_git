<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entrega".
 *
 * @property int $id
 * @property double $quantidade
 * @property string $dat
 * @property string $hora
 * @property int $produtor_id
 *
 * @property Produtor $produtor
 */
class Entrega extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entrega';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantidade', 'dat', 'hora', 'produtor_id'], 'required'],
            [['quantidade'], 'number'],
            [['dat', 'hora'], 'safe'],
            [['produtor_id'], 'integer'],
            [['produtor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Produtor::className(), 'targetAttribute' => ['produtor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'quantidade' => 'Quantidade',
            'dat' => 'Data',
            'hora' => 'Hora',
            'produtor_id' => 'Produtor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutor()
    {
        return $this->hasOne(Produtor::className(), ['id' => 'produtor_id']);
    }
    
    public function fields() {
         return [
            'id',
            'quantidade' => 'quantidade',
            'data' => 'dat',
            'hora' => 'hora',
            'produtor' => function(Entrega $model){
                return $model->produtor->nome ;
            
             
            },
        ];
    }
}

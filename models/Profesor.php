<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_profesor".
 *
 * @property integer $id
 * @property string $Nombre
 *
 * @property TblMateria[] $tblMaterias
 */
class Profesor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_profesor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMaterias()
    {
        return $this->hasMany(TblMateria::className(), ['idProfesor' => 'id']);
    }
}

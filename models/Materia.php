<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_materia".
 *
 * @property integer $id
 * @property integer $idProfesor
 * @property string $Nombre
 *
 * @property TblProfesor $idProfesor0
 */
class Materia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_materia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProfesor', 'Nombre'], 'required'],
            [['idProfesor'], 'integer'],
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
            'idProfesor' => 'Id Profesor',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProfesor0()
    {
        return $this->hasOne(TblProfesor::className(), ['id' => 'idProfesor']);
    }
}

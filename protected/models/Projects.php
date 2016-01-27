<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property integer $id_project
 * @property integer $numproject
 * @property boolean $material_brus
 * @property boolean $material_brevno
 * @property string $price
 * @property string $image
 * @property integer $floor
 * @property float $area
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numproject'], 'required'],
            [['numproject', 'price', 'floor'], 'integer'],
            [['material_brus', 'material_brevno'], 'boolean'],
            [['image'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_project' => Yii::t('app', 'Id Project'),
            'numproject' => Yii::t('app', 'Номер проекта'),
            'material_brus' => Yii::t('app', 'Материал брус'),
            'material_brevno' => Yii::t('app', 'Материал бревно'),
            'price' => Yii::t('app', 'Цена'),
            'image' => Yii::t('app', 'Image'),
            'floor' => Yii::t('app', 'Этажность'),
            'area' => Yii::t('app', 'Площадь'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectsQuery(get_called_class());
    }
}

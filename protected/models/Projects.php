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
 * @property string $cost
 * @property string $image
 * @property integer $floor
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
            [['numproject', 'cost', 'floor'], 'integer'],
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
            'numproject' => Yii::t('app', 'Numproject'),
            'material_brus' => Yii::t('app', 'Material Brus'),
            'material_brevno' => Yii::t('app', 'Material Brevno'),
            'cost' => Yii::t('app', 'Cost'),
            'image' => Yii::t('app', 'Image'),
            'floor' => Yii::t('app', 'Floor'),
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

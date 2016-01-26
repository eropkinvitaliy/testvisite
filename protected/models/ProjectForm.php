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
 */
class ProjectForm extends \yii\db\ActiveRecord
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
            [['image'], 'string', 'max' => 255]
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
            'price' => Yii::t('app', 'Price'),
            'image' => Yii::t('app', 'Image'),
            'floor' => Yii::t('app', 'Floor'),
        ];
    }
}

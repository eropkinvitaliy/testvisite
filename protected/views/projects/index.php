<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\base\Widget;
use app\widgets\Filter;

/* @var $this yii\web\View */
/* @var $projects \app\models\Projects */
/* @var $pages */

$this->title = Yii::t('app', 'Проекты');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(); ?>
<div class="projects-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row col-lg-offset-1">
        <?php $form = ActiveForm::begin([
            'id' => 'form',
            'method' => 'get',
            'action' => ['index'],
        ]); ?>
        <div id="filter" class="col-lg-9 filter">
            <div class="col-lg-12">
                <?php $filteritems = Yii::$app->params['filteritems']; ?>
                <?php foreach ($filteritems as $column => $items) : ?>
                    <div class="col-lg-2" style="display: block; padding: 5px; text-align: center">
                        <?php foreach ($items as $key => $value): ?>
                            <?php if ('head' == $key): ?>
                                <div class="col-lg-12" style="padding: 2px 5px 2px 0px">
                                    <p class="headfilter"><b>
                                            <?php echo $value; ?></b></p>
                                </div>
                            <?php endif ?>
                            <?php if ('head' !== $key): ?>
                                <div class="col-lg-12 btn btn-group <?php echo $column; ?>"
                                     style="padding: 5px; border: 1px solid;">
                                    <div class="radio" style="margin: 1px; padding: 1px; text-align: center">
                                        <label>
                                            <input id="<?php echo $column . $key ?>" type="radio"
                                                   name="<?= $column ?>" value="<?php echo $key ?>">
                                            <?php echo $value ?>
                                        </label>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                <?php endforeach ?>
                <div class="col-lg-2" style="display: flex; padding: 5px; text-align: center;">
                    <div class="col-lg-12 btn btn-success btn-md clear" style="padding: 2px 0px 2px 0px; align-self: center;
                    border: 1px solid; border-radius: 10px ">
                        <div class="radio" style="margin: 1px; padding: 1px; text-align: center">
                            <label>
                                <input type="radio" name="clear" value="on" style="visibility: hidden">
                                Сбросить
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

        <div id="widget_filter">
            <?php echo  Filter::widget(); ?>
        </div>

    </div>
</div>


<?php Pjax::end(); ?>

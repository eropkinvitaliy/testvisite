<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $projects \app\models\Projects */
/* @var $pages */
/* @var $projectform */

$this->title = Yii::t('app', 'Проекты');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(); ?>
    <div class="projects-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row col-lg-offset-1">
        <?php $form = ActiveForm::begin([
            'method' => 'get',
            'action' => ['index'],
        ]); ?>
        <div class="col-lg-9 filter">
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
                                <div class="col-lg-12 btn btn-group" style="padding: 5px; border: 1px solid;">
                                    <div class="radio" style="margin: 1px; padding: 1px; text-align: center">
                                        <label>
                                            <input id="<?php echo $column . $key ?>" type="radio"
                                                   name="<?= $column ?>" value="<?php echo $key ?>"
                                                >
                                            <?php echo $value ?>
                                        </label>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                <?php endforeach ?>
                <div class="col-lg-2" style="display: flex; padding: 5px; text-align: center;">
                    <div class="col-lg-12 btn btn-success btn-md" style="padding: 2px 0px 2px 0px; align-self: center;
                    border: 1px solid; border-radius: 10px ">
                        <div class="radio" style="margin: 1px; padding: 1px; text-align: center">
                            <label>
                                <input id="clear" type="radio" name="clear" value="on" style="visibility: hidden">
                                Сбросить
                            </label>
                        </div>
                        <!--                        --><? //= Html::a(Yii::t('app', 'Сбросить фильтр'),
                        //                            ['index', 'clear' => 1], ['class' => 'btn btn-success btn-sm']) ?>
                    </div>
                </div>
            </div>
            <button type="submit">Ok</button>
        </div>
        <?php ActiveForm::end(); ?>

        <?php foreach ($projects as $project): ?>
            <div class="col-lg-6" style="margin-bottom: 20px">
                <div class="media-middle" style="text-align: center; align-content: center; font-size: 21px;">
                    <div style="margin: 5px; border-bottom: 1px solid;">
                        <h2 class="media-heading">Название проекта, П-<?php echo $project->numproject; ?></h2>
                        <a class="pull-top" href="#">
                            <img class="media-object" src="<?= $project->image ?>" alt="" width="400px">
                        </a>

                        <p style="font-size: larger" class="media-bottom">
                            от <?php echo number_format($project->price, 0, '', ' '); ?> руб.</p>

                        <p><?php echo $project->area . ' м2 , этажей ' . $project->floor ?></p>

                        <p><?php echo 'Материал: ';
                            if ('1' == $project->material_brus) {
                                echo ' Брус ';
                            }
                            if ('1' == $project->material_brevno) {
                                echo ' Бревно ';
                            }
                            ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <div class="col-lg-12" style="align-content: center; text-align: center">
        <?php echo LinkPager::widget([
            'pagination' => $pages,
        ]); ?>
    </div>
<?php Pjax::end(); ?>
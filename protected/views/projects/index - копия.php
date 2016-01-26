<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\grid\GridView;
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

    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['index'],
    ]); ?>



    <div class="row col-lg-offset-1">
        <div class="col-lg-9" style="border: 1px solid green; border-radius: 10px">
            <div class="btn-group btn-group-vertical" data-toggle="buttons-radio" style="text-align: center">
                <div><p>fffffff</p></div>

                    <button type="button" class="btn btn-lg" style="margin: 2px 2px">w
                <input type="radio" style="visibility: hidden" name="price" value="1">
                </button>


                    <button type="button" class="btn btn-lg" style="margin: 2px 2px">w
                        <input type="radio" style="visibility: hidden" name="price" value="2">
                    </button>

                    <button type="button" class="btn btn-lg" style="margin: 2px 2px">w
                        <input type="radio" style="visibility: hidden" name="price" value="3">
                    </button>
            </div>
            <div class="btn-group btn-group-vertical" data-toggle="buttons-radio" style="text-align: center">
                <p>dfgsdfg</p>
                <button type="button" class="btn btn-lg" style="margin: 2px 2px">Left</button>
                <button type="button" class="btn btn-lg" style="margin: 2px 2px">Middle</button>
                <button type="button" class="btn btn-lg" style="margin: 2px 2px">Right</button>
            </div>
            <div class="btn-group btn-group-vertical" data-toggle="buttons-radio" style="text-align: center">
                <p>dfgsdfg</p>
                <button type="button" class="btn btn-lg" style="margin: 2px 2px">Left</button>
                <button type="button" class="btn btn-lg" style="margin: 2px 2px">Middle</button>
                <button type="button" class="btn btn-lg" style="margin: 2px 2px">Right</button>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

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
                        <div class="btn-group btn-group-vertical" data-toggle="buttons-radio">
                            <button type="button" class="btn">Left</button>
                            <button type="button" class="btn">Middle</button>
                            <button type="button" class="btn">Right</button>
                        </div>
                        <!--                        --><?php //foreach ($items as $key => $value): ?>
                        <!--                            --><?php //if ('head' == $key): ?>
                        <!--                                <div class="col-lg-12" style="padding: 2px 5px 2px 0px">-->
                        <!--                                    <p class="headfilter"><b>-->
                        <?php //echo $value; ?><!--</b></p>-->
                        <!--                                </div>-->
                        <!--                            --><?php //endif ?>
                        <!--                            --><?php //if ('head' !== $key): ?>
                        <!--                                <div class="col-lg-12 btn btn-group" style="padding: 5px; border: 1px solid;">-->
                        <!---->
                        <!---->
                        <!--                                   <a href="index"><input type="hidden" name="-->
                        <?php //echo $column;?><!--" value="--><?php //echo $key;?><!--">-->
                        <!--                                    --><?php //echo $value; ?><!--</a>-->
                        <!--                                </div>-->
                        <!--                            --><?php //endif ?>
                        <!--                        --><?php //endforeach ?>
                    </div>
                <?php endforeach ?>
                <div class="col-lg-2" style="display: flex; padding: 5px; text-align: center;">
                    <div class="col-lg-12" style="padding: 2px 5px 2px 0px; align-self: center">
                        <?= Html::a(Yii::t('app', 'Сбросить фильтр'),
                            ['index', 'clear' => 1], ['class' => 'btn btn-success btn-sm']) ?>
                    </div>
                </div>
            </div>
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
    <script type="text/javascript">
        $(function () {
            $('#input_code').hide();
            $(document).on('click', '#savemsisdn', function (e) {
                e.preventDefault();
            });
        });
    </script>
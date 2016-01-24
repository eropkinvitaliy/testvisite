<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $projects \app\models\Projects */
/* @var $pages */

$this->title = Yii::t('app', 'Проекты');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row col-lg-offset-2">
        <div class="col-lg-8" style="border: 1px solid; border-radius: 10px; border-color: green ">
            <p> Фильтр</p>
        </div>
    </div>
    <?php foreach ($projects as $project): ?>
        <div class="col-lg-6" style="border-bottom: 1px solid;">
            <div class="media-middle" style="text-align: center; align-content: center; font-size: 21px;">
                <h2 class="media-heading">Название проекта, П-<?php echo $project->numproject; ?></h2>
                <a class="pull-top" href="#">
                    <img class="media-object" src="<?= $project->image ?>" alt="" width="400px">
                </a>

                <p style="font-size: larger" class="media-bottom">
                    от <?php echo number_format($project->cost, 0, '', ' '); ?> руб.</p>
            </div>
        </div>
    <?php endforeach ?>
    <?php echo LinkPager::widget([
    'pagination' => $pages,
    ]);?>
</div>
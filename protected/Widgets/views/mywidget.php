<?php

use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $projects \app\models\Projects */
/* @var $pages \yii\data\Pagination */

foreach ($projects as $project): ?>
    <div id="viewprojects" class="col-lg-6" style="margin-bottom: 20px">
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
                    } ?>
                </p>
            </div>
        </div>
    </div>
<?php endforeach ?>
<div class="col-lg-12" style="align-content: center; text-align: center">
    <?php echo LinkPager::widget([
        'pagination' => $pages,
    ]); ?>
</div>


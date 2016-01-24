<?php
/**
 * Created by PhpStorm.
 * User: EARL
 * Date: 02.12.2015
 * Time: 15:50
 */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\Menu;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>"/>
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div class="container">
                <div class="col-lg-12">
                    <?= $content; ?>
                </div>
    </div>
<!-- /#wrapper -->

<?php $this->endBody() ?>

<!--    --><? //= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'numproject',
//            'material_brus:boolean',
//            'material_brevno:boolean',
//            'cost',
//            'image:image',
//             'floor',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); ?>

</body>
</html>
<?php $this->endPage() ?>

<?php
/**
 * Created by PhpStorm.
 * User: EARL
 * Date: 02.12.2015
 * Time: 15:50
 */

use yii\helpers\Html;
use app\assets\AppAsset;

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


<script type="text/javascript">
    $(function () {
        var pages;
        var arr = {
            'price': 0,
            'area': 0,
            'type': 0,
            'floor': 0,
            'material': 0,
            'clear': 0,
        };
        $('.price').on('click', 'input', function () {
            event.stopPropagation();
            var price = $(this);
            arr['price'] = price.val();
            $.get('/projects/filter', {arr: arr}, (function (data) {
                $("#widget_filter").html(data);
            })).error(function () {
                alert('Ошибка выполнения запроса');
            })
        });
        $('.area').on('click', 'input', function () {
            event.stopPropagation();
            var area = $(this);
            arr['area'] = area.val();
            $.get('/projects/filter', {arr: arr}, (function (data) {
                $("#widget_filter").html(data);
            })).error(function () {
                alert('Ошибка выполнения запроса');
            })
        });
        $('.type').on('click', 'input', function () {
            event.stopPropagation();
            var type = $(this);
            arr['type'] = type.val();
            $.get('/projects/filter', {arr: arr}, (function (data) {
                $("#widget_filter").html(data);
            })).error(function () {
                alert('Ошибка выполнения запроса');
            })
        });
        $('.floor').on('click', 'input', function () {
            event.stopPropagation();
            var floor = $(this);
            arr['floor'] = floor.val();
            $.get('/projects/filter', {arr: arr}, (function (data) {
                $("#widget_filter").html(data);
            })).error(function () {
                alert('Ошибка выполнения запроса');
            })
        });
        $('.material').on('click', 'input', function () {
            event.stopPropagation();
            var material = $(this);
            arr['material'] = material.val();
            $.get('/projects/filter', {arr: arr}, (function (data) {
                $("#widget_filter").html(data);
            })).error(function () {
                alert('Ошибка выполнения запроса');
            })
        });
        $('.clear').on('click', 'input', function () {
            event.stopPropagation();
            var clear = $(this);
            arr['clear'] = clear.val();
            $('input:radio').attr('checked', false);
            $.get('/projects/filter', {arr: arr}, (function (data) {
                $("#widget_filter").html(data);

            })).error(function () {
                alert('Ошибка выполнения запроса');
            })
        });
    });
</script>

</body>
</html>
<?php $this->endPage() ?>

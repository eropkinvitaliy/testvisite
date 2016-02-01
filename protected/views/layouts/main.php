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
            var i = $(this);
            var v = i.val();
            var n = i.attr('name');
            arr['price'] = v;
            $.post('/projects/filter', {arr: arr}, (function (data) {
                //console.log(data);
                var pages = JSON.parse(data);
                console.log(pages.model);
                $("#test").html('<a>hjhj</a>');
                if (data.pages) {
                    alert('На Ваш новый номер телефона отправлено SMS-сообщение с кодом подтверждения.');
                }
                else {
                    alert('результата нет');
                }
            })).error(function () {
                alert('Ошибка выполнения запроса');
            })
        })
    });
</script>

</body>
</html>
<?php $this->endPage() ?>

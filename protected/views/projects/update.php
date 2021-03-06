<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Projects */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Projects',
]) . ' ' . $model->id_project;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_project, 'url' => ['view', 'id' => $model->id_project]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="projects-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

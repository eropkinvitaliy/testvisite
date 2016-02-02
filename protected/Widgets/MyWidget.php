<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\Projects;
use yii\data\Pagination;

class MyWidget extends Widget
{
    public function run()
    {
        $query = Projects::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 4]);
        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('mywidget', [
            'projects' => $models,
            'pages' => $pages,
        ]);
    }
}
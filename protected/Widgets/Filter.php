<?php

namespace app\widgets;

use yii\base\Widget;
use Yii;
use app\models\Projects;
use yii\data\Pagination;

class Filter extends Widget
{
    public function run()
    {
        $query = Projects::find();
        $data = Yii::$app->request->get('arr');
        if ('on' == $data['clear']) {
            $data = [];
        }
        $pagesize = 4;
        if (!empty($data)) {
            foreach ($data as $key => $val) {
                if ('price' == $key) {
                    switch ($val) {
                        case '1':
                            $query->where('price < :price', [':price' => 1000000]);
                            break;
                        case '2':
                            $query->where(['between', 'price', 1000000, 3000000]);
                            break;
                        case '3':
                            $query->where('price > :price', [':price' => 3000000]);
                            break;
                    }
                }
                if ('floor' == $key) {
                    switch ($val) {
                        case 1 :
                            $query->andWhere('floor = :floor', [':floor' => 1]);
                            break;
                        case 2:
                            $query->andWhere('floor = :floor', [':floor' => 2]);
                            break;
                        case 3:
                            $query->andWhere('floor = :floor', [':floor' => 3]);
                            break;
                    }
                }
                if ('material' == $key) {
                    switch ($val) {
                        case 1:
                            $query->andWhere('material_brevno = :brevno', [':brevno' => 1]);
                            $pagesize = 3;
                            break;
                        case 2:
                            $query->andWhere('material_brus = :brus', [':brus' => 1]);
                            $pagesize = 8;
                            break;
                        case 3:
                            $query->andWhere('material_brevno = :brevno', [':brevno' => 1]);
                            $query->andWhere('material_brus = :brus', [':brus' => 1]);
                            break;
                    }
                }
                if ('area' == $key) {
                    switch ($val) {
                        case 1:
                            $query->andWhere('area < :area', [':area' => 100]);
                            break;
                        case 2:
                            $query->andWhere(['between', 'area', 100, 300]);
                            break;
                        case 3:
                            $query->andWhere('area > :area', [':area' => 300]);
                            break;
                    }
                }
            }
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => $pagesize]);
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
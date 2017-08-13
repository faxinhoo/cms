<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-01 23:26
 */

namespace backend\controllers;

use yii;
use backend\models\AdminLogSearch;
use backend\models\AdminLog;
use backend\actions\IndexAction;
use backend\actions\ViewAction;
use backend\actions\DeleteAction;

class LogController extends \yii\web\Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                'data' => function(){
                    $searchModel = new AdminLogSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'view-layer' => [
                'class' => ViewAction::class,
                'modelClass' => AdminLog::class,
            ],
            'delete' => [
                'class' => DeleteAction::class,
                'modelClass' => AdminLog::class,
            ],
        ];
    }

}
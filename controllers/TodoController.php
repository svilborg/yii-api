<?php
namespace app\controllers;

use app\components\api\Todos;
use app\components\filters\ActionTimeFilter;
use yii\web\Controller;

/**
 * Site controller
 */
class TodoController extends Controller
{

    public function behaviors()
    {
        return [
            [
                'class' => ActionTimeFilter::class
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $api = new Todos();

        return $api->getAll(0, 1);
    }
}
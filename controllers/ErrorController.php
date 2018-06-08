<?php
namespace app\controllers;

use yii\web\Controller;

/**
 * Error controller
 */
class ErrorController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return [
            'status' => [
                'http_code' => 404
            ],
            'data' => [
                'message' => "Page Not Found"
            ]
        ];
    }
}
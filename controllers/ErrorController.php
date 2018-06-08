<?php
namespace app\controllers;

use yii\web\Controller;
use yii\web\Response;
use yii\filters\ContentNegotiator;

/**
 * Error controller
 */
class ErrorController extends Controller
{

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                    'application/xml' => Response::FORMAT_XML
                ]
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
        return [
            'message' => "Page Not Found"
        ];
    }
}
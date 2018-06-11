<?php
namespace app\controllers;

use app\models\form\Login;
use app\models\form\Signup;
use yii\rest\ActiveController;

class UserController extends ActiveController
{

    public $modelClass = 'app\models\User';

    public function actions()
    {
        $actions = parent::actions();

        // disable the "delete" and "create" actions
        unset($actions['delete'], $actions['create']);
    }

    public function actionLogin()
    {
        $model = new Login();
        if ($model->load(\Yii::$app->request->post(), '')) {
            if ($user = $model->login()) {
                return $user;
            }

            return [
                "errors" => $model->getErrors()
            ];
        }

        throw new \Exception("Unauthorized.");
    }

    public function actionRegister()
    {
        $model = new Signup();
        if ($model->load(\Yii::$app->request->post(), '')) {
            if ($user = $model->signup()) {
                return $user;
            }

            return [
                "errors" => $model->getErrors()
            ];
        }

        throw new \Exception("Unauthorized.");
    }
}

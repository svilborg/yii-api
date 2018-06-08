<?php
namespace app\controllers;

use yii\rest\ActiveController;
use app\models\User;
use app\models\SignupForm;

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
        $username = \Yii::$app->request->post("username");
        $password = \Yii::$app->request->post("password");

        $user = User::findByUsername($username);

        if ($user) {

            if ($user->validatePassword($password)) {
                $user->access_token = \Yii::$app->security->generateRandomString();
                $user->save();
            } else {
                throw new \Exception("Unauthorized.");
            }
        } else {
            throw new \Exception("Unauthorized");
        }

        return $user;
    }

    public function actionRegister()
    {
        $model = new SignupForm();
        if ($model->load(\Yii::$app->request->post(), '')) {
            if ($user = $model->signup()) {
                return $user;
            }

            return $model->getErrors();
        } else {
            throw new \Exception("Error");
        }

        return [];
    }
}

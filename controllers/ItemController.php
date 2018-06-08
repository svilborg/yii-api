<?php
namespace app\controllers;

use yii\filters\auth\CompositeAuth;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use app\models\Item;
use app\components\ItemsRepository;
use app\components\ItemsRepositoryFactory;

class ItemController extends ActiveController
{

    public $modelClass = 'app\models\Item';

    // public function behaviors()
    // {
    // $behaviors = parent::behaviors();
    // $behaviors['authenticator'] = [
    // 'class' => CompositeAuth::className(),
    // 'authMethods' => [
    // HttpBasicAuth::className(),
    // HttpBearerAuth::className(),
    // QueryParamAuth::className()
    // ]
    // ];
    // return $behaviors;
    // }

    public function actionCategory()
    {
        $id = \Yii::$app->request->get("id");

        /** @var \api\components\ItemsRepositoryFactory $factory */
        $factory = \Yii::$container->get('api\components\ItemsRepositoryFactory');
        $repo = $factory->getRepository();

        return $repo->getItemCategories($id);
    }

    public function actionData()
    {
        $factory = \Yii::$container->get('api\components\ItemsRepositoryFactory');
        $repo = $factory->getRepository();

        return $repo->getAll();
    }
}
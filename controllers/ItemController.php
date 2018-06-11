<?php
namespace app\controllers;

use app\components\Authenticatable;
use yii\rest\ActiveController;

class ItemController extends ActiveController
{

//     use Authenticatable;

    public $modelClass = 'app\models\Item';

    public function actionCategory()
    {
        $id = \Yii::$app->request->get("id");

        /** @var \app\components\ItemsRepositoryFactory $factory */
        $factory = \Yii::$container->get('app\components\ItemsRepositoryFactory');
        $repo = $factory->getRepository();

        return $repo->getItemCategories($id);
    }

    public function actionData()
    {
        $factory = \Yii::$container->get('app\components\ItemsRepositoryFactory');
        $repo = $factory->getRepository();

        return $repo->getAll();
    }
}
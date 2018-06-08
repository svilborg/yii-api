<?php
namespace app\controllers;

use app\components\Authenticatable;
use yii\rest\ActiveController;

class CategoryController extends ActiveController
{

    use Authenticatable;

    public $modelClass = 'app\models\Category';


}
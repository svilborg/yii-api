<?php
namespace app\components\filters;

use Yii;
use yii\base\ActionFilter;

class ActionTimeFilter extends ActionFilter
{

    private $_startTime;

    public function beforeAction($action)
    {
        $this->_startTime = microtime(true);
        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        $time = microtime(true) - $this->_startTime;
        Yii::debug("Action '{$action->uniqueId}' spent $time second.");

        $response = Yii::$app->getResponse();
        $response->getHeaders()->set('X-Time', $time);

        return parent::afterAction($action, $result);
    }
}
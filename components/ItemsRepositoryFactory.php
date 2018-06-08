<?php
namespace app\components;

class ItemsRepositoryFactory {


    public function getRepository() {
        return new ItemsRepository(\Yii::$app->db);
    }
}
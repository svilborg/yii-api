<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    "id" => $index+1,
    'username' => $faker->userName,
    'password' => Yii::$app->getSecurity()->generatePasswordHash('qqqqqq'),
    "email" => $faker->email,
    'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
    'access_token' => Yii::$app->getSecurity()->generateRandomString(),
    'created_at' => 1528470210,
    'updated_at' => 1528470210,
    "status" => '10'
];
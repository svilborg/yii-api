<?php
namespace app\components;

class ApiResponse extends \yii\web\Response
{

    public function send()
    {
        $this->data = [
            'status' => [
                'http_code' => $this->statusCode
            ],
            'data' => $this->data
        ];
        parent::send();
    }
}


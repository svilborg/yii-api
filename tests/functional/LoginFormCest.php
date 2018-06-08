<?php

class LoginFormCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('items');
    }

    public function openLoginPage(\FunctionalTester $I)
    {

        $I->sendGET("/items");
        $I->seeResponseContainsJson(['status' => ['http_code' => 200]]);
    }

}
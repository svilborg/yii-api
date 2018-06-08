<?php
namespace tests\models;

use app\models\User;

class UserTest extends \Codeception\Test\Unit
{

    // public function _fixtures()
    // {
    // return [
    // 'profiles' => [
    // 'class' => \tests\unit\fixtures\UserFixture::className(),
    // // fixture data located in tests/_data/user.php
    // 'dataFile' => 'tests/unit/fixtures/data/user.php'
    // ],
    // ];
    // }
    public function testFindUserById()
    {
        expect_that($user = User::findIdentity(1));
        expect($user->username)->equals('admin');

        expect_not(User::findIdentity(999));
    }

    public function testFindUserByAccessToken()
    {
        expect_that($user = User::findIdentityByAccessToken('gmNKVGZOoxR-RcnpFkyNFGRQYf0CuCaT'));
        expect($user->username)->equals('admin');

        expect_not(User::findIdentityByAccessToken('non-existing'));
    }

    public function testFindUserByUsername()
    {
        expect_that($user = User::findByUsername('admin'));
        expect_not(User::findByUsername('not-admin'));
    }

    /**
     *
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = User::findByUsername('admin');
        // expect_that($user->validateAuthKey('test100key'));
        // expect_not($user->validateAuthKey('test102key'));

        expect_that($user->validatePassword('qqqqqq'));
        expect_not($user->validatePassword('other'));
    }
}

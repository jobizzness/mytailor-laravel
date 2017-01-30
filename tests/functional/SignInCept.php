<?php

$email = 'foo@bar.com';
$password='barguy';

$I = new FunctionalTester($scenario);

$I->am('an Afrodapper');
$I->wantTo('Login to Afrodapp');

$I->haveAnAccount(['email', 'password']);
$I->amOnPage('/login');
$I->fillField('email', $email);
$I->fillField('password', $password);
$I->click('Log In');

$I->seeCurrentUrlEquals('/');

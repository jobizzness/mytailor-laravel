<?php 
$I = new FunctionalTester($scenario);

$I->am('a guest');
$I->wantTo('want to signup to Afrodapp');


$I->amOnPage('/register');

$I->fillField('First name', 'John');
$I->fillField('Last name', 'Doe');
$I->fillField('Email', 'mike@doe.com');
$I->fillField('Password', 'biness');
$I->fillField('Re-enter Password', 'biness');
$I->click('Continue');

$I->seeCurrentUrlEquals('/');
//$I->seeRecord('users', ['email' => 'john@doe.com']);
$I->assertTrue(Auth::check());

//$I->see('Welcome To Afrodapp');
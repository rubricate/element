<?php 


require '../vendor/autoload.php';


use Rubricate\Element\CreateElement;


$inputFirstName = new CreateElement('input');
$inputFirstName->setAttribute('type', 'text');
$inputFirstName->setAttribute('name', 'firstName');
$inputFirstName->setAttribute('class', 'form');
$inputFirstName->setAttribute('required');

$inputSubmit = new CreateElement('input');
$inputSubmit->setAttribute('type',  'submit');
$inputSubmit->setAttribute('name',  'submit');
$inputSubmit->setAttribute('value', 'ok');

$formContainer = new CreateElement('form');
$formContainer->setAttribute('action', 'localhost/example/form-action.php');
$formContainer->setAttribute('method', 'post');

$formContainer->addChild($inputFirstName);
$formContainer->addChild($inputSubmit);


echo $formContainer->getElement();
/*
  <form action="localhost/example/form-action.php" method="post">
    <input type="text" name="firstName" class="form" required />
    <input name="submit" type="submit" value="ok" />
  </form>
*/



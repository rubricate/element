<?php 


require '../vendor/autoload.php';


use Rubricate\Element\CreateElement;

$inputFirstName = new CreateElement('input');
$inputFirstName->setAttribute('type', 'text');
$inputFirstName->setAttribute('name', 'firstName');
$inputFirstName->setAttribute('class', 'form');
$inputFirstName->setAttribute('required');

echo $inputFirstName->getElement();

/*
  <input type="text" name="firstName" class="form" required />
*/


<?php 


use Rubricate\Element\CreateElement;

$firstName = new CreateElement('input');
$firstName->setAttribute('type', 'text');
$firstName->setAttribute('name', 'firstName');
$firstName->setAttribute('class', 'form');
$firstName->setAttribute('required');

echo $inputFirstName->getElement();

/*
  <input type="text" name="firstName" class="form" required />
*/


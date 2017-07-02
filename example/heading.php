<?php 


require '../vendor/autoload.php';


use Rubricate\Element\CreateElement;


$heading = new CreateElement('h1');
$heading->setAttribute('class', 'tx_primary');
$heading->addInnerText('Lorem ipsum');
echo $heading->getElement();

/*
  <h1 class="tx_primary>Lorem ipsum</h1>
*/



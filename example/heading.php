<?php 


require '../vendor/autoload.php';


use Rubricate\Element\CreateElement;
use Rubricate\Element\StrElement;

$h = new CreateElement('h1');
$h->setAttribute('class', 'tx_primary');
$h->addChild(new StrElement('Lorem ipsum'));
echo $h->getElement();

/*
  <h1 class="tx_primary>Lorem ipsum</h1>
*/

$t = new StrElement('Curabitur %d %s %s et');
$t->setParam(22);
$t->setParam('a');
$t->setParam('dui');

$h = new CreateElement('h2');
$h->setAttribute('class', 'tx_primary');
$h->addChild($t);
echo $h->getElement();

/*
  <h1 class="tx_primary>curabitur 22 a dui et</h1>
*/




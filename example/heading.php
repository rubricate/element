<?php 


use Rubricate\Element\CreateElement;
use Rubricate\Element\StrElement;

$h1 = new CreateElement('h1');
$h1->setAttribute('class', 'tx_prm');
$h1->addChild(new StrElement('Lorem ipsum'));


$h2 = new CreateElement('h2');
$h2->setAttribute('class', 'tx_scn');
$h2->addChild(new StrElement('Praesent tristique'));


$t3 = new StrElement('Curabitur %d %s %s et');
$t3->setParam(22);
$t3->setParam('a');
$t3->setParam('dui');


$h3 = new CreateElement('h3');
$h3->addChild($t3);

echo $h1->getElement();
echo $h2->getElement();
echo $h3->getElement();


/* 
<h1 class="tx_prm">Lorem ipsum</h1>
<h2 class="tx_scn">Praesent tristique</h2>
<h3>Curabitur 22 a dui et</h3>
*/


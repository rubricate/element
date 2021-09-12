<?php 


use Rubricate\Element\CreateElement;

$i1 = new CreateElement('img');
$i1->setAttribute('src', 'image.png');

$i2 = new CreateElement('img');
$i2->setAttribute('src', 'image.png');
$i2->setAttribute('class', 'img-circle');

$i3 = new CreateElement('img');
$i3->setAttribute('src', 'image.png');
$i3->setAttribute('style', 'border: 0');

$a3 = new CreateElement('a');
$a3->setAttribute('href', '#');
$a3->addChild($i3);


echo $i1->getElement();
echo $i2->getElement();
echo $a3->getElement();


/* teste */

/*
<img src="image.png" />
<img src="image.png" class="img-circle" />
<a href="#"><img src="image.png" style="border: 0" /></a>
*/



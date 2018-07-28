<?php 


require '../vendor/autoload.php';


use Rubricate\Element\CreateElement;
use Rubricate\Element\StrElement;

$select = new CreateElement('select');
$select->setAttribute('name', 'latim');


$opt[] = 'lorem';
$opt[] = 'ipsum';
$opt[] = 'dolor';

foreach ($opt as $value => $description)
{
    $option = new CreateElement('option');
    $option->setAttribute('value', $value);
    $option->addChild(new StrElement($description));
    $select->addChild($option);
}


echo $select->getElement();


/*
<select name="latim">
    <option value="0">lorem</option>
    <option value="1">ipsum</option>
    <option value="2">dolor</option>
</select>
*/


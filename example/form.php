<?php 


use Rubricate\Element\CreateElement;

$name = new CreateElement('input');
$name->setAttribute('type', 'text');
$name->setAttribute('name', 'name');
$name->setAttribute('required');

$email = new CreateElement('input');
$email->setAttribute('type', 'email');
$email->setAttribute('name', 'email');
$email->setAttribute('required');

$submit = new CreateElement('input');
$submit->setAttribute('type',  'submit');
$submit->setAttribute('name',  'submit');
$submit->setAttribute('value', 'ok');

$form = new CreateElement('form');
$form->setAttribute('action', 'process.php');
$form->setAttribute('method', 'post');

$form->addChild($name);
$form->addChild($email);
$form->addChild($submit);

echo $form->getElement();

/* 
    <form action="process.php" method="post">
        <input type="text" name="name" required />
        <input type="email" name="email" required />
        <input type="submit" name="submit" value="ok" />
    </form>
*/


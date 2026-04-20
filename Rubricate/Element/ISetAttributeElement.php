<?php 

namespace Rubricate\Element;

interface ISetAttributeElement
{
    public function setAttribute(string $name, mixed $value = null): self;
}


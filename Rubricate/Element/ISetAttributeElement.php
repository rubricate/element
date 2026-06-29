<?php

declare(strict_types=1);

namespace Rubricate\Element;

interface ISetAttributeElement
{
    public function setAttribute(string $name, mixed $value = null): self;
}


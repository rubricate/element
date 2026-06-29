<?php

declare(strict_types=1);

namespace Rubricate\Element;

interface IAddChildElement
{
    public function addChild(IGetElement $e): self;
}


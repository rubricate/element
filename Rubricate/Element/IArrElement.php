<?php

declare(strict_types=1);

namespace Rubricate\Element;

interface IArrElement
{
    public function get(string|int $key): object;
}


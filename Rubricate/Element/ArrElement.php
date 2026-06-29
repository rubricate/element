<?php

declare(strict_types=1);

namespace Rubricate\Element;

use ArrayObject;
use Exception;

class ArrElement implements IArrElement
{
    private const VALID_KEYS = ['attr', 'inner', 'element'];

    private ?ArrayObject $attr = null;
    private ?ArrayObject $inner = null;
    private ?ArrayObject $element = null;

    public function get(string|int $key): object
    {
        if (!in_array($key, self::VALID_KEYS, true)) {
            throw new Exception('Only Allowed Key: attr, inner AND element');
        }

        return $this->$key ??= new ArrayObject();
    }
}


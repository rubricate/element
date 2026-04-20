<?php 

declare(strict_types=1);

namespace Rubricate\Element;

final class VoidElement
{
    private const TAGS = [
        'area', 'base', 'br', 'col', 'embed', 'hr',
        'img', 'input', 'link', 'meta', 'param',
        'source', 'track', 'wbr'
    ];

    public static function getAll(): array
    {
        return self::TAGS;
    }

    public static function isVoid(string $tagname): bool
    {
        return in_array(strtolower($tagname), self::TAGS, true);
    }
}


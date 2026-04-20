<?php 

declare(strict_types=1);

namespace Rubricate\Element;

class AttributeElement implements IAttributeElement
{
    private readonly string $attr;

    public function __construct(string $key, mixed $value = null)
    {
        $this->attr = $this->resolveAttribute($key, $value);
    }

    public function getAttribute(): string
    {
        return $this->attr;
    } 

    private function resolveAttribute(string $key, mixed $value): string
    {
        if ($value === null) {
            return $key;
        }

        return sprintf('%s="%s"', $key, (string) $value);
    } 
}

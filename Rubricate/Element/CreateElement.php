<?php

declare(strict_types=1);

namespace Rubricate\Element;

class CreateElement implements IElement
{
    private readonly string $tagname;
    private readonly ArrElement $arr;
    private ?string $close = null;
    private ?string $inner = '';

    public function __construct(string $tagname)
    {
        $this->tagname = $tagname;
        $this->arr     = new ArrElement();

        if (VoidElement::isVoid($tagname)) {
            $this->close = ' /';
            $this->inner = null;
        }
    }

    public function addChild(IGetElement $e): self
    {
        if ($this->inner === null) {
            return $this;
        }

        $i = $this->arr->get('inner');
        $i->append($e->getElement());

        return $this;
    } 

    public function setAttribute(string $name, mixed $value = null): self
    {
        $attr = new AttributeElement($name, $value);
        $a = $this->arr->get('attr');
        $a->append($attr->getAttribute());

        return $this;
    } 

    public function getElement(): string
    {
        $e = $this->arr->get('element');

        $e->append('<' . $this->tagname);

        $this->compileAttributes();

        $e->append(($this->close ?? '') . '>');

        if ($this->inner !== null) {
            $this->compileInner();
            $e->append('</' . $this->tagname . '>');
        }

        $result = (array) $this->arr->get('element');
        return implode('', $result);
    } 

    private function compileAttributes(): void
    {
        $a = $this->arr->get('attr');
        if ($a->count()) {
            $e = $this->arr->get('element');
            foreach ($a as $v) {
                $e->append(sprintf(' %s', $v));
            }
        }
    }

    private function compileInner(): void
    {
        $i = $this->arr->get('inner');
        if ($i->count()) {
            $e = $this->arr->get('element');
            foreach ($i as $content) {
                $e->append($content);
            }
        }
    }
}


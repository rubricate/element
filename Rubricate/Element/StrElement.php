<?php 

declare(strict_types=1);

namespace Rubricate\Element;

class StrElement implements IGetElement
{
    private string $str;
    private array $args = [];

    public function __construct(string $str = '')
    {
        $this->str = $str;
    }

    public function add(mixed $arg): self
    {
        $this->args[] = $arg;
        return $this;
    } 

    public function getElement(): string
    {
        if (empty($this->args)) {
            return $this->str;
        }

        if ($this->str === '') {
            return implode('', $this->args);
        }

        return vsprintf($this->str, $this->args);
    } 
}

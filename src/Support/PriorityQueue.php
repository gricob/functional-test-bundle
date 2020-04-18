<?php

namespace Gricob\FunctionalTestBundle\Support;

class PriorityQueue implements \Iterator
{
    private $elements = [];

    private $sortedElements = [];

    private $position = 0;

    public function push($element, int $priority)
    {
        $this->elements[$priority][] = $element;
    }

    private function sortElements(): void
    {
        krsort($this->elements);

        $this->sortedElements = !empty($this->elements)
            ? call_user_func_array('array_merge', $this->elements)
            : $this->elements;
    }

    public function current()
    {
        return $this->sortedElements[$this->position];
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->sortedElements[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;

        $this->sortElements();
    }
}

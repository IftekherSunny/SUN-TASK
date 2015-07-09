<?php

namespace App\Transformer;

abstract class Transformer
{
    /**
     * To transform model collection
     *
     * @param array $items
     *
     * @return array
     */
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    /**
     * To transform model
     *
     * @param $item
     *
     * @return mixed
     */
    abstract public function transform($item);
}

<?php
class Cart
{
    private $items;
    public function __construct()
    {
        $this->add_item("03", 0);
    }
    public function add_item ($artnr, $num)
    {
        $this->items[$artnr] += $num;
    }
}
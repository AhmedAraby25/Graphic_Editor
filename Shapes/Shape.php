<?php

/**
 * Created by PhpStorm.
 * User: Ahmed Araby
 * Date: 2019-05-18
 * Time: 06:10 AM
 */
require_once "Border.php";
abstract class Shape
{
    private $border;

    /**
     * Shape constructor.
     */
    public function __construct()
    {
        $this->border = new Border();
    }

    /**
     * @return Border
     */
    public function getBorder(): Border
    {
        return $this->border;
    }

    /**
     * @param Border $border
     */
    public function setBorder(Border $border)
    {
        $this->border = $border;
    }



    abstract function draw();
}

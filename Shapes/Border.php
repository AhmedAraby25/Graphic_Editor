<?php

/**
 * Created by PhpStorm.
 * User: Ahmed Araby
 * Date: 2019-05-18
 * Time: 02:58 PM
 */
class Border
{
    private $color;
    private $width;

    /**
     * Border constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }




}
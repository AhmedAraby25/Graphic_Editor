<?php

/**
 * Created by PhpStorm.
 * User: Ahmed Araby
 * Date: 2019-05-18
 * Time: 06:23 AM
 */
foreach (glob("Shapes/*.php") as $fileName)
{
    require_once $fileName;
}

class ShapeFactory
{
    public function getShape($shapeType)
    {
        if($shapeType === null)
        {
            return null;
        }
        else if(strtoupper($shapeType) === "CIRCLE")
        {
            return new Circle();
        }
        else if(strtoupper($shapeType) === "RECTANGLE")
        {
            return new Rectangle();

        }
        else if(strtoupper($shapeType) === "SQUARE")
        {
            return new Square();
        }
        //if there is a new type just edit this flow/ add more than one check and return its object

        return null;
    }
}
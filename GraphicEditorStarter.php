<?php

/**
 * Created by PhpStorm.
 * User: Ahmed Araby
 * Date: 2019-05-18
 * Time: 06:34 AM
 */

require_once ("ShapeFactory.php");
require_once ("Helpers/HelperUtilities.php");

class GraphicEditorStarter
{
    public $responseArray = array();
    public function start($jsonObject)
    {
        $shapeFactory = new ShapeFactory();

        try
        {

                if(!isset($jsonObject->shapes) || empty($jsonObject->shapes))
                {
                    throw new Exception("Bad Request, Invalid JSON body", 400);
                }
                foreach ($jsonObject->shapes as $shape)
                {
                    if(isset($shape->type))
                    {
                        if($shape->type === "circle")
                        {
                            //validate the circle object attributes
                            if(isset($shape->perimeter) && isset($shape->border)
                                && isset($shape->border->color) && isset($shape->border->width))
                            {
                                $circleShape = $shapeFactory->getShape("circle");
                                $circleShape->setPerimeter($shape->perimeter);
                                $circleShape->getBorder()->setWidth($shape->border->width);
                                $circleShape->getBorder()->setColor($shape->border->color);
                                $result = $circleShape->draw();
                                array_push($this->responseArray, $result);
                            }
                            else
                            {
                                throw new Exception("Bad Request, Missing properties in ".$shape->type, 400);
                            }
                        }
                        if($shape->type === "square")
                        {
                            //validate the circle square attributes
                            if(isset($shape->sideLength) && isset($shape->border)
                                && isset($shape->border->color) && isset($shape->border->width))
                            {
                                $squareShape = $shapeFactory->getShape("square");
                                $squareShape->setSideLength($shape->sideLength);
                                $squareShape->getBorder()->setColor($shape->border->color);
                                $squareShape->getBorder()->setWidth($shape->border->width);
                                $result = $squareShape->draw();
                                array_push($this->responseArray, $result);
                            }
                            else
                            {
                                throw new Exception("Bad Request, Missing properties in ".$shape->type, 400);
                            }

                        }
                        if($shape->type === "rectangle")
                        {
                            //validate the rectangle object attributes
                            if(isset($shape->width) && isset($shape->height) && isset($shape->border)
                                && isset($shape->border->color) && isset($shape->border->width))
                            {
                                $rectangleShape = $shapeFactory->getShape("rectangle");
                                $rectangleShape->setHeight($shape->height);
                                $rectangleShape->setWidth($shape->width);
                                $rectangleShape->getBorder()->setColor($shape->border->color);
                                $rectangleShape->getBorder()->setWidth($shape->border->width);
                                $result = $rectangleShape->draw();
                                array_push($this->responseArray, $result);
                            }
                            else
                            {
                                throw new Exception("Bad Request, Missing properties in ".$shape->type, 400);
                            }
                        }
                    }
                }
                if(!empty($this->responseArray))
                {
                    echo json_encode($this->responseArray);
                }
                else
                {
                    throw new Exception("Bad Request, There is wrong with one of specific shape", 400);
                }
        } catch (Exception $e) {
            $array = array(
                'Error' => $e->getMessage(),
                'Code' => $e->getCode()
            );

            echo json_encode(new ArrayObject($array));
        }
    }
}


//CONST data = "{
//\"shapes\": [
//    {
//        \"type\": \"circle\",
//        \"perimeter\": 100,
//        \"border\": {
//            \"color\": \"red\",
//            \"width\": 1
//        }
//    },
//    {
//        \"type\": \"square\",
//        \"sideLength\": 100,
//        \"border\": {
//            \"color\": \"#776cff\",
//            \"width\": 2
//        }
//    },
//    {
//       \"type\": \"rectangle\",
//        \"width\": 190,
//        \"height\": 190,
//    }
//    ]
// }";
//

$jsonRequest = json_decode($_POST['json']);

$factoryPatternDemo = new GraphicEditorStarter();
$factoryPatternDemo->start($jsonRequest);
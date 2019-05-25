<?php

/**
 * Created by PhpStorm.
 * User: Ahmed Araby
 * Date: 2019-05-18
 * Time: 06:11 AM
 */
require_once "Shape.php";
class Square extends Shape
{
    private $sideLength;

    /**
     * @return mixed
     */
    public function getSideLength()
    {
        return $this->sideLength;
    }

    /**
     * @param mixed $sideLength
     */
    public function setSideLength($sideLength)
    {
        $this->sideLength = $sideLength;
    }

    function draw()
    {
        // create image resource variable
        $img = imagecreatetruecolor(600, 600);

        // fill img with color (background)
        imagefill($img, 0, 0, imagecolorallocate($img, 220, 220, 220));

        //check color of border and get it in rgb format
        $rgb = HelperUtilities::getRgbColor($this->getBorder()->getColor());

        $red = $rgb['r'];
        $green = $rgb['g'];
        $blue = $rgb['b'];

        $color = imagecolorallocate($img, $red, $green, $blue);

        imagerectangle($img, 10, 10, $this->getSideLength(), $this->getSideLength(), $color);

        //output image
        $image_data_base64 = HelperUtilities::convertToBase64($img, get_class($this));
        HelperUtilities::writeBinaryDataInFile($image_data_base64, get_class($this));

        // Free up memory
        imagedestroy($img);

        header('Content-type: application/json');
        $response_array['status'] = 'success';
        $response_array['type'] = get_class($this);
        return $response_array;
    }

    function __toString()
    {
        return
            "Square Draw() <br/>".
            "Area = ". ($this->sideLength * 2)."<br/>".
            "Border Color = ". $this->getBorder()->getColor()."<br/>".
            "Border Width = ". $this->getBorder()->getWidth();
    }
}
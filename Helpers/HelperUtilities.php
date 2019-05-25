<?php

/**
 * Created by PhpStorm.
 * User: Ahmed Araby
 * Date: 2019-05-19
 * Time: 05:45 AM
 */
class HelperUtilities
{
    private const COLORS_LIST = array("black" => "0,0,0", "white" => "255,255,255", "red" => "255,0,0",
        "blue" => "0,0,255", "yellow" => "255,255,0", "green" => "0,128,0");



    public static function getRgbColor($color)
    {
        if(preg_match('/^#([a-f0-9]{3}){1,2}\b$/', $color)) //hex color is valid
        {
            $rgb = HelperUtilities::hexToRgb($color);
        }
        else
        {
            $rgb = HelperUtilities::colorNameToRgb($color);
        }

        if($rgb == null)
        {
            $rgb['r'] = 0;
            $rgb['g'] = 0;
            $rgb['b'] = 0;
        }
        return $rgb;
    }

    public static function convertToBase64($data, $shapeName)
    {
        //output image
        ob_start();
        imagejpeg($data);
        $image_data = ob_get_clean();
        return base64_encode($image_data);
    }

    public static function writeBinaryDataInFile($binaryData, $shapeName)
    {
        $fp = fopen('shapesBinary\binary_'.$shapeName.time(), 'w');
        fwrite($fp, $binaryData);
        fclose($fp);
    }

    private static function hexToRgb($hex)
    {
        $hex      = str_replace('#', '', $hex);
        $length   = strlen($hex);
        $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
        $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
        $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
        return $rgb;
    }

    private static function colorNameToRgb($colorName)
    {
        if(array_key_exists($colorName, self::COLORS_LIST))
        {
            $rgbArray = explode(',', self::COLORS_LIST[$colorName]);
            $rgb['r'] = $rgbArray[0];
            $rgb['g'] = $rgbArray[1];
            $rgb['b'] = $rgbArray[2];
            return $rgb;
        }
        return null;
    }

    public static function cleanInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
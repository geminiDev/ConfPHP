<?php

namespace app\Helpers;


use Intervention\Image\ImageManagerStatic;

class MyCaptchat
{
    private $code = '';
    private $image;

    /**
     *  Constructor of captchat
     */
    public function   __construct()
    {
        $this->setGenerateToCode();
        $this->constructImage();
    }

    /**
     * Method str_random generate to string
     * @param number $number
     * @param bool $uppercase
     */
    public function str_random($number, $uppercase = false)
    {
        $result = '';
        $strings = ['a', 'b', 'c', 'd', 'e','f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

        for ($i=0; $i < $number; $i++) {
            $randAlpha = rand(0, 25);
            $result .= $strings[$randAlpha];
        }

        if($uppercase) return strtoupper($result);

        else return $result;
    }

    public function setGenerateToCode()
    {

        $this->code = rand(1, 9) .$this->str_random(3, true). rand(10, 99) . $this->str_random(2);

    }

    public function getGenerateToCode()
    {
        return $this->code;
    }

    public function constructImage()
    {
        $x = rand(20,40);
        $y= rand(30,45);
        $text = $this->code;
        $widthImage = 200;
        $heightImage = 50;

        $img = imagecreate($widthImage,$heightImage);
        imagecolorallocate($img, 143,187,174);
        $black = imagecolorallocate($img, 0, 0, 0);
        $font= public_path('fonts/ru.ttf');
        imagettftext($img, 30,0, $x, $y,$black, $font, $text);
        header('Content-type: image/png');
        imagepng($img,'img/image.png');

        return $img = $this->image;
    }
}

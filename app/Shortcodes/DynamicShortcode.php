<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08/02/2019
 * Time: 10:24 AM
 */

namespace App\Shortcodes;


class DynamicShortcode
{
    public function register($shortcode,$content){
        $id = $shortcode->id;
        echo $id;
    }
}
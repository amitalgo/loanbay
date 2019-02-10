<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08/02/2019
 * Time: 10:37 AM
 */

namespace App\Shortcodes;


class ItalicShortcode
{
    public function custom($shortcode, $content, $compiler, $name, $viewData)
    {
        return sprintf('<i class="%s">%s</i>', $shortcode->class, $content);
    }
}
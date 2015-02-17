<?php

namespace Ikerib\IkasiBundle\Util;

class Util
{
    public static function getSlug($str, $separator = '-')
    {
        // Código copiado de http://cubiq.org/the-perfect-php-clean-url-generator
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $slug = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $slug);
        $slug = strtolower(trim($slug, $separator));
        $slug = preg_replace("/[\/_|+ -]+/", $separator, $slug);
        return $slug;
    }
}
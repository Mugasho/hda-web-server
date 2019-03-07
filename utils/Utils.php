<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 1/30/2019
 * Time: 7:29 AM
 */

namespace Hda\utils;


class Utils
{


    /**
     * Utils constructor.
     */
    public function __construct()
    {
    }

    // convert html > ul > li to a PHP array
    function ul_to_array ($ul) {
        if (is_string($ul)) {
            // encode ampersand appropiately to avoid parsing warnings
            $ul=preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ul);
            if (!$ul = simplexml_load_string($ul)) {
                trigger_error("Syntax error in UL/LI structure");
                return FALSE;
            }
            return ul_to_array($ul);
        } else if (is_object($ul)) {
            $output = array();
            foreach ($ul->li as $li) {
                $output[] = (isset($li->ul)) ? ul_to_array($li->ul) : (string) $li;
            }
            return $output;
        } else return FALSE;
    }
}
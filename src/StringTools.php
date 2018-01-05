<?php
/**
 * StringTools.php
 *
 * StringTools class
 *
 * php 7.1+
 *
 * @category  None
 * @package   Floor9design\StringTools
 * @author    Rick Morice <rick@floor9design.com>
 * @license   MIT
 * @version   1.0
 * @link      http://floor9design.com
 * @see       http://floor9design.com
 * @since     File available since Release 1.0
 *
 */

namespace Floor9design\StringTools;

/**
 * Class StringTools
 *
 * This helper offers some repeatable/reusable string functions
 *
 * @category  None
 * @package   App\Models
 * @author    Rick Morice <rick@floor9design.com>
 * @copyright Floor9Design Ltd
 * @license   Private software
 * @version   1.0
 * @link      http://floor9design.com
 * @see       http://floor9design.com
 * @since     File available since Release 1.0
 */
class StringTools
{
    /**
     * Turns a string into a camelcase
     *
     * @param string $string
     * @param bool $capitalize_first_character choose between pascale and camel case.
     * @return string
     */
    public function camelConvert(string $string, bool $capitalize_first_character = false): string
    {

        $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));

        if (!$capitalize_first_character) {
            $str[0] = strtolower($str[0]);
        }

        return $str;
    }

    /**
     * Converts a url to be "display friendly", removing http, https etc.
     * Also optionally removes common unneeded social media stems, such as "facebook.com/"
     *
     * @param string $string
     * @return string
     */
    public function convertPublicUrlForDisplay(string $string, $social_media_remove = true): string
    {
        // firstly, specify basic items:
        $items = ['http://', 'https://', 'www.'];

        // optionally include social_media_remove items
        if ($social_media_remove) {
            $items = array_merge(
                $items,
                [
                    'facebook.com',
                    'twitter.com',
                    'instagram.com'
                ]
            );
        }
        $stripped = str_replace($items, '', $string);
        $trimmed = trim($stripped, '/');

        return $trimmed;
    }

}
<?php
/**
 * HtmlElements.php
 *
 * HtmlElements class
 *
 * php 7.1+
 *
 * @category  None
 * @package   Floor9design\HtmlElements
 * @author    Rick Morice <rick@floor9design.com>
 * @license   MIT
 * @version   1.0
 * @link      http://floor9design.com
 * @see       http://floor9design.com
 * @since     File available since Release 1.0
 *
 */

namespace Floor9design\HtmlElements;

/**
 * Class HtmlElements
 *
 * This helper offers some repeatable/reusable HTML elements
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
class HtmlElements
{

    /**
     * Creates a set of tabs that respond and auto select themselves in response to request data
     *
     * $tabs array is of the following form:
     *
     * $tabs = [
     *      ['id'=> 'example-tab', 'selected' => false, 'name' => Example tab'],
     *      ['id'=> 'example-tab2', 'selected' => false, 'name' => Example tab 2'],
     *      ['id'=> 'selected-example-tab', 'selected' => true, 'name' => Selected Example tab'],
     * ]
     *
     * Items are defined by their key, with a value of false. The default selected has a value of true.
     *
     * If the $selected_id variable is used, this id will override the default array selection process.
     *
     * @param array $tabs
     * @param array $options
     * @param string $selected_id
     * @return string
     */
    public function createTabs(array $tabs, string $selected_id = '', array $options = ['class' => '']): string
    {

        $return = '<nav';

        // add options
        foreach ($options as $attribute => $value) {

            if ($attribute == 'class') {
                $return .= ' ' . $attribute . '="tabs ' . $value . '"';
            } else {
                $return .= ' ' . $attribute . '="' . $value . '"';
            }
        }

        $return .= '><ul>';

        foreach ($tabs as $tab) {

            $return .= '<li class="tab';

            if (($selected_id && $tab['id'] = $selected_id) || (!$selected_id && $tab['selected'])) {
                $return .= ' selected';
            }

            $return .= '"><a href="#' . $tab['id'] . '" id="' . $tab['id'] . 'Link" title="' . $tab['name'] . '">';
            $return .= $tab['name'] . '</a></li>';

        }

        $return .= '</ul></nav>';

        return $return;

    }

    /**
     * Creates a many to many relationship selector
     *
     * @return string
     */
    /*
    public function manyToManySelector(): string
    {
        // to be implemented
    }
    */

}
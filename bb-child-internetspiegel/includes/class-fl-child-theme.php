<?php

/**
 * Internetspiegel (Beaver Builder Child Theme) - class-fl-child-theme.php
 * ----------------------------------------------------------------------------------
 * Helper class for theme functions.
 * ----------------------------------------------------------------------------------
 * @author  Paul van Buuren
 * @license GPL-2.0+
 * @package bb-child-internetspiegel
 * @version 1.0.7
 * @desc.   Related posts functionality
 * @link    http://wbvb.nl/themes/bb-child-internetspiegel/
 */

/**
 * Helper class for theme functions.
 *
 * @class FLChildTheme
 */
final class FLChildTheme {
    
    /**
     * @method styles
     */
    static public function stylesheet()
    {
      // force latest CSS
      echo '<link rel="stylesheet" href="' . INSP_CHILD_THEME_URL . '/style.css?v=' . CHILD_THEME_VERSION . '" />';
      
      if ( ( isset( $_GET[INSP_PRINT_TRIGGER_KEY] ) ) && ( $_GET[INSP_PRINT_TRIGGER_KEY] == INSP_PRINT_TRIGGER_VALUE ) ) {
        echo '<link rel="stylesheet" href="' . INSP_CHILD_THEME_URL . '/css/print.css?v=' . CHILD_THEME_VERSION . '" />';
      }
    }
}

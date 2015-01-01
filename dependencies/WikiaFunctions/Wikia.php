<?php
/**
 * @package MediaWiki
 * @author Krzysztof Krzyżaniak <eloy@wikia.com> for Wikia.com
 * @copyright (C) 2007, Wikia Inc.
 * @licence GNU General Public Licence 2.0 or later
**/

class Wikia {

	static public function getAllHeaders() {
		if ( function_exists( 'getallheaders' ) ) {
			$headers = getallheaders();
		} else {
			$headers = $_SERVER;
		}
		return $headers;
	}
	
	/**
     * successbox
     *
     * @access public
     * @static
     * @author eloy@wikia
     *
     * @param string $what message for user
     *
     * @return string composed HTML/XML code
     */
    static public function successbox($what) {
        return Xml::element( "div", array(
				"class"=> "successbox", "style" => "margin: 0;margin-bottom: 1em;"
			), $what)
			. Xml::element("br", array( "style" => "clear: both;"));
    }
    /**
     * errorbox
     *
     * return div with error message
     *
     * @access public
     * @static
     * @author eloy@wikia
     *
     * @param string $what message for user
     *
     * @return string composed HTML/XML code
     */
    static public function errorbox($what) {
        return Xml::element( "div", array(
				"class"=> "errorbox", "style" => "margin: 0;margin-bottom: 1em;"
			), $what )
			. Xml::element("br", array( "style" => "clear: both;"));
    }
    /**
     * errormsg
     *
     * return span for error message
     *
     * @access public
     * @static
     * @author eloy@wikia
     *
     * @param string $what message for user
     *
     * @return string composed HTML/XML code
     */
    static public function errormsg($what)
    {
        return Xml::element("span", array( "style"=> "color: #fe0000; font-weight: bold;"), $what);
    }
}
}
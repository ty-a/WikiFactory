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
}
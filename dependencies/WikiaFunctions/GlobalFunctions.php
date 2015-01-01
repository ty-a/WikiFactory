<?php
/**
 * Author: Inez Korczyński
 */
 
/**
 * Go through the backtrace and return the first method that is not in the ingored class
 * @param $ignoreClasses mixed array of ignored class names or a single class name
 * @return string method name
 */
function wfGetCallerClassMethod( $ignoreClasses ) {
	// analyze the backtrace to log the source of purge requests
	$backtrace = wfDebugBacktrace();
	$method = '';
	if ( is_string( $ignoreClasses ) ) {
		$ignoreClasses = [ $ignoreClasses ];
	}
	while ( $entry = array_shift( $backtrace ) ) {
		if ( empty( $entry['class'] ) || in_array( $entry['class'], $ignoreClasses ) ) {
			continue;
		}
		// skip closures
		// e.g. "FilePageController:{closure}"
		if ($entry['function'] === '{closure}') {
			continue;
		}
		$method = $entry['class'] . ':' . $entry['function'];
		break;
	}
	return $method;
}

/**
 * Convenience function converts string values into true
 * or false (boolean) values
 *
 * @param bool $value
 * @return boolean
 */
function wfStrToBool( $value ) {
	return ( $value === 'true' ) ? true : false;
}

/**
 * Convenience-function to make it easier to get the wgBlankImgUrl from inside
 * of template-code (ie: no ugly global $wgBlankImgUrl;print $wgBlankImgUrl;).
 */
function wfBlankImgUrl(){
	// @TODO: Don't just hot link Wikipedia's image
	return "https://upload.wikimedia.org/wikipedia/en/archive/4/48/20060602162806%21Blank.JPG";
} // end wfBlankImgUrl()
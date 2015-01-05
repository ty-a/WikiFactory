<?php

/**
 * @package MediaWiki
 * @subpackage SpecialPage
 * @author Krzysztof Krzyżaniak <eloy@wikia.com> for Wikia.com
 * @copyright (C) 2007, Wikia Inc.
 * @licence GNU General Public Licence 2.0 or later
 * @version: $Id: SpecialWikiFactory.php 11926 2008-04-23 13:58:29Z eloy $
 */

if ( !defined( 'MEDIAWIKI' ) ) {
    echo "This is MediaWiki extension named WikiFactory.\n";
    exit( 1 ) ;
}

$wgExtensionCredits['specialpage'][] = array(
    "name" => "WikiFactory",
    "descriptionmsg" => "wikifactory-desc",
	"version" => preg_replace( '/^.* (\d\d\d\d-\d\d-\d\d).*$/', '\1', '$Id: SpecialWikiFactory.php 11926 2008-04-23 13:58:29Z eloy $' ),
    "author" => "[http://www.wikia.com/wiki/User:Eloy.wikia Krzysztof Krzyżaniak (eloy)]",
	'url' => 'https://github.com/Wikia/app/tree/dev/extensions/wikia/WikiFactory'
);

$dir = dirname( __FILE__ );
/**
 * Whether or not to show Phalanx links in WikiFactory
 */
$wgEnablePhalanx = false;

/**
 * messages file
 */
$wgExtensionMessagesFiles["WikiFactory"] =  $dir . '/SpecialWikiFactory.i18n.php';

/**
 * helper file
 */
require_once( $dir . '/SpecialWikiFactory_ajax.php' );
 
/**
 * tags
 */
require_once( $dir . '/Tags/WikiFactoryTags.php' );
require_once( $dir . '/Tags/WikiFactoryTagsQuery.php' );

/**
 * hooks
 */
$wgAutoloadClasses['WikiFactoryHooks'] = $dir . '/WikiFactoryHooks.php';
$wgHooks['ResourceLoaderGetConfigVars'][] = 'WikiFactoryHooks::onResourceLoaderGetConfigVars';

/**
 * permissions
 */
$wgAvailableRights[] = 'wikifactory';
$wgGroupPermissions['staff']['wikifactory'] = true;

$wgAutoloadClasses['WikiFactoryPage'] = __DIR__ . '/SpecialWikiFactory_body.php';
$wgSpecialPages['WikiFactory'] = 'WikiFactoryPage';

$wgAutoloadClasses[ "CloseWikiPage" ] = $dir. "/Close/SpecialCloseWiki_body.php";
$wgSpecialPages[ "CloseWiki" ] = "CloseWikiPage";

$wgResourceModules['ext.WikiFactory'] = array(
	'scripts' => 'js/wikifactory.js',
	'styles' => 'css/wikifactory.css',
	
	'messages' => array(
		'wikifactory_removevariable',
	),
	
	'dependencies' => array( 
		'mediawiki.ui',
		'mediawiki.ui.input',
		'mediawiki.ui.checkbox'
	),
	
	'localBasePath' => __DIR__,
	
	'remoteExtPath' => 'WikiFactory'
);
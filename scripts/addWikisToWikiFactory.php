<?php
require_once( dirname( __FILE__ ) . '/Maintenance.php' );

class addWikisToWikiFactory extends Maintenance {
	public function __construct() {
		parent::__construct();
		$this->mDescription = "Adds a DB table to all of our databases";
		$this->addArg( 'source', 'File path to file holding DB table' );
	}
	
	public function execute() {
	
	}

}

$maintClass = "addWikisToWikiFactory";
require_once( RUN_MAINTENANCE_IF_MAIN );
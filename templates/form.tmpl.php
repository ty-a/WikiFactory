<!-- s:<?= __FILE__ ?> -->
<div id="wiki-factory">
	<h2>
		Wiki info: <span class="wiki-sitename"><?php echo $wiki->city_title ?></span> <sup><small><a href="<?php echo $wikiFactoryUrl . '/' . $wiki->city_id; ?>/variables/wgSitename">edit</a></small></sup>
	</h2>
	<div id="wk-wf-info">
		<table><tr><td>
		<table style="margin:0">
			<thead class="wf-tinyhead">
				<tr>
					<th>id</th>
					<th>database</th>
					<th>cluster</th>
					<th>language</th>
					<th>status</th>
				</tr>
			</thead>
			<tr>
				<td><?php echo $wiki->city_id ?></td>
				<td><?php echo $wiki->city_dbname ?></td>
				<td><?php echo empty( $cluster ) ? "c1<acronym title='default'>*</acronym>" : $cluster ?></td>
				<td><?php echo $wiki->city_lang ?></td>
				<td data-status="<?php echo $wiki->city_public; ?>"><?php echo "<acronym title=\"{$wiki->city_public}\">{$statuses[ $wiki->city_public ]}</acronym>" ?></td>
			</tr>
		</table>
		</td>
		<td><button id="wf-clear-cache"><?php echo wfMsg("wikifactory_removevariable") ?></button><?php
				?></td>
		</tr></table>
		<ul>
			<?php  #hide domain in upper area when on domain tab, so people dont get confused by non-updating data
				if( $tab !== "domains" ): ?><li>
				Wiki domain: <strong><a href="http://<?php echo $wiki->city_url ?>"><?php echo $wiki->city_url ?></a></strong>
				<sup><a href="<?php echo "{$wikiFactoryUrl}/{$wiki->city_id}"; ?>/domains">edit</a></sup>
			</li><?php endif; ?>
			<li>
				<a href="<?php echo $wikiFactoryUrl; ?>"><?php echo wfMsg( "wikifactory-label-return" ); ?></a>
			</li>
		</ul>
	</div>
	<div id="wiki-factory-panel">
		<?php
			$subVariables = in_array($tab, array("variables", "ezsharedupload", "eznamespace", 'compare') );
			$subTags = in_array($tab, array('tags', 'masstags', 'findtags') );
		?>
		<ul class="tabs" id="wiki-factory-tabs">
			<li <?php echo ( $tab === "info" ) ? 'class="selected"' : 'class="inactive"' ?> >
				<?php echo WikiFactoryPage::showTab( "info", $tab, $wiki->city_id ); ?>
			</li>
			<li <?php echo ( $subVariables ) ? 'class="selected"' : 'class="inactive"' ?> >
				<?php echo WikiFactoryPage::showTab( "variables", ( ($subVariables)?'variables':$tab ), $wiki->city_id ); ?>
			</li>
			<li <?php echo ( $tab === "domains" ) ? 'class="selected"' : 'class="inactive"' ?> >
				<?php echo WikiFactoryPage::showTab( "domains", $tab, $wiki->city_id ); ?>
			</li>
			<li <?php echo ( $subTags ) ? 'class="selected"' : 'class="inactive"' ?> >
				<?php echo WikiFactoryPage::showTab( "tags", ( ($subTags)?'tags':$tab ), $wiki->city_id ); ?>
			</li>
			<li <?php echo ( $tab === "clog" ) ? 'class="selected"' : 'class="inactive"' ?> >
				<?php echo WikiFactoryPage::showTab( "clog", $tab, $wiki->city_id ); ?>
			</li>
			<li <?php echo ( $tab === "google" ) ? 'class="selected"' : 'class="inactive"' ?> >
				<?php echo WikiFactoryPage::showTab( "google", $tab, $wiki->city_id ); ?>
			</li>
			<li <?php echo ( $tab === "close" ) ? 'class="selected"' : 'class="inactive"' ?> >
				<?php echo WikiFactoryPage::showTab( "close", $tab, $wiki->city_id ); ?>
			</li>
		</ul>
<?php
	if( $subVariables ) {
?>
		<ul class="tabs second-row" id="wiki-factory-tabs-second">
			<li <?php echo ( $tab === "compare" ) ? 'class="selected"' : 'class="inactive"' ?> >
				<?php echo WikiFactoryPage::showTab( "compare", $tab, $wiki->city_id ); ?>
			</li>
			<li <?php echo ( $tab === "variables" ) ? 'class="selected"' : 'class="inactive"' ?> >
				<?php echo WikiFactoryPage::showTab( "variables", $tab, $wiki->city_id, 'variables2' ); ?>
			</li>
			<li <?php echo ( $tab === "ezsharedupload" ) ? 'class="selected"' : 'class="inactive"' ?> >
				<?php echo WikiFactoryPage::showTab( "ezsharedupload", $tab, $wiki->city_id ); ?>
			</li>
			<li <?php echo ( $tab === "eznamespace" ) ? 'class="selected"' : 'class="inactive"' ?> >
				<?php echo WikiFactoryPage::showTab( "eznamespace", $tab, $wiki->city_id ); ?>
			</li>
		</ul>
<?php
	}
	if( $subTags ) {
?>
		<ul class="tabs second-row" id="wiki-factory-tabs-second">
			<li <?php echo ( $tab === "tags" ) ? 'class="selected"' : 'class="inactive"' ?> >
				<?php echo WikiFactoryPage::showTab( "tags", $tab, $wiki->city_id, 'tags2' ); ?>
			</li>
			<li <?php echo ( $tab === "masstags" ) ? 'class="selected"' : 'class="inactive"' ?> >
				<?php echo WikiFactoryPage::showTab( "masstags", $tab, $wiki->city_id ); ?>
			</li>
			<li <?php echo ( $tab === "findtags" ) ? 'class="selected"' : 'class="inactive"' ?> >
				<?php echo WikiFactoryPage::showTab( "findtags", $tab, $wiki->city_id ); ?>
			</li>
		</ul>
<?php
	}

	switch( $tab ):
		# INFO
			case "info":
				include_once( "form-info.tmpl.php" );
				break;

		# VARIABLES
			case "compare":
				include_once( "form-variables-compare.tmpl.php" );
				break;

			case "variables":
				include_once( "form-variables.tmpl.php" );
				break;

			case "ezsharedupload":
				include_once( "form-shared-upload.tmpl.php" );
				break;

			case "eznamespace":
				include_once( "form-namespace.tmpl.php" );
				break;

		# DOMAINS
			case "domains":
				include_once( "form-domains.tmpl.php" );
				break;

		# LOGS
			case "clog":
				include_once( "form-clog.tmpl.php" );
				break;
				
		# TAGS
			case "tags":
				include_once( "form-tags.tmpl.php" );
				break;

			case "masstags":
				include_once( "form-tags-mass.tmpl.php" );
				break;

			case "findtags":
				include_once( "form-tags-find.tmpl.php" );
				break;

		# GOOGLE
			case "google":
				include_once( "form-google.tmpl.php" );
				break;

		# CLOSE
			case "close":
				include_once( "form-close.tmpl.php" );
				break;

		default:
			print "unknown tab value [{$tab}]\n";

	endswitch;
?>
	</div>
</div>
<!-- e:<?= __FILE__ ?> -->

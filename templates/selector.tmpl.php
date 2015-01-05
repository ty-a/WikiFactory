<!-- s:<?php echo __FILE__ ?> -->
<style type="text/css">
/*<![CDATA[*/

#cityselect {z-index:9000} /* for IE z-index of absolute divs inside relative divs issue */
#citydomain {z-index:0;} /* abs for ie quirks */

#WikiFactoryDomainSelector {position: relative; z-index: 10}
#citydomain {width: 350px}

.wk-form-row { list-style-type: none; display: inline; margin:0; }
.wk-form-row li { display: inline; }
.wk-form-row label { width: 10em; float: left; text-align: left; vertical-align: middle; margin: 5px 0 0 0; }

/** overwrite some pager styles **/
table.TablePager { border: 1px solid gray;}
/*]]>*/
</style>
<form id="WikiFactoryDomainSelector" method="post" action="<?php echo $title->getLocalUrl( 'action=select' ) ?>">
<div class="wk-form-row">
 <ul>
 <li><label>Domain name</label></li>
 <li><input type="text" name="wpCityDomain" id="citydomain" value="<?php echo $domain ?>" size="24" maxlength="255" /></li>
 <li><button style="z-index:9002">Get configuration</button></li>
 </ul>
</div>
</form>
<br/>
<!-- s:short info -->
<ul>
	<li>
		You can use this page by requesting
		<strong><?php echo $title->getFullUrl() ?>/wiki-name</strong>
	</li>
	<li>
		You can use "shortcuts" for wiki addresses (<strong><?php echo $GLOBALS["wgWikiFactoryDomain"]?></strong>
		will be added automaticly). For example food means food.<?php echo $GLOBALS["wgWikiFactoryDomain"]?>
	</li>
	<li>
		You can <a href="<?php echo $title->getFullUrl() ?>/add.variable"><strong>add a new variable</strong></a> to be managed by WikiFactory
	</li>
	<li>
		You can <a href="<?php echo $title->getFullUrl() ?>/add.variable.group"><strong>add a new variable group</strong></a> to WikiFactory
	</li>
	<li>
		You can start typing the beginning of domain name into input field above
	</li>
</ul>
<!-- e:short info -->
<br />
<script type="text/javascript">
/*<![CDATA[*/
	mw.loader.using( 'jquery.ui.autocomplete', function() {
		$('#citydomain').autocomplete({
			source: wgServer + wgScript + '?action=ajax&rs=axWFactoryDomainQuery',
			// Does not work with this version, will figure out eventually
			onSelect: function(v, d) {
				// redirect to Special:WikiFactory/<city id>
				window.location.href = wgArticlePath.replace(/\$1/, wgPageName + '/' + d);
			},
			appendTo: '#WikiFactoryDomainSelector',
			delay: 0,
			maxHeight: 300,
			minLength: 3,
			width: 350
		});
	});
/*]]>*/
</script>
<br />
<?php if( !empty( $domain) && !empty( $GLOBALS[ "wgDevelEnvironment" ])): ?>
<h2>Results for <?php echo $domain ?>:</h2>
<?php echo $pager ?>
<?php endif ?>
<!-- e:<?php echo __FILE__ ?> -->

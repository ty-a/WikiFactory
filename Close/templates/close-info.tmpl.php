<!-- s:<?= __FILE__ ?> -->
<?php global $wgServer; ?>
<style type="text/css">
#close-title {text-align: center; font-size:150%; padding:15px; }
#close-info { text-align: center; font-size:110%; }
#closed-urls a { font-size: 110% }
</style>
<div style="text-align:center">
	<div><img src="<?=$wgServer?>/extensions/WikiFactory/Close/images/Installation_animation.jpg" width="700" height="142" /></div>
<?php if ( !empty($isDisabled) ) { ?>
	<div id="close-title"><?= wfMessage( 'disabled-wiki-info' )->escaped() ?></div>
<?php } else { ?>
	<div id="close-title"><?= wfMessage( 'closed-wiki-info' )->escaped() ?></div>
	<div id="close-info">
	</div>
<?php } ?>
</div>
<!-- e:<?= __FILE__ ?> -->

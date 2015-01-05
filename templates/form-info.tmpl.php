<?php echo $wiki->city_description; ?>
<ul>
	<li>
		Wiki was created on <strong><?= $wiki->city_created ?></strong>
	</li>
	<li>
		Founder id: #<strong><?= $founder_id; ?></strong>
		<? if( !empty( $founder_id ) ): ?>
			<ul>
				<li>Current name:
					<strong><?= $founder_username ?></strong>
				</li>
				<li>Current email:
				<?php if( empty( $founder_usermail ) ) :?>
					<i>empty</i>
				<?php else: ?>
					<strong><?= $founder_usermail; ?></strong>
				<?php endif; ?>
				</li>
			</ul>
		<? endif; ?>
	</li>
	<li>
		Founder email:
		<?php if( empty( $founder_email ) ) : ?>
			<i>empty</i>
		<?php else: ?>
			<strong><?= $founder_email ?></strong>
		<?php endif; ?>
	</li>
	<li>
		Tags: <?php if( is_array( $tags ) ): echo "<strong>"; foreach( $tags as $id => $tag ): echo "{$tag} "; endforeach; echo "</strong>"; endif; ?>
		<sup><a href="<?php echo "{$wikiFactoryUrl}/{$wiki->city_id}"; ?>/tags">edit</a></sup>
	</li>
	<?php if ($wiki->city_public <= 0) : ?><li>
		<div>Disabled reason: <?php echo wfMsg('closed-reason')?> (<?php echo $wiki->city_additional?>)</div>
	</li><?php endif ?>
	<?php global $wgEnablePhalanx;
	if( $wgEnablePhalanx ) { ?>
	<li>
		<?php $pstats = GlobalTitle::newFromText("PhalanxStats/wiki/" . $wiki->city_id, NS_SPECIAL, 177);
		print "<a href=\"". $pstats->getFullURL() ."\">Phalanx activity</a>\n"; ?>
	</li><?php } ?>
</ul>

<a href='<?php echo $title->getFullUrl(); ?>'>&larr; Back to WikiFactory</a>
<h2>
	Add a variable to WikiFactory
</h2>
<?php
	// Prevent errors from uninitialized form values
	if(!isset($cv_name))
		$cv_name = "";
	if(!isset($cv_variable_type))
		$cv_variable_type = "";
	if(!isset($cv_access_level))
		$cv_access_level = "";
	if(!isset($cv_variable_group))
		$cv_variable_group = "";
	if(!isset($cv_description))
		$cv_description = "";
?>
<form action="<?php echo $title->getFullUrl() ?>/add.variable" method="post" class="mw-ui-vform">
	<input type="hidden" name="wpAction" value="addwikifactoryvar" />
	<div class="mw-ui-vform-field">
	This form is for adding a new variable to be managed using WikiFactory.<br />
	</div>
	<div class="mw-ui-vform-field">
	<input type="text" class="mw-ui-input" name="cv_name" placeholder="Variable name" value="<?php print $cv_name; ?>"/>
	</div>
	<div class="mw-ui-vform-field">
	<textarea name="cv_description" class="mw-ui-input" rows="3" placeholder="Description of what the variable does" cols="50"><?php print $cv_description; ?></textarea><br/>
	</div>
	
	Variable type: 
	<div class="mw-ui-vform-field">
	<select id="cv_variable_type" name="cv_variable_type">
	 	<?php foreach ($types as $varType): ?>
		<option value="<?php echo $varType ?>"<?php print (($cv_variable_type==$varType)?" selected='selected'":""); ?>>
			<?php echo $varType ?>
		</option>
		<?php endforeach ?>
	</select>
	</div>
	
	Access-level:
	<div class="mw-ui-vform-field">
	<select id="cv_access_level" name="cv_access_level">
		<?php foreach($accesslevels as $index => $level): ?>
		<option value="<?php echo $index ?>"<?php print (($cv_access_level==$index)?" selected='selected'":""); ?>>
			<?php echo $level ?>
		</option>
		<?php endforeach ?>
	</select>
	</div>
	
	Variable Group:
	<div class="mw-ui-vform-field">
	<select id="wk-group-select" name="cv_variable_group">
		<?php foreach ($groups as $key => $value): ?>
		<option value="<?php echo $key ?>"<?php print (($cv_variable_group==$key)?" selected='selected'":""); ?>>
			<?php echo $value ?>
		</option>
		<?php endforeach ?>
	</select>
	</div>
	
    <div class="mw-ui-checkbox">
	<input value="1" <?php if(!empty($cv_is_unique)) { ?> checked="checked" <?php } ?> type="checkbox" id="cv_is_unique" name="cv_is_unique" />
	<label for="cv_is_unique">Variable is Unique</label>
	</div>
	<br />

	<input type="submit" name="submit" class="mw-ui-button mw-ui-constructive" value="Create Variable" />
</form>

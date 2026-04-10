

<div class="row">
	<div class="col-md-6">
		<form class="form-horizontal box" method="post">
			<fieldset>
				<legend><?php echo lang('account'); ?></legend>
				<?php echo $form->fields(); ?>
			</fieldset>
			<?php
			echo form_actions(array(
				array(
					'id' => 'save-button',
					'value' => lang('save'),
					'class' => 'btn-primary'
				),
				array(
					'id' => 'cancel-button',
					'value' => lang('cancel')
				)
			));
			?>
		</form>
	</div>
    <!-- <div class="col-md-6">
		<fieldset>
				<legend>Foto</legend>
				<?php //echo $form->fields(); ?>
			</fieldset>
	</div> -->
</div>
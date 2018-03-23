<div class="ink-grid top-space">
	<div class="column-group">
		<div class="all-70 small-90 tiny-100 push-center  double-top-space">
			<h2 class="fw-light uppercase align-center">Change your account password</h2>
					<?php echo validation_errors('<div class="ink-alert basic align-center" role="alert">', '</div>');?>
			</div>
	</div>
</div>

<div class="ink-grid">
	<div class="column-group">
		<div class="all-33 small-100 tiny-100 push-center">
			<?php echo form_open('users/change_pass', array('class' => 'ink-form'));?>
				

				<div class="control-group">
					<label>Current Password</label>
					<div class="control">
					   <?php echo form_password('cur_pass', "", 'placeholder="Enter your current password"'); ?>
					</div>
				</div>
				<div class="control-group">
					<label for="password">New Password</label>
					<div class="control">
						<?php echo form_password('password', "", 'placeholder="Enter a minimum 6 character password"'); ?>
					</div>
				</div>
				<div class="control-group">
					<label for="password">Confirm New Password</label>
					<div class="control">
						<?php echo form_password('conf_password', "", 'placeholder="Enter your new password again"'); ?>
					</div>
				</div>
					<?php echo form_submit('submit', 'Change', 'class="ink-button green no-margin"'); ?>
			</form>
			<div class="vertical-padding">
			</div>
		</div>
	</div>
</div>
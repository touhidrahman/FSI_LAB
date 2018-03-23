<div class="ink-grid top-space">
	<div class="column-group">
		<div class="all-70 small-90 tiny-100 push-center  double-top-space">
			<h1 class="fw-light uppercase align-center">Create a New Account</h1>
					<?php echo validation_errors('<div class="ink-alert basic align-center" role="alert">', '</div>');?>
			</div>
	</div>
</div>

<div class="ink-grid">
	<div class="column-group">
		<div class="all-33 small-100 tiny-100 push-center">
		<p class="condensed-300" ><strong>Why to register an account in CSB?</strong><br>
		Career Stride Bangladesh offers you to create a comprehensive profile. Which you can utilize to seek jobs within CSB affiliated companies.
		CSB promises you, the list is growing. Soon affiliated companies will look no further, but choose from CSB's job seekers' pool. So, 
		create an account right now, update your profile and appear online tests to arm yourself for the exciting new days.</p>
			<?php echo form_open('users/registration', array('class' => 'ink-form'));?>
				<div class="control-group">
					<label>Email Address</label>
					<div class="control">
					   <?php echo form_input('username', "", 'placeholder="Enter your email address"'); ?>
					</div>
				</div>
				<div class="control-group">
					<label for="password">Password</label>
					<div class="control">
						<?php echo form_password('password', "", 'placeholder="Enter a minimum 6 character password"'); ?>
					</div>
				</div>
				<div class="control-group">
					<label for="password">Confirm Password</label>
					<div class="control">
						<?php echo form_password('conf_password', "", 'placeholder="Enter your password again"'); ?>
					</div>
				</div>
					<?php echo form_submit('submit', 'Register', 'class="ink-button green no-margin"'); ?>
			</form>
			<div class="vertical-padding">
			</div>
		</div>
	</div>
</div>
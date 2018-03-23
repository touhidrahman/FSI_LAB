<div class="ink-grid top-space">
	<div class="column-group">
		<div class="all-70 small-90 tiny-100 push-center  double-top-space">
			<h1 class="fw-light uppercase align-center">Retrieve Password</h1>
					<?php echo validation_errors('<div class="ink-alert basic align-center" role="alert">', '</div>');?>
			</div>
	</div>
</div>

<div class="ink-grid">
	<div class="column-group">
		<div class="all-33 small-100 tiny-100 push-center">
		<p class="condensed-300" ><strong>CAUTION!!!</strong><br>
		In order to retrieve your forgotten password at CSB, you need to answer few private questions.
		Only you are supposed to know the answers. If you fail to give correct answer, 
		you might never get back your password. Make sure you save this password or write it down somewhere 
		so that you do not lose it again.</p>
			<?php echo form_open('users/retrieve_pass', array('class' => 'ink-form'));?>
				<div class="control-group">
					<label>Email Address</label>
					<div class="control">
					   <?php echo form_input('username', ''); ?>
					</div>
					<p class="tip condensed-300">Optional, but will be helpful if you are sure about your email</p>
				</div>
				<div class="control-group">
					<label>Date of Birth</label>
					<div class="control">
						<?php echo form_input('dob', ""); ?>
					</div>
					<p class="tip condensed-300">Write your date of birth in following format: YYYY-MM-DD eg.- 1987-05-20</p>
				</div>
				<div class="control-group">
					<label>Primary Contact</label>
					<div class="control">
						<?php echo form_input('primary_contact', ""); ?>
					</div>
					<p class="tip condensed-300">Usually your primary contact is the most used mobile/cell phone number.</p>
				</div>
				
					<?php echo form_submit('submit', 'Register', 'class="ink-button green no-margin"'); ?>
			</form>
			<div class="vertical-padding">
			</div>
		</div>
	</div>
</div>
<?php include dirname(__DIR__) . '/layouts/_base-start-light.php'; ?>
	<title>Reset Password Message</title>
<?php include dirname(__DIR__) . '/layouts/_base-middle-light.php'; ?>

<main class="main-container">

<div class="main-form-container main-margin-24">
	<div class="main-panel-container">
		<div class="panel-title">request password reset</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-code main-text-center">
				<p>
					Password reset link is invalid or expired.
				</p>
				<p>
					Please click button bellow to request another one.
				</p>
			</div>
			<div class="main-text-center" style="margin-top:12px;">
				<a href="./forgotpassword" class="main-button btn-primary-normal">click here</a>
			</div>
			<!--  -->
		</div>
	</div>
</div>

</main>

<?php include dirname(__DIR__) . '/layouts/_base-end-light.php'; ?>
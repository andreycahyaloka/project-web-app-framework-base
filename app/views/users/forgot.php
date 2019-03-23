<?php include dirname(__DIR__) . '/layouts/_base-start-light.php'; ?>
	<title>Forgot Password</title>
<?php include dirname(__DIR__) . '/layouts/_base-middle-light.php'; ?>

<main class="main-container">

<div class="main-form-container main-margin-24">
	<form action="#" method="POST" id="myFormForgot">
		<fieldset>
			<legend>request password reset</legend>
			<small>
				<?php if (isset($users)) {
					foreach ($users->errors as $error): ?>
						<li><?php echo htmlspecialchars($error); ?></li>
					<?php endforeach;
				} ?>
			</small>

			<label for="myForgotEmail">email</label>
			<input type="email" id="myForgotEmail" name="forgotEmail" value="<?php if (isset($emails)) { echo htmlspecialchars($emails); } ?>" autocomplete="off" required autofocus />

			<div class="form-footer">
				<div class="main-flexbox-container flex-row-right-top flex-wrap">
					<a href="./login" class="main-button btn-secondary-normal flex-content-none">cancel</a>
					<button type="submit" class="main-button btn-primary-normal flex-content-none" id="myButtonForgotOutput" formaction="./forgotpasswordprocess" formmethod="POST" form="myFormForgot">send password reset link</button>
				</div>
			</div>
		</fieldset>
	</form>
</div>

</main>

<?php include dirname(__DIR__) . '/layouts/_base-end-light.php'; ?>
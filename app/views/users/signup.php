<?php include dirname(__DIR__) . '/layouts/_base-start-custom.php'; ?>
	<title>Sign Up</title>
<?php include dirname(__DIR__) . '/layouts/_base-middle-custom.php'; ?>

<main class="main-container">

<div class="main-form-container main-margin-24">
	<form action="#" method="POST" id="myFormSignup">
		<fieldset>
			<legend>signup</legend>
			<small>
				<?php if (isset($users)) {
					foreach ($users->errors as $error): ?>
						<li><?php echo htmlspecialchars($error); ?></li>
					<?php endforeach;
				} ?>
			</small>

			<label for="mySignupName">name</label>
			<input type="text" id="mySignupName" name="signupName" value="<?php if (isset($users)) { echo htmlspecialchars($users->signupName); } ?>" autocomplete="off" required autofocus />

			<label for="mySignupEmail">email</label>
			<input type="email" id="mySignupEmail" name="signupEmail" value="<?php if (isset($users)) { echo htmlspecialchars($users->signupEmail); } ?>" autocomplete="off" required />

			<label for="mySignupPassword">password</label>
			<input type="password" id="mySignupPassword" name="signupPassword" required />

			<label for="mySignupConfirmPassword">confirm password</label>
			<input type="password" id="mySignupConfirmPassword" name="signupConfirmPassword" required />

			<div class="form-footer">
				<div class="main-flexbox-container flex-row-between-top flex-wrap">
					<input type="reset" class="main-button btn-secondary-flat flex-content-none" value="reset" />
					<div class="flex-content-none main-flexbox-container flex-row-between-top flex-wrap">
						<a href="./" class="main-button btn-secondary-normal flex-content-none">cancel</a>
						<button type="submit" class="main-button btn-primary-normal flex-content-none" id="myButtonSignupOutput" formaction="./store" formmethod="POST" form="myFormSignup">sign up</button>
					</div>
				</div>
			</div>
		</fieldset>
	</form>
</div>

</main>

<?php include dirname(__DIR__) . '/layouts/_base-end-custom.php'; ?>
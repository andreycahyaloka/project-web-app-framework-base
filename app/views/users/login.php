<?php include BASE_PATH . '/app/views/layouts/_base-start-light.php'; ?>
	<title>Login</title>
<?php include BASE_PATH . '/app/views/layouts/_base-middle-light.php'; ?>

<main class="main-container">

<div class="main-form-container main-margin-24">
	<form action="#" method="POST" id="myFormLogin">
		<fieldset>
			<legend>login</legend>
			<small>
				<?php if (isset($users)) {
					foreach ($users->errors as $error): ?>
						<li><?php echo htmlspecialchars($error); ?></li>
					<?php endforeach;
				} ?>
			</small>

			<label for="myLoginEmail">email</label>
			<input type="email" id="myLoginEmail" name="loginEmail" value="<?php if (isset($emails)) { echo htmlspecialchars($emails); } ?>" required autofocus />

			<label for="myInputPassword">password</label>
			<input type="password" id="myInputPassword" name="inputPassword" required />

			<div class="checkbox-container main-max_width-50">
				<label class="checkbox-content">
					<input type="checkbox" id="myCheckPassword" name="checkPassword" />
					<span>show password</span>
				</label>
			</div>

			<div class="checkbox-container main-max_width-50">
				<label class="checkbox-content">
					<input type="checkbox" id="myCheckRememberLogin" name="checkRememberLogin" <?php if ((isset($rememberLogins)) && ($rememberLogins == true)) { ?> checked <?php } ?> />
					<span>remember me</span>
				</label>
			</div>

			<div class="form-footer">
				<div class="main-flexbox-container flex-row-between-top flex-wrap">
					<!-- <input type="reset" class="main-button btn-secondary-flat flex-content-none" value="reset" /> -->
					<a href="./forgotpassword" class="main-button btn-secondary-flat flex-content-none">forgot password</a>
					<div class="flex-content-none main-flexbox-container flex-row-between-top flex-wrap">
						<a href="./" class="main-button btn-secondary-normal flex-content-none">cancel</a>
						<button type="submit" class="main-button btn-primary-normal flex-content-none" id="myButtonLoginOutput" formaction="./loginprocess" formmethod="POST" form="myFormLogin">login</button>
					</div>
				</div>
			</div>
		</fieldset>
	</form>
</div>

</main>

<?php include BASE_PATH . '/app/views/layouts/_base-end-light.php'; ?>
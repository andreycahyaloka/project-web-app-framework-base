<?php include dirname(__DIR__) . '/layouts/_base-start-custom.php'; ?>
	<title>Register</title>
<?php include dirname(__DIR__) . '/layouts/_base-middle-custom.php'; ?>

<main class="main-container">

<div class="main-form-container main-margin-24">
	<form action="#" method="POST" id="myFormRegister">
		<fieldset>
			<legend>register</legend>
			<small>
				<?php if (isset($users)) {
					foreach ($users->errors as $error): ?>
						<li><?php echo htmlspecialchars($error); ?></li>
					<?php endforeach;
				} ?>
			</small>

			<label for="myRegisterName">name</label>
			<input type="text" id="myRegisterName" name="registerName" value="<?php if (isset($users)) { echo htmlspecialchars($users->signupName); } ?>" autocomplete="off" required autofocus />

			<label for="myRegisterEmail">email</label>
			<input type="email" id="myRegisterEmail" name="registerEmail" value="<?php if (isset($users)) { echo htmlspecialchars($users->signupEmail); } ?>" autocomplete="off" required />

			<label for="myPassword">password</label>
			<input type="password" id="myInputPassword" name="inputPassword" required />

			<div class="checkbox-container main-max_width-50">
				<label class="checkbox-content">
					<input type="checkbox" id="myCheckPassword" name="checkPassword" />
					<span>show password</span>
				</label>
			</div>

			<div class="form-footer">
				<div class="main-flexbox-container flex-row-between-top flex-wrap">
					<input type="reset" class="main-button btn-secondary-flat flex-content-none" value="reset" />
					<div class="flex-content-none main-flexbox-container flex-row-between-top flex-wrap">
						<a href="./" class="main-button btn-secondary-normal flex-content-none">cancel</a>
						<button type="submit" class="main-button btn-primary-normal flex-content-none" id="myButtonRegisterOutput" formaction="./store" formmethod="POST" form="myFormRegister">register</button>
					</div>
				</div>
			</div>
		</fieldset>
	</form>
</div>

</main>

<?php include dirname(__DIR__) . '/layouts/_base-end-custom.php'; ?>
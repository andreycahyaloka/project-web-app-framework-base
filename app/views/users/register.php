<?php include BASE_PATH . '/app/views/layouts/_base-start-light.php'; ?>
	<title>Register</title>
<?php include BASE_PATH . '/app/views/layouts/_base-middle-light.php'; ?>

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
			<input type="text" id="myRegisterName" name="registerName" value="<?php if (isset($users)) { echo htmlspecialchars($users->registerName); } ?>" autocomplete="off" required autofocus />

			<label for="myRegisterEmail">email</label>
			<input type="email" id="myRegisterEmail" name="registerEmail" value="<?php if (isset($users)) { echo htmlspecialchars($users->registerEmail); } ?>" autocomplete="off" required />

			<label for="myInputPassword">password</label>
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
						<a href="<?php echo BASE_URL; ?>" class="main-button btn-secondary-normal flex-content-none">cancel</a>
						<button type="submit" class="main-button btn-primary-normal flex-content-none" id="myButtonRegisterOutput" formaction="<?php echo BASE_URL; ?>store" formmethod="POST" form="myFormRegister">register</button>
					</div>
				</div>
			</div>
		</fieldset>
	</form>
</div>

</main>

<?php include BASE_PATH . '/app/views/layouts/_base-end-light.php'; ?>
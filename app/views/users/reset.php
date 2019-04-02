<?php include BASE_PATH . '/app/views/layouts/_base-start-light.php'; ?>
	<title>Reset</title>
<?php include BASE_PATH . '/app/views/layouts/_base-middle-light.php'; ?>

<main class="main-container">

<div class="main-form-container main-margin-24">
	<form action="#" method="POST" id="myFormReset">
		<fieldset>
			<legend>reset password</legend>
			<small>
				<?php if (isset($users)) {
					foreach ($users->errors as $error): ?>
						<li><?php echo htmlspecialchars($error); ?></li>
					<?php endforeach;
				} ?>
			</small>

			<input type="hidden" name="resetToken" value="<?php if (isset($tokens)) { echo htmlspecialchars($tokens); } ?>" />

			<label for="myPassword">password</label>
			<input type="password" id="myInputPassword" name="inputPassword" required />

			<div class="checkbox-container main-max_width-50">
				<label class="checkbox-content">
					<input type="checkbox" id="myCheckPassword" name="checkPassword" />
					<span>show password</span>
				</label>
			</div>

			<div class="form-footer">
				<div class="main-flexbox-container flex-row-right-top flex-wrap">
					<a href="./" class="main-button btn-secondary-normal flex-content-none">cancel</a>
					<button type="submit" class="main-button btn-primary-normal flex-content-none" id="myButtonResetOutput" formaction="./resetpasswordprocess" formmethod="POST" form="myFormReset">reset password</button>
				</div>
			</div>
		</fieldset>
	</form>
</div>

</main>

<?php include BASE_PATH . '/app/views/layouts/_base-end-light.php'; ?>
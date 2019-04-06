<?php include BASE_PATH . '/app/views/layouts/_base-start-light.php'; ?>
	<title>Edit Account</title>
<?php include BASE_PATH . '/app/views/layouts/_base-middle-light.php'; ?>

<main class="main-container">

<div class="main-form-container main-margin-24">
	<form action="#" method="POST" id="myFormEditAccount">
		<fieldset>
			<legend>edit</legend>
			<small>
				<?php if (isset($users)) {
					foreach ($users->errors as $error): ?>
						<li><?php echo htmlspecialchars($error); ?></li>
					<?php endforeach;
				} ?>
			</small>

			<label for="myEditAccountName">name</label>
			<input type="text" id="myEditAccountName" name="editAccountName" value="<?php if (isset($users)) { echo htmlspecialchars($users->name); } ?>" autocomplete="off" required />

			<label for="myEditAccountEmail">email</label>
			<input type="email" id="myEditAccountEmail" name="editAccountEmail" value="<?php if (isset($users)) { echo htmlspecialchars($users->email); } ?>" autocomplete="off" required />

			<label for="myEditInputPassword">password</label>
			<input type="password" id="myEditInputPassword" name="editInputPassword" />

			<div class="checkbox-container main-max_width-50">
				<label class="checkbox-content">
					<input type="checkbox" id="myCheckPassword" name="checkPassword" />
					<span>show password</span>
				</label>
			</div>

			<div class="form-footer">
				<div class="main-flexbox-container flex-row-right-top flex-wrap">
					<a href="<?php echo BASE_URL; ?>about" class="main-button btn-secondary-normal flex-content-none">cancel</a>
					<button type="submit" class="main-button btn-primary-normal flex-content-none" id="myButtonEditAccountOutput" formaction="<?php echo BASE_URL; ?>updateaccount" formmethod="POST" form="myFormEditAccount">update</button>
				</div>
			</div>
		</fieldset>
	</form>
</div>
<!-- formaction="<?php echo BASE_URL; ?>updateaccount"  -->
</main>

<!-- custom -->
<script type="text/javascript" language="javascript">
	// user_id
	var userId = <?php echo json_encode($users->id); ?>;
</script>

<?php include BASE_PATH . '/app/views/layouts/_base-end-light.php'; ?>
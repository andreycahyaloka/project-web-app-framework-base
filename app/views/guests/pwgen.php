<?php include BASE_PATH . '/app/views/layouts/_base-start-light.php'; ?>
	<title>Password Generator</title>
<?php include BASE_PATH . '/app/views/layouts/_base-middle-light.php'; ?>

<main class="main-container" id="myMainContainer">

	<!-- <?php echo htmlspecialchars($pwgens['pwgenOutputs']); ?> -->

	<div class="main-panel-container">
		<div class="panel-title">password generator</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-form-container">
				<form action="./pwgen" method="POST" id="myFormPwgen">
					<fieldset>
						<legend>password generator</legend>
						<label>password length</label>
						<input type="text" name="pwgenLength" id="myPwgenLength" pattern="[0-9]{1,3}" title="number only (0-9). 1-3 characters." value="<?php echo htmlspecialchars($pwgens['pwgenLengths']); ?>" autocomplete="off" required autofocus />
						<small id="myPwgenLengthError">
							<?php foreach ($pwgens['pwgenLengthErrors'] as $pwgenLengthErrors): ?>
								<li><?php echo htmlspecialchars($pwgenLengthErrors); ?></li>
							<?php endforeach; ?>
						</small>
						<div class="checkbox-container-column">
							<div class="checkbox-content">
								<input type="checkbox" name="pwgenEnableLowercase" value="true" checked /><span>lowercase</span>
							</div>
							<div class="checkbox-content">
								<input type="checkbox" name="pwgenEnableUppercase" value="true" /><span>uppercase</span>
							</div>
							<div class="checkbox-content">
								<input type="checkbox"  name="pwgenEnableNumber" value="true" /><span>number</span>
							</div>
						</div>

						<label id="myPwgenOutputLabel">result:</label>
						<input type="text" name="pwgenOutput" id="myPwgenOutput" value="<?php echo htmlspecialchars($pwgens['pwgenOutputs']); ?>" readonly />

						<div class="form-footer">
							<div class="main-flexbox-container flex-row-between-top flex-wrap">
								<div class="main-flexbox-container flex-row-left-top flex-wrap flex-content-none">
									<input type="submit" class="main-button btn-secondary-normal flex-content-grow" formaction="#" value="back" />
									<input type="reset" class="main-button btn-secondary-flat flex-content-grow" value="reset" form="myFormPwgen" />
								</div>
								<div class="main-flexbox-container flex-row-left-top flex-wrap flex-content-none">
									<input type="button" class="main-button btn-primary-flat flex-content-grow" id="myButtonPwgenOutput" form="myFormPwgen" value="ajax submit" />
									<input type="submit" class="main-button btn-primary-normal flex-content-grow" value="submit" form="myFormPwgen" />
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>

</main>

<?php include BASE_PATH . '/app/views/layouts/_base-end-light.php'; ?>
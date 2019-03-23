<?php include dirname(__DIR__) . '/layouts/_base-start-light.php'; ?>
	<title>Age Calculator</title>
<?php include dirname(__DIR__) . '/layouts/_base-middle-light.php'; ?>

<main class="main-container" id="myMainContainer">

	<div class="main-panel-container">
		<div class="panel-title">age calculator</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-form-container">
				<form action="agecalc" method="POST" id="myFormAgecalc">
					<fieldset>
						<legend>age calculator</legend>
						<label>birthdate</label>
						<input type="text" name="agecalcDate" id="myAgecalcDate" title="date format (mm/dd/yyyy). 10 characters." value="<?php echo htmlspecialchars($agecalcs['agecalcDates']); ?>" autocomplete="off" required autofocus />
						<small id="myAgecalcDateError">
							<?php foreach ($agecalcs['agecalcDateErrors'] as $agecalcDateErrors): ?>
								<li><?php echo htmlspecialchars($agecalcDateErrors); ?></li>
							<?php endforeach; ?>
						</small>

						<label id="myAgecalcOutputLabel">result:</label>
						<input type="text" name="agecalcOutput" id="myAgecalcOutput" value="<?php echo htmlspecialchars($agecalcs['agecalcOutputs']); ?>" readonly />

						<div class="form-footer">
							<div class="main-flexbox-container flex-row-between-top flex-wrap">
								<div class="main-flexbox-container flex-row-left-top flex-wrap flex-content-none">
									<input type="submit" class="main-button btn-secondary-normal flex-content-grow" formaction="#" value="back" />
									<input type="reset" class="main-button btn-secondary-flat flex-content-grow" value="reset" form="myFormAgecalc" />
								</div>
								<div class="main-flexbox-container flex-row-left-top flex-wrap flex-content-none">
									<input type="button" class="main-button btn-primary-flat flex-content-grow" id="myButtonAgecalcOutput" form="myFormAgecalc" value="ajax submit" />
									<input type="submit" class="main-button btn-primary-normal flex-content-grow" value="submit" form="myFormAgecalc" />
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>

</main>

<?php include dirname(__DIR__) . '/layouts/_base-end-light.php'; ?>
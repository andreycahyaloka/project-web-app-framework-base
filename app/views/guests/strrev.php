<?php include BASE_PATH . '/app/views/layouts/_base-start-light.php'; ?>
	<title>String Reverser</title>
<?php include BASE_PATH . '/app/views/layouts/_base-middle-light.php'; ?>

<main class="main-container" id="myMainContainer">

	<div class="main-panel-container">
		<div class="panel-title">string reverser</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-form-container">
				<form action="strrev" method="POST" id="myFormStrrev">
					<fieldset>
						<legend>string reverser</legend>
						<label>string</label>
						<input type="text" name="strrevString" id="myStrrevString" title="date format (mm/dd/yyyy). 10 characters." value="<?php echo htmlspecialchars($strrevs['strrevStrings']); ?>" autocomplete="off" required autofocus />
						<small id="myStrrevStringError">
							<?php foreach ($strrevs['strrevStringErrors'] as $strrevStringErrors): ?>
								<li><?php echo htmlspecialchars($strrevStringErrors); ?></li>
							<?php endforeach; ?>
						</small>

						<label id="myStrrevOutputLabel">result:</label>
						<input type="text" name="strrevOutput" id="myStrrevOutput" value="<?php echo htmlspecialchars($strrevs['strrevOutputs']); ?>" readonly />

						<div class="form-footer">
							<div class="main-flexbox-container flex-row-between-top flex-wrap">
								<div class="main-flexbox-container flex-row-left-top flex-wrap flex-content-none">
									<input type="submit" class="main-button btn-secondary-normal flex-content-grow" formaction="#" value="back" />
									<input type="reset" class="main-button btn-secondary-flat flex-content-grow" value="reset" form="myFormStrrev" />
								</div>
								<div class="main-flexbox-container flex-row-left-top flex-wrap flex-content-none">
									<input type="button" class="main-button btn-primary-flat flex-content-grow" id="myButtonStrrevOutput" form="myFormStrrev" value="ajax submit" />
									<input type="submit" class="main-button btn-primary-normal flex-content-grow" value="submit" form="myFormStrrev" />
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
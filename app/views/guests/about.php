<?php include dirname(__DIR__) . '/layouts/_base-start-light.php'; ?>
	<title>About</title>
<?php include dirname(__DIR__) . '/layouts/_base-middle-light.php'; ?>

<?php
	// if (app\auth\Auth::isAuthenticated()) {
	if (isset($currentUser)) {
		echo htmlspecialchars($_SESSION['user_id']);
		echo ' => ';
		echo htmlspecialchars($currentUser->name);
	}
	echo '<br />';

	echo htmlspecialchars(config\Config::BASE_URL);
	echo '<br />';

	echo htmlspecialchars($_SERVER['HTTP_HOST']);
	echo '<br />';

	echo htmlspecialchars($_SERVER['REQUEST_URI']);
	echo '<br />';

	echo htmlspecialchars($_SERVER['QUERY_STRING']);
	echo '<br />';
?>

<main class="main-container" id="myMainContainer">
	<p>guests about</p>
</main>

<?php include dirname(__DIR__) . '/layouts/_base-end-light.php'; ?>
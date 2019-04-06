<?php include BASE_PATH . '/app/views/layouts/_base-start-light.php'; ?>
	<title>About</title>
<?php include BASE_PATH . '/app/views/layouts/_base-middle-light.php'; ?>

<?php
	// if (app\auth\Auth::isAuthenticated()) {
	if (isset($currentUser)) {
		echo htmlspecialchars($_SESSION['user_id']);
		echo ' => ';
		echo htmlspecialchars($currentUser->name);
	}
	echo '<br />';

	echo 'base_url => ';
	echo htmlspecialchars(BASE_URL);
	echo '<br />';

	echo 'base_path => ';
	echo htmlspecialchars(BASE_PATH);
	echo '<br /><br />';

	// echo '__file__ => ';
	// echo htmlspecialchars(__FILE__);
	// echo '<br />';

	// echo '__dir__ => ';
	// echo htmlspecialchars(__DIR__);
	// echo '<br />';

	// echo 'dirname(__dir__) => ';
	// echo htmlspecialchars(dirname(__DIR__));
	// echo '<br />';

	// echo 'dirname(__dir__, 3) => ';
	// echo htmlspecialchars(dirname(__DIR__, 3));
	// echo '<br /><br />';

	// $_ENV['fuck'] = 'shit1';
	// putenv('fuck=shit2');

	// echo '<pre>';
	// echo 'environment => <br />';
	// print_r($_ENV);
	// echo '</pre>';
	// echo '<br />';

	// echo '<pre>';
	// echo 'constant => <br />';
	// // print_r(get_defined_constants(true));
	// print_r(get_defined_constants(true)['user']);
	// echo '</pre>';
	// echo '<br />';

	// print_r(getenv('fuck'));
	// echo '<br /><br />';

	echo 'http_host => ';
	echo htmlspecialchars($_SERVER['HTTP_HOST']);
	echo '<br />';

	echo 'document_root => ';
	echo htmlspecialchars($_SERVER['DOCUMENT_ROOT']);
	echo '<br />';

	echo 'request_uri => ';
	echo htmlspecialchars($_SERVER['REQUEST_URI']);
	echo '<br />';

	echo 'query_string => ';
	echo htmlspecialchars($_SERVER['QUERY_STRING']);
	echo '<br /><br />';
?>

<main class="main-container" id="myMainContainer">
	<p>guests about</p>
</main>

<?php include BASE_PATH . '/app/views/layouts/_base-end-light.php'; ?>
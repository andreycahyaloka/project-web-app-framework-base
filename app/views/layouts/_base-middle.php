	<?php include BASE_PATH . '/app/views/layouts/_stylesheets.php'; ?>
</head>

<body>
	<?php include BASE_PATH . '/app/views/layouts/_header.php'; ?>
	<?php include BASE_PATH . '/app/views/layouts/_nav.php'; ?>
	<?php include BASE_PATH . '/app/views/layouts/_aside.php'; ?>

<!-- main (scroll indicator) -->
<div class="main-scroll_indicator-container">
	<div class="scroll_indicator-content" id="myScroll_indicatorContent"></div>
</div>

<!-- main (go to top) -->
<button class="main-go_to_top" id="myButtonGo_to_top" onclick="myGo_to_topFunction();" disabledx>
	<i class="fas fa-chevron-up fa-fw"></i>
</button>

<!-- flash messages -->
<?php
$flashMessages = app\messages\Flash::getMessages();

if (isset($flashMessages) && is_array($flashMessages)) {
	foreach ($flashMessages as $message): ?>
		<div class="main-alert alert-<?php echo htmlspecialchars($message['type']); ?>">
			<?php echo htmlspecialchars($message['text']); ?>
		</div>
	<?php endforeach;
}
?>
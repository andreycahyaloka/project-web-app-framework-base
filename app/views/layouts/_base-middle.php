	<?php include dirname(__DIR__) . '/layouts/_stylesheets.php'; ?>
</head>

<body>
	<?php include dirname(__DIR__) . '/layouts/_header.php'; ?>
	<?php include dirname(__DIR__) . '/layouts/_nav.php'; ?>
	<?php include dirname(__DIR__) . '/layouts/_aside.php'; ?>

<!-- main (scroll indicator) -->
<div class="main-scroll_indicator-container">
	<div class="scroll_indicator-content" id="myScroll_indicatorContent"></div>
</div>

<!-- main (go to top) -->
<button class="main-go_to_top" id="myButtonGo_to_top" onclick="myGo_to_topFunction();" disabledx>
	<i class="fas fa-chevron-up fa-fw"></i>
</button>
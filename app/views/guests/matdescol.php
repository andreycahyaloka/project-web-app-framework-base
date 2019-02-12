<?php include dirname(__DIR__) . '/layouts/_base-start-custom.php'; ?>
	<title>Material Design Color</title>
<?php include dirname(__DIR__) . '/layouts/_base-middle-custom.php'; ?>

<main class="main-container" id="myMainContainer">

	<div class="main-panel-container">
		<div class="panel-title">material design color</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-tabs-container tabs-horizontal">
				<div class="main-flexbox-container flex-row-left-top flex-wrap tabs-button">
					<button class="flex-content-grow active" id="myTabsRed">red</button>
					<button class="flex-content-grow" id="myTabsPink">pink</button>
					<button class="flex-content-grow" id="myTabsPurple">purple</button>
					<button class="flex-content-grow" id="myTabsDeepPurple">deep purple</button>
					<button class="flex-content-grow" id="myTabsIndigo">indigo</button>
					<button class="flex-content-grow" id="myTabsBlue">blue</button>
					<button class="flex-content-grow" id="myTabsLightBlue">light blue</button>
					<button class="flex-content-grow" id="myTabsCyan">cyan</button>
					<button class="flex-content-grow" id="myTabsTeal">teal</button>
					<button class="flex-content-grow" id="myTabsGreen">green</button>
					<button class="flex-content-grow" id="myTabsLightGreen">light green</button>
					<button class="flex-content-grow" id="myTabsLime">lime</button>
					<button class="flex-content-grow" id="myTabsYellow">yellow</button>
					<button class="flex-content-grow" id="myTabsAmber">amber</button>
					<button class="flex-content-grow" id="myTabsOrange">orange</button>
					<button class="flex-content-grow" id="myTabsDeepOrange">deep orange</button>
					<button class="flex-content-grow" id="myTabsBrown">brown</button>
					<button class="flex-content-grow" id="myTabsGrey">grey</button>
					<button class="flex-content-grow" id="myTabsBlueGrey">blue grey</button>
				</div>
				<div class="tabs-content">
					<div class="active" id="myTabsRed">
						<h3>red</h3>
						<div class="main-table-container">
							<table class="table-content">
								<caption>table 1.1 material design color red</caption>
								<thead>
									<tr>
										<th>#</th>
										<th>hex</th>
										<th>rgb</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>50</td>
										<td>#fafafa</td>
										<td>25,25,25</td>
									</tr>
								</tbody>
							</table>
						</div>
						<p>ok</p>
					</div>
					<div id="myTabsPink">
						<h3>pink</h3>
						<div class="main-image-thumbnail">
							<img src="../public/img/img_bg.jpg" alt="image" class="img-thumbnail" />
						</div>
						<button>okk</button>
					</div>
				</div>
				
			</div>

			<div class="main-image-thumbnail">
				<img src="../public/img/img_bg.jpg" alt="image" class="img-thumbnail" />
			</div>
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">image thumbnail</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-image-thumbnail">
				<img src="../public/img/img_bg.jpg" alt="image" class="img-thumbnail" />
			</div>
			<!--  -->
		</div>
	</div>

</main>

<?php include dirname(__DIR__) . '/layouts/_base-end-custom.php'; ?>
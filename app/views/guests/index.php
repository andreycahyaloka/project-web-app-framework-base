<?php include dirname(__DIR__) . '/layouts/_base-start.php'; ?>
	<title>Index</title>
<?php include dirname(__DIR__) . '/layouts/_base-middle.php'; ?>

	<!-- <p>hello <?php echo htmlspecialchars($name); ?>!</p> -->

	<!-- <ul> -->
		<!-- <?php foreach ($colors as $color): ?> -->
			<!-- <li><?php echo htmlspecialchars($color); ?></li> -->
		<!-- <?php endforeach; ?> -->
	<!-- </ul> -->

	<!-- <?php echo config\Config::BASE_URL; ?> -->
	<!-- <br /> -->
<?php
	if (isset($_SESSION['user_id'])) {
		echo $_SESSION['user_id'];
	}
?>

<main class="main-container" id="myMainContainer">

	<div class="main-panel-container">
		<div class="panel-title">flexbox & button</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-flexbox-container flex-row-between-top flex-wrap">
				<button class="main-button btn-primary-normal flex-content-none">
					primary normal
				</button>
				<button class="main-button btn-primary-flat flex-content-none">
					primary flat
				</button>
				<button class="main-button btn-secondary-normal flex-content-none">
					secondary normal
				</button>
				<button class="main-button btn-secondary-flat flex-content-none">
					secondary flat
				</button>
				<button class="main-button btn-secondary-flat flex-content-none" disabled>
					secondary flat disabled
				</button>
				<button class="main-button flex-content-none" disabled>
					disabled
				</button>
				<button class="main-button flex-content-none">
					button
				</button>
				<a href="#">link</a>
				<a href="#" class="main-button">link</a>
				<a href="#" class="main-button btn-primary-flat">a</a>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">form</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-form-container">
				<form action="#" method="POST" id="myForm1" target="_blank">
					<fieldset>
						<legend>form title</legend>
						<label>first name</label>
						<input type="text" pattern="[a-zA-Z0-9]{1,12}" autocomplete="off" required autofocusx />
						<small>auto complete is off.</small>
						<small>
							<li>auto complete is off</li>
							<li>auto complete is off</li>
						</small>
						<label>password</label>
						<input type="password" />
						<label>number</label>
						<input type="number" />
						<label>email</label>
						<input type="email" />
						<label>date</label>
						<input type="date" />
						<label>time</label>
						<input type="time" />
						<label>datetime-local</label>
						<input type="datetime-local" />
						<label>week</label>
						<input type="week" />
						<label>month</label>
						<input type="month" />
						<label>search</label>
						<input type="search" />
						<label>url</label>
						<input type="url" />
						<label>tel</label>
						<input type="tel" />
						<label>color</label>
						<input type="color" name="color1" value="#ffffff" />
						<label>range</label>
						<input type="range" name="name-range1" value="0" min="0" max="10" />
						<label>file single</label>
						<input type="file" />
						<label>file multiple</label>
						<input type="file" multiple />
						<label>image (image - submit button)</label>
						<input type="image" />
						<label>story</label>
						<textarea rows="12"></textarea>
						<label>Example select</label>
						<select id="exampleFormControlSelect1">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
						<label>text read only</label>
						<input type="text" readonly />
						<div class="radio-container">
							<label class="radio-content">
								<input type="radio" name="radio1" />
								<span>radio row 1</span>
							</label>
							<label class="radio-content">
								<input type="radio" name="radio1" />
								<span>radio row 2</span>
							</label>
							<label class="radio-content">
								<input type="radio" name="radio1" />
								<span>radio row 3</span>
							</label>
							<label class="radio-content">
								<input type="radio" name="radio1" />
								<span>radio row 4 radio radio radio radio radio radio radio radio radio</span>
							</label>
							<label class="radio-content">
								<input type="radio" name="radio1" />
								<span>radio row 5</span>
							</label>
							<label class="radio-content">
								<input type="radio" name="radio1" />
								<span>radio row 6</span>
							</label>
						</div>
						<div class="checkbox-container">
							<label class="checkbox-content">
								<input type="checkbox" name="checkbox1" />
								<span>checkbox column 1</span>
							</label>
							<label class="checkbox-content">
								<input type="checkbox" name="checkbox1" checked="checked" />
								<span>checkbox column 2</span>
							</label>
							<label class="checkbox-content">
								<input type="checkbox" name="checkbox1" />
								<span>checkbox column 3</span>
							</label>
							<label class="checkbox-content">
								<input type="checkbox" name="checkbox1" />
								<span>checkbox column 4 checkbox checkbox checkbox checkbox checkbox checkbox</span>
							</label>
							<label class="checkbox-content">
								<input type="checkbox" name="checkbox1" />
								<span>checkbox column 5</span>
							</label>
							<label class="checkbox-content">
								<input type="checkbox" name="checkbox1" />
								<span>checkbox column 6</span>
							</label>
						</div>
						<div class="form-body-button main-flexbox-container flex-row-between-top flex-wrap">
							<input type="reset" class="flex-content-none main-button btn-primary-normal" />
							<input type="submit" class="flex-content-none main-button btn-primary-flat" formaction="/about" formmethod="POST" form="myForm1" value="submit1" />
							<input type="button" class="flex-content-none main-button" value="button1" />
							<input type="button" value="button2" />
						</div>
						<div class="form-footer">
							<div class="main-flexbox-container flex-row-between-top flex-wrap">
								<button class="main-button btn-primary-flat flex-content-none">button1</button>
								<div class="flex-content-none main-flexbox-container flex-row-between-top flex-wrap">
									<button class="main-button btn-secondary-flat flex-content-none">button2</button>
									<button class="main-button flex-content-none">button3</button>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">form input (range)</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-form-container">
				<form action="#" oninput="name_output_range1.value=parseInt(id_range1.value)">
					<fieldset>
						<legend>form title</legend>
						<label>range</label>
						<input type="range" id="id_range1" name="name_range1" value="0" min="0" max="10" />
						= <output name="name_output_range1" for="id_range1"></output>
						<input type="reset" class="main-button btn-primary-normal" />
						<input type="submit" class="main-button btn-primary-flat" value="submit1" />
						<input type="button" class="main-button" value="button1" />
						<input type="button" value="button2" />
					</fieldset>
				</form>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">card</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-card-container">
				<div class="card-header">
					<div class="card-header-title">
						<p>card header title</p>
					</div>
					<div class="card-header-image">
						<img src="./public/img/img_bg.jpg" alt="card header image" />
						<p>card image title card image title card image title card image title card image title</p>
					</div>
				</div>
				<div class="card-body">
					<div class="card-body-title">
						<p>card body title</p>
					</div>
					<div class="card-body-subtitle">
						<p>card body subtitle</p>
					</div>
					<div class="card-body-text">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					</div>
					<div class="card-body-quote">
						<p class="quote-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<p class="quote-name">~ Lorem ipsum dolor sit amet</p>
					</div>
				</div>
				<div class="card-footer">
					<div class="card-footer-title">
						<p>card footer title</p>
					</div>
				</div>
				<div class="card-footer">
					<div class="main-flexbox-container flex-row-between-top flex-wrap">
						<button class="main-button btn-primary-normal flex-content-none">button1</button>
						<div class="flex-content-none main-flexbox-container flex-row-between-top flex-wrap">
							<button class="main-button btn-secondary-flat flex-content-none">button2</button>
							<button class="main-button btn-primary-flat flex-content-none">button3</button>
						</div>
					</div>
				</div>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">simple card</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-card-container">
				<div class="card-header">
					<div class="card-header-image">
						<img src="./public/img/img_bg.jpg" alt="card header image" />
						<p>card image title</p>
					</div>
				</div>
				<div class="card-body">
					<div class="card-body-quote">
						<p class="quote-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<p class="quote-name">~ Lorem ipsum dolor sit amet</p>
					</div>
					<div class="card-body-button main-flexbox-container flex-row-between-top flex-wrap">
						<button class="main-button btn-primary-normal flex-content-none">button1</button>
						<div class="flex-content-none main-flexbox-container flex-row-between-top flex-wrap">
							<button class="main-button btn-secondary-flat flex-content-none">button2</button>
							<button class="main-button btn-primary-flat flex-content-none">button3</button>
						</div>
					</div>
				</div>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">code (pre)</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-code">
				<p>
					Lorem ipsum dolor sit amet.
				</p>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">code (pre)</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-code">
				<pre>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</pre>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				</p>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">paragraph</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-paragraph">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				</p>
				<p>
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				</p>
				<p>
					Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
				</p>
				<p>
					Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<pre>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				</pre>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">quote</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-quote">
				<p class="quote-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<p class="quote-name">~ Lorem ipsum dolor sit amet</p>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">image normal</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-image-normal">
				<img src="./public/img/img_bg.jpg" alt="image" class="img-square" />
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">image round</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-image-normal">
				<img src="./public/img/img_bg.jpg" alt="image" class="img-round" />
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">image circle</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-image-normal">
				<img src="./public/img/img_bg.jpg" alt="image" class="img-circle" />
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">image thumbnail</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-image-thumbnail">
				<img src="./public/img/img_bg.jpg" alt="image" class="img-thumbnail" />
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">table custom</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-table-container">
				<table class="table-content" id="myTableCustom1">
					<thead>
						<tr>
							<th>#</th>
							<th>firstname</th>
							<th>lastname</th>
							<th>one</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>first</td>
							<td>last</td>
							<td>one</td>
						</tr>
						<tr>
							<td>2</td>
							<td>sasuke</td>
							<td>uchiha</td>
							<td>one</td>
						</tr>
						<tr>
							<td>3</td>
							<td>naruto</td>
							<td>uzumaki mikazukinoyaiba</td>
							<td>one</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">table & caption</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-table-container">
				<table class="table-content">
					<caption>table 1.1 this is table</caption>
					<thead>
						<tr>
							<th>#</th>
							<th>firstname</th>
							<th>lastname</th>
							<th colspan="3">one</th>
							<th>four</th>
							<th>five</th>
							<th>six</th>
							<th>seven</th>
							<th>eight</th>
							<th>nine</th>
							<th>ten</th>
							<th>eleven</th>
							<th>twelve</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>first</td>
							<td rowspan="2">last uchiha</td>
							<td>one</td>
							<td>two</td>
							<td>three</td>
							<td>four</td>
							<td>five</td>
							<td>six</td>
							<td>seven</td>
							<td>eight</td>
							<td>nine</td>
							<td>ten</td>
							<td>eleven</td>
							<td>twelve</td>
						</tr>
						<tr>
							<td>2</td>
							<td>sasuke</td>
							<td>one</td>
							<td>two</td>
							<td>three</td>
							<td>four</td>
							<td>five</td>
							<td>six</td>
							<td>seven</td>
							<td>eight</td>
							<td>nine</td>
							<td>ten</td>
							<td>eleven</td>
							<td>twelve</td>
						</tr>
						<tr>
							<td>3</td>
							<td>naruto</td>
							<td>uzumaki mikazukinoyaiba</td>
							<td>one</td>
							<td>two</td>
							<td>three</td>
							<td>four</td>
							<td>five</td>
							<td>six</td>
							<td>seven</td>
							<td>eight</td>
							<td>nine</td>
							<td>ten</td>
							<td>eleven</td>
							<td>twelve</td>
						</tr>
						<td>4</td>
							<td>first</td>
							<td>last</td>
							<td>one</td>
							<td>two</td>
							<td>three</td>
							<td>four</td>
							<td>five</td>
							<td>six</td>
							<td>seven</td>
							<td>eight</td>
							<td>nine</td>
							<td>ten</td>
							<td>eleven</td>
							<td>twelve</td>
						</tr>
						<td>5</td>
							<td>first</td>
							<td>last</td>
							<td>one</td>
							<td>two</td>
							<td>three</td>
							<td>four</td>
							<td>five</td>
							<td>six</td>
							<td>seven</td>
							<td>eight</td>
							<td>nine</td>
							<td>ten</td>
							<td>eleven</td>
							<td>twelve</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th>#</th>
							<th>foot</th>
							<th>foot</th>
							<th>foot</th>
							<th>foot</th>
							<th>foot</th>
							<th>foot</th>
							<th>foot</th>
							<th>foot</th>
							<th>foot</th>
							<th>foot</th>
							<th>foot</th>
							<th>foot</th>
							<th>foot</th>
							<th>foot</th>
						</tr>
					</tfoot>
				</table>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">dropdown content left</div>
		<div class="panel-content main-text-center">
			<!--  -->
			<div class="main-dropdown-container">
				<button class="dropdown-button main-button btn-primary-normal">check<i class="fas fa-caret-down fa-fw"></i></button>
				<div class="dropdown-content active">
					<a href="#">check1</a>
					<a href="#">check2</a>
					<a href="#">check3 check3 check3 check3 check3</a>
				</div>
			</div>
			<div class="main-dropdown-hover-container">
				<button class="dropdown-hover-button main-button btn-primary-normal">hover<i class="fas fa-caret-down fa-fw"></i></button>
				<div class="dropdown-hover-content">
					<a href="#">check1</a>
					<a href="#">check2</a>
					<a href="#">check3 check3 check3 check3 check3</a>
				</div>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">dropdown content right</div>
		<div class="panel-content main-text-center">
			<!--  -->
			<div class="main-dropdown-container">
				<button class="dropdown-button main-button btn-secondary-normal">check<i class="fas fa-caret-down fa-fw"></i></button>
				<div class="dropdown-content content-right">
					<a href="#">check1</a>
					<a href="#">check2</a>
					<a href="#">check3 check3 check3 check3 check3</a>
					<a href="#">check4</a>
					<a href="#">check5check5check5check5check5 check5check5check5</a>
				</div>
			</div>
			<div class="main-dropdown-hover-container">
				<button class="dropdown-hover-button main-button btn-secondary-normal">hover<i class="fas fa-caret-down fa-fw"></i></button>
				<div class="dropdown-hover-content content-right">
					<a href="#">check1</a>
					<a href="#">check2</a>
					<a href="#">check3 check3 check3 check3 check3</a>
					<a href="#">check4</a>
					<a href="#">check5check5check5check5check5 check5check5check5</a>
				</div>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">dropup content left</div>
		<div class="panel-content main-text-center">
			<!--  -->
			<div class="main-dropdown-container">
				<button class="dropdown-button main-button btn-primary-flat">check<i class="fas fa-caret-up fa-fw"></i></button>
				<div class="dropup-content">
					<a href="#">check1</a>
					<a href="#">check2</a>
					<a href="#">check3 check3 check3 check3 check3</a>
					<a href="#">check4</a>
					<a href="#">check5check5check5check5check5</a>
					<a href="#">check1</a>
					<a href="#">check2</a>
					<a href="#">check3 check3 check3 check3 check3</a>
					<a href="#">check4</a>
					<a href="#">check5check5check5check5check5</a>
				</div>
			</div>
			<div class="main-dropdown-hover-container">
				<button class="dropdown-hover-button main-button btn-primary-flat">hover<i class="fas fa-caret-up fa-fw"></i></button>
				<div class="dropup-hover-content">
					<a href="#">check1</a>
					<a href="#">check2</a>
					<a href="#">check3 check3 check3 check3 check3</a>
					<a href="#">check4</a>
					<a href="#">check5check5check5check5check5</a>
					<a href="#">check1</a>
					<a href="#">check2</a>
					<a href="#">check3 check3 check3 check3 check3</a>
					<a href="#">check4</a>
					<a href="#">check5check5check5check5check5</a>
				</div>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">dropup content right</div>
		<div class="panel-content main-text-center">
			<!--  -->
			<div class="main-dropdown-container">
				<button class="dropdown-button main-button btn-secondary-flat">checkcheckcheck<br />checkcheck<i class="fas fa-caret-up fa-fw"></i></button>
				<div class="dropup-content content-right">
					<a href="#">check1</a>
					<a href="#">check2</a>
					<a href="#">check3 check3 check3 check3 check3</a>
					<a href="#">check4</a>
					<a href="#">check5check5check5check5check5</a>
				</div>
			</div>
			<div class="main-dropdown-hover-container">
				<button class="dropdown-hover-button main-button btn-secondary-flat">hoverhoverhover<br />hoverhover<i class="fas fa-caret-up fa-fw"></i></button>
				<div class="dropup-hover-content content-right">
					<a href="#">check1</a>
					<a href="#">check2</a>
					<a href="#">check3 check3 check3 check3 check3</a>
					<a href="#">check4</a>
					<a href="#">check5check5check5check5check5</a>
				</div>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">tabs horizontal</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-tabs-container tabs-horizontal">
				<div class="main-flexbox-container flex-row-left-top flex-nowrap tabs-button">
					<button class="flex-content-grow active" id="myTabsOne">tab 1</button>
					<button class="flex-content-grow" id="myTabsTwo">tab 2</button>
					<button class="flex-content-grow" id="myTabsThree">tab 3</button>
				</div>
				<div class="tabs-content">
					<div class="active" id="myTabsOne">
						<h3>this is tab 1</h3>
						<p>hello from tab one</p>
						<div>
							<p>okay</p>
						</div>
					</div>
					<div id="myTabsTwo">
						<h3>this is tab 2</h3>
						<p>hello from tab two</p>
						<h3>this is tab 2</h3>
						<p>hello from tab two</p>
						<h3>this is tab 2</h3>
						<p>hello from tab two</p>
						<h3>this is tab 2</h3>
						<p>hello from tab two</p>
						<h3>this is tab 2</h3>
						<p>hello from tab two</p>
						<h3>this is tab 2</h3>
						<p>hello from tab two</p>
						<h3>this is tab 2</h3>
						<p>hello from tab two</p>
						<h3>this is tab 2</h3>
						<p>hello from tab two</p>
						<h3>this is tab 2</h3>
						<p>hello from tab two</p>
						<h3>this is tab 2</h3>
						<p>hello from tab two</p>
						<h3>this is tab 2</h3>
						<p>hello from tab two</p>
						<h3>this is tab 2</h3>
						<p>hello from tab two</p>
					</div>
					<div id="myTabsThree">
						<h3>this is tab 3</h3>
						<p>hello from tab three</p>
					</div>
				</div>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<div class="main-panel-container">
		<div class="panel-title">tabs vertical</div>
		<div class="panel-content">
			<!--  -->
			<div class="main-tabs-container tabs-vertical">
				<div class="tabs-button">
					<button class="active" id="myTabsAaa">tab 1</button>
					<button id="myTabsBbb">tab 2</button>
					<button id="myTabsCcc">tab 3</button>
					<button id="myTabsXxx">tab xxx</button>
					<button id="myTabsXxx">tab xxx</button>
					<button id="myTabsXxx">tab xxx</button>
					<button id="myTabsXxx">tab xxx</button>
					<button id="myTabsXxx">tab xxx</button>
					<button id="myTabsXxx">tab xxx</button>
					<button id="myTabsXxx">tab xxx</button>
					<button id="myTabsXxx">tab xxx</button>
					<button id="myTabsXxx">tab xxx</button>
					<button id="myTabsXxx">tab xxx</button>
					<button id="myTabsXxx">tab xxx</button>
					<button id="myTabsXxx">tab xxx</button>
					<button id="myTabsXxx">tab xxx</button>
					<button id="myTabsXxx">tab xxx</button>
				</div>
				<div class="tabs-content">
					<div class="active" id="myTabsAaa">
						<h3>this is tab 1</h3>
						<p>hello from tab aaa</p>
						<div>
							<p>okay</p>
						</div>
					</div>
					<div id="myTabsBbb">
						<h3>this is tab 2</h3>
						<p>hello from tab bbb</p>
						<h3>this is tab 2</h3>
						<p>hello from tab bbb</p>
						<h3>this is tab 2</h3>
						<p>hello from tab bbb</p>
						<h3>this is tab 2</h3>
						<p>hello from tab bbb</p>
						<h3>this is tab 2</h3>
						<p>hello from tab bbb</p>
						<h3>this is tab 2</h3>
						<p>hello from tab bbb</p>
						<h3>this is tab 2</h3>
						<p>hello from tab bbb</p>
						<h3>this is tab 2</h3>
						<p>hello from tab bbb</p>
						<h3>this is tab 2</h3>
						<p>hello from tab bbb</p>
						<h3>this is tab 2</h3>
						<p>hello from tab bbb</p>
						<h3>this is tab 2</h3>
						<p>hello from tab bbb</p>
						<h3>this is tab 2</h3>
						<p>hello from tab bbb</p>
					</div>
					<div id="myTabsCcc">
						<h3>this is tab 3</h3>
						<p>hello from tab ccc</p>
					</div>
				</div>
			</div>
			<!--  -->
		</div>
	</div>

	<hr />

	<p>custom section</p>

	<hr />

	<div class="main-flexbox-container flex-row-center-top flex-wrap">
		<!--  -->
		<div class="main-card-container flex-content-auto main-min_width-50 main-max_width-75 main-margin-12">
			<div class="card-header">
				<div class="card-header-image">
					<img src="./public/img/img_bg.jpg" alt="card header image" />
					<p>card image title</p>
				</div>
			</div>
			<div class="card-body">
				<div class="card-body-quote">
					<p class="quote-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<p class="quote-name">~ Lorem ipsum dolor sit amet</p>
				</div>
				<div class="main-flexbox-container flex-row-right-top flex-wrap">
					<button class="main-button btn-primary-flat flex-content-none">button1</button>
				</div>
			</div>
		</div>
		<!--  -->
	</div>

	<hr />

	<div class="main-flexbox-container flex-row-between-top flex-wrap main-padding-3">
		<!--  -->
		<button class="main-button btn-primary-normal flex-content-none main-margin-3">
			primary normal
		</button>
		<button class="main-button btn-primary-flat flex-content-none main-margin-3">
			primary flat
		</button>
		<button class="main-button btn-secondary-normal flex-content-none main-margin-3">
			secondary normal
		</button>
		<button class="main-button btn-secondary-flat flex-content-none main-margin-3">
			secondary flat
		</button>
		<button class="main-button btn-secondary-flat flex-content-none main-margin-3" disabled>
			secondary flat disabled
		</button>
		<button class="main-button flex-content-none main-margin-3" disabled>
			disabled
		</button>
		<button class="main-button flex-content-none main-margin-3">
			button
		</button>
		<a href="#"class="flex-content-none main-margin-3">link</a>
		<a href="#" class="main-button flex-content-none main-margin-3">link</a>
		<a href="#" class="main-button btn-primary-flat flex-content-none main-margin-3">link</a>
		<!--  -->
	</div>

</main>

<?php include dirname(__DIR__) . '/layouts/_base-end.php'; ?>
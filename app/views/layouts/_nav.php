<nav class="main-nav-container">
	<div class="nav-left">
		<div class="nav-content">
			<button onclick="myAsideOpenFunction(); myAside_bgOpenFunction();">
				<i class="fas fa-bars fa-fw"></i>
			</button>
		</div>
		<div class="nav-content">
			<label>main PHP Framework</label>
		</div>
	</div>
	<div class="nav-right">
		<div class="nav-content">
			<div class="nav-dropdown-container">
				<button><i class="fas fa-ellipsis-v fa-fw"></i></button>
				<div class="nav-dropdown-content">
					<a href="about"><i class="fas fa-info fa-fw"></i>help</a>
				</div>
			</div>
		</div>
	</div>
</nav>

<div class="main-navlink-container">
	<div class="navlink-content">
		<a href="<?php echo BASE_URL; ?>"><i class="fas fa-home fa-fw"></i>home</a>
		<a href="<?php echo BASE_URL; ?>about"><i class="fas fa-users fa-fw"></i>about</a>
		<a href="<?php echo BASE_URL; ?>x"><i class="fas fa-code fa-fw"></i>404</a>
		<a href="#"><i class="fas fa-code fa-fw"></i>#</a>
		<a href="/"><i class="fas fa-code fa-fw"></i>/</a>
		<a class="active" href="javascript:void(0);"><i class="fas fa-sync fa-fw fa-pulse"></i>test</a>
		<a href="<?php echo '/'.$_SERVER['HTTP_HOST'].'/'; ?>about"><i class="fas fa-users fa-fw"></i>test xxx</a>
	</div>
</div>
<?php
use \core\libs as core;

	// Get requested theme and set the session variable
	// OLD THEME METHOD
	// if (isset($_REQUEST['theme'])) {
	// 	$request = $_REQUEST['theme'];
	// 	core\Session::set('theme_id',$request);
	// 	$this->theme->saveCurrentTheme();
	// }
?>
	<!doctype html>
	<html mlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

	<head>
		<title>
			<?=(isset($this->title)) ? APP_TITLE . ': '.$this->title : APP_TITLE ?>
		</title>
		
		<link type="text/css" rel="stylesheet" href="<?=URL;?>core/public/css/jquery-ui.css" />
		<link type="text/css" rel="stylesheet" href="<?=URL;?>core/public/css/jquery-ui.ie.css" />


		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<!--Load Custom Theme -->
		<?php
		// Based on session style apply the stylesheet
		// OLD THEME METHOD
		// if ($this->theme->isThemeSet()) {
		// 	$theme = core\Session::get('theme_id') ?: 1;
		// 	$theme = $this->theme->getTheme($theme);
		// 	echo $theme[0]['link'];
		// }
		// ?>
		<!--End Custom Theme -->

		<link type="text/css" rel="stylesheet" href="<?=URL;?>core/public/css/default.css" />
		

		<!-- <script src="<?=URL;?>core/public/js/jquery.js"></script> -->
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

		<script src="<?=URL;?>core/public/js/custom.js"></script>
		<?php
		if (isset($this->js)) {
			foreach ($this->js as $js){
				echo '<script src="'.URL . $js.'"></script>';
			}
		}
	?>
			<!-- Load dynamic theme -->
			<!-- for now load Lux Bootstrap Theme -->
			<link id="themeCSS" rel="stylesheet"   href="https://bootswatch.com/4/lux/bootstrap.min.css"/>

			<!-- Font Awesome Icons -->
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">




	</head>

	<body>

    <!-- <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
		<div class="container">

			<a class="navbar-brand mr-0 mr-md-2" href="#"><?=APP_TITLE?></a>
			<div class="navbar-nav-scroll">

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
			<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav ml-auto">

				<?php if (!core\Session::get('loggedIn')) { ?>
					<li class="nav-item">
						<a class="nav-link" href="<?=URL.'login'?>">Login </a>
					</li>
					<?php } else { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?=URL.'user'?>">Users</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?=core\Session::get('firstname')?>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="<?=URL?>user/settings">Settings</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item"  href="<?=URL?>dashboard/logout">Logout</a>
							</div>
						</li>
					<?php } ?>
			</ul>
			</div>
			</div>
		</div>
    </div> -->
	<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <a class="navbar-brand mr-auto mr-lg-0" href="<?=URL?>"><?=APP_TITLE?></a>
	  
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
		<?php if (!core\Session::get('loggedIn')) { ?>
					<li class="nav-item">
						<a class="nav-link" href="<?=URL.'login'?>">Login </a>
					</li>
					<?php } else { ?>
          <li class="nav-item">
							<a class="nav-link" href="<?=URL.'user'?>">User</a>
			</li>
          <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?=core\Session::get('firstname')?>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="<?=URL?>user/settings">Settings</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item"  href="<?=URL?>dashboard/logout">Logout</a>
							</div>
						</li>
						<?php } ?>
        </ul>
      </div>
    </nav>



			<!-- Begin page content -->
			<div class="container-fluid">
				<!-- <pre>session <?=print_r($_SESSION,1);?></pre>
				<pre>navigation item <?=print_r($this->navigation->menuItems,1); ?></pre> -->
			
  
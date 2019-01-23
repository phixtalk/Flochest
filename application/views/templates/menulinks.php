<!-- MAIN WRAPPER -->
<div class="body-wrap">
    <div id="st-container" class="st-container">

        <div class="st-pusher">
            <div class="st-content">
                <div class="st-content-inner">
                    <!-- Header -->
                    <div class="header">
    <!-- Top Bar -->
    <div class="top-navbar">
	<div class="container">
        <div class="row">
			
			
			
        </div>
    </div>
</div>

    <!-- Global Search -->
    <section id="sctGlobalSearch" class="global-search global-search-overlay">
    <div class="container">
        <div class="global-search-backdrop mask-dark--style-2"></div>

        <!-- Search form -->
        <form class="form-horizontal form-global-search z-depth-2-top" role="form">
            <div class="px-4">
                <div class="row">
                    <div class="col-12">
                        <input type="text" class="search-input" placeholder="Type and hit enter ...">
                    </div>
                </div>
            </div>
            <a href="#" class="close-search" data-toggle="global-search" title="Close search bar"></a>
        </form>
    </div>
</section>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar--bold navbar-light bg-default " style="background:#000">
        <div class="container navbar-container">
            <!-- Brand/Logo -->
                        <a class="navbar-brand" href="./">
                <img src="<?=base_url("assets")?>/images/flogo.png" alt="Flochest">
            </a>
            
            <div class="d-inline-block">
                <!-- Navbar toggler  -->
                <button class="navbar-toggler hamburger hamburger-js hamburger--spring" type="button" data-toggle="collapse" data-target="#navbar_main" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>

            <div class="collapse navbar-collapse align-items-center justify-content-end" id="navbar_main">
    <!-- Navbar search - For small resolutions -->
    <div class="navbar-search-widget b-xs-bottom py-3 d-lg-none d-xl-none">
        <form class="" role="form">
            <div class="input-group input-group-lg">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                <button class="btn btn-base-3" type="button">Go!</button>
                </span>
            </div>
        </form>
    </div>

    <!-- Navbar links -->
    <ul class="navbar-nav" data-hover="dropdown">
        <li class="nav-item dropdown megamenu">
            <a class="nav-link" href="./" aria-expanded="false" style="color:#f4bbab">
                Home
            </a>
        </li>
        <li class="nav-item dropdown">
            <a href="<?=$current==1?"#how-it-works":base_url("#how-it-works")?>" class="nav-link" aria-expanded="false" data-animation-in="bounceInUp" data-animation-delay="2600" data-scroll-to="#how-it-works" style="color:#f4bbab">
               How It Works
            </a>
        </li>
        <li class="nav-item dropdown">
            <a href="<?=base_url("about")?>" class="nav-link"  aria-expanded="false" style="color:#f4bbab">
               About
            </a>
        </li>
        <li class="nav-item dropdown">
            <a href="http://www.periodconvos.wordpress.com/" class="nav-link" target="_blank" style="color:#f4bbab">
               Blog
            </a>
        </li>
    
        <!--<li class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Contact
            </a>
        </li>-->
    </ul>


</div>

<?	if($this->session->userdata('logged_in')!=TRUE){?>
		<div class="pl-4 d-none d-lg-inline-block">
			<a href="<?=base_url("signup")?>" class="btn btn-styled btn-sm btn-base-1 text-uppercase btn-circle" style="background:#f4bbab;color:#000;border-color:#f4bbab">Join Now</a>
		</div>
		<div class="pl-4 d-none d-lg-inline-block">
			<a href="<?=base_url("login")?>" class="btn btn-styled btn-sm btn-base-1 text-uppercase btn-circle" style="background:#f4bbab;color:#000;border-color:#f4bbab">Login</a>
		</div>
<?	}else{?>
		<div class="pl-4 d-none d-lg-inline-block">
			<a href="<?=base_url("user")?>" class="btn btn-styled btn-sm btn-base-1 text-uppercase btn-circle" style="background:#f4bbab;color:#000;border-color:#f4bbab">Your Profile</a>
		</div>
		<div class="pl-4 d-none d-lg-inline-block">
			<a href="<?=base_url("handlers/handle/logout")?>" class="btn btn-styled btn-sm btn-base-1 text-uppercase btn-circle" style="background:#f4bbab;color:#000;border-color:#f4bbab">Logout</a>
		</div>
<?	}?>
		
		
        </div>
    </nav>
</div>
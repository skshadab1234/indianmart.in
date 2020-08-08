<?php
include('includes/session.php');


$image = (!empty($retailers['retailer_img']) ? SITE_RETAIL_IMAGE.$retailers['retailer_img'] : SITE_USER_IMAGE."noimage.jpg");

$curStr=$_SERVER['REQUEST_URI'];
$curArr=explode('/',$curStr);
$cur_path=$curArr[count($curArr)-1];


$page_title='';
if($cur_path=='index.php' || $cur_path=='index.php' || $cur_path==''){
	$page_title=FRONT_SITE_NAME;
}          
?>
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Favicon  -->
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<style type="text/css">
			
::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}

.container1 {
  min-height: 100vh;
  width: 100%;
  background-color: #485461;
  background-image: linear-gradient(135deg, #485461 0%, #28313b 74%);
  overflow-x: hidden;
  transform-style: preserve-3d;
}

.navbar {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 10;
  height: 3rem;
}

.menu {
  max-width: 72rem;
  width: 100%;
  margin: 0 auto;
  padding: 0 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #fff;
}

.logo {
  font-size: 1.1rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  line-height: 4rem;
}

.logo span {
  font-weight: 300;
}

.hamburger-menu {
  height: 4rem;
  width: 3rem;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: flex-end;
}

.bar {
  width: 1.9rem;
  height: 1.5px;
  border-radius: 2px;
  background-color: #eee;
  transition: 0.5s;
  position: relative;
}

.bar:before,
.bar:after {
  content: "";
  position: absolute;
  width: inherit;
  height: inherit;
  background-color: #eee;
  transition: 0.5s;
}

.bar:before {
  transform: translateY(-9px);
}

.bar:after {
  transform: translateY(9px);
}

.main {
  position: relative;
  width: 100%;
  left: 0;
  z-index: 5;
  overflow: hidden;
  transform-origin: left;
  transform-style: preserve-3d;
  transition: 0.5s;
}

header {
  min-height: 100vh;
  width: 100%;
  background: url("https://www.artechnoweb.in/images/slide/website-design-background.jpg") no-repeat top center / cover;
  position: relative;
}

.overlay {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background-color: rgba(43, 51, 59, 0.8);
  display: flex;
  justify-content: center;
  align-items: center;
}

.inner {
  max-width: 35rem;
  text-align: center;
  color: #fff;
  padding: 0 2rem;
}

.title {
  font-size: 1.5rem;
}

.btn {
  margin-top: 1rem;
  padding: 0.6rem 1.8rem;
  background-color: #1179e7;
  border: none;
  border-radius: 25px;
  color: #fff;
  text-transform: uppercase;
  cursor: pointer;
  text-decoration: none;
}

.container1.active .bar {
  transform: rotate(360deg);
  background-color: transparent;
}

.container1.active .bar:before {
  transform: translateY(0) rotate(45deg);
}

.container1.active .bar:after {
  transform: translateY(0) rotate(-45deg);
}

.container1.active .main {
  animation: main-animation 0.5s ease;
  cursor: pointer;
  transform: perspective(1300px) rotateY(20deg) translateZ(310px) scale(0.5);
}

@keyframes main-animation {
  from {
    transform: translate(0);
  }

  to {
    transform: perspective(1300px) rotateY(20deg) translateZ(310px) scale(0.5);
  }
}

.links {
  position: absolute;
  width: 30%;
  right: 0;
  top: 0;
  height: 100vh;
  z-index: 2;
  display: flex;
  justify-content: center;
  align-items: center;
}

ul {
  list-style: none;
}

.links a {
  text-decoration: none;
  color: #eee;
  padding: 0.7rem 0;
  display: inline-block;
  font-size: 1rem;
  font-weight: 300;
  text-transform: uppercase;
  letter-spacing: 1px;
  transition: 0.3s;
  opacity: 0;
  transform: translateY(10px);
  animation: hide 0.5s forwards ease;
}

.links a:hover {
  color: #fff;
}

.container1.active .links a {
  animation: appear 0.5s forwards ease var(--i);
}

@keyframes appear {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0px);
  }
}

@keyframes hide {
  from {
    opacity: 1;
    transform: translateY(0px);
  }
  to {
    opacity: 0;
    transform: translateY(10px);
  }
}

.shadow {
  position: absolute;
  width: 100%;
  height: 100vh;
  top: 0;
  left: 0;
  transform-style: preserve-3d;
  transform-origin: left;
  transition: 0.5s;
  background-color: white;
}

.shadow.one {
  z-index: -1;
  opacity: 0.15;
}

.shadow.two {
  z-index: -2;
  opacity: 0.1;
}

.container1.active .shadow.one {
  animation: shadow-one 0.6s ease-out;
  transform: perspective(1300px) rotateY(20deg) translateZ(215px) scale(0.5);
}

@keyframes shadow-one {
  0% {
    transform: translate(0);
  }

  5% {
    transform: perspective(1300px) rotateY(20deg) translateZ(310px) scale(0.5);
  }

  100% {
    transform: perspective(1300px) rotateY(20deg) translateZ(215px) scale(0.5);
  }
}

.container1.active .shadow.two {
  animation: shadow-two 0.6s ease-out;
  transform: perspective(1300px) rotateY(20deg) translateZ(120px) scale(0.5);
}

@keyframes shadow-two {
  0% {
    transform: translate(0);
  }

  20% {
    transform: perspective(1300px) rotateY(20deg) translateZ(310px) scale(0.5);
  }

  100% {
    transform: perspective(1300px) rotateY(20deg) translateZ(120px) scale(0.5);
  }
}

.container1.active .main:hover + .shadow.one {
  transform: perspective(1300px) rotateY(20deg) translateZ(230px) scale(0.5);
}

.container1.active .main:hover {
  transform: perspective(1300px) rotateY(20deg) translateZ(340px) scale(0.5);
}	


.list-unstyled{
	cursor: pointer;
    position: relative;
    left: 0;
    height: 11px;

}

</style>

     <div class="container1">
      <div class="navbar">
        <div class="menu">
          <h3 class="logo">Indian<span>Kart</span></h3>
          <div class="hamburger-menu">
            <div class="bar"></div>
          </div>
        </div>
      </div>

      <div class="main-container">
        <div class="main">
          <header>
            <div class="overlay">
              <div class="inner">
                <h2 class="title">Tell us What You need <?= $retailers['owner_name'] ?></h2>
               <div class="autocomplete" style="width: 100%;position: relative;">
               	 <form action="search.php?search" method="get">
                	<input type="text" name="keyword"  placeholder="Enter Product Name" id="searchbar" class="form-control" autofocus>
                	<div id="product_list" style="position:absolute;background: rgb(255, 255, 255);width: 100%;color: rgb(0, 0, 0);">
                	</div>
                <button class="btn" type="submit">Get Quotes From Sellers</button>

                </form>
               </div>
              </div>
            </div>
          </header>
        </div>

        <div class="shadow one"></div>
        <div class="shadow two"></div>
      </div>

      <div class="links">
        <ul>
          <li>
            <a href="<?= FRONT_SITE_PATH?>Wholseller/login.php" style="--i: 0.05s;">Become a seller</a>
          </li>
          <li>
            <a href="#" style="--i: 0.1s;">Services</a>
          </li>
          <li>
            <a href="#" style="--i: 0.15s;">Portfolio</a>
          </li>
          <li>
            <a href="#" style="--i: 0.2s;">Testimonials</a>
          </li>
          <li>
            <a href="#" style="--i: 0.25s;">About</a>
          </li>
          <li>
            <a href="#" style="--i: 0.3s;">Contact</a>
          </li>
        </ul>
      </div>
    </div>		

<?php 
include 'includes/footer.php';
?>
  <?php include 'includes/scripts.php'; ?>


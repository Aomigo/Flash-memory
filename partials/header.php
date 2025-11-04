<?php
function active($current_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);  
  if($current_page == $url){
      echo 'active'; //class name in css 
  } else {
      echo 'unactive';
  }
}
var_dump(RootUrl($_SERVER['REQUEST_URI']))
?>

<header>
        <!--the nav composed of 4 elements-->
        <nav>
            <div class="logo"> <img src="assets/images/logo.png" alt="logo"><strong>Power of memory</strong></div>
            <div class="burger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <ul class="nav">
                <li>
                    <a class="<?php active('index.php') ?>" href="<?php getBaseUrl()?>">Home</a>
                    <a class="<?php active('score.php') ?>" href="<?php getBaseUrl()?>games/memory/score.php">Score</a>
                    <a class="<?php active('account.php') ?>" href="<?php getBaseUrl()?>account.php">My account</a>
                    <button>Contact Us</button>
                </li>
            </ul>
        </nav>
    </header>
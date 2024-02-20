<<<<<<< HEAD
<?php 
    session_start();
    require "function/functions.php";
    
    if (empty($_SESSION['login'])) {
      header('Location: login');
      exit;
    }
    
    session_unset();
    session_destroy();

    setcookie('login', '', time() - 3600);
    setcookie('level', '', time() - 3600);
    setcookie('id', '', time() - 3600);
    setcookie('key', '', time() - 3600);
    
    header('Location: index');
=======
<?php 
    session_start();
    require "function/functions.php";
    
    if (empty($_SESSION['login'])) {
      header('Location: login');
      exit;
    }
    
    session_unset();
    session_destroy();

    setcookie('login', '', time() - 3600);
    setcookie('level', '', time() - 3600);
    setcookie('id', '', time() - 3600);
    setcookie('key', '', time() - 3600);
    
    header('Location: index');
>>>>>>> d9bbf314a1cfe00b8c7a0c0a58921114cefb116f
    ?>
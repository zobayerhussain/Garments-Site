

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" style="padding: 0;" >
  <a class="navbar-brand" href="home.php"><img src="img/bubt_logo_only.png" style="height: 40px; padding-left: 20px; position: relative;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav">
    <li class="nav-item btn btn-sm btn-dark <?php echo basename( $_SERVER['PHP_SELF'])=='workers.php'?'active':''; ?>">
      <a class="nav-link " href="workers.php">Workers</a>
    </li>
    <li class="nav-item btn btn-sm btn-dark <?php echo basename( $_SERVER['PHP_SELF'])=='management.php'?'active':''; ?>">
      <a class="nav-link " href="management.php">Managements</a>
    </li>
    <li class="nav-item btn btn-sm btn-dark <?php echo basename( $_SERVER['PHP_SELF'])=='worktime.php'?'active':''; ?>">
      <a class="nav-link " href="worktime.php">Worktime</a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link <?php echo basename( $_SERVER['PHP_SELF'])=='register.php'?'active':''; ?>" href="register.php">Register</a>
    </li> -->
    <li class="nav-item btn btn-sm btn-dark <?php echo basename( $_SERVER['PHP_SELF'])=='workerreg.php'?'active':''; ?>">
      <a class="nav-link " href="workerreg.php">Worker reg</a>
    </li>
    <li class="nav-item btn btn-sm btn-dark <?php echo basename( $_SERVER['PHP_SELF'])=='monthsalary.php'?'active':''; ?>">
      <a class="nav-link " href="monthsalary.php">Month salary</a>
    </li>
    <li class="nav-item btn btn-sm btn-dark">
      <?php if (isset($_SESSION['name'])){?>
          <a class="nav-link" href="logout.php">Logout</a>
          <?php }else { ?>
          <a class="nav-link" href="index.php">Login</a>
          <?php } ?>
    </li>
  </ul>  
  
  </div>
</nav>
<?php 
    if (isset($_SESSION['name'])==false) {
        header('Location:index.php');
    }
 ?>
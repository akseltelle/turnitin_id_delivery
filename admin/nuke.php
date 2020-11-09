<?php
// Turn off all error reporting
error_reporting(0);
session_start();
if(isset($_SESSION['logged_in']) and $_SESSION['logged_in'] == true): ?>
<?php 
session_start();
 require('../connect.php');


$query = "SELECT * FROM `turnitin`";

 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel • Turnitin</title>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Bulma Version 0.7.1-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style5.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134637143-1"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-134637143-1');
    </script>
    <!-- Favicons -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
	<style type="text/css">
	body{
		background:url("https://images.fawdaw.com/image.php?di=PRFI5") no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	</style>
</head>

<body>
    <!-- START NAV -->
    <nav class="navbar is-fixed-top">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-brand" href="/admin/nuke">Turnitin</a>
                <span class="navbar-burger burger" data-target="navbarMenu">
                        <span></span>
                <span></span>
                <span></span>
                </span>
            </div>
            <div id="navbarMenu" class="navbar-menu">
                <div class="navbar-end">
                    <a class="navbar-item is-active">
                            Logged in as Admin <?php echo $_SESSION['username']; ?>
                    </a>
                    <a class="navbar-item is-active" href="logout">
                            Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- END NAV -->
<br><br><br>

    <div class="container">
        <!-- START ARTICLE FEED -->
        <section id="blog" class="articles">
            <div class="column is-10 is-offset-1">


<!-- START ARTICLE -->
<div class="card article">
        <div class="card-content">



            <div class="content article-body">
                <h5 class="is-4">Submissions</h4>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Turnitin ID</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

$active = $row["active"];
$id = $row["id"];
?>


    <tr>
      <td><?php if ($active < "1") { ?> <?php echo $row["name"]; ?><?php } else { ?>Name Hidden<?php }; ?> </td>
      <td><?php echo $row["turnitin"]; ?></td>
      <td>
<div class="btn-group" role="group" aria-label="Basic example">
  <?php if ($active < "1") { ?> 
  <a href="enable.php?id=<?php echo $id; ?>" type="button" class="btn btn-success">Hide Name</a> 
  <?php } else { ?> 
  <a href="disable.php?id=<?php echo $id; ?>" type="button" class="btn btn-warning" onclick="return confirm('Are you sure you want to view the name?');">Show Name</a>
  <?php }; ?>
  <a href="delete.php?id=<?php echo $id; ?>" type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
</div>
	  </td>
    </tr>
<?php
    }
} else {
    echo "0 results";
}
?>

  </tbody>
</table>
<br>
<hr>
<br>
            </div>
        </div>
    </div>
	<br>
	<p align="center">
	<a href="/file">Back to site</a>
	</p>
    <!-- END ARTICLE -->
        </section>
        <!-- END ARTICLE FEED -->
        </div>
        <script async type="text/javascript" src="/js/bulma.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script async type="text/javascript" src="/js/unknown.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>

</body>

</html>

<?php 
else:
	header('Location: /logout');
 endif;
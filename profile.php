<?php 
session_start();
 require('connect.php');
if (isset($_POST['name']) and isset($_POST['turnitin'])){
$username = mysqli_real_escape_string($connection, $_POST['username']);
$turnitin = mysqli_real_escape_string($connection, $_POST["turnitin"]);  
$query = "SELECT * FROM `turnitin` WHERE name='$name' and turnitin='$turnitin' and active=1";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count == 1){
$_SESSION['name'] = $name;
}else{
$fmsg = "Invalid Login Credentials.";
}
}
if (isset($_SESSION['name'])){
$name = $_SESSION['name'];

$query = "SELECT * FROM `turnitin` WHERE name='$name' and active=1";

 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Turnitin | NIS</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Bulma Version 0.7.1-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style5.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134637143-1"></script>
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
</head>

<body>
    <!-- START NAV -->
    <nav class="navbar is-fixed-top">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-brand" href="/">Turnitin</a>
                <span class="navbar-burger burger" data-target="navbarMenu">
                        <span></span>
                <span></span>
                <span></span>
                </span>
            </div>
            <div id="navbarMenu" class="navbar-menu">
                <div class="navbar-end">
                    <a class="navbar-item is-active">
                            Logged in as <?php echo $_SESSION['name']; ?>
                    </a>
                    <a class="navbar-item is-active" href="/logout">
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
                <h5 class="is-4">Turnitin info</h4>
<?php 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Navn</th>
      <th scope="col">Turnitin ID</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row["name"]; ?>" disabled></td>
      <td><input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row["turnitin"]; ?>" disabled></td>
    </tr>
  </tbody>
</table>
<br>
<hr>
<br>
<?php
    }
} else {
    echo "Kunne ikke hente informasjon fra databasen.";
}
?>
            </div>
        </div>
    </div>
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


<?php }else{ 
header("Location: /");
die();
} ?>
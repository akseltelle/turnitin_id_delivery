<?php
	// Load database
	require('connect.php');
	
    // If the values are posted, insert them into the database.
    if (isset($_POST['name']) && isset($_POST['turnitin'])){
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $turnitin = mysqli_real_escape_string($connection, $_POST["turnitin"]);

        $query = "INSERT INTO `turnitin` (name, turnitin, active) VALUES ('$name', '$turnitin', '1')";
        $result = mysqli_query($connection, $query);
        if($result){
            $smsg = "Success.";
        }else{
            $fmsg ="Failed";
        }
    }
    ?>
<title>Turnitin | NIS</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
	<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
	<style type="text/css">
	body{
		background:url("https://images.fawdaw.com/image.php?di=PRFI5") no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	</style>

    <!-- Fav and touch icons -->
<style>
form {
  opacity: 0.8;
  filter: alpha(opacity=80); /* For IE8 and earlier */
}
form.hover {
  opacity: 1.0;
  filter: alpha(opacity=100); /* For IE8 and earlier */
}
</style>
	<body>
		<div class="container">
			<br>
			<div class="row">
				<div class="col-md-12">
					<br>

					<div class="panel panel-success" align="center">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
								</div>
								<div class="col-md-6">
									<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
									<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
									<form class="form-signin" method="POST">
										<h2 class="form-signin-heading">Turnitin ID</h2>
										<input type="text" name="name" id="name" class="form-control" placeholder="Navn" required>
										<input type="text" name="turnitin" id="turnitin" class="form-control" placeholder="Turnitin ID" required>
										<br>
										<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
										<br>
									</form>
								</div>
								<div class="col-md-3">
								</div>
							</div>
						</div>
					</div>
					<br>
					<p align="center">
					<a href="/admin">Admin Panel</a>
					</p>
				</div>
			</div>
		</div>
	</body>
<?php
    session_start();
    $doctorid = $_SESSION['doctor_id'];
    $docemail = $_SESSION['doctor_email']
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC|Tangerine" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="CSS/doctordash_u_ics.css">

    </head>

    <body style="margin: 0px;">
        <nav class="navbar navbar-inverse" style="margin-bottom:0px;border-radius: 0px;border: 0px;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="doctor.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4" style="padding-left: 0px;padding-right: 0px">
                    <ul class="leftmenu">
                        <li><a href="doctor_dashboard.php">Messege</a></li>
                        <li><a href="doctor_dashboard_serial.php">Serial</a></li>
                        <li><a href="doctor_dashboard_ap.php">Access Prescription</a></li>
                        <li><a href="doctor_dashboard_pes.php">Prescribe</a></li>
                        <li><a href="doctor_dashboard_u_i.php" class="active">Update Information</a></li>
                        <?php
                include('db_con.php');
                $fname = "";
                $lname = "";
                $specal = "";
                $degree = "";
                $d_time = "";
                $user_query = mysqli_query(mysqli_connect('localhost','root','','datacenter'),"select * from doctor");

                while( $row = mysqli_fetch_array($user_query) )
                {
                    if($row['doctor_id']==$doctorid)
                    {
                        $fname = $row['doctor_firstname'];
                        $lname = $row['doctor_lastname'];
                        $specal = $row['specalized'];
                        $degree = $row['degree'];
                        $d_time = $row['d_time'];
                    }
                }
                
                echo '<p style="margin-top: 50px;background: url(CSS/Icon/doctor.png)left no-repeat;padding-left: 28px;color: white;font-size: 20px;margin-left: 10px;font-family: IM Fell English SC, serif;">'.$fname.' '.$lname.'</p>';
            echo '<p style="background: url(CSS/Icon/specal.png)left no-repeat;padding-left: 28px;color: white;font-size: 20px;margin-left: 10px;font-family: IM Fell English SC, serif;">'.$specal.'</p>';
            echo '<p style="background: url(CSS/Icon/degree.png)left no-repeat;padding-left: 28px;color: white;font-size: 20px;margin-left: 10px;font-family: IM Fell English SC, serif;">'.$degree.'</p>';
            echo '<p style="background: url(CSS/Icon/time.png)left no-repeat;padding-left: 28px;color: white;font-size: 16px;margin-left: 10px;font-family: IM Fell English SC, serif;">'.$d_time.'</p>';
            ?>
                    </ul>
                </div>
                <div class="col-sm-8">
                    <div class="col-sm-9 col-sm-offset-1 text-center">
                       <br><br><br>
                        <form action="" method="post">
						<div class="form-group">
							<div class="usenamebox">
								<input type="text" class="form-control" name="username" placeholder="Username">
							</div>
						</div>
						<div class="form-group">
							<div class="passwordbox">
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<div class="emailbox">
								<input type="email" class="form-control" name="email" placeholder="Email">
							</div>
						</div>
						<button type="submit" class="btn btn-primary" name="submit">Update</button>			
					</form>
                        <?php
							if(isset($_POST['submit']))
							{
								if(!empty($_POST['username']))
								{
									$newuser = $_POST['username'];
									$user_query = mysqli_query(mysqli_connect('localhost','root','','datacenter'),"Update doctor_login set username='$newuser' where doctor_id='$doctorid'");
									if($user_query)
									{
										echo '<div class="col-sm-9 col-sm-offset-1">';
                                    echo '<div class="alert alert-success">
                                  Username updated sucessfully.
                                  </div><br>';
                                    echo '</div>';
									}
									else
									{
										echo '<div class="col-sm-9 col-sm-offset-1">';
                                    echo '<div class="alert alert-info">
									Can not update username
                                  </div><br>';
                                    echo '</div>';
									}
								}
								if(!empty($_POST['password']))
								{
									$newuser = $_POST['password'];
									$user_query = mysqli_query(mysqli_connect('localhost','root','','datacenter'),"Update doctor_login set d_password='$newuser' where doctor_id='$doctorid'");
									if($user_query)
									{
										echo '<div class="col-sm-9 col-sm-offset-1">';
                                    echo '<div class="alert alert-success">
                                  Password updated sucessfully.
                                  </div><br>';
                                    echo '</div>';
									}
									else
									{
										echo '<div class="col-sm-9 col-sm-offset-1">';
                                    echo '<div class="alert alert-info">
									Can not update password
                                  </div><br>';
                                    echo '</div>';
									}
								}
								if(!empty($_POST['email']))
								{
									$newuser = $_POST['email'];
									$user_query = mysqli_query(mysqli_connect('localhost','root','','datacenter'),"Update doctor_login set email='$newuser' where doctor_id='$doctorid'");
									if($user_query)
									{
										$user_query = mysqli_query(mysqli_connect('localhost','root','','datacenter'),"Update doctor_message set reciever_email='$newuser' where reciever_email='$docemail'");
										
										echo '<div class="col-sm-9 col-sm-offset-1">';
                                    echo '<div class="alert alert-success">
                                  Email updated sucessfully.
                                  </div><br>';
                                    echo '</div>';
									$docemail = $newuser;
									$_SESSION['doctor_email'] = $docemail;
									}
									else
									{
										echo '<div class="col-sm-9 col-sm-offset-1">';
                                    echo '<div class="alert alert-info">
									Can not update email
                                  </div><br>';
                                    echo '</div>';
									}
								}
							}
						?>
                    </div>
					<div class="col-sm-9 col-sm-offset-1 text-center">
                       <br><br><br>
                        <form action="" method="post">
						<div class="form-group">
							<div class="schedulebox">
								<input type="text" class="form-control" name="time" placeholder="Schedule change">
							</div>
						</div>
						<div class="form-group">
							<div class="firstnamebox">
								<input type="text" class="form-control" name="firstname" placeholder="Firstname">
							</div>
						</div>
						<div class="form-group">
							<div class="lastnamebox">
								<input type="text" class="form-control" name="lastname" placeholder="Lastname">
							</div>
						</div>
						<button type="submit" class="btn btn-primary" name="reqsubmit">Request a change</button>			
						</form>
					</div>
					<?php
							if(isset($_POST['reqsubmit']))
							{
								echo '<br><br>';
								if(!empty($_POST['time']))
								{
									$newtime = $_POST['time'];
									$newtime = strtolower($newtime);
									$type = "time";
									$stat = "undone";
									$user_query = mysqli_query(mysqli_connect('localhost','root','','datacenter'),"Insert into doctor_req(doctor_id,perameter,type,status) values ('$doctorid','$newtime','$type','$stat')");
									if($user_query)
									{
										echo '<div class="col-sm-9 col-sm-offset-1">';
                                    echo '<div class="alert alert-success">
                                  Request recieved sucessfully. You will be notified when the request will be processed.
                                  </div><br>';
                                    echo '</div>';
									}
									else
									{
										echo '<div class="col-sm-9 col-sm-offset-1">';
                                    echo '<div class="alert alert-info">
									Can not process the request
                                  </div><br>';
                                    echo '</div>';
									}
								}
								if(!empty($_POST['firstname']))
								{
									$newfn = $_POST['firstname'];
									$newfn = strtolower($newfn);
									$type = "firstname";
									$stat = "undone";
									$user_query = mysqli_query(mysqli_connect('localhost','root','','datacenter'),"Insert into doctor_req(doctor_id,perameter,type,status) values ('$doctorid','$newfn','$type','$stat')");
									if($user_query)
									{
										echo '<div class="col-sm-9 col-sm-offset-1">';
                                    echo '<div class="alert alert-success">
                                  Request recieved sucessfully. You will be notified when the request will be processed.
                                  </div><br>';
                                    echo '</div>';
									}
									else
									{
										echo '<div class="col-sm-9 col-sm-offset-1">';
                                    echo '<div class="alert alert-info">
									Can not process the request
                                  </div><br>';
                                    echo '</div>';
									}
								}
								if(!empty($_POST['lastname']))
								{
									$newln = $_POST['lastname'];
									$newln = strtolower($newln);
									$type = "lastname";
									$stat = "undone";
									$user_query = mysqli_query(mysqli_connect('localhost','root','','datacenter'),"Insert into doctor_req(doctor_id,perameter,type,status) values ('$doctorid','$newln','$type','$stat')");
									
									if($user_query)
									{
										echo '<div class="col-sm-9 col-sm-offset-1">';
                                    echo '<div class="alert alert-success">
                                  Request recieved sucessfully. You will be notified when the request will processe.
                                  </div><br>';
                                    echo '</div>';
									}
									else
									{
										
										echo '<div class="col-sm-9 col-sm-offset-1">';
                                    echo '<div class="alert alert-info">
									Can not process the request
                                  </div><br>';
                                    echo '</div>';
									}
								}
							}
					?>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

            </div>
        </div>
    </body>

    </html>

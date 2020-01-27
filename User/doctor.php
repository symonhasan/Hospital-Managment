<?php
    session_start();
	session_destroy();
	session_start();
    include('db_con.php');
    $doctorid = 0;
    $docemail = "";
	$sucess = 0;	
	if ( !empty($_POST['doc_email']) && !empty($_POST['doc_password']) )
	{
		$doc_email=$_POST['doc_email'];
		$doc_password=$_POST['doc_password'];
        $user_query = mysqli_query(mysqli_connect('localhost','root','','datacenter'),"select * from doctor_login");
       
        while( $row = mysqli_fetch_array($user_query) )
        {
            if($row['username']==$doc_email && $row['d_password']==$doc_password)
            {
                $doctorid = $row['doctor_id'];
                $docemail = $row['email'];
                $sucess = 1;
                break;
            }
            else if($row['email']==$doc_email && $row['d_password']==$doc_password)
            {
                $doctorid = $row['doctor_id'];
                $docemail = $row['email'];
                $sucess = 1;
                break; 
            }
        }
	}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="CSS/doctorcs.css">
    <link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC|Tangerine" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body style="margin: 0px;">
    <div class="container-fluid" style="padding:0px;">
        <div class="header">
            <h1 class="headertext">Hospital Managment</h1>
        </div>

    </div>
    <nav class="navbar navbar-inverse" style="background-color: #141510;">
        <div class="container-fluid">
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="patient.php">Patient</a></li>
                    <li class="active"><a href="doctor.php">Doctor</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="bloodbank.php">Blood Bank</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="leftside">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
								<br>
								<h3>Title</h3>
								<p>Lorem ipsum dolor sit amet, aperiri suscipit periculis sed et, zril delicatissimi an sit, an pro omittam definitionem. In vis minimum facilisi, soluta sadipscing sed ut. Harum accusam consectetuer mei ad, an audiam iracundia eam. In usu eros omnium, no paulo iuvaret labores quo. Vis quidam labores referrentur et, no nam epicurei delicata salutandi.

								Ut decore ullamcorper ius, at ius unum quando, duo an alterum feugait constituam.



								</p>
							</div>
							
						</div>
						<br>
						<br>
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4">
								<button type="submit" class="btn btn-primary">Get an appointment</button>
							</div>
						</div>
					</div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="rightside">
					<br>
					<br>
					<h2 style="font-size: 20px;padding-left: 120px;">Login</h2>
					<br>
					<br>
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2 text-center">
								<form action="" method="post">
									<div class="form-group">
										<div class="userbox">
											<input type="text" class="form-control" name="doc_email" placeholder="username">
										</div>
									</div>
									<div class="form-group">
										<div class="passwordbox">
											<input type="password" class="form-control" name="doc_password" placeholder="password">
										</div>
									</div>
									
									<button type="submit" name="doc_login" class="btn btn-primary">Log In</button>
									<?php
                                        if($sucess==1)
                                        {
                                            $_SESSION['doctor_id'] = $doctorid;
                                            $_SESSION['doctor_email'] = $docemail;
                                            header('Location: doctor_dashboard.php');
                                        }
                                        else if(isset($_POST['doc_login']) && $sucess==0)
                                        {
                                                echo '<div class="alert alert-warning">
                                      <strong>Invalid</strong> username or <strong>password</strong>
                                      </div><br>';
                                        }
                                    ?>
								</form>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="sociallink">
                    <h3 style="padding-left: 8px;padding-top:8px;">Follow Us</h3>
                    <br>
                    <div style="float:left;">
                        <a href="https://www.facebook.com" target="_blank" class="fblink"></a>
                        <a href="https://www.wordpress.com" target="_blank" class="wordpresslink"></a>
                        <a href="https://www.youtube.com" target="_blank" class="youtubelink"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container-fluid" style="padding:0px;">
        <div class="bottom">

        </div>
    </div>
</body>

</html>

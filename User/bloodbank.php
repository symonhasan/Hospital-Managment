<?php
include('db_con.php');
	
	$sucess = 0;	
	if ( !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['area']) && !empty($_POST['contact']) && !empty($_POST['bloodgroup']) )
	{
		$first_name=$_POST['firstname'];
		$last_name=$_POST['lastname'];
		$email=$_POST['email'];
        $email = strtolower( $email );
		$address=$_POST['address'];
        $area=$_POST['area'];
        $area = strtolower( $area );
		$contact=$_POST['contact'];
        $contact = strtolower( $contact );
		$blood=$_POST['bloodgroup'];
        $blood = strtolower( $blood );
        $status = 'available';
        $user_query = mysqli_query(mysqli_connect('localhost','root','','datacenter'),"select * from blood_doner order by doner_id asc");
        $donerid = 0;
        while( $row = mysqli_fetch_array($user_query) )
        {
            $donerid = $row['doner_id'];
        }
        $donerid = $donerid + 1;
        /*echo $first_name;echo $first_name;echo $donerid;echo $email;echo $address;echo $area;
        echo $contact;echo $blood;echo $status;*/
		$query = "INSERT INTO blood_doner(doner_id,first_name,last_name,email,address,area,contact_no,blood_group,status) values ('$donerid','$first_name' , '$last_name' , '$email' , '$address', '$area' , '$contact', '$blood', '$status') ";
		mysqli_query(mysqli_connect('localhost','root','','datacenter'),$query);
		$sucess = 1;
	}
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blood Bank</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="CSS/bloodbankcs.css">
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
                    <li><a href="doctor.php">Doctor</a></li>
                    <li><a href="about.php">About</a></li>
                    <li class="active"><a href="bloodbank.php">Blood Bank</a></li>
                </ul>
            </div>
        </div>
    </nav>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<p style="border: 2px solid gray;padding: 10px 10px;color:gray;">Lorem ipsum dolor sit amet, aperiri suscipit periculis sed et, zril delicatissimi an sit, an pro omittam definitionem. In vis minimum facilisi, soluta sadipscing sed ut. Harum accusam consectetuer mei ad, an audiam iracundia eam. In usu eros omnium, no paulo iuvaret labores quo. Vis quidam labores referrentur et, no nam epicurei delicata salutandi.
				Ut decore ullamcorper ius, at ius unum quando, duo an alterum feugait constituam. Cum wisi dicta te, eum ne discere luptatum, quas mandamus ei vis. Id quo augue utroque verterem, fierent omittam recteque no vim. Usu cu wisi aperiri, cum illud lucilius ea. Doctus accommodare at pri, te falli harum mediocritatem nam, utroque inciderint adversarium pro ei.
				</p>
				<br>
				<h3 style="text-align: center;">Search / Become a Blood Doner</h3>
			</div>
		</div>
	</div>
	<br>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 text-center">
				<div class="leftside">
					<br>
                        <?php
                        
                        if($sucess==1)
                        {
                            echo '<div class="alert alert-success">
                                  <strong>Congratulations!</strong> you have successfully become a blood doner. Your <strong>Doner_ID is '.$donerid.'</strong>. Please save this ID for future uses.
                                  </div><br>';
                        }
                    else if(isset($_POST['submit']) && $sucess==0)
                    {
                        echo '<div class="alert alert-warning">
                                  <strong>Error!</strong> please fill in the form correctly.
                                  </div><br>';
                    }
                        ?>
					<form action="" method="post">
						<div class="form-group">
							<div class="firstnamebox">
								<input type="text" class="form-control" name="firstname" placeholder="First Name">
							</div>
						</div>
						<div class="form-group">
							<div class="lastnamebox">
								<input type="text" class="form-control" name="lastname" placeholder="Last Name">
							</div>
						</div>
						<div class="form-group">
							<div class="emailbox">
								<input type="email" class="form-control" name="email" placeholder="Email">
							</div>
						</div>	
						<div class="form-group">
							<div class="addressbox">
								<input type="text" class="form-control" name="address" placeholder="Address">
							</div>
						</div>	
						<div class="form-group">
							<div class="addressbox">
								<input type="text" class="form-control" name="area" placeholder="Area">
							</div>
						</div>	
						<div class="form-group">
							<div class="contactbox">
								<input type="text" class="form-control" name="contact" placeholder="Contact No">
							</div>
						</div>	
						<div class="form-group">
							<div class="bloodgroupbox">
								<input type="text" class="form-control" name="bloodgroup" placeholder="Blood Group">
							</div>
						</div>	
						<button type="submit" class="btn btn-primary" name="submit">Become A Blood Doner</button>			
					</form>
				</div>
			</div>
			<div class="col-sm-7">
				<div class="rightside">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-6 col-sm-offset-3 text-center">
								<br><br><br>
                                <form action="bloodsearch.php" method="post"> 
                                    <div class="form-group">
                                        <div class="bloodgroupsbox">
                                            <input type="text" class="form-control" name="blood_group" placeholder="Blood Group">
                                        </div>
                                        <br>
                                        <div class="areasbox">
                                            <input type="text" class="form-control" name="area" placeholder="Area">
                                            <br>
                                            <p style="color: gray;">This text field is <strong>required</strong> if you want to search withhin a particular area. Be careful while typing your area name. <strong>N.B:</strong> google your location if nothing found</p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="searchbtn">
                                        <input type="submit" class="btn btn-info text-center btn-md" name="search" value="Search" action="search.php">
                                    </div>
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

<?php
    $success = 0;
    session_start();
    $doctorid = $_SESSION['doctor_id'];
    $docemail = $_SESSION['doctor_email'];
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
        
        <link href="https://fonts.googleapis.com/css?family=Yatra+One" rel="stylesheet">
    <!-- font-family: 'Yatra One', cursive; --->

    <link href="https://fonts.googleapis.com/css?family=Spectral" rel="stylesheet">
    <!-- font-family: 'Spectral', serif; --->

    </head>

    <body style="margin: 0px;">
        <nav class="navbar navbar-inverse" style="margin-bottom:0px;border-radius: 0px;border: 0px; background: #000000;  
background: -webkit-linear-gradient(to right, #434343, #000000); 
background: linear-gradient(to right, #434343, #000000);  ">
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
                <div class="col-sm-4" style="padding-left: 0px;padding-right: 0px;">
                    <ul class="leftmenu" >
                        <li><a href="doctor_dashboard.php">Messege</a></li>
                        <li><a href="doctor_dashboard_serial.php">Serial</a></li>
                        <li><a href="doctor_dashboard_ap.php" class="active">Access Prescription</a></li>
                        <li><a href="doctor_dashboard_pes.php" >Prescribe</a></li>
                        <li><a href="doctor_dashboard_u_i.php">Update Information</a></li>
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

                    <div class="col-sm-6 col-sm-offset-3 text-center">
                       <br><br><br>
                        <form action="" method="post">
						<div class="form-group">
							
                            <div>
                            <label for="serial_no">Select Patient</label>
                              <select class="form-control" name="serial_no">
                                  <?php
                                    $date = date("20y-m-d");
                                    $doctorid = $_SESSION['doctor_id'];
                                    $user_query = mysqli_query(mysqli_connect('localhost','root','','datacenter'),"select * from prescription where reference = ('$doctorid')");
                                    $flag = 0;
                                            while( $row = mysqli_fetch_array($user_query) )
                                            {
                    
                                    
                                            echo "<option value='" . $row['serial_no'] . "'>" . $row['serial_no'] ."</option>";   
                                            }
                                  ?>
                              </select>
                            </div>
						</div>
						<button type="submit" class="btn btn-primary" name="submit">Show</button>
                            <br>
                            <br>
					</form>
                    </div>
                    <?php
                        if(isset($_POST['submit']))
                        {
                            show_prescription();
       
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

<?php
    
    
    function show_prescription()
    {
        $srl = $_POST['serial_no'];
        
        if( $srl!="" )
        {
            $user_query = mysqli_query(mysqli_connect('localhost','root','','datacenter'),"select * from prescription where serial_no = ('$srl')");
            
            while($row = mysqli_fetch_array($user_query) ){
            echo '<div class="col-sm-12" style="background-color:background: #0F2027;
background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);
background: linear-gradient(to right, #2C5364, #203A43, #0F2027);color: white;font-family: Spectral;font-size: 20px;">';
                echo '<p style="border-bottom: 1px solid gray;"><strong>Serial No : </strong>'.$srl.'</p><br>';
                echo '<p style="border-bottom: 1px solid gray;"><strong>Disease : </strong>'.$row['disease'].'</p><br>';
                echo '<p><strong>Test : </strong>'.$row['test'].'</p><br>';
                echo '<p><strong>Medicine : </strong><br><br>'.$row['medicine'].'</p><br>';
            echo '</div>';
            }
        }
    }

?>

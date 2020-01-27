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
        <link rel="stylesheet" href="CSS/doctordashcs.css">

    </head>

    <body style="margin: 0px;">
        <nav class="navbar navbar-inverse" style="margin-bottom:0px;border-radius: 0px;border: 0px; background: #000000;  
background: -webkit-linear-gradient(to right, #434343, #000000); 
background: linear-gradient(to right, #434343, #000000); ">
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
                        <li><a class="active" href="doctor_dashboard.php">Messege</a></li>
                        <li><a href="doctor_dashboard_serial.php">Serial</a></li>
                        <li><a href="doctor_dashboard_ap.php">Access Prescription</a></li>
                        <li><a href="doctor_dashboard_pes.php">Prescribe</a></li>
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
                    <div style="min-height: 250px">
                        <br><br><br>
                        <?php
                                include('db_con.php');
                                $count = 0;
                                
                                    $user_query = mysqli_query(mysqli_connect('localhost','root','','datacenter'),"select * from doctor_message");

                                    while( $row = mysqli_fetch_array($user_query) )
                                    {
                                        if($row['reciever_email']==$docemail && $row['status']=="unread")
                                        {
                                            echo '<div class="col-sm-9 col-sm-offset-1">';
                                                echo '<p style="border-bottom: 1px solid gray;background: #108dc7; 
background: -webkit-linear-gradient(to right, #ef8e38, #108dc7);
background: linear-gradient(to right, #ef8e38, #108dc7); 
padding: 10px;font-size: 26px;font-family: Tangerine;"><strong>From : </strong>'.$row['sender_email'].'</p>';
                                                /*echo '<p style="border-bottom : 1px solid gray;background: #E3F2FD;padding: 10px;"><strong>To : </strong>'.$row['reciever_email'].'</p>';*/
                                                echo '<p style="border : 1px solid gray;background: #1c92d2;  
background: -webkit-linear-gradient(to right, #f2fcfe, #1c92d2); 
background: linear-gradient(to right, #f2fcfe, #1c92d2); 
;padding: 10px;">'.$row['mail'].'</p>';
                                                echo '<br>';
                                            echo '</div>';
                                            echo '<br><br><br>';
                                            $count = $count + 1;
                                        }
                                    }
                                if($count==0)
                                {
                                    echo '<div class="col-sm-9 col-sm-offset-1">';
                                    echo '<div class="alert alert-info">
                                  You currently do not have any message.
                                  </div><br>';
                                    echo '</div>';
                                }
                                else
                                {
                                    echo '<div class="col-sm-9 col-sm-offset-1 text-center">';
                                    echo '<form action="" method="post">';
                                    echo '<button type="submit" class="btn btn-primary" name="mark">Mark all as read</button>';
                                    echo '</form>';
                                    echo '</div>';
                                    if(isset($_POST['mark']))
                                    {
                                        if(mysqli_query(mysqli_connect('localhost','root','','datacenter'),"UPDATE doctor_message SET status='read' where reciever_email='$docemail'"))
                                        {
                                            $count = 0;
                                        }
                                        
                                    }
                                }
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

            </div>
        </div>
    </body>

    </html>

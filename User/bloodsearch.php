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
            <?php
                include('db_con.php');
                $fail = 0;
               if ( isset($_POST['search']) )
               {
                    if(empty($_POST['blood_group']) && empty($_POST['area']))
                    {
                        echo '<div class="alert alert-warning">
                                  <strong>Search</strong> Field can not be <strong>empty</strong>! Please <a href="bloodbank.php">try again.</a>
                                  </div><br>';
                        $fail = 1;
                    }
                    $keyword=$_POST['blood_group'];
                    $keyword = strtolower($keyword);
                    $area = "null";
                    $flag = 0;
                    if ( !empty($_POST['area']) )
                    {
                        $area = $_POST['area'];
                        $flag = 1;
                    }
                    if($fail==0){
                    $query = "select * from blood_doner";
                    $result = mysqli_query(mysqli_connect('localhost','root','','datacenter'),$query);
                    $count = 0;
                    while($row = mysqli_fetch_array($result))
                    {
                        if($flag==0)
                        {
                            //echo $row['blood_group']."   ".$row['status']."  ".$keyword;
                            if($row['blood_group']==$keyword && $row['status']=="available")
                            {
                                
                                echo '<div class="col-sm-4">
                                    <h3 style="background:url(Icon/bsn.png)left no-repeat;color:blue;padding-left:30px;font-family:IM Fell English SC, serif;">'.$row["first_name"].' '.$row["last_name"].'</h3>
                                    <h5 style="background:url(Icon/bse.png)left no-repeat;color:gray;padding-left:30px;">'.$row["email"].'</h5>
                                    <h5 style="background:url(Icon/bsa.png)left no-repeat;color:gray;padding-left:30px;">'.$row["address"].'</h5>
                                    <h5 style="background:url(Icon/bsc.png)left no-repeat;color:gray;padding-left:30px;">'.$row["contact_no"].'</h5>
                                    <h5 style="background:url(Icon/bsbg.png)left no-repeat;color:red;padding-left:30px;">'.strtoupper($row["blood_group"]).'</h5>
                                </div>';
                                $count = $count+1;

                                if($count%3==0)
                                    echo '<br><br>';
                            }
                        }
                        else
                        {
                            if($row['blood_group']==$keyword && $row['area']==$area && $row['status']=='available')
                            {
                                echo '<div class="col-sm-4">
                                    <h3 style="background:url(Icon/bsn.png)left no-repeat;color:blue;padding-left:30px;font-family:IM Fell English SC, serif;">'.$row["first_name"].' '.$row["last_name"].'</h3>
                                    <h5 style="background:url(Icon/bse.png)left no-repeat;color:gray;padding-left:30px;">'.$row["email"].'</h5>
                                    <h5 style="background:url(Icon/bsa.png)left no-repeat;color:gray;padding-left:30px;">'.$row["address"].'</h5>
                                    <h5 style="background:url(Icon/bsc.png)left no-repeat;color:gray;padding-left:30px;">'.$row["contact_no"].'</h5>
                                    <h5 style="background:url(Icon/bsbg.png)left no-repeat;color:red;padding-left:30px;">'.strtoupper($row["blood_group"]).'</h5>
                                </div>';
                                $count = $count+1;

                                if($count%3==0)
                                    echo '<br><br>';
                            }
                        }
                    }
                   if($count==0)
                   {
                       echo '<div class="col-sm-12 text-center">
                        <br><br><br><br>
                            <p class="text-muted" style="font-size:30px;">Sorry! Nothing found </p>
                            <br>
                            <br>
                        </div>';
                   }
               }
               }
            ?>
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

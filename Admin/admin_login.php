<?php
    
    include('db_con.php');
    $success = 0;

    if( !empty( $_POST['username']) && !empty( $_POST['password'] ) )
    {
        
        $usr = $_POST['username']; $pass = $_POST['password'];
        $usr = strtolower( $usr );
        
        $stat = 'yes' ; 
        
        $user_query = mysqli_query( mysqli_connect( 'localhost' , 'root' , '','datacenter') , "select * from admin_login");
        
        while( $row = mysqli_fetch_array( $user_query ) )
        {
            
            if( $row['username'] == $usr && $row['password'] == $pass && $row['status'] == $stat)
            {
                $success = 1;
            }
        }
        
        echo $success;
        
        
    }

?>

<html>

<head>
    <title> Admin Login </title>
    <!-- Bootstrap --->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="CSS/admin_logincss.css">

    <!-- Font ---->

    <link href="https://fonts.googleapis.com/css?family=Yatra+One" rel="stylesheet">
    <!-- font-family: 'Yatra One', cursive; --->

    <link href="https://fonts.googleapis.com/css?family=Spectral" rel="stylesheet">
    <!-- font-family: 'Spectral', serif; --->


</head>

<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-12 adm_l_top">
                <br>
                <br>
                <h1> Admin Login </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 adm_l_middle text-center">
                <br><br><br><br><br>
                <div class="col-sm-6 col-sm-offset-3">
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="userbox">
                                <input type="text" name="username" class="form-control" placeholder="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="passbox">
                                <input type="password" class="form-control" name="password" placeholder="password">
                            </div>
                        </div>
                        <a href="#" style="text-decoration: none;color:white;font-family: 'Spectral', serif;">Forget password! Recover username or password</a>
                        <br><br>
                        <button type="submit" class="btn btn-primary" name="admin_login">Login</button>
                    </form>
                </div>
                <div class="col-sm-6 col-sm-offset-3">
                    <?php
                        if(isset($_POST['admin_login'] ) && $success==0)
                        {
                            wrong_warning();
                        }
                        else if(isset($_POST['admin_login'] ) && $success==1)
                        {
                            open_dash();
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 adm_l_bottom text-center">
                <br>
                <h3><em>all right reserved to</em><strong>&nbsp;&copy;&nbsp;symon hasan</strong></h3>
            </div>
        </div>
    </div>
</body>

</html>

<?php
    function wrong_warning()
    {
        echo '<div class="alert alert-danger">
            <strong>Invalid</strong>&nbsp;username or password
        </div>';
    }
    function open_dash()
    {
        header("Location:admin_dashboard.php");
        exit();
    }
?>


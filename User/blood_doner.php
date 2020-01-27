<?php
include('db_con.php');
	
	$sucess = 0;	
	if ( !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['contact']) && !empty($_POST['bloodgroup']) )
	{
		$first_name=$_POST['firstname'];
        $first_name = strtolower( $first_name );
		$last_name=$_POST['lastname'];
        $last_name = strtolower( $last_name );
		$email=$_POST['email'];
        $email = strtolower( $email );
		$address=$_POST['address'];
        $address = strtolower( $address );
		$contact=$_POST['contact'];
        $contact = strtolower( $contact );
		$blood=$_POST['bloodgroup'];
        $blood = strtolower( $blood );
		$query = "INSERT INTO bloodbank(firstname,lastname,email,address,contact,bloodgroup) values ('$first_name' , '$last_name' , '$email' , '$address', '$contact', '$blood') ";
		mysqli_query(mysqli_connect('localhost','root','','datacenter'),$query);
		$sucess = 1;
	}

?>
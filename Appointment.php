<?php 
include 'db.php';

 header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');


    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data)) {
       

        $Fname=$data['Fname'];
        $Lname=$data['Lname'];
        $dob=$data['dob'];
        $gender=$data['gender'];
        $service=$data['service'];
        $date=$data['date'];
        $email=$data['email'];
        $phone=$data['phone'];
        $wish=$data['wish'];



    $insertdata="insert into appointment(Fname,Lname,dob,gender,service,date,email,phone,wish) values('$Fname','$Lname','$dob','$gender','$service','$date', '$email', '$phone','$wish')";
    
    mysqli_query($con,$insertdata);

    }

   $selectdata="select * from appointment";
     $res = mysqli_query($con,$selectdata);


     $r=array();
    while ($row=mysqli_fetch_assoc($res)) 
     {
    		$r[]=$row;   
     }
      print json_encode($r);

  ?>
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
        $speciality=$data['speciality'];
        $phone=$data['phone'];
        $email=$data['email'];
        $url=$data['url'];
        $image=$data['image'];
        $wish=$data['wish'];



    $insertdata="insert into add_doctor(Fname,Lname,dob,gender,speciality,phone,email,url,image,wish) values('$Fname','$Lname','$dob','$gender','$speciality','$phone', '$email', '$url', '$image', '$wish')";
    
    mysqli_query($con,$insertdata);

    }

   $selectdata="select * from add_doctor";
     $res = mysqli_query($con,$selectdata);


     $r=array();
    while ($row=mysqli_fetch_assoc($res)) 
     {
    		$r[]=$row;   
     }
      print json_encode($r);

  ?>
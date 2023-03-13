<?php 
include 'db.php';

 header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');


    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data)) {
       

        $Fname=$data['Fname'];
        $Lname=$data['Lname'];
        $phone=$data['phone'];
        $date=$data['date'];
        $age=$data['age'];
        $gender=$data['gender'];
        $email=$data['email'];
        $image=$data['image'];
        $description=$data['description'];




    $insertdata="insert into add_patient(Fname,Lname,phone,date,age,gender,email,image,description) values('$Fname','$Lname','$phone','$date','$age','$gender', '$email','$image','$description')";
    
    mysqli_query($con,$insertdata);

    }

   $selectdata="select * from add_patient";
     $res = mysqli_query($con,$selectdata);


     $r=array();
    while ($row=mysqli_fetch_assoc($res)) 
     {
    		$r[]=$row;   
     }
      print json_encode($r);

  ?>
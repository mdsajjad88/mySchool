<?php
error_reporting(0);
require "dbConnec.php";

if (isset($_GET['id'])) {
    $s_id =  base64_decode($_GET['id']);

    $select = $connection->prepare("SELECT * FROM onlineformdata WHERE id = '$s_id'");
    $select->execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);
    $name= $row['student_name'];
    $gmail = $row['email'];
}
// payment Methode Processing

if(isset($_POST['subbtn'])){


    $selectpay = $connection->prepare("SELECT * FROM payment_history WHERE student_id ='$id'");
    $selectpay->execute();
     $payRow = $selectpay->fetch(PDO::FETCH_ASSOC);
     $newPay = $payRow['total_pay'];

    $mydate = getdate(date("U"));

   $id = $s_id;

   $payAmount = $_POST['ammount'];
   $method = $_POST['method'];
   $ACno = $_POST['account'];
   $pass = $_POST['pass'];
   $reasons = $_POST['feereason'];

  


   $fee = 30000;
   $totalPay = $newPay + $payAmount;

   $due = $fee - $totalPay;

  
  
   if(empty($payAmount)|| empty($method)||empty($ACno)||empty($pass)){
    $msg = " <script>alert('Please select and input all data & then press payment button')</script>";
   }
   else{
    $insert = $connection->prepare("INSERT INTO payment_history(student_id, name, gmail,fee_reason, payment_ammount, total_pay, payment_methode, account_no, current_due) VALUES('$id', '$name', '$gmail','$reasons', '$payAmount','$totalPay','$method', '$ACno', '$due')");
    if($insert->execute()){
        $msg = "
    <script>alert('Payment Successfull ... Show Below Your invoice')</script>
        <div class='alert alert-light'>
        <h2> Payment Successfull</h2> 
        <div class='row'>
            <div class='col-6'>
            Student name 
            </div>
            <div class='col-6'> $name </div>
            
        </div>
        <div class='row'>
            <div class='col-6'>Total Fee </div>
            <div class='col-6'> $fee </div>
        </div>
        <div class='row'>
            <div class='col-6'>Payment Amount</div>
            <div class='col-6'> $payAmount </div>
        </div>
        <div class='row'>
            <div class='col-6'>Total Pay</div>
            <div class='col-6'> $totalPay </div>
        </div>
        <hr>
        <div class='row'>
            <div class='col-6'>Due Bil---------------------------------</div>
            <div class='col-6'> $due </div>
        </div>
        <div class='row'>
            <div class='col-6'> $mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]</div>
            <div class='col-6'> <button onclick='window.print()'>Print this page</button> </div>
        </div>
       
        
        </div>";
    }
    else{
        $msg = " <script>alert('Something Wrong Please try again.')</script>";
    }
   }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--  -->
    <style>
        .sidebar {
            position: fixed;
        }

        .main {
            margin-left: 340px;
        }
        .profilepic{
            border-radius: 50%;
            background: black;
        }
        /* table{
            width: 100%;
        }
        td{
            border: 1px solid black;
        } */
        .myC{
            margin-top: 70px;
        }
        #navbarNav ul li:hover {
            background-color: rgb(100, 180, 250);

        }

        #navbarNav ul li a:hover {
            color: white;
        }

        #navbarNav ul li a {
            color: orange;
        }

        .myNav {
            background-color: rgb(150, 10, 50);
            
        }
    </style>
</head>

<body>
      
<nav class="navbar navbar-expand-lg navbar-light  fixed-top myNav">
<a class="navbar-brand" href="index.php"><img src="all_image/brand.png" alt="Brand" height="40px" width="60px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php"><b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php"><b>About Us</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="department.php"><b>Department</b></a>
                </li>

               
                <li class="nav-item">
                    <a class="nav-link btn-hover" href="gallery.php"><b>Gallery</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="payfee.php"><b>Pay Fee</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><b>Notice</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admissionForm.php"><b>Admission Form</b></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link" href="admin/index.php"><b>Admin Panel</b></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="regi&Log/regi.php"><b>Registration</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="regi&Log/login.php"><b>Log In</b></a>
                </li>
            </ul>
        </div>
</nav>
   

   
<div class="container myC">

        <div class="row mt-3"></div>

            <div class="col-3 sidebar">

                <div class="container">
                    <h3 class="bg-secondary text-light text-center">Photo</h3>
                    <img src="<?php echo $row['photo_folder'].$row['photo_rename'] ?>" height="150px" width="100%" alt="Loading" class="profilepic">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-outline-secondary w-100 mt-2" href="#personal">Personal Information</a>

                            <a class="btn btn-outline-secondary w-100 mt-2" href="#">Academic Information</a>
                            <a class="btn btn-outline-secondary w-100 mt-2" href="#payment">Add Payment</a>
                            <a class="btn btn-outline-secondary w-100 mt-2" href="#paystatus  ">Payment Information</a>
                            <a class="btn btn-outline-secondary w-100 mt-2" href="#">Result</a>
                            <a class="btn btn-outline-secondary w-100 mt-2" href="#">Class Routine</a>
                            <a class="btn btn-outline-secondary w-100 mt-2" href="#">Edit Personal Information</a>
                            <a class="btn btn-warning w-100 mt-2" href="#">Log Out</a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Personal Information -->
            <div class="col-9 main">
                <h3 class="bg-info text-light text-center" id="personal">Personal Information</h3>
                <div class="row">
                    <div class="col-5">
                        <b>Student Id:</b>
                    </div>
                    <div class="col-7">
                        <b> 000<?= $row['id']; ?> </b>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <b>Student G-mail :</b>
                    </div>
                    <div class="col-7">
                        <b> <?= $row['email']; ?> </b>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <b>Student Name:</b>
                    </div>
                    <div class="col-7">
                        <b> <?= $row['student_name']; ?> </b>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <p>Student Birthday:</b>
                    </div>
                    <div class="col-7">
                        <b> <?= $row['birthday']; ?> </b>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <p>Student NID No:</b>
                    </div>
                    <div class="col-7">
                        <b> <?= $row['nidno']; ?> </b>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <p>Student Gender:</b>
                    </div>
                    <div class="col-7">
                        <b> <?= $row['gender']; ?> </b>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <p>Student Blood Group:</b>
                    </div>
                    <div class="col-7">
                        <b> <?= $row['blood']; ?> </b>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <p>Student Contact:</b>
                    </div>
                    <div class="col-7">
                        <b> <?= $row['contact']; ?> </b>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <p>Student Hometown:</b>
                    </div>
                    <div class="col-7">
                        <b> <?= $row['hometown']; ?> </b>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <p>Student Religion:</b>
                    </div>
                    <div class="col-7">
                        <b> <?= $row['religion']; ?> </b>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <p>Student Marrital Status:</b>
                    </div>
                    <div class="col-7">
                        <b> <?= $row['marrital_status']; ?> </b>
                    </div>
                </div>
                <hr>
                <!-- personal Information end -->
             
                    <h3 class="bg-info text-light text-center" id="academic">Academic Information</h3> 
                    <div class="row">
                        <div class="col-6">
                            <p> Department</p>
                        </div>
                        <div class="col-6">
                    
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                        Roll No 
                        </div>
                        <div class="col-6">
                            <p> 000<?= $row['id']; ?> </p>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                        Total recorded Class
                        </div>
                        <div class="col-6">
                        
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                        Total Present Class
                        </div>
                        <div class="col-6">
                        
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                        Total Absent Class
                        </div>
                        <div class="col-6">
                        
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                        Category
                        </div>
                        <div class="col-6">
                        
                        </div>
                        
                    </div>
            
                    <h3 class="bg-info text-light text-center" id="paystatus">Payment Information</h3>
                    <div class="row">
                        <table class="table table-striped">
                                <thead class="bg-secondary text-light"> 
                                    <tr>
                                    <td> Fee Reason</td>
                                    <td>Pay Amount </td>
                                    <td> Payment Date</td>
                                    <td>Payment Method</td>
                                    <td> Payment Status</td>
                                    <td> Current Due</td>
                                    </tr>
                                
                                </thead>
                            <?php
                            $myId = $row['id'];
                            $payhistory = $connection->prepare("SELECT * FROM payment_history WHERE student_id = '$myId'");
                            $payhistory->execute();
                            while($myRow = $payhistory->fetch(PDO::FETCH_ASSOC)){
                            ?>
                                <tr> 
                                    <td> <?= $myRow['fee_reason']?></td>
                                    <td> <?= $myRow['payment_ammount']?> </td>
                                    <td>  <?= $myRow['payment_date']?></td>
                                    <td> <?= $myRow['payment_methode']?></td>
                                    <td> <?= $myRow['payment_status']?></td>
                                    <td>  <?= $myRow['current_due']?></td>
                                </tr>


                            <?php } ?>
                        </table>    
               
                    </div>
                <hr>
                <!-- Payment Option  -->
                <div id= "payment" class="mb-3">
                        <h3 class="bg-info text-light text-center" id="personal">
                        Add a Payment</h3>
                        <?php 
                        if(isset($msg)){
                            echo $msg;
                        }
                        
                        ?>
                    <div class="row">
                        <form action="" method="post">
                        <table class="table table-striped">
                            <thead class="bg-secondary text-light">
                                <tr>
                                    <th>Select Reason</th>
                                    <th>Ammount</th>
                                    <th> Methode</th>
                                    <th>Account No</th>
                                    <th> Password</th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <select name="feereason" class="form-control" id="">
                                        <option value="">Select Fee Reason</option>
                                        <option value="admission fee">Admission Fee</option>
                                        <option value="registration fee">Registration Fee</option>
                                        <option value="monthly fee">Monthly Fee</option>
                                        <option value="tution fee">Tution Fee</option>
                                        <option value="books fee">Books Fee</option>
                                    </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="ammount">
                                    </td>
                                    <td>
                                        <select name="method" class="form-control" id="">
                                            <option value="">Select Method</option>
                                            <option value="bkash">Bkash</option>
                                            <option value="nagad">Nagad</option>
                                            <option value="rocket">Rocket</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="account">
                                    </td>
                                    <td>
                                        <input type="password" class="form-control" name="pass">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                    </div>
                    <input type="submit" class="bg-dark text-light text-center form-control" 
                       value= "Payment" name="subbtn">
                <div>
       
            </div>
       

        </div>
            
</div>


</body>

</html>
<?php 
   include 'connection.php';

   if(isset($_POST['submit'])){
      $sender = $_GET['id'];
      $receiver = $_POST['receiver'];
      $amount = $_POST['amount'];

      $sql = "SELECT * FROM details1 WHERE id=$sender";
      $result = mysqli_query($conn,$sql);
      $row1 = mysqli_fetch_assoc($result);

      $sql = "SELECT * FROM details1 WHERE id=$receiver";
      $result = mysqli_query($conn,$sql);
      $row2 = mysqli_fetch_assoc($result);

      $error="";
      if($amount == 0 || $amount < 0)
      {
         // echo '<script type="text/javascript">';
         // echo ' alert("Amount Should be Geater than 0")';  // showing an alert box.
         // echo '</script>';      
         $error = "Amount Should be Geater than 0";
      }
      else if($amount > $row1['balance'])
      {
         // echo '<script type="text/javascript">';
         // echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
         // echo '</script>';      
         $error = "Bad Luck! Insufficient Balance";
      }
      else
      {
         $sender_new_balance = $row1['balance'] - $amount;
         $sql = "UPDATE details1 SET balance=$sender_new_balance WHERE id = $sender";
         $result = mysqli_query($conn,$sql);

         $receiver_new_balance = $row2['balance'] + $amount;
         $sql = "UPDATE details1 SET balance=$receiver_new_balance WHERE id = $receiver";
         $result = mysqli_query($conn,$sql);
         
         $sender_name = $row1['name'];
         $receiver_name = $row2['name'];
         $sql = "INSERT INTO transactions(`sname`,`rname`,`amount`,`status`) VALUES('$sender_name','$receiver_name','$amount','Success')";
         $result = mysqli_query($conn,$sql);

         if($result){
            echo "<script type='text/javascript'>  alert('Your Transaction is Successfull')
                        window.location='transactions.php?'
                  </script>";
         }

         $sender_new_balance=0;
         $receiver_new_balance=0;
         $amount=0;
      }
   }
   mysqli_close($conn);
?>







<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/navbar.css">
   <title>Payment Transfer</title>
</head>

<body>
   <?php
      include 'connection.php';
   ?>
   <?php
      include 'navbar.php';
   ?>

   <div class="user-container">
      <div class="user-content">
         <h1>Transfer Money</h1>
         <div class="table-container table-responsive-sm">
            <table class="table table-hover table-sm table-striped table-condensed table-bordered">
               <thead>
                  <tr>
                     <th scope="col" class="text-center py-2">ID</th>
                     <th scope="col" class="text-center py-2">Sender's Name</th>
                     <th scope="col" class="text-center py-2">Account No</th>
                     <th scope="col" class="text-center py-2">Balance</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     include 'connection.php';
                     $userid = $_GET['id'];     
                     $sql = "SELECT * FROM details1 WHERE id = $userid";
                     $result = mysqli_query($conn,$sql);
                     if (!$result) {
                        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
                     }
                     $rows = mysqli_fetch_assoc($result);
                  ?>
                  <tr>
                     <td class="py-2"><?php echo $rows['id'] ?></td>
                     <td class="py-2"><?php echo $rows['name'] ?></td>
                     <td class="py-2"><?php echo $rows['account'] ?></td>
                     <td class="py-2"><?php echo $rows['balance'] ?></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>


      <form method="post" action="">
         <div class="transfer-content">
         <h4 style="color:red; text-align:center; font-size:30px; "><?php if(!empty($error)) echo $error;?></h4>
            <div class="transfer-division">
               <div >
                  <label for="">Transfer To :</label><br>
                  <select name="receiver" class="form-control" style=" font-size: 20px; width:70vh" required;>
                     <option value="" disabled selected>Choose</option>
                     <?php
                        include 'connection.php';
                        $userid = $_GET['id'];     
                        $sql = "SELECT * FROM details1 WHERE id != $userid";
                        $result = mysqli_query($conn,$sql);
                        if (!$result) {
                           echo "Error : " . $sql . "<br>" . mysqli_error($conn);
                        }
                        while($rows = mysqli_fetch_assoc($result)) { ;
                           ?>
                     <option value="<?php echo $rows['id'];?>"><?php echo $rows['name'] . " ( Account No: " . $rows['account'] . " )"; ?></option>
                     <?php 
                        }
                        ?>
                  </select>
               </div>
               <div >
                  <label for="">Amount :</label><br>
                  <input type="number" class="form-control" placeholder="Enter Amount" name="amount" style="font-size: 17px; width:40vh;" required>
               </div>
            </div>
            <div class="transfer-button-section">
               <button class="transfer-button" type="number" name="submit">Transfer</button>
            </div>
         </div>
      </form>
   </div>
      
   <footer >
      <h6>Paytm Bank Website Mady By Jayanta Ghosh</h6>
      <h6>&copy;All Right Reserved</h6>
   </footer>

      <?php
      mysqli_close($conn);
      ?>

</body>

</html>
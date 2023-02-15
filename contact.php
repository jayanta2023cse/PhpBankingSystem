<?php
   include 'connection.php';

   if(isset($_POST['submit'])){
      $name=$_POST['name'];
      $email=$_POST['email'];
      $message=$_POST['message'];


      $sql = "INSERT INTO usermessage (`name`,`email`,`message`) VALUES('$name','$email','$message')";
      $result= mysqli_query($conn,$sql);
      if(!$result){
         die("message is not sent due to".mysqli_error($conn));
      }
      else{
         echo "<script type='text/javascript'> alert('Message send successfully') </script>";
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
   <title>Contact Us</title>
</head>

<body>
   <?php include 'navbar.php'; ?>

   <div class="main-contact-section" style="background-color: grey; padding: 30px 50px;">
      <div class="contact-section-2" style="background-color: rgb(170, 210, 200);border: 2px solid black; border-radius: 12px; margin: 20px; padding: 30px 50px; display: flex;justify-content: space-between;">
         <div class="map-section" >
            <iframe style="width:70vh; height: 60vh; margin-top:30px; border-radius: 10px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3642.1421540452598!2d88.25059131421808!3d24.096495881385326!2m3
            !1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f97dd0ee7dc333%3A0x36c1bc55f33d8d93!2sGovernment%20College%20Of%20Engineering%20
            and%20Textile%20Technology%2C%20Berhampore!5e0!3m2!1sen!2sin!4v1676090686009!5m2!1sen!2sin" width="600"
               height="450" style="border:0;" allowfullscreen="" loading="lazy"
               referrerpolicy="no-referrer-when-downgrade"></iframe>

             <h2 style="color:blue; margin-top: 20px; text-align:center;">Our Location</h2>  
         </div>
         <div class="form-section">
            <h4 style="color:black; margin-bottom: 15px; text-align:center;">Enter your Details</h4>
            <form action="" method="post">
               <div>
                  <input type="text" name="name"  title="alphabets characters only" placeholder="Enter Your Name here" style=" background-color: rgb(255,255,220); border-radius: 8px;color:deepblack;width: 60vh; padding:7px 10px; font-size: 20px;" required>
               </div>
               <br>
               <div>
                  <input type="email" name="email" placeholder="Enter Your Email" style=" background-color: rgb(255,255,220); border-radius: 8px;color:deepblack;width: 60vh; padding:7px 10px; font-size: 20px;" required>
               </div>
               <br><br>
               <textarea name="message" cols="50" rows="6" placeholder="send us message" style=" background-color: rgb(255,255,220); border-radius: 8px;color:deepblack; padding:7px 10px; font-size: 16px;"></textarea>
               <br>
               <div style="margin:10px 160px; align-item:center;">
                  <button type="submit" name="submit" style=" background-color: rgb(255,155,100); border-radius: 8px;color:black; padding:7px 10px;font-size: 20px;">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <footer >
      <h6>Paytm Bank Website Mady By Jayanta Ghosh</h6>
      <h6>&copy;All Right Reserved</h6>
   </footer>
</body>

</html>
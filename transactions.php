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
   <title>All Transactions</title>
</head>
<body>
   <?php 
      include 'connection.php';
      $sql = "SELECT * FROM transactions";
      $result = mysqli_query($conn,$sql);
   ?>
   <?php 
      include 'navbar.php';
   ?>

   <div class="user-container">
   <!-- <h4 style="color:red; text-align:center; font-size:30px; ">
      <?php
         // include 'connection.php' ;
         // $error = $_GET['error'];
         // if(!empty($error)) echo $error;
      ?>
   </h4> -->
      <div class="user-content" >
         <h1>All Transactions</h1>
         <div class="table-container table-responsive-sm">
            <table class="table table-hover table-sm table-striped table-condensed table-bordered">
               <thead>
                  <tr>
                     <th scope="col" class="text-center py-2">Trans. Id</th>
                     <th scope="col" class="text-center py-2">Sender Name</th>
                     <th scope="col" class="text-center py-2">Receiver Name</th>
                     <th scope="col" class="text-center py-2">Amount</th>
                     <th scope="col" class="text-center py-2">Trans. Time</th>
                     <th scope="col" class="text-center py-2">Status</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  $serial=0;
                     while ($rows = mysqli_fetch_assoc($result)) {
                        $serial = $serial + 1; 
                  ?>
                     <tr>
                        <td class="py-2"><?php echo $serial ?></td>
                        <td class="py-2"><?php echo $rows['sname'] ?></td>
                        <td class="py-2"><?php echo $rows['rname'] ?></td>
                        <td class="py-2"><?php echo $rows['amount'] ?></td>
                        <td class="py-2"><?php echo $rows['time'] ?></td>
                        <td class="py-2" ><span style="border-radius:7px; padding:4px 10px; background-color:rgb(14, 206, 171); color:black;"><?php echo $rows['status'] ?></span></td>
                     </tr>

                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   
   <?php 
      mysqli_close($conn);
   ?>

   <footer >
      <h6>Paytm Bank Website Mady By Jayanta Ghosh</h6>
      <h6>&copy;All Right Reserved</h6>
   </footer>
   

</body>
</html>
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
   <title>Transfer Money</title>
</head>

<body>
   <!-- connecting to the database and run the query to fetch details -->
   <?php
   include 'connection.php';
   $sql = "SELECT * FROM details1";
   $result = mysqli_query($conn, $sql);
   ?>

   <!-- adding the navbar part -->
   <?php
   include 'navbar.php';
   ?>

   <div class="user-container">
      <div class="user-content">
         <h1>Customer Details</h1>
         <div class="table-container table-responsive-sm">
            <table class="table table-hover table-sm table-striped table-condensed table-bordered">
               <thead>
                  <tr>
                     <th scope="col" class="text-center py-2">ID</th>
                     <th scope="col" class="text-center py-2">Name</th>
                     <th scope="col" class="text-center py-2">Email</th>
                     <th scope="col" class="text-center py-2">Account No</th>
                     <th scope="col" class="text-center py-2">Balance</th>
                     <th scope="col" class="text-center py-2">Operation</th>
                  </tr>
               </thead>
               <tbody>
                   
                  <?php 
                     $serial = 0;
                     while ($rows = mysqli_fetch_assoc($result)) {
                        $serial = $serial + 1;
                     ?>
                     <tr>
                        <td class="py-2"><?php echo $serial ?></td>
                        <td class="py-2"><?php echo $rows['name'] ?></td>
                        <td class="py-2"><?php echo $rows['email'] ?></td>
                        <td class="py-2"><?php echo $rows['account'] ?></td>
                        <td class="py-2"><?php echo $rows['balance'] ?></td>
                        <td class="py-2"><a href="processing.php?id= <?php echo $rows['id'];?>"><button class="btn2 btn-sm btn-primary">Transfer To</button></a>
                        </td>
                     </tr>

                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>

   <footer >
      <h6>Paytm Bank Website Mady By Jayanta Ghosh</h6>
      <h6>&copy;All Right Reserved</h6>
   </footer>
   <?php mysqli_close($conn); ?>
</body>

</html>
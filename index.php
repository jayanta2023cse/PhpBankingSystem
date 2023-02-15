<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/navbar.css">
   <title>Basic Banking system</title>
</head>

<body>
   <?php include 'navbar.php' ?>
   
   <div class="main-container">
      <div class="header-container ">
         <div class="header-text">
            <h3 style="font-size: 35px">WELCOME TO</h3>
            <h1 style="font-size: 55px">PAYTM BANK</h1>
         </div>
         <div class="header-image">
            <img class="head-image" src="img/bank.png" alt="Our bank Website view">
         </div>
      </div>

      <div class="body-container">
         <div class="body-content">
            <div class="body-image">
               <img src="img/user.jpg" alt="craete new user">
            </div>
            <a href="transfermoney.php" ><button >See All Users</button></a>
         </div>
         <div class="body-content">
            <div class="body-image">
               <img src="img/transfer.jpg" alt="craete new user">
            </div>
            <a href="transfermoney.php" ><button>Transfer Money</button></a>
         </div>
         <div class="body-content">
            <div class="body-image">
               <img src="img/history.jpg" alt="craete new user">
            </div>
            <a href="transactions.php" ><button>Transactions</button></a>
         </div>
      </div>
   </div>

   <footer >
      <h6>Paytm Bank Website Mady By Jayanta Ghosh</h6>
      <h6>&copy;All Right Reserved</h6>
   </footer>
</body>

</html>
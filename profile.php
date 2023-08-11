<!doctype html>
<html lang="en">
<head>
<?php
  include('nav.php');
?>
<title>Artefact | Dashboard</title>
<link rel="stylesheet" type="text/css" href="style/profile.css">
</head>

  <body>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         
         <h1 class="page-header">Profile</h1>
        
         <div class="container">
      <div class="row">
      
   
   
          <div class="">
            <div class="panel-heading" >
              <h3 class="panel-title"><?php echo $_SESSION['first_name'];?>'s Details</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="images/avatar.png" class="img-circle img-responsive"> </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Username:</td>
                        <td><?php echo $_SESSION['user_name'];?></td>
                      </tr>
                      <tr>
                        <td>First Name:</td>
                        <td><?php echo $_SESSION['first_name'];?></td>
                      </tr>
                      <tr>
                        <td>Last Name:</td>
                        <td><?php echo $_SESSION['last_name'];?></td>
                      </tr>
                      <tr>
                        <td>NIC Number</td>
                        <td><?php echo $_SESSION['user_nic'];?></td>
                      </tr>
                      <tr>
                        <td>Address</td>
                        <td><?php echo $_SESSION['user_add'];?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php echo $_SESSION['user_email'];?></td>
                      </tr>
                      <tr>
                        <td>Contact Number</td>
                        <td><?php echo $_SESSION['user_tp'];?></td>
                      </tr>     
                      <tr>
                        <td>Account Balance</td>
                        <td><?php echo $_SESSION['user_balance'];?>Rs</td>
                      </tr> 
                     
                    </tbody>
                  </table>
                  
            </div>   
            </div>
            
            
          </div>
        </div>
      </div>
    </div>
         
         
        </div>

  

</body></html>

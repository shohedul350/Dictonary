
      <?php include'pdheader.php'?>

      <?php include'server.php'?>
       
       
        

        <!--------------end------------------>
<div class="row">
  <div class="col-12 col-md-8">
       
      <div class="card">
      
        <!--------------Search Buttom------------------>
        <table class="table  table-sm ">
   
       <tr>
           <td style="width:50%;">
                   <form class="form-inline my-2 my-lg-0" action="" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="English to Bangla" name="search">
      <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="src" value="Search">
    </form>
           </td>
           <td style="width:50%;">
               <?php while(@$row = mysqli_fetch_array($srcresult)){ 
                   echo"<b>Your Search Result : </b>";
                   echo $row["English"];
                  echo" = ";
                   echo $row["Bangla"];
                }?>
           </td>
       </tr>
       
       <tr>
           <td style="width:50%;">
                   <form class="form-inline my-2 my-lg-0" action="" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Bangla to English" name="bsearch">
      <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="bsrc" value="Search">
    </form>
           </td>
           <td style="width:50%;">
               <?php while(@$row = mysqli_fetch_array($bsrcresult)){ 
                   echo"<b>Your Search Result : </b>";
                   echo $row["Bangla"];
                  echo" = ";
                 echo $row["English"];
                   
                   
                }?>
           </td>
       </tr>
        </table>

          
     
      </div>
      <div class="card">


       
        
    <!--------------Tabe ------------------>  
     <div class="card-body">


                <table class="table table-bordered table-sm ">
                   <h3 class="bg-secondary text-white text-center rounded ">Word List</h3>
                    <thead>
                        <tr>
                        
                            <td width="50%"><b>Bangla</b></td>

                            <td width="50%"><b>English</b></td>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php while($row = mysqli_fetch_array($result)){ ?>
                        

                        <tr>
                                
                            
                            <td>
                                <?php echo $row["Bangla"];?>
                            </td>


                            <td>
                                <?php echo $row["English"];?>
                            </td>

                            
                        </tr>
                        <?php }?>

                    </tbody>
                </table>
            </div>
       
     <!--------------page item------------------>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
     </div>
     
  </div>
  
  
<!---------------Admin Loging Form-->
  <div class="col-6 col-md-4">
       <!-------------------notification-->
        <?php
      
      
      if(isset($_SESSION['msg'])): ?>
        <div class="card bg-success text-read text-center msg">
            <?php  
             echo $_SESSION['msg'];
             unset ($_SESSION['msg']);
             ?>
        </div>
        <?php endif?>
        <div class="card">
        
      <h2 class="bg-secondary text-white text-center rounded">Admin Pannel</h2>
     <div class="container">
  
  <form action="login.php" method="post">
    <div class="form-group">
      <label for="user name">User Name:</label>
       <input type="text" class="form-control" placeholder="Username" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="pasword">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary" name="login">Login</button>
  </form>
</div> 
      
      
  </div>
</div>
</div>

<?php include 'pffooter.php'?>
 

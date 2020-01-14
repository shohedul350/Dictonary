<?php include 'pdheader.php'?>
<?php include('server.php');


//fetch the record to be update 

if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $edit_state=true;
    $rec=mysqli_query($db,"SELECT * FROM word WHERE id=$id");
    $record=mysqli_fetch_array($rec);
    $bangla=$record['Bangla'];
    $english=$record['English'];
    $id=$record['id'];
}

?>
    <div class="card">
        <!-------------------notification-->
        <?php if(isset($_SESSION['msg'])): ?>
        <div class="card bg-success text-white text-center msg">
            <?php  
             echo $_SESSION['msg'];
             unset ($_SESSION['msg']);
             ?>
        </div>
        <?php endif?>
        <!----------------------notification-->
        
        
        
        <div class="card text-center">
            <h2>Welcome To Admin Pannel</h2>
          <a class="btn btn-primary " href="pd.php" style="width:75px;">Logout</a>
        </div>
        

        <div class="card">
           <h3 class="text-center">Add New Word</h3>
            <div class="card-header">
                <form action="server.php" method="post">
                   
                   <input type="hidden" name="id" value="<?php echo $id ?>">
                   
                    <div class="form-group">
                        <label>Bangla </label>
                        <input type="text" class="form-control" placeholder="Bangla" name="bangla"  value="<?php echo $bangla; ?>">
                    </div>
                    
                    <div class="form-group">                                     
                        <label>English</label>
                        <input type="text" class="form-control" placeholder="English" name="english" value="<?php echo $english; ?>">
                    </div>
                    
                    <?php if ($edit_state==false): ?>
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                    <?php else: ?>
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                    <?php endif ?>

                    
                </form>
            </div>
            
            
            <div class="card-body">


                <table class="table table-bordered table-sm ">
                   <h3 class="text-center">Word List</h3>
                    <thead>
                        <tr>
                        
                            <td width="40%"><b>Bangla</b></td>

                            <td width="40%"><b>English</b></td>

                            <td width="20%"><b>Action</b></td>
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

                            <td>
                                <a class="btn btn-info " href="loginpage.php? edit=<?php echo $row['id']; ?>">Edit</a>
                                <a class="btn btn-danger " href="server.php? del=<?php echo $row['id']; ?>">Delete</a>

                            </td>
                        </tr>
                        <?php }?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



<?php include 'pffooter.php'?>







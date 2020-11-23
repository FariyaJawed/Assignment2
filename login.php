<?php include_once("./header.php") ?>
    <h1> LOGIN </h1>
    
   


    <!-- SUBMIT QUERY -->
    <?php
    isset($_SESSION['user_id']) ? header('location:http://localhost/p2c4/Assignment2/account.php'): '';
    if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']))
    {
        $error  =  [];
        $query  =  "SELECT * from users where email = '{$_POST['email']}' ";
        $result =  mysqli_query($link,$query);
        if(mysqli_num_rows($result) > 0)
        {
            $users = mysqli_fetch_assoc($result);
            if(password_verify($_POST['password'],$users['password']))
            {
                $_SESSION['user_id'] = $users['id'];
                header('location:http://localhost/p2c4/Assignment2/index.php');
            }
            else
            {
                $error['password'] = "Incorrect password";
                
            }
        }
        else
        {
            $error['email'] = "Email address do not exist"; 
           
        } 
    }
    ?>
    
 <!-- FORM -->
 <form method="POST" >
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name = 'email' type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
             <?php echo isset($error['email']) ? "<div class='alert alert-danger' role='alert'> {$error['email']} </div>" : ''  ?>
            
         </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name = 'password' type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            <?php echo isset($error['password']) ? "<div class='alert alert-danger' role='alert'> {$error['password']} </div>" : ''  ?>
            <a class='btn btn-Link' href='./registration.php'> Click here for registration </a>
        </div>
        <button name = 'submit' type="submit" class="btn btn-primary">Submit</button>
    </form>


<?php include_once("./FOOTER.php") ?> 

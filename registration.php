<?php include_once("./header.php") ?>
    <h1> REGISTRATION </h1>
    
 
   

   <!-- FORM -->
   <form method = "POST" id='registration-form'>
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input  name = 'user_namee' class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter Name">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name = 'email' type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <?php echo isset($errors['emailexists']) ? "<div class='alert alert-danger' role='alert'> {$errors['emailexists']} </div>" : ''  ?> 
         </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name = 'passwordd' type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputConfirmPassword1">Confirm Password</label>
            <input name = 'confirm_password' type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Confirm Password">
            <?php echo isset($errors['password']) ? "<div class='alert alert-danger' role='alert'> {$errors['password']} </div>" : ''  ?>
        </div>
        <?php echo isset($errors['fields']) ? "<div class='alert alert-danger' role='alert'> {$errors['fields']} </div>" : ''  ?>
        <button name = 'submit' type="submit" class="btn btn-primary submit-form">Submit</button>
        <?php echo isset($success['message']) ? "<div class='alert alert-success' role='alert'> {$success['message']} </div>" : ''  ?>
    </form>


<?php include_once("./footer.php") ?> 

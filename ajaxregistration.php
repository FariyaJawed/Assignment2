<?php
    
 require_once('./connection.php');

isset($_SESSION['user_id']) ? header('location:http://localhost/p2c4/Assignment2/index.php'): '';

   if(isset($_POST['user_namee'])) 
   {  
    $success =[];
    $errors = [];
    $query_email = "SELECT * from users where email = '{$_POST['email']}' ";
    $result      = mysqli_query($link,$query_email); 
    if(mysqli_num_rows($result) <= 0 )
    { 
        if(!empty($_POST['user_namee']) && !empty($_POST['email']) && !empty($_POST['passwordd']) && !empty($_POST['confirm_password']))
        {
            if($_POST['passwordd'] == $_POST['confirm_password'])
                { 
                    $password = password_hash($_POST['passwordd'],PASSWORD_DEFAULT);
                    $query    = "INSERT into users(`name`,`email`,`password`) values ( '{$_POST['user_namee']}' , '{$_POST['email']}' , '$password')";
                    $result   = mysqli_query($link,$query);
                    if($result)
                    { 
                  
                        echo json_encode(['status' => 'success', 'message' => 'Account has been created']);  

                    } 
                    if(!$result)
                    { 
                        echo mysqli_error($link);
                    }
                }
            else
                { 
                    echo json_encode(['status' => 'error', 'message' => 'INCORRECT PASSWORD']);  
                    
                } 
        }
        else
                {
                   
                    echo json_encode(['status' => 'error', 'message' => 'ALL FIELDS ARE REQUIRED']); 
                }
        }
        
    else
    {
        echo json_encode(['status' => 'error', 'message' => 'Email already taken']); 
    }
   }
   
   
?>

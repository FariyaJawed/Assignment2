<?php
    require('./connection.php')
?>
<?php
    // Display data in table
    if(isset($_POST['readRecord']))
    {
        $data = '<table class = "table table-bordered table-striped">
                    <tr>
                        <th>No . </th>
                        <th> Brand/Company </th> 
                        <th> Edit action </th> 
                        <th> Delete action</th> 
                    </tr>';
        $display_query = "SELECT * from `brands` ";
        $result = mysqli_query($link,$display_query);

        if(mysqli_num_rows($result) > 0)
        {
            $number = 1;
            while($row = mysqli_fetch_array($result))
            {
                $data .= '<tr>
                    <td>'.$number.'</td>
                    <td>'.$row['brand'].'</td>
                    <td>
                        <button onclick="GetUserDetails('.$row['id'].')"
                        class = "btn btn-warning"> Edit </button>
                    </td>
                    <td>
                        <button onclick="DeleteUser('.$row['id'].')" 
                        class = "btn btn-danger"> Delete </button>
                    </td>
                    </td>';
                    $number++;
    
            }
        }
         $data .= '</table>';
          echo $data;
    };
    // Insert Record
    if(isset($_POST['brand'])){
        
          $query = "INSERT into brands(`brand`) Value( '{$_POST['brand']}' )";
          $result = mysqli_query($link,$query);
    };
    // Delete record
    if(isset($_POST['deleteid']))
    {
        $userid = $_POST['deleteid'];
        $query = "DELETE from brands where id = '$userid' ";
        $result = mysqli_query($link,$query);
    }

    // Get user id for update
    if(isset($_POST['id']) && isset($_POST['id']) != "")
    {
        $user_id = $_POST['id'];
        $query = "SELECT * from brands where id = '$user_id' ";
        if(!$result = mysqli_query($link,$query)) {
            exit(mysqli_error());
        }
        $response = array();

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $response = $row;
            }
        }
        else{
            $response['status'] = 200;
            $response['message'] = "Data not found";
        }
        //php has built in function to handle json objcts in php ca be converted into json using this func
        echo json_encode($response);
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Invalid Request!";
    }

// Update table
if(isset($_POST['hidden_user_idupd']))
{
    $hidden_user_idupd = $_POST['hidden_user_idupd'];
    $brandupd = $_POST['brandupd'];
    $queryy = " UPDATE `brands` SET `brand`= '$brandupd' WHERE id = 'hidden_user_idupd'  ";
    $result = mysqli_query($link,$queryy);
}
?>
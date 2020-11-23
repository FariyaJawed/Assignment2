<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php require_once('./header.php') ?>
<?php !isset($_SESSION['user_id']) ? header('location:http://localhost/p2c4/Assignment2/login.php'): ''; ?>
<body>
        <h1 class = 'text-primary text-center'> Brand crud </h1>
        <div class = 'd-flex justify-content-end'>
            <button type = 'button' class = 'btn btn-primary' data-toggle = 'modal' data-target = '#myModal'> INSERT </button>
        </div>
        <div>
          <h2 class = 'text-primary'>All records</h2>
          <div id = 'record-content'></div>
        </div>
    <!-- The Modal -->
    <div class="modal" id="myModal">
    <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Brand crud</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <!-- FORM -->
        <form method = 'POST'>
            <div class = 'form-group'>
                <label> Name : </label>
                <input type = 'text' class = 'form-control' id = 'brand' name = 'brand' placeholder = 'BRAND'>
            </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal" onclick = 'AddRecord()'>Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
    </div>
    </div>
  <!--   /////////////////////////////////////Update Model//////////////////////////////////////////////////////////////////////////////-->
    <!-- The Modal -->
    <div class="modal" id="update_user_modal">
    <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Brand crud</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <!-- FORM -->
        <form method = 'POST'>
            <div class = 'form-group'>
                <label for='update_brand'> Name : </label>
                <input type = 'text' class = 'form-control' id = 'update_brand' name = 'brand' placeholder = 'BRAND'>
            </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal" onclick = 'updateUserDetail()'>Save</button>
      <input type = 'hidden' name = '' id= 'hidden_user_id'>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
    </div>
    </div>
    <?php require_once('./footer.php') ?>

    </body>
</html>

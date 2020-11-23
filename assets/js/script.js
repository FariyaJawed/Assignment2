$(document).ready(function(){
    $('.submit-form').on('click',function(event){ 
        event.preventDefault();
        const userData = {};
        document.querySelectorAll('input').forEach(element => {
            userData[element.name] = element.value;
            
        });
        console.log(userData)
        $.ajax({
            data:userData,
            url:'ajaxregistration.php',
            type:'POST',
            dataType : 'JSON',
            success:function(response){
                // response = JSON.parse(response)
                // console.log(response)
                swal({
                    title: "",
                    text: response.message,
                    icon: response.status,
                  }).then(()=> {
                      if(response.status == 'success'){
                        window.location.href = 'http://localhost/p2c4/Assignment2/login.php'
                      }
                    
                  });
            }
        })
    } )
})


// show records after insert
function readRecords()
{
    var readRecord = 'readRecord';
    $.ajax({
        url:'insert.php',
        type:'POST',
        data:{ readRecord:readRecord },
        success:function(data,status){
            $('#record-content').html(data);

        }
    })
}
// Add records to db
function AddRecord()
{
    var brand = $('#brand').val();

    $.ajax({
        url:'insert.php',
        type:'POST',
        data:{ brand:brand, 
         },
         success:function(data,status){
             readRecords()
         }
    })
}
// Delete records
function DeleteUser(deleteid){
    var conf = confirm(" Are you sure you want to delete this reocrd? ");
    if(conf == true)
    {
        $.ajax({
            url:'insert.php',
            type:'POST',
            data:{ deleteid:deleteid },
            success:function(data,status){
                readRecords();
            }
        });
    }
}
// Update records
function GetUserDetails(id){
    $('#hidden_user_id').val(id);
    $.post("insert.php", {  
        id:id
    }, function(data,staus){
        var user = JSON.parse(data);
        $('#update_brand').val(user.brand);
    }

    );
    $('#update_user_modal').modal("show");
}

function updateUserDetail()
{
    var brandupd = $('#update_brand').val();

    var hidden_user_idupd = $('#hidden_user_id').val();
    $.post("insert.php",{
        hidden_user_idupd:hidden_user_idupd,
        brandupd:brandupd,
    },
    function(data,status){
    $('#update_user_modal').modal("hide");
    readRecords();
    }
    );
}
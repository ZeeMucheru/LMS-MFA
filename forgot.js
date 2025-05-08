$(document).ready(function () {
    
    $('#email').on('input', function () {
        checkemail();
        
    });
    
   
    $("#forgotBtn").click(function () {
        
        if (!checkemail()) {
            $("#forgot_message").html(`<div class="alert alert-warning">Please fill in the required field</div>`);

        } else {
            console.log("ok");
            $("#forgot_message").html("");
            var form = $('#forgotForm')[0];
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: "forgot_action.php",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                beforeSend: function () {
                    $('#forgotBtn').html('<i class="fa-solid fa-spinner fa-spin"></i> Submiting');
                    $('#forgotBtn').attr("disabled", true);
                    
                },
                success: function (data) {
                    $('#forgot_message').html(data);
                    
                },
                complete: function () {
                    
                    setTimeout(function () {
                        
                        $('#forgotBtn').html('<i class="fa fa-save"></i> Submit');
                        $('#forgotBtn').attr("disabled", false);
                        
                    }, 1000);
                        
                    
                    
                    
                }
            });
        }
    });
    

});

function checkemail() {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ($('#email').val().length == "") {
        $('#invalid_email').html('Can not be empty!');
        $('#valid_email').html('');
        return false;
    } else if(!regex.test($('#email').val())){
        $('#invalid_email').html('Invalid email address!');
        $('#valid_email').html('');
        return false;

    }else {
        $('#invalid_email').html('');
        $('#valid_email').html('Looks good!');
        return true;
    }
}


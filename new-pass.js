$(document).ready(function () {
    
    $('#password').on('input', function () {
        checkpassword();
        
    });
    $('#confirm_password').on('input', function () {
        checkconfirm_password();
        
    });
   
    $("#resetBtn").click(function () {
        
        if (!checkpassword() && !checkconfirm_password()) {
            $("#reset_message").html(`<div class="alert alert-warning">Please fill in the required field</div>`);

        }else if(!checkpassword() || !checkconfirm_password()){
            $("#reset_message").html(`<div class="alert alert-warning">Please fill in the required field</div>`);

        } else {
            console.log("ok");
            $("#reset_message").html("");
            var form = $('#resetForm')[0];
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: "reset_action.php",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                beforeSend: function () {
                    $('#resetBtn').html('<i class="fa-solid fa-spinner fa-spin"></i> reseting');
                    $('#resetBtn').attr("disabled", true);
                    
                },
                success: function (data) {
                    $('#reset_message').html(data);
                    
                    
                },
                complete: function () {
                    //$('#resetForm').trigger("reset");
                    setTimeout(function () {
                        $('#reset_message').html(data);
                        $('#resetBtn').html('<i class="fa fa-save"></i> reset');
                        $('#resetBtn').attr("disabled", false);
                    }, 1000);
                        
                    
                    
                    
                }
            });
        }
    });
    

});

function checkpassword() {
    var number = /([0-9])/;
	var alphabets = /([a-zA-Z])/;
	var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
	var password = $('#password').val().trim();
    if ($('#password').val().length == "") {
        $('#invalid_password').html('Can not be empty!');
        $('#valid_password').html('');
        return false;
    } else if (password.length < 8) {
		$('#invalid_password').html('Password should be atleast 8 characters!');
        $('#valid_password').html('');
        return false;
	} else if (password.match(number) && password.match(alphabets) && password.match(special_characters)){
        $('#invalid_password').html('');
        $('#valid_password').html('Looks good!');
        return true;
		
	}else{
        $('#invalid_password').html('Password must contain UPPERCASE, NUMBER and SPECIAL CHARS!');
        $('#valid_password').html('');
        return false;

    }
}
function checkconfirm_password() {
    var pswd = $('#password').val();
    if ($('#confirm_password').val().length == "") {
        $('#invalid_confirm_password').html('Can not be empty!');
        $('#valid_confirm_password').html('');
        return false;
    } else if($('#confirm_password').val() != pswd){
        $('#invalid_confirm_password').html('Password does not match!');
        $('#valid_confirm_password').html('');
        return false;
    }else {
        $('#invalid_confirm_password').html('');
        $('#valid_confirm_password').html('Looks good!');
        return true;
    }
}


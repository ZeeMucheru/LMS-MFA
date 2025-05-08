$(document).ready(function () {
    
    $('#f_name').on('input', function () {
        checkf_name();
        
    });
    $('#l_name').on('input', function () {
        checkl_name();
        
    });
    $('#email').on('input', function () {
        checkemail();
        
    });
    $('#phone').on('input', function () {
        checkphone();
        
    });
    $('#file').on('input', function () {
        checkfile();
        
    });
    $('#password').on('input', function () {
        checkpassword();
        
    });
    $('#confirm_password').on('input', function () {
        checkconfirm_password();
        
    });
   
    $("#registerBtn").click(function () {
        
        if (!checkf_name() && !checkl_name() && !checkemail() && !checkphone() && !checkfile() && !checkpassword() && !checkconfirm_password()) {
            $("#register_message").html(`<div class="alert alert-warning">Please fill in the required field</div>`);

        }else if(!checkf_name() || !checkl_name() || !checkemail() || !checkphone() || !checkfile() || !checkpassword() || !checkconfirm_password()){
            $("#register_message").html(`<div class="alert alert-warning">Please fill in the required field</div>`);

        } else {
            console.log("ok");
            $("#register_message").html("");
            var form = $('#registerForm')[0];
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: "register_action.php",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                beforeSend: function () {
                    $('#registerBtn').html('<i class="fa-solid fa-spinner fa-spin"></i> Registering');
                    $('#registerBtn').attr("disabled", true);
                    
                },
                success: function (data) {
                    $('#register_message').html(data);
                    
                    
                },
                complete: function () {
                    //$('#registerForm').trigger("reset");
                    setTimeout(function () {
                        $('#register_message').html(data);
                        $('#registerBtn').html('<i class="fa fa-save"></i> Register');
                        $('#registerBtn').attr("disabled", false);
                    }, 1000);
                        
                    
                    
                    
                }
            });
        }
    });
    

});
//!checkf_name() && !checkl_name() && !checkemail() && !checkphone() && !checkfile() && !checkpassword() && !checkconfirm_password()
function checkf_name() {
    if ($('#f_name').val().length == "") {
        $('#invalid_f_name').html('Can not be empty!');
        $('#valid_f_name').html('');
        return false;
    } else {
        $('#invalid_f_name').html('');
        $('#valid_f_name').html('Looks good!');
        return true;
    }
}
function checkl_name() {
    if ($('#l_name').val().length == "") {
        $('#invalid_l_name').html('Can not be empty!');
        $('#valid_l_name').html('');
        return false;
    } else {
        $('#invalid_l_name').html('');
        $('#valid_l_name').html('Looks good!');
        return true;
    }
}
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
function checkphone() {
    if ($('#phone').val().length == "") {
        $('#invalid_phone').html('Can not be empty!');
        $('#valid_phone').html('');
        return false;
    } else if(!$.isNumeric($('#phone').val())){
        $('#invalid_phone').html('Must be a valid number!');
        $('#valid_phone').html('');
        return false;
    }else if($('#phone').val() < 10){
        $('#invalid_phone').html('Must be a 10 digit number!');
        $('#valid_phone').html('');
        return false;
    }else {
        $('#invalid_phone').html('');
        $('#valid_phone').html('Looks good!');
        return true;
    }
}
function checkfile() {
    var fileName = $('#file').val();
    if(!fileName) { // returns true if the string is not empty
        $('#invalid_file').html('Can not be empty!');
        $('#valid_file').html('');
        return false;
    } else { // no file was selected
        $('#invalid_file').html('');
        $('#valid_file').html('Looks good!');
        return true;
    }
    
}
function checkpassword() {
    var number = /([0-9])/;
	var alphabets = /([a-zA-Z])/;
	var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
	var password = $('#password').val().trim();
	if (password.length < 8) {
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


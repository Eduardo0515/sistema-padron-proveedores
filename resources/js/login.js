'use strict';

var Login = function() {

    var handleLogin = function() {
        /*jQuery.validator.addMethod("matches", function(phone_number, element) {
                phone_number = phone_number.replace(/\s+/g, "");
                return this.optional(element) || phone_number.length > 9 && 
                phone_number.match(/([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/);
            }, "Ingrese número de celular válido");*/

        $('form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                email: {
                    required: true,
                    email:true
                },
                password: {
                    required: true
                }
            },

            messages: {
                email: {
                    required: "Ingrese Usuario",
                    email:"Ingrese un email"
                },
                password: {
                    required: "Contraseña requerida."
                }
            },
            invalidHandler: function(event, validator) { //display error alert on form submit   
                //$('.alert-danger', $('.login-form')).show();
                $('.alert-danger').show();
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                form.submit(); // form validation success, call ajax form submit
            }

            /*invalidHandler: function(event, validator) { //display error alert on form submit   
                //$('.alert-danger', $('.login-form')).show();
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                //error.insertAfter(element.closest('.input-icon'));
                error.insertAfter(element);

            },

            submitHandler: function(form, event) {
                event.preventDefault();
                login();
                //form.submit(); // form validation success, call ajax form submit
            }*/
        });
        
        $('.login-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });
    }

    return {
        init: function() {
            handleLogin();
        }
    };
}();

$(document).ready(function() {
    Login.init();
});

/*function login(){
    $.ajax({
        url: 'login',
        type: 'POST',
        //data: $('form').serialize(),
        data: $('form').serializeArray(),
    }).done(function(response){
        console.log(response);
        /*if(response.success){
            window.location.href = "/inicio";
        }else{
            //$('.alert-danger', $('.login-form')).show();
           // $('.alert-danger').show();
           alert("Hola")
           $( ".alert-danger" ).removeClass( "hide" );
        }*/
    /*}).fail(function (jqXHR, textStatus, error) {
        console.log("Post error: " + error);
    });
}*/
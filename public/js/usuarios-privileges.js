'use strict';
var FormValidation = function () {

    var handleValidation1 = function() {

            var form1 = $('#form1');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    username: {
                        required: "Obligatorio"
                    },
                    password: {
                        required: "Obligatorio"
                    },
                    re_password: {
                        required: "Obligatorio", 
                        equalTo: "No Coicide con la Contraseña",
                    },
                    nombre: {
                        required: "Obligatorio"
                    },
                    apellidos: {
                        required: "Obligatorio"
                    },
                    id_municipio: {
                        required: "Obligatorio"
                    },
                    tel_oficina: {
                        required: "Obligatorio"
                    },
                    extensiones: {
                        required: "Obligatorio"
                    },
                    celular: {
                        required: "Obligatorio"
                    }
                },
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    re_password: {
                        required: true,
                        equalTo: "#password"
                    },
                    nombre: {
                        required: true
                    },
                    apellidos: {
                        required: true
                    },
                    id_municipio: {
                        required: true
                    },
                    tel_oficina: {
                        required: true
                    },
                    extensiones: {
                        required: true
                    },
                    celular: {
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var icon = $(element).parent('.input-icon').children('i');
                    icon.removeClass('fa-check').addClass("fa-warning");  
                    icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                    error.insertAfter(element); // Mensaje del input error placement
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    
                },

                success: function (label, element) {
                    var icon = $(element).parent('.input-icon').children('i');
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    icon.removeClass("fa-warning").addClass("fa-check");
                }

                
            });
    }
    
    var handleSubmit1 = function() {

            var formOpciones = {
                beforeSubmit: function()
                {
                    if(!$('#form1').valid())
                    {
                        
                        bootbox.alert("<strong>Cometio un error.</strong><br><br><pre>Verifique la información y vuelva a intentarlo.</pre>");
                        return false;
                    }
                    else {
                        
                        $("#btnSave").attr('disabled', 'true');
                    }
                },
                url: url_route+'/privilegios/'+$('#id_registro').val(),
                type: 'PUT',
                data: $('#form1').serialize(),
                success: function(response)
                {
                    //console.log(response);
                    $("#btnSave").removeAttr('disabled');
                    if(response.success==true)
                    {           
                    
                        
                        bootbox.alert("<strong>Mensaje del Sistema</strong><br><br><pre>"+response.message+"</pre>", function(){ 
                            window.parent.$('#ModalInfo').modal('toggle');
                        });
                        //bootbox.alert("<strong>Mensaje del Sistema</strong><br><br><pre>"+response.message+"</pre>");

                    }else 
                    {
                        bootbox.alert("<strong>Ocurrio un error.</strong><br><br><pre>"+response.message+"</pre>");
                    }
                    

                    
                    
                },
                timeout:60000,
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    $("#btnSave").removeAttr('disabled');
                    bootbox.alert("<strong>Ocurrio un error de Network. Intentalo de nuevo.</strong><br><br><pre>"+errorThrown+"</pre>");
                }
            };
            
            $('#form1').ajaxForm(formOpciones);


    }

    
    return {
        //main function to initiate the module
        init: function () {
            handleValidation1();
            handleSubmit1();

        }

    };

}();

$(document).ready(function(){
    FormValidation.init();
    
});


function togglePrivilegio(that){
    if($(that).hasClass('bg-success')){
        $(that).removeClass('bg-success').addClass('bg-danger');
        $(that).find('i').removeClass('fas fa-check').addClass('fas fa-ban');
        $(that).find('input').val("0");
    }
    /*else if($(that).hasClass('blue')){
        $(that).removeClass('blue').addClass('bg-danger');
        $(that).find('i').removeClass('fas fa-check').addClass('fas fa-ban');
        $(that).find('input').attr('name', 'clave');
    }*/
    else if($(that).hasClass('bg-danger')){
        /*if($(that).hasClass('LandingPage')){
            $(".LandingPage").removeClass('blue').addClass('bg-danger');
            $(".LandingPage").find('i').removeClass('fas fa-check').addClass('fas fa-ban');
            $(".LandingPage").find('input').attr('name', 'clave');
            $(that).removeClass('bg-danger').addClass('blue');
            $(that).find('i').removeClass('fas fa-ban').addClass('fas fa-check');
            $(that).find('input').attr('name', 'LandingPage');
        }
        else{*/
            $(that).removeClass('bg-danger').addClass('bg-success');
            $(that).find('i').removeClass('fas fa-ban').addClass('fas fa-check');
            $(that).find('input').val("1");
        //}
    }
}

function toglePrivilegiosTodos(that){
    if($(that).hasClass('bg-success')){
        $(".td-privilegios a").removeClass('bg-danger').addClass('bg-success');
        $(".td-privilegios a").find('i').removeClass('fas fa-ban').addClass('fas fa-check');
        $(".td-privilegios a").find('input').val("1");
    }
    else if($(that).hasClass('bg-danger')){
        $(".td-privilegios a").removeClass('bg-success').addClass('bg-danger');
        $(".td-privilegios a").find('i').removeClass('fas fa-check').addClass('fas fa-ban');
        $(".td-privilegios a").find('input').val("0");
        //$(".LandingPage").removeClass('blue').addClass('bg-danger');
        //$(".LandingPage").find('i').removeClass('fas fa-check').addClass('fas fa-ban');
    }
}
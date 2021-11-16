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
                    dependencia_id: {
                        required: "Obligatorio"
                    },
                    tel_oficina: {
                        required: "Obligatorio"
                    },
                    extension: {
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
                        required: false
                    },
                    re_password: {
                        required: false,
                        equalTo: "#password"
                    },
                    nombre: {
                        required: true
                    },
                    apellidos: {
                        required: true
                    },
                    dependencia_id: {
                        required: true
                    },
                    tel_oficina: {
                        required: false
                    },
                    extension: {
                        required: false
                    },
                    celular: {
                        required: false
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                },

                /*errorPlacement: function (error, element) { // render error placement for each input type
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
                    
                },*/
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                  unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
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
                url: url_route+'/usuarios/'+$('#id_registro').val(),
                type: 'PUT',
                data: $('#form1').serialize(),
                success: function(response)
                {
                    //console.log(response);
                    $("#btnSave").removeAttr('disabled');
                    if(response.success==true)
                    {           
                        //alert("Enviar A Guardar")
                        /*$("#numero_economico").val('');
                        $("#numero_serie").val('');
                        $("#nombre_comercial").val('');
                        $("#marca").val('');
                        $("#modelo").val('');
                        $("#id_tipo_vehiculo option[value='']").prop("selected",true);
                        $("#numero_pasajeros").val('');
                        $("#numero_placa").val('');
                        $("#capacidad_tanque").val('');
                        $("#id_estatus option[value='']").prop("selected",true);*/
                        
                         bootbox.alert("<strong>Mensaje del Sistema</strong><br><br><pre>"+response.message+"</pre>", function(){ 
                            location.href =url_route+"/usuarios";
                        });

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
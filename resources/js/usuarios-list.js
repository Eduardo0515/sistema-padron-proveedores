'use strict';
let $datosTabla=$("#datosTabla");

jQuery.browser = {};
(function () {
    jQuery.browser.msie = false;
    jQuery.browser.version = 0;
    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;
    }

    

    /*$("#input_busq").keyup(function(e) {
        if($(this).val().length==0){
            get_datosTablaIni();
        }
    });

    $("#input_busq").keypress(function(e) {
        if(e.which == 13 && $(this).val().length>0) {
          get_datosTablaIni();
        }
    });


    $("#input_busq_seccion").keyup(function(e) {
        if($(this).val().length==0){
            get_datosTablaIni();
        }
    });

    $("#input_busq_seccion").keypress(function(e) {
        if(e.which == 13 && $(this).val().length>0) {
          get_datosTablaIni();
        }
    });

    $("#btnExportar").click( function(){
        window.open("/exportar-unoxdiez?parameters="+Base64.encode($("#form-filtro").serialize()) , '_blank');
    });


    $("#search-promovidos").click( function(){
        get_datosTablaIni();
    });*/

    

    /*

        // abrir flotada de filtro
    $abrirFiltro.on('click', function () {
        $formFiltro.show(0)
        $cerrarFiltro.show(0)
        $abrirFiltro.hide(0)
    })
    $cerrarFiltro.on('click', function () {
        $formFiltro.hide(0)
        $cerrarFiltro.hide(0)
        $abrirFiltro.show(0)
    })*/

})();

/*$.fn.center = function () {
    this.css("position","fixed");
    this.css("top", ($(window).height() - this.height()) / 2+$(window).scrollTop() + "px");
    this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
    return this;
}*/

/*function loader(opt){
    if(opt=="block" && $(".blockOverlay").length==0){
        App.blockUI({
            target: 'body',
            boxed: true,
            textOnly: true,
            message: '<i class="fa fa-spinner fa-spin"></i> Cargando...'
        });
        $('.blockUI.blockMsg').center();
    }
    else if(opt=="unblock"){
        window.setTimeout(function() {
            App.unblockUI('body');
        }, 300);
    }
}*/

$(document).ready(function(){
    
    get_datosTablaIni();
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');
       var page=$(this).attr('href').split('page=')[1]; 
        get_datosTabla(page);
        window.history.pushState("", "", url);
    });


    
    /*$responsableID.on('change', function(){
        //alert($responsableID.val())
        if($responsableID.val()!=='-1' && $responsableID.val()!=='')
        {
            get_datosTablaIni()
                
        } else{
            get_datosTablaIni()
        }
    });*/

});

function get_datosTabla(page) {
            $.ajax({ 
                url:'usuarios/?act=list&page='+page,
                type: "GET", //GET,POST,PUT,DELETE
                dateType:'json',
                //data:$formFiltro.serialize()
                data:{sid:Math.random()}

            })
            .done(function(response){
                if(response.success==true){
                    $datosTabla.html(response.html);
                }
            }).fail(function (jqXHR, textStatus, error) {
                console.log("Post error: " + error);
            });
}

function get_datosTablaIni() {
  //loader("block");
            $.ajax({ 
                url:'usuarios/?act=list',
                type: "GET",//GET,POST,PUT,DELETE
                dateType:'json',
                data:{sid:Math.random()}
            })
            .done(function(response){
                if(response.success==true){
                    $datosTabla.html(response.html);
                }
            }).fail(function (jqXHR, textStatus, error) {
                console.log("Post error: " + error);
            });
}
function f_popup_info(url,title) { //Ver planilla 
    $("#ModalTitleInfo").html(title);
    $.ajax({
      type: "GET",
      url:url,
      cache: false,
      data: {sid:Math.random()},
      async:false,
      success: function(datos){
      //alert("Datos Info"+datos);
        
        $("#ModalBody").html(datos);
        //$('#ModalInfo').modal('show');
        $('#ModalInfo').modal('toggle');
        //alert(lat+"/"+lng)
        },
      timeout:60000,
      error: function(XMLHttpRequest, textStatus, errorThrown) { 
        bootbox.alert("<strong>Ocurrio un error.</strong><br><br><pre>Intente de Nuevo ha excedido el limite de Tiempo</pre>"); 
      }

    }); 
}


function f_delete_row(url,title) { //Ver planilla 
    bootbox.confirm({
        message: "Deseas eliminar el usuario"+ title +"?",
        buttons: {
            confirm: {
                label: 'Si',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            console.log('This was logged in the callback: ' + result);
            if(result==true){
                $.ajax({ 
                    url:url,
                    type: "delete",//GET,POST,PUT,DELETE
                    dateType:'json',
                    data:{sid:Math.random()}
                })
                .done(function(response){
                    if(response.success==true){
                        get_datosTablaIni();
                        bootbox.alert(response.message); 
                    }
                }).fail(function (jqXHR, textStatus, error) {
                    console.log("Post error: " + error);
                });
            }
            
        }
    });
}


$(document).ready(function(){

    $(".simbolo").on({
        mouseenter: function(){
            $(this).css("color", "chocolate");
          },

        mouseleave: function(){
        $(this).css("color", "cornflowerblue");
        },

        click: function(){
            $(this).css("color", "chocolate");
            var signo = $(this).attr("name");
            var parent = $(this).parent();
            var kids = $(parent).children();

            jQuery.each( kids, function( i, val ) {
                if($(val).attr("class") == 'cantidad'){
                    var numero = parseInt($(val).html());
                    if (signo=="plus"){
                        var NewNumero = numero + 1;
                    }else{
                        if(numero >0){
                            var NewNumero = numero - 1;
                        }
                    }
                    $(val).text(NewNumero);
                
                console.log($(val).html());
                var obj = $(parent).find('.cantidad');
                var submitter = $(parent).find('.sender');
                var linkValue = submitter.attr('href')
                console.log(linkValue);
                var editedLink = linkValue.slice(0,48) + NewNumero;
                console.log(editedLink);
                $(submitter).attr('href', editedLink);


                }; //if
            }); //each
        } //click/function
    });


});
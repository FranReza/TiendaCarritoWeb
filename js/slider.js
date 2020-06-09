$(document).ready(function (){
    var imgitems = $('.slider li').length; //obtenemos la cantidad de slides
    var imgPos = 1;
    
    for (var index = 1; index <= imgitems; index++) {
        $('.pagination').append('<li><span class="far fa-circle"></span></li>'); //agregamos cada botonsito por cada slide
    }

    $('.slider li').hide(); //ocultamos todos los slides
    $('.slider li:first').show(); //mostramos el primer slide
    $('.pagination li:first').css({'color': '#CD6E2E;'});

    //ejecutamos todas las funciones
    $('.pagination li').click(pagination);
    $('.right span').click(nextSlider);
    $('.left span').click(prevSlider);

    setInterval(() => {
        nextSlider();
    }, 7000);

    //funciones
    function pagination(){ 
        var paginationPos = $(this).index()+1;
        $('.slider li').hide();
        $('.slider li:nth-child('+paginationPos+')').fadeIn();
        $('.pagination li').css({'color':'#858585'});
        $(this).css({'color':'#CD6E2E'});
        imgPos = paginationPos;
    }

    function nextSlider(){
        
        if (imgPos >= imgitems) {
            imgPos = 1;
        } else {
            imgPos++;
        }
        $('.pagination li').css({'color':'#858585'});
        $('.pagination li:nth-child('+imgPos+')').css({'color':'#CD6E2E'});
        $('.slider li').hide();
        $('.slider li:nth-child('+imgPos+')').fadeIn();   
    }

    function prevSlider(){
        if (imgPos <= 1) {
            imgPos = imgitems;
        } else {
            imgPos--;
        }
        $('.pagination li').css({'color':'#858585'});
        $('.pagination li:nth-child('+imgPos+')').css({'color':'#CD6E2E'});
        $('.slider li').hide();
        $('.slider li:nth-child('+imgPos+')').fadeIn();   
    }
});
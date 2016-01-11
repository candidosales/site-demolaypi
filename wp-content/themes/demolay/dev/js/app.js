$(document).ready(function(){

    $(document).foundation({
      custom_back_text: true, // Set this to false and it will pull the top level link name as the back text
      back_text: 'Voltar' // Define what you want your custom back text to be if custom_back_text: true
    });
    
    $('#main').children().hover(function() {
          $(this).siblings().stop().fadeTo(500, 0.3);
        }, function() {
          $(this).siblings().stop().fadeTo(500, 1);
      });

    $("a.icon-switch").each(function(i,e){
         if(/(pdf)$/i.test($(this).attr('href'))){
            $(this).children().attr({
              class: 'icon-file-pdf'
            })
         }

         if(/(pptx)$/i.test($(this).attr('href'))){
            $(this).children().attr({
              class: 'icon-file-powerpoint'
            })
         }

         if(/(ppt)$/i.test($(this).attr('href'))){
            $(this).children().attr({
              class: 'icon-file-powerpoint'
            })
         }

         if(/(doc)$/i.test($(this).attr('href'))){
            $(this).children().attr({
              class: 'icon-file-word'
            })
         }

         if(/(xls)$/i.test($(this).attr('href'))){
            $(this).children().attr({
              class: 'icon-file-excel'
            })
         }
      });
      
      $('#carousel').slick({
        adaptiveHeight: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 2000
      });
});
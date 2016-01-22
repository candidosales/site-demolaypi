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

    $('a.icon-switch').each(function(i,e) {
        
        var href = $(this).attr('href'),
            $icon = $(this).find('.icon');
        
         if(/(pdf)$/i.test(href)) {
            $icon.attr({
              class: 'icon-file-pdf'
            });
         }

         if(/(ppt)$/i.test(href) || /(pptx)$/i.test(href)) {
            $icon.attr({
              class: 'icon-file-powerpoint'
            });
         }

         if(/(doc)$/i.test(href) || /(docx)$/i.test(href)) {
            $icon.attr({
              class: 'icon-file-word'
            });
         }

         if(/(xls)$/i.test(href) || /(xlsx)$/i.test(href)) {
            $icon.attr({
              class: 'icon-file-excel'
            });
         }
      });
      
      $('#carousel').slick({
        adaptiveHeight: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 2000
      });
});
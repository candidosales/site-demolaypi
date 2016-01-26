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
      
      var feed = new Instafeed({
        get: 'tagged',
        tagName: 'gcepi',
        sortBy: 'most-recent',
        resolution: 'thumbnail',
        clientId: '93040b037d024bd591f54d1ce5c6e518',
        accessToken: '33412004.1677ed0.a45dfc2d8ac1483caf41348d0ff39b3d',
        template: '<a href="{{link}}" class="has-tip tip-top" data-tooltip aria-haspopup="true" title="{{caption}}" target="_blank"><img src="{{image}}" /></a>',
        success: function() {
            $(document).foundation({
                tooltip: {
                    selector : '.has-tip',
              }
            });
        },
    });
    
    feed.run();
});
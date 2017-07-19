var webmechanic_yandexmarket = '.webmechanic_yandexmarket .feedback_slider'; 

$(document).ready(function () {   
   
   if ($(webmechanic_yandexmarket).find('ul').length > 0) {
       if ($(webmechanic_yandexmarket).length > 0) webmechanic_yandexmarket_init($(webmechanic_yandexmarket));
   }
   else
   {
       BX.ready(function(){
         if ($(webmechanic_yandexmarket).length > 0) webmechanic_yandexmarket_init($(webmechanic_yandexmarket));
       });       
   };        

})

function webmechanic_yandexmarket_init(feedback_slider) {     
      
    var current_element = feedback_slider;
    var feedback_slider_width = 0; var additional_padding = 0;
        
    //Trying to find width of the first parent element    
    while (!feedback_slider_width) {
      current_element = current_element.parent();  
      feedback_slider_width = current_element.width();
      //if it's no possible go to the next parent element (upper on the DOM-tree)
      if (!feedback_slider_width) additional_padding = 60;
    };         
        
    feedback_slider_width = current_element.width() - additional_padding - 10; //one slide width      
    //feedback_slider.width(feedback_slider_width + 'px');    
    feedback_slider.find('li').each(function(){
        $(this).width(feedback_slider_width + 'px');        
    });
    
    feedback_slider.jcarousel();            

    feedback_slider.parent().find('.arrow_left').click(function (event) {        
        event.preventDefault ? event.preventDefault() : event.returnValue = false;        
        feedback_slider.jcarousel('scroll', '-=1');
    });
    
    feedback_slider.parent().find('.arrow_right').click(function (event) {        
        event.preventDefault ? event.preventDefault() : event.returnValue = false;                
        feedback_slider.jcarousel('scroll', '+=1');
    });   
    
}
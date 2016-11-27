$(document).ready(
    function ()
    {
        
        $('.clipboard-add').click(function(){
           var cityName = $(this).data('city');
           var cities = [];
           if($.cookie('cities')) {
                cities = jQuery.parseJSON($.cookie('cities'));
           }
           if(jQuery.inArray( cityName, cities ) === -1) {
               cities.push(cityName);
           }
           $.cookie('cities', JSON.stringify(cities), { expires: 7, path: '/' });
        });
        
        $('.clipboard-remove').click(function(){
           var cityName = $(this).data('city');
           var cities = [];
           if($.cookie('cities')) {
                cities = jQuery.parseJSON($.cookie('cities'));
           }
           var index = cities.indexOf(cityName);
           cities.splice(index, 1);
           
           $.cookie('cities', JSON.stringify(cities));
        });
        
        
        var offset = 6;
        $('.load-more').click(function(){
            $.ajax({
                url: "http://localhost/phpjspoz1/cities/get/?offset="+offset
            }).done(function(data){
                
               $('.cities-boxes').append(data);
            });
            offset += 6;
        });
        
        $('.search input').keyup(function (event) {

            var inputValue = $(this).val();

            $.ajax({
                url: "dictionary.php?search=" + inputValue
            }).done(function (data) {
                var dataParsed = jQuery.parseJSON(data);

                var $ul = $('<ul>');
                var liList = '';

                $.each(dataParsed, function (key, value) {
                    liList += '<li>' +
                            '<a href="' + value + '">' + key + '</a>' +
                            '</li>';
                });

                $ul.append(liList);
                if ($('.search-results li.active').length === 0) {
                    $('.search-results').html($ul);
                }
                if (dataParsed) {
//                        var firstKey = Object.keys(dataParsed)[0];
                    $('#hidden-input').val(dataParsed[0]);

                }
            });
        });

    });

/*
 if (dataParsed) {
 var activeLi = $('.search-results li.active');
 switch (event.keyCode) {
 
 case 13:
 if (activeLi) {
 window.open(activeLi.find('a').attr('href'));
 } else {
 var firstUrl = dataParsed[Object.keys(dataParsed)[0]];
 if (firstUrl.length) {
 window.open(firstUrl, '_blank');
 }
 }
 
 break;
 case 38: // up
 
 if (activeLi.length && !$('.search-results li').first().hasClass('active')) {
 activeLi.prev().addClass('active');
 activeLi.removeClass('active');
 } else {
 activeLi.removeClass('active');                                        
 $('.search-results li').last().addClass('active');
 }
 
 break;
 case 40: // down
 var activeLi = $('.search-results li.active');
 if (activeLi.length && !$('.search-results li').last().hasClass('active')) {
 activeLi.next().addClass('active');
 activeLi.removeClass('active');
 } else {
 activeLi.removeClass('active');                                        
 $('.search-results li').first().addClass('active');
 }
 
 break;
 
 default:
 return; // exit this handler for other keys
 }
 }
 */


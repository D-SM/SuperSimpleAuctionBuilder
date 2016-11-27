/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(
        function ()
        {
            $(".main-box").hover(function ()
            {
                $(this).addClass("highlight");
            }, function ()
            {
                $(this).removeClass("highlight");
            });

            $("body").on("click", ".main-box", function () {
                if ($(this).find('ul').hasClass("weather-hidden")) {
                    $(this).find(".weather-content").animate({
                        height: 200
                    }, 300, 'linear', function () {
                        $(this).find('ul').removeClass("weather-hidden");
                        $('.grid').masonry();
                    });
                } else {
                    $(this).find('ul').addClass("weather-hidden");
                    $(this).find(".weather-content").animate({
                        height: 55
                    }, 300, 'linear', function () {
                        $('.grid').masonry();
                    });
                }
            });

        });
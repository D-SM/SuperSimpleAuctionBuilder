$(document).ready(
        function ()
        {
            $("#forecastForm").submit(function(e){
                e.preventDefault();
                var dayNumber = $('select[name="daySelect"]').val();
                var cityName = $('select[name="citySelect"]').val();
                sendAjax(dayNumber, cityName);
            })

            function sendAjax(dayNumber, cityName) {
                $.ajax({
                        url: 'http://localhost/phpjspoz1/forecast',
                        type: 'POST',
                        context: this,
                        data: { dayNumber: dayNumber,
                                cityName: cityName },

                        success: function(data) { 
                            $('#forecastBox').html(data);     
                        }
                });        
            }
        });    

<?php

/**
 * Created by PhpStorm.
 * User: mateusz
 * Date: 26.10.16
 * Time: 08:12
 */

namespace App;

class DetailsController extends AbstractController {

    public function renderPage() {
        
        $city = filter_input(INPUT_GET, 'city', FILTER_SANITIZE_STRING);
        
        if (empty($city)) {
            $city = 'rome';
        }

        $apiCurrentWeather = new \WeatherAPI\Model\CurrentWeather();        
        $cityArray = $apiCurrentWeather->getCurrentWeatherByCityName($city);
//        var_dump($city);
        
        $apiForecast = new \WeatherAPI\ForecastController();
        $forecast = [];        
        $alert = true;
        $location = false;        
        $forecast = $apiForecast->getForecastbyCityForTomorrow($city);
        
        $minMax = $apiForecast->getForecastByCityByDayMinMax($city);

            return $this->twig->render('details-page.twig', [
                        'alert' => $alert,
                        'location' => $location,
                        'forecast' => $forecast,
                        'minmax' => $minMax,   
                        'city' => $cityArray,
                        'cityName' => $city
            ]);
        }
    
}

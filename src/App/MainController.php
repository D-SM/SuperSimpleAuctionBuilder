<?php

/**
 * Created by PhpStorm.
 * User: mateusz
 * Date: 26.10.16
 * Time: 08:12
 */

namespace App;

class MainController extends AbstractController {

    public function renderPage() {
        $apiCurrentWeather = new \WeatherAPI\Model\CurrentWeather();
        $apiForecast = new \WeatherAPI\ForecastController();
        $citiesController = new \WeatherAPI\CitiesController();

        
        $selectedcities = [];    
        $cities = [];
        $forecast = [];
        $alert = true;
        $location = false;
        
        $cities[] = $apiCurrentWeather->getCurrentWeatherByCityName('warsaw');
        $cities[] = $apiCurrentWeather->getCurrentWeatherByCityName('berlin');
        $cities[] = $apiCurrentWeather->getCurrentWeatherByCityName('london');
        $cities[] = $apiCurrentWeather->getCurrentWeatherByCityName('rome');
        $cities[] = $apiCurrentWeather->getCurrentWeatherByCityName('paris');
        $cities[] = $apiCurrentWeather->getCurrentWeatherByCityName('moscow');
        $cityData = $citiesController->getAllCities();
        $selectedcities = $citiesController->getCitiesByCountry($cityData, 'Poland');    
        $forecast = $apiForecast->getForecastbyCityForTomorrow('warsaw');
        
        
        $minMax = $apiForecast->getForecastByCityByDayMinMax('warsaw');

            return $this->twig->render('main-page.twig', [
                        'cities' => $cities,
                        'alert' => $alert,
                        'location' => $location,
                        'forecast' => $forecast,
                        'minmax' => $minMax,
                        'selectedCities' => $selectedcities
            ]);
        }
}

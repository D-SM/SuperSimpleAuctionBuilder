<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

class ClipboardController extends AbstractController {
    
     public function renderPage() {
         
         
         $cities = json_decode($_COOKIE['cities']);
         $citiesWeather = [];
         $weather = new \WeatherAPI\Model\CurrentWeather();

         foreach ($cities as $city) {
             $citiesWeather[$city] = $weather->getCurrentWeatherByCityName($city);
         }
         
        return $this->twig->render('clipboard-page.twig', [
            'cities' => $citiesWeather,
            'removeCookies' => true
        ]);
         
     }
    
}

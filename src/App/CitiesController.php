<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App;


class CitiesController extends AbstractController {
    
    private $cities = [
        "Wroclaw","Warsaw","Elzbieta","Debica","Sedziszow Malopolski","Dabki",
        "Gorlice","Wola Rebkowska","Cierpice","Minsk Mazowiecki","Zabia Wola",
        "Kampinos","Krakow","Olesnica","Pruszkow","Marek","Grupa","Szczecin",
        "Kielce"
    ];
    
    public function renderPage($offset) {
        
        $citiesSliced = array_slice($this->cities, $offset, 6);  

        $cities = [];
        
        foreach($citiesSliced as $city) {
            $apiCurrentWeather = new \WeatherAPI\Model\CurrentWeather();        
            array_push($cities, $apiCurrentWeather->getCurrentWeatherByCityName($city));
        }
        
        return $this->twig->render('city-box.twig', [
                        'cities' => $cities
        ]);
        
    }
}

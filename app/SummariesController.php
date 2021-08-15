<?php
namespace Airport;

class SummariesController {
    
    public function welcome() {
        return App::view('summaries/welcome');
    }

    public function countries() {

        $countries = Maria::getMaria()->showAll();
        $allCountries = [];

        foreach($countries as $country) {
            array_push($allCountries, $country['name']);
        }

        $airlines = Json::getJson()->showAllAirlines();
        $airports = Json::getJson()->showAllAirports();
        $countriesTaken = [];

        foreach($airlines as $airline) {
            if($airline['country'] != null) {
                foreach($airline['country'] as $country) {
                    if(!in_array($country, $countriesTaken)) {
                        array_push($countriesTaken, $country);
                    }
                }
            }
        }

        foreach($airports as $airport) {
            if(!in_array($airport['country'], $countriesTaken)) {
                array_push($countriesTaken, $airport['country']);
            }
        }
        
        $countriesEmpty = array_diff($allCountries, $countriesTaken);

        return App::view('summaries/countries', ['countries' => $countriesEmpty]);
    }

    public function airlines()
    {
        $airlines = Json::getJson()->showAllAirlines();
        $airlinesFree = [];
        foreach($airlines as $airline) {
            if($airline['country'] == null) {
                array_push($airlinesFree, ['name' => $airline['name']]);
            }
        }
        
        return App::view('summaries/airlines', ['airlines' => $airlinesFree]);
    }
}
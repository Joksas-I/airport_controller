<?php
namespace Airport;

class CountriesController {
    
    public function welcome() {
        return App::view('countries/welcome');
    }

    public function countries() {
        return App::view('countries/countriesList', ['countries' => Maria::getMaria()->showAll()]);
    }

    public function createCountry()
    {
            return App::view('countries/addCountry');
    }

    public function deleteCountry($country)
    {
        Maria::getMaria()->delete($country);
            App::redirect('countries/countriesList');
        
    }

    public function save()
    {
        $country = ['iso' => $_POST['iso'], 'name' => $_POST['name']];
        Maria::getMaria()->create($country);
        App::redirect('countries/countriesList');
    }
}
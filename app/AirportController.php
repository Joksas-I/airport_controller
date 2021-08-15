<?php
namespace Airport;

class AirportController {

    
    public function welcome() {
        return App::view('airports/welcome');
    }
    public function airports() {
        return App::view('airports/airportsList', ['airports' => Json::getJson()->showAllAirports()]);
    }

    public function createAirport()
    {
            return App::view('airports/addAirport', ['countries' => Maria::getMaria()->showAll(), 'airlines' => Json::getJson()->showAllAirlines()]);
    }

    public function editAirport($name)
    {
        $airport = Json::getJson()->showAirport($name);
        App::view("airports/editAirport", ['airport' => $airport, 'countries' => Maria::getMaria()->showAll(), 'airlines' => Json::getJson()->showAllAirlines()]);
    }

    public function updateAirport($name)
    {
        $airportName = preg_replace('/\s+/', '-', $_POST['name']);
        $airport = Json::getJson()->showAirport($name);
        foreach($airport as $data => &$info) {
            if($data == 'name') {
                $info = $airportName;
            } else {
                $info = $_POST[$data];
            }
            unset($info);
        }
        Json::getJson()->updateAirport($name, $airport);
        App::redirect('airports/airportsList');
        
    }
    public function deleteAirport($name)
    {
            Json::getJson()->deleteAirport($name);
            App::redirect('airports/airportsList');
        
    }

    public function save()
    {
        $airportName = preg_replace('/\s+/', '-', $_POST['name']);
        $airports = Json::getJson()->showAllAirports();
        foreach($airports as $airport) {
            if($airport['name'] == $airportName ) {
                App::setMessage("Airport name: \"" .$airportName."\" is already in use", 'msgBoxWarning');
                App::redirect('airports/addAirport', ['airport' => $airportName, 'countries' => Maria::getMaria()->showAll(), 'airlines' => Json::getJson()->showAllAirlines()]);
            }
            if (strlen($airportName) < 3) {
                App::setMessage("Airport name is too short.", 'msgBoxWarning');
                App::redirect('airports/addAirport', ['airport' => $airportName, 'countries' => Maria::getMaria()->showAll(), 'airlines' => Json::getJson()->showAllAirlines()]);
            }
        }

        if($_POST['country'] == null) {
            App::setMessage("Airport country cannot be empty!", 'msgBoxWarning');
            App::redirect('airports/addAirport', ['airport' => $airportName, 'countries' => Maria::getMaria()->showAll(), 'airlines' => Json::getJson()->showAllAirlines()]);
        }
        
        $airport = ['name' => $airportName, 'country' => $_POST['country'], 'location' => $_POST['location'], 'airlines' => $_POST['airlines']];
        Json::getJson()->createAirport($airport);
        App::redirect('airports/airportsList');
    }
}
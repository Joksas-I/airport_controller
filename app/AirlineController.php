<?php
namespace Airport;

class AirlineController {
    
    public function welcome() {
        return App::view('airlines/welcome');
    }

    public function airlines() {
        return App::view('airlines/airlinesList', ['airlines' => Json::getJson()->showAllAirlines()]);
    }

    public function createAirline()
    {
            return App::view('airlines/addAirline', ['countries' => Maria::getMaria()->showAll()]);
    }

    public function editAirline($name)
    {
        $airline = Json::getJson()->showAirline($name);
        App::view("airlines/editAirline", ['airline' => $airline, 'countries' => Maria::getMaria()->showAll()]);
    }

    public function updateAirline($name)
    {
        $airline = Json::getJson()->showAirline($name);
        foreach($airline as $data => &$info) {
            $info = $_POST[$data];
            unset($info);
        }
        Json::getJson()->updateAirline($name, $airline);
        App::setMessage("Airline: \"$name\" - updated.", 'msgBoxOk');
        App::redirect('airlines/airlinesList');
        
    }

    public function deleteAirline($name)
    {
        $airports = Json::getJson()->showAllAirports();
        foreach($airports as $airport) {
            foreach($airport as $data) {
                if(is_array($data) && in_array($name, $data)) {
                    App::setMessage("Airline: \"".$name."\" cannot be deleted.", 'msgBoxWarning');
                    App::redirect('airlines/airlinesList');
                }              
            }
        }
        Json::getJson()->deleteAirline($name);
        App::setMessage("Airline: \"$name\" - deleted.", 'msgBoxOk');
        App::redirect('airlines/airlinesList');
    
    }

    public function save()
    {
        $name = preg_replace('/\s+/', '-', $_POST['name']);
        $airlines = Json::getJson()->showAllAirlines();
        foreach($airlines as $airline) {
            if($airline['name'] == $name) {
                App::setMessage("Airline name: \"" .$name."\" is already in use", 'msgBoxWarning');
                App::redirect('airlines/addAirline', ['countries' => Maria::getMaria()->showAll()]);
            }
            if (strlen($name) < 3) {
                App::setMessage("Airline name is too short.", 'msgBoxWarning');
                App::redirect('airlines/addAirline', ['countries' => Maria::getMaria()->showAll()]);
            }
        }

        $airline = ['name' => $name, 'country' => $_POST['country']];
        Json::getJson()->createAirline($airline);
        App::setMessage("Airline: \"". $_POST['name'] ."\" - created.", 'msgBoxOk');
        App::redirect('airlines/airlinesList');
    }
}
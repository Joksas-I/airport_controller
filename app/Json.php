<?php
namespace Airport;
use App\DB\DataBase;

class Json {

    private $airportData;
    private $airlineData;
    private $users;
    private static $obj;
    
    public static function getJson()
    {
        return self::$obj ?? self::$obj = new self;
    }
    
    private function __construct()
    {
        if (!file_exists(DIR.'/airports.json')) {
            file_put_contents(DIR.'/airports.json', json_encode([]));
        }
        $this->airportData = json_decode( file_get_contents(DIR.'/airports.json'), 1);

        if (!file_exists(DIR.'/airlines.json')) {
            file_put_contents(DIR.'/airlines.json', json_encode([]));
        }
        $this->airlineData = json_decode( file_get_contents(DIR.'/airlines.json'), 1);

        if (!file_exists(DIR.'/users.json')) {
            file_put_contents(DIR.'/users.json', json_encode([]));
        }
        $this->users = json_decode( file_get_contents(DIR.'/users.json'), 1);
    }

    public function __destruct()
    {
        file_put_contents(DIR.'/airports.json', json_encode($this->airportData));
        file_put_contents(DIR.'/airlines.json', json_encode($this->airlineData));
        file_put_contents(DIR.'/users.json', json_encode($this->users));
    }
    
    
    
    public function createAirport(array $airportData) : void
    {
        $this->airportData[] = $airportData;
    }

    public function updateAirport($airportName, array $airportData) : void
    {
        foreach ($this->airportData as $index => $airport) {
            if ($airport['name'] == $airportName) {
                $this->airportData[$index] = $airportData;
                return;
            }
        }
    } 

    public function deleteAirport($airportName) : void
    {
        foreach ($this->airportData as $index => $airport) {
            if ($airport['name'] == $airportName) {
                unset($this->airportData[$index]);
                return;
            }
        }
    } 

    public function showAirport($airportName) : array
    {
        foreach ($this->airportData as $index => $airport) {
            if ($airport['name'] == $airportName) {
                return $this->airportData[$index];
            }
        }
    } 

    public function showAllAirports() : array
    {
        return $this->airportData;
    }
    public function createAirline(array $airlineData) : void
    {
        $this->airlineData[] = $airlineData;
    }

    public function updateAirline($airlineID, array $airlineData) : void
    {
        foreach ($this->airlineData as $index => $airline) {
            if ($airline['name'] == $airlineID) {
                $this->airlineData[$index] = $airlineData;
                return;
            }
        }
    } 

    public function deleteAirline($airlineID) : void
    {
        foreach ($this->airlineData as $index => $airline) {
            if ($airline['name'] == $airlineID) {
                unset($this->airlineData[$index]);
                return;
            }
        }
    } 

    public function showAirline($airlineName) : array
    {
        foreach ($this->airlineData as $index => $airline) {
            if ($airline['name'] == $airlineName) {
                return $this->airlineData[$index];
            }
        }
    } 

    public function showAllAirlines() : array
    {
        return $this->airlineData;
    }

    public function showUsers()
    {
        foreach ($this->users as $index => $user) {
            if ($user['user'] == $_POST['user']) {
                if($user['pass'] == md5($_POST['pass'])) {
                    $_SESSION['logged'] = 1;
                    $_SESSION['user'] = $user['user'];
                    App::setMessage('Welcome ' . $user['user']);
                } 
            }
        }
    } 

    public function showAllUsers()
    {
        return $this->users;
    }

}
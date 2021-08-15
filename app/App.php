<?php
namespace Airport;

class App {
    public static function start()
    {
        ob_start();
        self::router();
        ob_end_flush();
    }

    public static function getMessage()
    {
        if (!isset($_SESSION['msg'])) {
            return false;
        }
        $msg = $_SESSION['msg'][0];
        $type = $_SESSION['msg'][1];
        unset($_SESSION['msg']);
        return [$msg, $type];
    }

    public static function setMessage(string $msg, string $type = '')
    {
        $_SESSION['msg'] = [$msg, $type];
    }

    public static function view($file, $data = [])
    {
        extract($data);
        require DIR.'views/'.$file.'.php';
    }

    public static function redirect($path = '', $data = []) 
    {
        header('Location: '.URL.$path);
        die;
    }

    private static function router()
    {
        
        
        $uri = str_replace(INSTALL_DIR, '', $_SERVER['REQUEST_URI']);

        $uri = explode('/', $uri);

        array_shift($uri);


        if ($uri[0] === '' && count($uri) === 1) {
            return self::view('welcome');
        }
        if ('airports' == $uri[0]) {
            if (isset($uri[1]) && 'addAirport' == $uri[1]) {
                if ('GET' == $_SERVER['REQUEST_METHOD']) {
                    return (new AirportController)->createAirport();
                }
                else {
                    return (new AirportController)->save();
                }
            }
            if (isset($uri[1]) && 'airportsList' == $uri[1]) {
                return (new AirportController)->airports();
            }                
            if (isset($uri[1]) && 'deleteAirport' == $uri[1]) {
                return (new AirportController)->deleteAirport($uri[2]);
            }
            if (isset($uri[1]) && 'editAirport' == $uri[1]) {
                return (new AirportController)->editAirport($uri[2]);
            } 
            if (isset($uri[1]) && 'updateAirport' == $uri[1]) {
                return (new AirportController)->updateAirport($uri[2]);
            } else {
                return (new AirportController)->welcome();
            }
        }
        if ('airlines' == $uri[0]) {
            if (isset($uri[1]) && 'addAirline' == $uri[1]) {
                if ('GET' == $_SERVER['REQUEST_METHOD']) {
                    return (new AirlineController)->createAirline();
                }
                else {
                    return (new AirlineController)->save();
                }
            }
            if (isset($uri[1]) && 'airlinesList' == $uri[1]) {
                return (new AirlineController)->airlines();
            }                
            if (isset($uri[1]) && 'deleteAirline' == $uri[1]) {
                return (new AirlineController)->deleteAirline($uri[2]);
            }
            if (isset($uri[1]) && 'editAirline' == $uri[1]) {
                return (new AirlineController)->editAirline($uri[2]);
            } 
            if (isset($uri[1]) && 'updateAirline' == $uri[1]) {
                return (new AirlineController)->updateAirline($uri[2]);
            } else {
                return (new AirlineController)->welcome();
            }
        }
        if ('countries' == $uri[0]) {
            if (isset($uri[1]) && 'addCountry' == $uri[1]) {
                if ('GET' == $_SERVER['REQUEST_METHOD']) {
                    return (new CountriesController)->createCountry();
                }
                else {
                    return (new CountriesController)->save();
                }
            }
            if (isset($uri[1]) && 'countriesList' == $uri[1]) {
                return (new CountriesController)->countries();
            }                
            if (isset($uri[1]) && 'deleteCountry' == $uri[1]) {
                return (new CountriesController)->deleteCountry($uri[2]);
            } else {
                return (new CountriesController)->welcome();
            }
        }

        if ('countries' == $uri[0]) {
            if (isset($uri[1]) && 'addCountry' == $uri[1]) {
                if ('GET' == $_SERVER['REQUEST_METHOD']) {
                    return (new CountriesController)->createCountry();
                }
                else {
                    return (new CountriesController)->save();
                }
            }
            if (isset($uri[1]) && 'countriesList' == $uri[1]) {
                return (new CountriesController)->countries();
            }                
            if (isset($uri[1]) && 'deleteCountry' == $uri[1]) {
                return (new CountriesController)->deleteCountry($uri[2]);
            } else {
                return (new CountriesController)->welcome();
            
            }
        }
        if ('summaries' == $uri[0]) {
            if (isset($uri[1]) && 'countries' == $uri[1]) {
                return (new SummariesController)->countries();
            }                
            if (isset($uri[1]) && 'airlines' == $uri[1]) {
                return (new SummariesController)->airlines();
            } else {
                return (new SummariesController)->welcome();
            }
        }
        
        
        self::view('code404');
        http_response_code(404);   

    }
}
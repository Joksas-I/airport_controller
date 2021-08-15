<?php
namespace Airport;

use App\DB\DataBase;
use PDO;

class Maria implements DataBase {

    private static $db;
    private $pdo;

    public static function getMaria() // singletono paternas
    {
        return self::$db ?? self::$db = new self;
    }

    private function __construct()
    {
        $host = '127.0.0.1';
        $db   = 'airport_controller';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }

    public function create(array $userData) : void
    {
        $keys = implode(",",array_keys($userData));
        $values =  array_values($userData);
        foreach ($values as &$val) {
            $val = "'$val'";
        }
        $arr =  implode(',', $values);
        $sql =
        "INSERT INTO countries ($keys)
        VALUES ($arr)";
        $this->pdo->query($sql);

    }

    public function update(int $userId, array $userData) : void {

    }

    public function delete(int $userId) : void
    {
        $sql =
        "DELETE FROM countries
        WHERE id = $userId";
        $this->pdo->query($sql);
    }
 
    public function show(int $userId) : array {

    }

    public function showAll() : array {
        $sql = 
        "SELECT id as countryId, name, iso
        FROM countries
        ORDER BY `name`
        ";
        $all = [];
        $stmt = $this->pdo->query($sql);
        while ($row = $stmt->fetch())
        {
            $all[] = $row;
        }
        return $all;
    }
}
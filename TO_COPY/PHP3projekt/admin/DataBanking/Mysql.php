<?php
namespace WIFI\PHP3\DataBanking;

class Mysql 
{   

    // Singleton Implementation starts.
    private static ?Mysql $instanz = null;

    public static function getInstanz(): Mysql
    {
        if (!self::$instanz) {
            self::$instanz = new Mysql();
        }
        return self::$instanz;
    }
    // Singleton Implementation finishes.

    private \mysqli $db;

    private function __construct() 
    {
        $this->connect();
    }

    public function connect() 
    {
        // Mysqli-Objekt (von PHP) erstellen und DB-Verbundung aufbaunen.
        $this->db = new \mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABANK);
        // Zeichensatz mitteilen, im dem wir mit der DB sprechen wollen
        $this->db->set_charset("utf8mb4");
    }

    public function escape(string $value): string {
        return $this->db->real_escape_string($value);
    }

    public function query(string $input): \mysqli_result|bool
    {
        $result = $this->db->query($input);
        return $result;
    }

}
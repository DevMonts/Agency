<?php
class Database
{
    public static function connect()
    {
        $host = 'localhost';
        $dbname = 'agency';
        $username = 'root';
        $password = '';
        try {
            return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }
}

<?php

namespace gr\lib;

use PDO;
use RedBeanPHP\R;

class Db
{
    protected PDO $db;

    public function __construct()
    {
        $config = require 'app/config/db.php';
        $this->db = new PDO(
            'mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['user'], $config['password']
        );
        if(!R::testConnection()) {
            R::setup('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['user'], $config['password']);
        }
    }

    public function query($sql, $params = []): bool|\PDOStatement
    {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)){
            foreach ($params as $key => $val){
                $this->db->bindValue(':'.$key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function row($sql, $params = []): array|bool
    {
        $query = $this->db->query($sql, $params = []);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = []): mixed
    {
        $query = $this->db->query($sql, $params = []);
        return $query->fetchColumn();
    }
}
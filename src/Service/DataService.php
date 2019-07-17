<?php

namespace App\Service;

use Doctrine\DBAL\Driver\Connection;

class DataService 
{
    private $conn;

    public function __construct(Connection $conn) 
    {
        $this->conn = $conn;
    }

    /**
     * Finds all countries
     */
    public function findAll() {

        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder->select('*')->from('countries');

        $data = $queryBuilder->execute()->fetchAll();

        return $data;
    }
}
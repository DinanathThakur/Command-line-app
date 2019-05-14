<?php namespace Acme;

use PDO;


/**
 * Class DBConnection
 *
 * @package Acme
 * @author Dinanath Thakur <dinanath.thakur@ei-india.com>
 */
class DBConnection
{

    /**
     * The database connection.
     *
     * @var PDO
     */
    protected $connection;

    /**
     * Create a new DatabaseAdapter instance.
     *
     * @param PDO $connection
     */
    function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Fetch all rows from a table.
     *
     * @param $tableName
     * @param $where
     *
     * @return array
     * @author Dinanath Thakur <dinanath.thakur@ei-india.com>
     */
    public function fetchAll($tableName, $where = 1)
    {
        return $this->connection->query('select * from ' . $tableName . ' WHERE ' . $where)->fetchAll();
    }

    /**
     * fetch description
     *
     * @param $tableName
     * @param int $where
     *
     * @return mixed
     *
     * @author Dinanath Thakur <dinanath.thakur@ei-india.com>
     */
    public function fetch($tableName, $where = 1)
    {
        return $this->connection->query('select * from ' . $tableName . ' WHERE ' . $where)->fetch();
    }

    /**
     * Perform a generic database query.
     *
     * @param $sql
     * @param $parameters
     *
     * @return bool
     * @author Dinanath Thakur <dinanath.thakur@ei-india.com>
     */
    public function query($sql, $parameters)
    {
        return $this->connection->prepare($sql)->execute($parameters);
    }

    /**
     * rawQuery description
     *
     * @param $sql
     *
     * @throws \Exception
     *
     * @author Dinanath Thakur <dinanath.thakur@ei-india.com>
     */
    public function rawQuery($sql)
    {
        try {
            $this->connection->query($sql);
        } catch (\Exception $ex) {
            throw $ex;
        }

    }
}

<?php

namespace mvc\model\manager;

require_once(__DIR__ . '/../../conf/config.php');

use mvc\model\entities\Entity;
use \PDO;
use \PDOStatement;
use \PDOException;

abstract class PDOManager
{
    /*private string $host, $db, $encoding, $user, $pass;
    private int $pdoErrorMode;*/
    private $host, $db, $encoding, $user, $pass;
    private $pdoErrorMode;

    /**
     * Manager constructor
     */
    public function __construct()
    {
        $this->host = $GLOBALS['host'];
        $this->db = $GLOBALS['db'];
        $this->encoding = $GLOBALS['encoding'];
        $this->user = $GLOBALS['user'];
        $this->pass = $GLOBALS['pass'];
        $this->pdoErrorMode = $GLOBALS['pdoErrorMode'];
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getDb(): string
    {
        return $this->db;
    }

    /**
     * @param string $db
     */
    public function setDb(string $db): void
    {
        $this->db = $db;
    }

    /**
     * @return string
     */
    public function getEncoding(): string
    {
        return $this->encoding;
    }

    /**
     * @param string $encoding
     */
    public function setEncoding(string $encoding): void
    {
        $this->encoding = $encoding;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }

    /**
     * @param string $pass
     */
    public function setPass(string $pass): void
    {
        $this->pass = $pass;
    }

    /**
     * @return int
     */
    public function getPdoErrorMode(): int
    {
        return $this->pdoErrorMode;
    }

    /**
     * @param int $pdoErrorMode
     */
    public function setPdoErrorMode(int $pdoErrorMode): void
    {
        $this->pdoErrorMode = $pdoErrorMode;
    }

    protected function dbConnect(): PDO
    {
        $conn = new PDO(
            "mysql:host=$this->host;dbname=$this->db;charset=$this->encoding",
            $this->user,
            $this->pass
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, $this->pdoErrorMode);
        return $conn;
    }

    protected function executePrepare(string $req, array $params): PDOStatement
    {
        $conn = null;
        try {
            $conn = $this->dbConnect();
            $stmt = $conn->prepare($req);
            $res = $stmt->execute($params);
            return $stmt;
        } catch (PDOException $ex) {
            throw $ex;
        } finally {
            if ($conn != null) {
                $conn = null;
            }
        }
    }

    public abstract function findById(int $id): ?Entity;
    public abstract function find(): PDOStatement;
    public abstract function findAll(int $pdoFecthMode): array;
    public abstract function insert(Entity $e): PDOStatement;
    public abstract function update(Entity $id): PDOStatement;
    public abstract function delete(int $id): PDOStatement;
    public abstract function findByName(String $variable): ?int;
}
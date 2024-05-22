<?php

namespace database;

use PDOException;
use PDO;

class Database
{




  private $connectoin;
  private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
  private $dbHost = DB_HOST;
  private $dbUserName = DB_USERNAME;
  private $dbName = DB_NAME;
  private $dbpassword = DB_PASSWORD;

  function __construct()
  {

    try {

      $this->connectoin = new PDO("mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName, $this->dbUserName, $this->dbpassword, $this->options);

    } catch (PDOException $e) {
      echo $e->getMessage();
      exit;
    }

  }

  public function select($sql, $values = null)
  {

    try {

      $stmt = $this->connectoin->prepare($sql);
      if ($values == null) {

        $stmt->execute();

      } elseif ($values != null) {

        $stmt->execute($values);

      }
      $result = $stmt;
      return $result;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;

    }

  }

  public function insert($tableName, $fileds, $values)
  {

    try {

      $stmt = $this->connectoin->prepare("INSERT INTO " . $tableName . "(" . implode(', ', $fileds) . " ,created_at)
        VALUES ( :" . implode(', :', $fileds) . ", now());");
      $stmt->execute(array_combine($fileds, $values));
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }


  }
  public function update($tableName, $id, $fileds, $values)
  {

    $sql = "UPDATE " . $tableName . " SET";
    foreach (array_combine($fileds, $values) as $fileds => $value) {

      if ($value) {

        $sql .= " `" . $fileds . "` = ? ,";

      } else {
        $sql .= " `" . $fileds . "` = NULL ,";
      }


    }
    $sql .= " updated_at = now()";
    $sql .= " WHERE id = ?";
    try {

      $stmt = $this->connectoin->prepare($sql);
      $stmt->execute(array_merge(array_filter(array_values($values)), [$id]));
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function delete($tableName, $id)
  {

    $sql = "DELETE FROM " . $tableName . " WHERE id = ?";
    try {
      $stmt = $this->connectoin->prepare($sql);
      $stmt->execute([$id]);
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }

  }



}
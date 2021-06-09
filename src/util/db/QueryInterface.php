<?php
 
 namespace PruebaPhp\util\db;

 interface QueryInterface{
    public function insert(String $tableName, array $columns, array $values);
    public function delete(String $tableName, array $conditions);
    public function update(String $tableName, array $updateValues, array $conditions);
    public function find(String $tableName, array $fields = [], array $conditions = [], $typeCondition = "");
 }
<?php
declare (strict_types=1);
namespace App\Models;

abstract class Model{

    protected  $id ;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function getAll($table){

        $con = new \PDO("mysql:host=localhost;dbname=crud-mvc", "root", "");
    
        $sql ="SELECT * FROM $table";
        $query=$con->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);

        // $res =mysqli_query($conn,$sql);
        // $result = mysqli_fetch_assoc($res);
        return $result;
    }
}
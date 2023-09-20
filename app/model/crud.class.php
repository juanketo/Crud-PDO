<?php

use LDAP\Result;

class Crud {

    private $conexion;
    private $host ="localhost";
    private $user = "root";
    private $pass = "";
    private $bd = "agenda";

    public function __construct(){
      $this -> conexion = new PDO("mysql:host=$this->host;dbname=$this->bd",$this->user, $this->pass );  
    }

    public function read() {
      $query = "SELECT contactos.id, contactos.nombre, contactos.telefono, contactos.email, t_categoria.categoria FROM contactos LEFT JOIN t_categoria ON contactos.categoria = t_categoria.idcategoria";
      $stmt = $this->conexion->prepare($query);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      unset($this->conexion);
      return $result;
    }

    public function readCategoria() {
      $query = "SELECT * FROM t_categoria";
      $stmt = $this->conexion->prepare($query);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      unset($this->conexion);
      return $result;
    }

    public function create($datos){
      $query = "INSERT INTO contactos (nombre, telefono, email, categoria) VALUES (:nombre, :telefono, :email, :idcategoria )";
      $stmt = $this->conexion->prepare($query);
      $stmt->bindParam(":nombre", $datos["nombre"]);
      $stmt->bindParam(":telefono", $datos["telefono"]);
      $stmt->bindParam(":email", $datos["email"]);
      $stmt->bindParam(":idcategoria", $datos["categoria"]);
      $stmt->execute();
      unset($this->conexion);
      return json_encode($stmt);
    }

    public function update ($datos){
      $query = "UPDATE contactos SET nombre=:nombre, telefono=:telefono, email=:email, categoria=:categoria WHERE id=:id";
      $stmt = $this->conexion->prepare($query);
      $stmt->bindParam(":id", $datos["id"]);
      $stmt->bindParam(":nombre", $datos["nombre"]);
      $stmt->bindParam(":telefono", $datos["telefono"]);
      $stmt->bindParam(":email", $datos["email"]);
      $stmt->bindParam(":categoria", $datos["categoria"]);
      $stmt->execute();
      unset($this->conexion);
      return $stmt;
    }
    public function updateCategoria ($datos){
      $query = "UPDATE t_categoria SET categoria=:categoria WHERE idcategoria=:idcategoria";
      $stmt = $this->conexion->prepare($query);
      $stmt->bindParam(":categoria", $datos["categoria"]);
      $stmt->execute();
      unset($this->conexion);
      return $stmt;
    }

    public function delete ($id){
      $query = "DELETE  FROM contactos WHERE id=:id";
      $stmt = $this->conexion->prepare($query);
      $stmt->bindParam(":id",$id);
      $stmt->execute();
      unset($this->conexion);
      return $stmt;
    }
    public function deleteCategoria ($id){
      $query = "DELETE  FROM t_categoria WHERE idcategoria=:idcategoria";
      $stmt = $this->conexion->prepare($query);
      $stmt->bindParam(":idcategoria",$idcategoria);
      $stmt->execute();
      unset($this->conexion);
      return $stmt;
    }

  public function show ($id){
    $query = "SELECT contactos.id, contactos.nombre, contactos.telefono, contactos.email, t_categoria.categoria as nombrecategoria, contactos.categoria FROM contactos LEFT JOIN t_categoria ON contactos.categoria = t_categoria.idcategoria WHERE contactos.id =:id";
    $stmt = $this->conexion->prepare($query);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    unset($this->conexion);
    return $result;
  }

  public function categoria($datos){
    $query = "INSERT INTO t_categoria(categoria) VALUES (:categoria)";
    $stmt = $this->conexion->prepare($query);
    $stmt->bindParam(":categoria", $datos);
    $stmt->execute();
    unset($this->conexion);
    return json_encode($stmt);
  }
  }

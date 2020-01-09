<?php
require_once("db.php");

class Config{
    private $categoriaID;
    private $categoriaNombre;
    private $descripcion;
    private $imagen;
    protected $dbCnx;

    public function __construct($categoriaID=0, $categoriaNombre='', $descripcion='', $imagen=''){
        $this->categoriaID = $categoriaID;
        $this->categoriaNombre = $categoriaNombre;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function setCategoriaID($categoriaID){
        $this->categoriaID = $categoriaID;
    }

    public function getCategoriaID(){
        return $this->categoriaID;
    }

    public function setCaregoriaNombre($categoriaNombre){
        $this->categoriaNombre = $categoriaNombre;
    }

    public function getCategoriaNombre(){
        return $this->categoriaNombre;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO categorias (categoriaID, categoriaNombre, descripcion, imagen) values (?,?,?,?)");
            $stm -> execute([$this->categoriaID, $this->categoriaNombre, $this->descripcion, $this->imagen]);
        } catch (Exeption $e) {
            return $e->getMessage();
        }
    }

    public function selectAll(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM categorias");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->dbCnx -> prepare("DELETE FROM categorias WHERE categoriaID=?");
            $stm -> execute([$this->categoriaID]);
            return $stm->fetchAll();
            echo "<script>alert('Borrado exitosamente');document.location='facturas.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOne(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM categorias WHERE categoriaID=?");
            $stm -> execute([$this->categoriaID]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx -> prepare("UPDATE categorias SET categoriaNombre=?, descripcion=?, imagen=? WHERE categoriaID=?");
            $stm -> execute([$this->categoriaNombre, $this->descripcion, $this->imagen, $this->categoriaID]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>
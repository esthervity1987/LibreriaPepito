<?php

class PatronSingleton {

    private $pdo;
    private static $instancia; // contenedor de la instancia

    private function __construct() { // un constructor privado evita crear nuevos objetos desde fuera de la clase
        $this->pdo = new PDO("mysql:host=localhost; dbname=librosdb; charset=utf8", 'librero', 'elPass');  
    }

    public static function getSingleton() { //método singleton que crea instancia sí no está creada       
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;       // __CLASS__ devuelve el nombre de la clase en la que está
            self::$instancia = new $miclase;  // Es igual a     new patronSingleton();
        }
        return self::$instancia;
    }

    public function __clone() { // Sobreescribimos la función __clone. Evita que el objeto se pueda clonar
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }

    /* ------------------------------------------------------------------------------------------------------------------ */

    public function SELECT_libros($busqueda) {
        try {
            $prepSentencia = $this->pdo->prepare("select isbn, titulo, autor, anio from libros where titulo like '%$busqueda%'");
            $prepSentencia->execute() or die("Ha ocurrido un error al buscar los libros.");
            
            $filasAfectadas = $prepSentencia->rowCount();  // Probado

            if ($filasAfectadas > 0) {
                $prepSentencia->setFetchMode(PDO::FETCH_ASSOC);  // o "PDO::FETCH_BOTH" para indices asociativos y numéricos
                $arrayComentarios = $prepSentencia->fetchAll();  // fetchAll() devuelve UN ARRAY
            } else {
                $arrayComentarios = [];
            }
        } catch (PDOException $ex) {
            echo ($ex->getMessage());
        } finally {
            $prepSentencia = null;
        }

        return $arrayComentarios;
    }

}

//
//$pdo = PatronSingleton::getSingleton();
//$libros = $pdo->SELECT_libros('el ret');
//
//var_dump($libros);

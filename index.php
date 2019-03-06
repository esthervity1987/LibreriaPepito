
<?php

include_once './includes/header.php';
?>

<div class="buscador">
    <form>
        <h2>Libro que desa buscar:</h2>
        <input type="text" name="buscador">
        <input type="submit" value="Buscar">
    </form>
</div>
<div class="container">
    <?php
    include_once "conexion/Modelo.php";
    
    $conexion = PatronSingleton::getSingleton();
    
    if(isset($_GET['buscador'])){
        $cosas = $conexion->SELECT_libros($_GET['buscador']); //aqui poner la query del array
        
    
        
        foreach ($cosas as $indice => $valor){
            
            echo '<div class="tarjeta">
            <div class="imagen">
                <img src="css/miLibro.jpg" alt="imagen del libro">
            </div>
            <div class="informacion">';
           foreach($valor as $indice2 => $valor2){
               echo '<div>';
               if(strcmp($indice2, "isbn")==0){
                   echo "<span>ISBN ".$valor2.'</span>';
               }else{
                    echo '<span>'.$valor2.'</span>';
                }
               echo '</div>';
           }
            echo "</div></div>";
        }
    }

?>
</div>


<?php

include_once './includes/footer.php';
?>

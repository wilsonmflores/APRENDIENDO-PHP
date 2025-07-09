<!-- mostar los numeros multiplos de una números
pasado por la url que hay del 1 al 100 -->

<?php
if (isset($_GET["numero"]) && is_numeric($_GET["numero"])){?>

<h1>Números multiplos de <?= $_GET["numero"];?></h1>


<?php
for ($i = 1; $i <=100;$i++){
    if (isset($_GET["numero"]) && $i % $_GET["numero"] ==0){
        echo $i . " es multiplo de ". $_GET["numero"] . "<br/>";
    }
}
}else{
     ?>
     <p>Introduce un número correcto por la url</p>


<?php } ?>
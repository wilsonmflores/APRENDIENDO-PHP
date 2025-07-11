<!-- Crea un Array de Array con el contenido de las siguientes columnas: "Frutas", "Deportes" e "Idiomas" donde cada columna tenga 15 elemntos. -->
<h1>EJERCICIO 16</h1>
<?php
    // ejercicio16.php
    // Crear un array de arrays con las columnas "Frutas", "Deportes" e "Idiomas".
    $datos = array(
        "Frutas" => array(
            "Manzana", "Plátano", "Naranja", "Fresa", "Uva",
            "Piña", "Mango", "Kiwi", "Melón", "Sandía",
            "Cereza", "Pera", "Durazno", "Papaya", "Arándano"
        ),
        "Deportes" => array(
            "Fútbol", "Baloncesto", "Tenis", "Natación", "Ciclismo",
            "Béisbol", "Golf", "Rugby", "Voleibol", "Boxeo",
            "Hockey", "Críquet", "Bádminton", "Esquí", "Surf"
        ),
        "Idiomas" => array(
            "Español", "Inglés", "Francés", "Alemán", "Italiano",
            "Portugués", "Chino Mandarín", "Japonés", "Ruso",
            "Árabe", "Hindi", "Coreano", "Sueco", "Holandés"
        )
    );
    // Recorrer el array de arrays y mostrar el contenido de cada columna.
    foreach ($datos as $categoria => $elementos) {
        echo "<h2>$categoria</h2>";
        // Utilizar implode() para convertir el array de elementos en una cadena separada por comas.
        echo implode(", ", $elementos) . "<br>";
    }
    // Mostrar el contenido del array utilizando var_dump() para ver la estructura completa.
    echo "<pre>";
    var_dump($datos);
?>
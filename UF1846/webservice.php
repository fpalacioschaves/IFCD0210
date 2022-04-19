<?php
/* comprobamos que el usuario nos viene como un parametro */
if(isset($_GET['movie']) && intval($_GET['movie'])) {
    $movie_id = intval($_GET['movie']); 
    $query = "SELECT * FROM movies WHERE Code = $movie_id";
}
else{
    $query = "SELECT * FROM movies";
}

        /* utilizar la variable que nos viene o establecerla nosotros */
        $format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //xml es por defecto
       

        /* conectamos a la bd */
        $conexion = new mysqli("localhost", "root", "", "cines")
        or die(mysqli_error($conexion));
        $conexion->set_charset("utf8");
        
        /* sacamos los posts de bd */

        $resultado = $conexion->query($query) or die($conexion->error);
        
        
        /* creamos el array con los datos */
        $posts = array();
        
                while($post = $resultado->fetch_all(MYSQLI_ASSOC)) {
                        $posts[] = array('post'=>$post);
                }
        


        /* formateamos el resultado */
        if($format == 'json') {
                header('Content-type: application/json');
                echo json_encode(array('posts'=>$posts));
        }
        else {
                header('Content-type: text/xml');
                echo '';
                $my_posts = $posts[0];
                $new = $my_posts["post"];
                echo "<movies>";
                foreach($my_posts as $index => $post) {
                        if(is_array($post)) {
                                foreach($post as $key => $value) {
                                        echo '<movie>';
                                        if(is_array($value)) {
                                                foreach($value as $tag => $val) {
                                                        echo '<'.$tag.'>'.htmlentities($val).'</'.$tag.'>';
                                                }
                                        }
                                        echo '</movie>';
                                }
                        }
                }
                echo '</movies>';
        }

        /* nos desconectamos de la bd */
        @mysqli_close($conexion);
 
        ?>
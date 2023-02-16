<html>
    <head>
        <title>Examen Práctico. Pregunta 3.</title>
    </head>
    <body>
        <h2>Examen UF1844. Pregunta 3. Crear clase alumnos</h2>
        <?php
            class Alumno
            {
                private $nombre;            // Nombre del alumno
                private $apellidos;         // Apellido
                private $dni;               // DNI
                private $curso;             // Curso que realiza

                public function __construct($n, $a, $d, $c = "")
                {
                    $this -> nombre = $n;
                    $this -> apellidos = $a;
                    $this -> dni = $d;
                    $this -> curso = $c;
                }

                public function mostrarNombre()
                {
                    echo $this -> nombre;
                }

                public function mostrarNombreCompleto()
                {
                    echo $this -> nombre . " " . $this -> apellidos;
                }

                public function altaAlumnoC($c)
                {
                    $this -> curso = $c;
                }

                public function bajaAlumnoC($c)
                {
                    if ($this -> curso != $c)
                    {
                        echo "<br/>El alumno ";
                        echo self::mostrarNombreCompleto();
                        echo " no está realizando el curso $c. Imposible darlo de baja.";
                        echo " ¿Ha escrito bien el nombre del curso?<br/>";
                    }
                    else
                    {
                        $this -> curso = "";
                        echo "<br/>El alumno ";
                        echo self::mostrarNombreCompleto();
                        echo " ha sido dado de baja del curso $c.<br/>";
                    }
                }

                public function mostrar()
                {
                    echo "<br/>Datos del alumno:<br/>Nombre: ";
                    echo $this -> nombre . "<br/>Apellidos: " . $this -> apellidos . "<br/>DNI: " . $this -> dni;
                    echo "<br/>Está cursando: " . $this -> curso . "<br/>";

                }

            }

            $alumno1 = new Alumno("Ana", "Frias Martín", "123456789Z");
            $alumno2 = new Alumno("Juan", "López Frias", "987654321A", "DAW");

            echo "<br/>Alumno 1:";
            $alumno1 -> mostrar();
            echo "<br/>Alumno 2:";
            $alumno2 -> mostrar();
            echo "<br/>Doy de alta en el curso POO al alumno 1";
            $alumno1 -> altaAlumnoC("POO");
            echo "<br/>Doy de baja en el curso POO al alumno 2";
            $alumno2 -> bajaAlumnoC("POO");
            echo "<br/>Alumno 1:";
            $alumno1 -> mostrar();
            echo "<br/>Alumno 2:";
            $alumno2 -> mostrar();
            echo "<br/>Doy de baja en el curso DAW al alumno 2";
            $alumno2 -> bajaAlumnoC("DAW");
            echo "<br/>Alumno 1:";
            $alumno1 -> mostrar();
            echo "<br/>Alumno 2:";
            $alumno2 -> mostrar();
        ?>
    </body>
</html>
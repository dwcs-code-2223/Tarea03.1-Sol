<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        use model\Asalariado;
        use model\EmpleadoPorHora;
        use model\Empleado;
        use excepciones\NotSuitableClassException;

require_once 'include/autoload.php';

        $empleadoSalario1 = new Asalariado("Ana", "López Aguas", "1234-abcd-1234-abcd", 35000);
        $empleadoSalario2 = new Asalariado("Tino", "Torres Reza", "5678-abcd-5678-abcd", 40000, 0.5);
        $empleadoHoras1 = new EmpleadoPorHora("Eugenio", "Estévez Este", "5678-jklñ-5678-jklñ", 100);
        $empleadoHoras2 = new EmpleadoPorHora("Lucía", "Luz Lamas", "5678-asdf-5678-asdf", 102, 50, 0.5);

        $empleados = [];
        array_push($empleados, $empleadoSalario1);
        array_push($empleados, $empleadoSalario2);
        array_push($empleados, $empleadoHoras1);
        array_push($empleados, $empleadoHoras2);

        echo "En total tenemos " . count($empleados) . " empleados <br/>";

        foreach ($empleados as $emp) {
            mostrarInfoBasica($emp);
            mostrarAumentoSalario($emp);
            echo "<br/>";
        }

        echo "<br/>";
        //Comprobando entre Empleados Por Hora
        mostrarComparacion($empleadoHoras2, $empleadoHoras1);
        mostrarComparacion($empleadoHoras1, $empleadoHoras2);
        //Comprobando entre distintos tipos
        mostrarComparacion($empleadoHoras2, $empleadoSalario1);
        
        
        function mostrarInfoBasica(Empleado $emp): void{
                  echo "La/El empleado/a " . $emp->getNombreCompleto() . " es un/una " . basename(get_class($emp)) . " que gana " . $emp->salarioMes() . " euros este mes <br/>";
        }

        function mostrarComparacion(Empleado $emp1, Empleado $emp2): void {

            try {
                $resultadoComparacion = $emp1->comparar($emp2);

                if ($resultadoComparacion === 0) {
                    $operador = "igual número de horas (" . $emp1->getNumHorasTrabajadas() . ")";
                    $horas = "";
                } else {
                    $operador = ($resultadoComparacion < 0) ? "menos" : "más";
                    $horas = abs($emp1->getNumHorasTrabajadas() - $emp2->getNumHorasTrabajadas()) . " horas";
                }

                echo $emp1->getNombreCompleto() . " trabajó $horas $operador que " . $emp2->getNombreCompleto() . "<br/>";
            } catch (NotSuitableClassException $ex) {
                echo $ex->getMessage();
            }
        }

        function mostrarAumentoSalario(Empleado $emp) {
            $salario_antes = round($emp->salarioMes(), 2);
            $porcentaje = round($emp->getPorcentaje() * 100, 2);

            $emp->aumentoSalario();

            echo "<pre>\tProbando aumento... Antes: $salario_antes € (Porcentaje: $porcentaje %) => Después: " . round($emp->salarioMes(), 2) . "€ </pre><br/>";
        }
        ?>
    </body>
</html>

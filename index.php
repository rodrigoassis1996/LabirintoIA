<?php
    require_once('gera_labirinto.php');

    $linhas_labirinto = 4;
    $colunas_labirinto = 4;
    $caminho[] = array(0,0);

    $labirinto = gera_labirinto($linhas_labirinto, $colunas_labirinto);
    // for ($i=0; $i < $linhas_labirinto; $i++) {
    //     for ($j=0; $j < $colunas_labirinto; $j++) {
    //         echo $labirinto[$i][$j];
    //     }
    //     echo "<br>";
    // }
    resolve_labirinto($labirinto, $linhas_labirinto, $colunas_labirinto, 0, 0, $caminho);

    function resolve_labirinto($labirinto, $linhas, $colunas, $lInicio, $cInicio, $caminho){
        $lAtual = $lInicio;
        $cAtual = $cInicio;
        $fechado = array();


        while ($labirinto[$lAtual][$cAtual] != "Q") {

            if ($lAtual+1 < $linhas && $labirinto[$lAtual+1][$cAtual] != 1 && !in_array(array($lAtual+1, $cAtual), $caminho)) {
                $lAtual++;
            }
            else if ($cAtual+1 < $colunas && $labirinto[$lAtual][$cAtual+1] != 1 && !in_array(array($lAtual, $cAtual+1), $caminho)) {
                $cAtual++;
            }
            else if ($lAtual-1 >= 0 && $labirinto[$lAtual-1][$cAtual] != 1 && !in_array(array($lAtual-1, $cAtual), $caminho)) {
                $lAtual--;
            }
            else if ($cAtual-1 >= 0 && $labirinto[$lAtual][$cAtual-1] != 1 && !in_array(array($lAtual, cAtual-1), $caminho)) {
                $cAtual--;
            }

            $caminho[] = [$lAtual, $cAtual];

        }

        echo "<br>";
        echo $labirinto[$lAtual][$cAtual];

        if ($labirinto[$lAtual][$cAtual] == "Q") {
            echo "aqui para";
        }



        // echo "<br>";
        // echo "<pre>";
        // print_r($caminho);

        foreach ($caminho as $c) {
            $labirinto[$c[0]][$c[1]] = 2;
        }
        echo "<br>";

        for ($i=0; $i < $linhas; $i++) {
            for ($j=0; $j < $colunas; $j++) {
                echo $labirinto[$i][$j];
            }
            echo "<br>";
        }

        // if($lab[$lAtual][$cAtual] != "Q")
        //     echo "<br>";
        //     echo "Não é Q é " . $labirinto[$lAtual][$cAtual];


        if($labirinto[$lAtual][$cAtual] != "Q")
            resolve_labirinto($labirinto, $linhas, $colunas, $lAtual, $cAtual, $caminho);
    }




?>

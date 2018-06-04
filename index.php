<?php
    require_once('gera_labirinto.php');

    $linhas_labirinto = 4;
    $colunas_labirinto = 4;

    $labirinto = gera_labirinto($linhas_labirinto, $colunas_labirinto);
    for ($i=0; $i < $linhas_labirinto; $i++) {
        for ($j=0; $j < $colunas_labirinto; $j++) {
            echo $labirinto[$i][$j];
        }
        echo "<br>";
    }
    resolve_labirinto($labirinto, $linhas_labirinto, $colunas_labirinto);

    function resolve_labirinto($labirinto, $linhas, $colunas){
        $lAtual = 0;
        $cAtual = 0;
        $fechado = array();
        $caminho = array();

        while ($labirinto[$lAtual][$cAtual] != "Q") {
            if ($lAtual+1 < $linhas && $labirinto[$lAtual+1][$cAtual] != 1) {
                $lAtual++;
                array_push($caminho, array($lAtual, $cAtual));
            }
            else if ($cAtual+1 < $colunas && $labirinto[$lAtual][$cAtual+1] != 1) {
                $cAtual++;
                array_push($caminho, array($lAtual, $cAtual));
            }
            else if ($lAtual-1 >= 0 && $labirinto[$lAtual-1][$cAtual] != 1) {
                $lAtual--;
                array_push($caminho, array($lAtual, $cAtual));
            }
            else if ($cAtual-1 >= 0 && $labirinto[$lAtual][$cAtual-1] != 1) {
                $cAtual--;
                array_push($caminho, array($lAtual, $cAtual));
            }
        }

        echo $labirinto[$lAtual][$cAtual];
        echo "<br>";
        echo "<pre>";
        print_r($caminho);
        foreach ($caminho as $caminho) {
            $labirinto[$caminho[0]][$caminho[1]] = 2;
        }
        echo "<br>";

        for ($i=0; $i < $linhas; $i++) {
            for ($j=0; $j < $colunas; $j++) {
                echo $labirinto[$i][$j];
            }
            echo "<br>";
        }
    }




?>

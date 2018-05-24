<?php
    $linhas_labirinto = 4;
    $colunas_labirinto = 4;

    gera_labirinto($linhas_labirinto, $colunas_labirinto);

    function gera_labirinto($linhas, $colunas){
        for ($i=0; $i < $linhas; $i++) {
            for ($j=0; $j < $colunas; $j++) {
                $labirinto[$i][$j] = 0;
            }
        }

        for ($i=0; $i < $linhas; $i++) {
            for ($j=0; $j < $colunas; $j++) {
                $labirinto[$i][$j] = 0;
                echo $labirinto[$i][$j];
            }
            echo "<br>";
        }
    }
?>

<?php
    function gera_labirinto($linhas, $colunas){
        for ($i=0; $i < $linhas; $i++) {
            for ($j=0; $j < $colunas; $j++) {
                $labirinto[$i][$j] = 0;
            }
        }

        $labirinto[0][0] = "S";

        $i = 0;
        do {
            $laleatorio = mt_rand(0, $linhas-1);
            $caleatorio = ($laleatorio == 0) ? mt_rand(1, $colunas-1) : mt_rand(0, $colunas-1);
            $labirinto[$laleatorio][$caleatorio] = 1;
            $i++;
        } while ($i <= ($linhas*$colunas)*10/100);


        $labirinto[mt_rand(0, $linhas-1)][(mt_rand(0, $linhas-1)) ? mt_rand(1, $colunas-1) : mt_rand(0, $colunas-1)] = "Q";

        return $labirinto;
    }
?>

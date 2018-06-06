<?php
    function resolve_labirinto($labirinto, $linhas, $colunas, $lInicio, $cInicio, $caminho){
        $lAtual = $lInicio;
        $cAtual = $cInicio;
        $fechado = array();


        while ($labirinto[0][$lAtual][$cAtual] !== "Q") {

            $baixo = ($lAtual+1 < $linhas) ? $labirinto[1][$lAtual+1][$cAtual] : 5;
            $direita = ($cAtual+1 < $colunas) ? $labirinto[1][$lAtual][$cAtual+1] : 5;
            $cima = ($lAtual-1 >= 0) ? $labirinto[1][$lAtual-1][$cAtual] : 5;
            $esquerda = ($cAtual-1 >= 0) ? $labirinto[1][$lAtual][$cAtual-1] : 5;

            if ($lAtual+1 < $linhas && $labirinto[0][$lAtual+1][$cAtual] != 1 && !in_array(array($lAtual+1, $cAtual), $caminho) && min($baixo, $direita, $cima, $esquerda) === $baixo) {
                $lAtual++;
            }
            else if ($cAtual+1 < $colunas && $labirinto[0][$lAtual][$cAtual+1] != 1 && !in_array(array($lAtual, $cAtual+1), $caminho) && min($baixo, $direita, $cima, $esquerda) === $direita) {
                $cAtual++;
            }
            else if ($lAtual-1 >= 0 && $labirinto[0][$lAtual-1][$cAtual] != 1 && !in_array(array($lAtual-1, $cAtual), $caminho) && min($baixo, $direita, $cima, $esquerda) === $cima) {
                $lAtual--;
            }
            else if ($cAtual-1 >= 0 && $labirinto[0][$lAtual][$cAtual-1] != 1 && !in_array(array($lAtual, $cAtual-1), $caminho) && min($baixo, $direita, $cima, $esquerda) === $esquerda) {
                $cAtual--;
            }

            $caminho[] = [$lAtual, $cAtual];

        }

        // echo "<br>";
        //
        // if ($labirinto[0][$lAtual][$cAtual] === "Q") {
        //     echo $labirinto[0][$lAtual][$cAtual] . "aqui para";
        //
        //     echo "<br>";
        //     echo "<pre>";
        //     print_r($caminho);
        //
        $resolucao = $labirinto[0];
        foreach ($caminho as $c) {
            $resolucao[$c[0]][$c[1]] = 2;
        }
        //     echo "<br>";
        //
        //     for ($i=0; $i < $linhas; $i++) {
        //         for ($j=0; $j < $colunas; $j++) {
        //             echo $labirinto[0][$i][$j];
        //         }
        //         echo "<br>";
        //     }
        // }

        return array($labirinto[0], $resolucao, $caminho);

    }
?>

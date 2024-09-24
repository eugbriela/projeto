<?php
    include("compara.inc");
    $caminho = "C:\\wamp64\\www\\projeto\\versao.txt";
    // para teste no linux usar esse caminho 
    //$caminho = "/opt/lampp/htdocs/projeto/versao.txt"; 

    $ingles = "OUR PLANT
    The XXX INDÚSTRIA DE MÁQUINAS LTDA, was founded on 1970, and became the most important and traditional supplyer of BAGGING MACHINES in Brazil.";
    $portugues = "EMPRESA
    A XXX INDÚSTRIA DE MÁQUINAS LTDA, foi fundada em 1970, e tornou-se o mais importante e tradicional fabricante de máquinas ensacadeiras no Brasil.";
    $espanhol = "EMPRESA
    La XXX INDÚSTRIA DE MÁQUINAS LTDA, fue fundada en 1970, y sé a convertido en la más importante y tradicional fabrica de MÁQUINAS ENSACADORAS em Brasil.";


    function escrever($idioma){
        global $caminho, $ingles, $portugues, $espanhol;

        $idioma_escolhido = fopen($caminho, "w");

        if($idioma == "ingles"){
            fwrite($idioma_escolhido, $ingles);
        }
        else if($idioma == "portugues"){
            fwrite($idioma_escolhido, $portugues);
        }
        else{
            fwrite($idioma_escolhido, $espanhol);
        }

        fclose($idioma_escolhido);
    }

    function ler(){
        global $caminho;
        $ponteiro = fopen($caminho, "r");
        $total_linhas = 0;
        while(!feof($ponteiro)){
            $linha = fgets($ponteiro);
            $total_linhas++;
            echo "$linha <br>";
        }
        fclose($ponteiro);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Projeto Bimestral</title>
</head>
<body>
    <div class="content">
        <?php 
            if(isset($_COOKIE["idioma"])){
                escrever($_COOKIE["idioma"]);
                ler();
                echo "<a class='btn-voltar' href='idioma.php?idioma=excluir' class='btn-voltar'>Escolher outro idioma</a>";
            }
            else{
        ?>
            <h1>Bem vindo ao Site Web Design em Foco</h1>
                <div class="box-images">
                    <h3>Escolha um idioma para entrar</h3>
                    <div class="box-link">
                        <a href="idioma.php?idioma=ingles" class="link"><img class="img-link" src="assets/img/ingles.png" alt=""></a>
                        <a href="idioma.php?idioma=portugues" class="link"><img class="img-link" src="assets/img/pt-br.png" alt=""></a>
                        <a href="idioma.php?idioma=espanhol" class="link"><img class="img-link" src="assets/img/espanhol.png" alt=""></a>
                </div>
            </div>
        <?php
            }
        ?>
    </div>
</body>
</html>
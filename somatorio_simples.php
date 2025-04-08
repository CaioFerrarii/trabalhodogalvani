<!DOCTYPE html>
<html>
<head>
    <title>Adivinhação</title>
</head>
<body>
    <h1>Somatório de Números</h1>


    <?php
    $tentativa = 0;
    $numerosTexto = '';
    $numjogador1 = $_POST["b"];
    //$numero (jogador 2)

//IF JOGADOR 2
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //só entrará neste if quando o usuário digitar a partir do 1º valor
        if (isset($_POST['numero']) && is_numeric($_POST['numero'])) {
            $numero = (float)$_POST['numero'];

            if ($numero != 0) {
                $tentativa = isset($_POST['contador']) ? (int)$_POST['contador'] : 0; //se o contador existir, será convertido pra float, senão será 0
                $numerosTexto = isset($_POST['numerosTexto']) ? $_POST['numerosTexto'] : ''; //se numerosTexto existir, armazenará o valor em $numerosTexto

                $tentativa++;
                
                // Atualiza a string com os números, separados por vírgula
                if ($numerosTexto === '') {
                    $numerosTexto = $numero; // Se a string estiver vazia, recebe o número atual
                } else {
                    $numerosTexto = $numerosTexto . ', ' . $numero; // Caso contrário, adiciona o número com uma vírgula
                }    
                
                if ($numero > $numjogador1) {
                    echo " O número do jogador 1 é menor";
                }
                if ($numero < $numjogador1) {
                    echo "O numero do jogador 1 é maior";
                }
                if ($numero = $numjogador1) {
                    echo "Você acertou o número!";
                }
            }
        
        }
    
    
    }

    



    ?>
    
    <form method="post">
        <label for="numero">Digite um número (0 para encerrar):</label>
        <input type="number" step="any" name="numero" id="numero" required>
        <input type="hidden" name="soma" value="<?php echo $soma; ?>">
        <input type="hidden" name="contador" value="<?php echo $tentativa; ?>">
        <input type="hidden" name="numerosTexto" value="<?php echo htmlspecialchars($numerosTexto); ?>">



        <button type="submit">Adicionar</button>
    </form>
    
    <?php if ($tentativa > 0): ?>
        <h2>Resultado:</h2>
        <p>Números digitados: <?php echo htmlspecialchars($numerosTexto); ?></p>
        <p>Total de números: <?php echo $tentativa; ?></p>    <?php endif; ?>
</body>
</html>

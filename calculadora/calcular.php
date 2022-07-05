<?php
session_start();

$valor1=filter_input(INPUT_POST,'valor1');
$valor2=filter_input(INPUT_POST,'valor2');

$sinal=filter_input(INPUT_POST,'sinal');

$porcentagem=filter_input(INPUT_POST,'porcetagem');

if(!empty($porcentagem)){
    $porcentagem='%';

    switch($sinal){
        case 'adicao':
            $sinal='+';
            $valor=(($valor1/100)*$valor2)+$valor1;
        break;
    
        case 'subtracao':
            $sinal='-';
            $valor=$valor1-(($valor1/100)*$valor2);
        break;
    
        case 'multiplicar':
            $sinal='*';
            $valor=($valor1/100)*$valor2;
        break;
    
        case 'divisao':
            $sinal='/';
            $valor=$valor1/($valor2/100);
        break;
    
    }
}

if($valor1>999999999999 || $valor2>999999999999){
    $_SESSION['msg']="São Permitidos Apenas 12 Digitos Por Campo!";
    header("Location:index.php");
    exit;
}

if(empty($valor1) || !intval($valor1)){
    $_SESSION['msg']="Digite Um Número No Primeiro Valor!";
    header("Location:index.php");
    exit;
}

if(empty($valor2) || !intval($valor2)){
    $_SESSION['msg']="Digite Um Número No Segundo Valor!";
    header("Location:index.php");
    exit;
}

if(empty($sinal)){
    $_SESSION['msg']="Coloque Algum Sinal!";
    header("Location:index.php");
    exit;
}

switch($sinal){
    case 'adicao':
        $sinal='+';
        $valor=$valor1+$valor2;
    break;

    case 'subtracao':
        $sinal='-';
        $valor=$valor1-$valor2;
    break;

    case 'multiplicar':
        $sinal='*';
        $valor=$valor1*$valor2;
    break;

    case 'divisao':
        $sinal='/';
        $valor=$valor1/$valor2;
    break;

}


?>
<link rel="stylesheet" href="style.css">
<div class="resultado">
    <a href="index.php">Voltar</a>
    <div class="resultado_view">
        <strong>A conta Foi:</strong>
        <?php if(empty($porcentagem)): ?>
            <p><?php echo '<p class="valor1">'.$valor1.'</p> <p class="sinal">'.$sinal.'</p> <p class="valor2">'.$valor2.'</p> <p class="valor">= '.number_format($valor,2,',','.').'</p>'; ?></p>
        <?php else: ?>
            <p><?php echo '<p class="valor1">'.$valor1.'</p> <p class="sinal">'.$sinal.'</p> <p class="valor2">'.$valor2.$porcentagem.'</p> <p class="valor">= '.number_format($valor,2,',','.').'</p>'; ?></p>
        <?php endif; ?>
    </div>
</div>

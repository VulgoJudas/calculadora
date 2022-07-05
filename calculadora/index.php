<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php session_start(); ?>
    <div class="caixinha">
        <form action="calcular.php" method="post">
            <?php if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])): ?>
                <div class="erro">
                    <?php 
                    echo $_SESSION['msg'];
                    $_SESSION['msg']='';
                    ?>
                </div>
            <?php endif; ?>
            <span>Primeiro Valor:</span>
            <input type="number" placeholder="0" name="valor1" id="valor1">

            <span>Segundo Valor:</span>
            <input type="number" placeholder="0" name="valor2" id="valor2">
            <span>Sinal:</span>
            <select name="sinal" id="sinal">
                <option></option>
                <option value="adicao">+</option>
                <option value="subtracao">-</option>
                <option value="multiplicar">*</option>
                <option value="divisao">/</option>
            </select>
            <span>Porcentagem</span>
            <select name="porcetagem" id="porcentagem">
                <option></option>
                <option value="com_porcetagem">%</option>
            </select>
            <input type="submit" value="Calcular">
        </form>
        <mark>Feito Por: <a href="https://github.com/VulgoJudas">Henrique Alves</a></mark>
    </div>
    
</body>
</html>
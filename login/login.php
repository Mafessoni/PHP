<?php

//require_once "../routes.php";
require_once "../conexao.php"
?>


<head>
<title>Acesso ao Sistema</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
    <form method="POST" action="login.php">    
        <h3 class="text-center text-white pt-5">Login</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h1 class="text-center text-info">Login</h1>
                            <div class="form-group">
                                <label for="username" class="text-info">Usu�rio:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>                        
                            <button class="btn btn-lg btn-primary btn-block" id="btnAcessar" type="submit">Acessar</button>
<!--                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span>?<span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            
                            <div id="register-link" class="text-right">
                                <a href="#" class="text-info">Register here</a>
                            </div>
-->                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
<?php        
    
    $usuario = $_POST['username']; 
    $senha = $_POST['password'];

    if (($usuario != "") && ($senha != "")) {

        $conexao = new Conexao();

        $sql = '';
        $sql .= 'SELECT ID_OPERADORES, NOME, SENHA FROM OPERADORES';
        $sql .= " WHERE NOME = ".($usuario)." AND SENHA = ".($senha);

        $valida = $conexao->query($sql);

        while($row = sqlsrv_fetch_object($valida)){   
            echo $row->NOME;
        }
        
        die();

        if ($row > 0) {
            $message = "Acessou o sistema, parabens!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            die();
        }
    
        if ($usuario === "48") {
            if ($senha === "O") {
                $message = "Acessou o sistema, parabens!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                die();
            }
            else{
                $message = "Senha inv�lida!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                die();
            }
        }
        else {
            $message = "Usu�rio inv�lido!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            die();
        }
    }        
?>
</body>

<?php


?>
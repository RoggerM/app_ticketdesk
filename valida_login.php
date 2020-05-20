<?php

    session_start();

    print_r($_SESSION);
    
    //usuarios do sistema
    $usuarios_app = array(
        array('id' =>1, 'email' => 'adm@teste.com', 'senha' => '123456', 'perfil_id' => '1'),
        array('id' =>2, 'email' => 'user@teste.com', 'senha' => '123456', 'perfil_id' => '2'),
        array('id' =>3, 'email' => 'user2@teste.com', 'senha' => '123456', 'perfil_id' => '2'),
        array('id' =>4, 'email' => 'user3@teste.com', 'senha' => '123456', 'perfil_id' => '2'),
        array('id' =>5, 'email' => 'user4@teste.com', 'senha' => '123456', 'perfil_id' => '2'),
    );

    //variavel que verifica se a autenticacao foi realizada
    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfis = array(1 => 'Administrador', 2 => 'Usuario');

    foreach($usuarios_app as $user) {
        
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }

    }

        if($usuario_autenticado){
            $_SESSION['autenticado'] = 'SIM';
            $_SESSION['id'] = $usuario_id;
            $_SESSION['perfil_id'] = $usuario_perfil_id;
            header('Location: home.php');            
        } else{
            $_SESSION['autenticado'] = 'NÃO';
            header('Location: index.php?login=erro');
        }

    
?>
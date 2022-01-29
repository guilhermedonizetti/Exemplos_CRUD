<?php

include 'functions.php';

class Programa {

    function __construct()
    {
        $this->user = new Usuario();
    }

    public function registrarUsuario()
    {
        $retorno = $this->user->cadastrarUsuario("guilherme@mail.com", "gui123");
        echo $retorno . "\n";
    }

    public function alterarUsuario()
    {
        $retorno = $this->user->atualizarUsuario("guilherme@mail.com", "gui123", 2);
        echo $retorno . "\n";
    }

    public function buscarUsuario()
    {
        $retorno = $this->user->consultarUsuario(5);
        echo $retorno . "\n";
    }

    public function apagarUsuario()
    {
        $retorno = $this->user->deletarUsuario(5);
        echo $retorno . "\n";
    }

}

$prog = new Programa();
$prog->registrarUsuario();
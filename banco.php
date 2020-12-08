<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Conta\Conta;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Endereco;

$endereco = new Endereco('Curitiba','Centro','rua qualquer','39');
$eduardo = new Titular(new CPF('123.456.789-10'), 'Eduardo Bubniak', $endereco);
$conta1 = new Conta($eduardo);
$conta1->depositar(500);

var_dump($conta1);









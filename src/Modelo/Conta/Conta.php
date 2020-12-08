<?php

namespace Alura\Banco\Modelo\Conta;

class Conta
{
    private $titular;
    private $saldo;
    private static $numeroDeContas = 0;


    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;

        Conta::$numeroDeContas++;
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }

    public function sacar(float $valorASacar) : void
    {
        if($valorASacar > $this->saldo){
            echo 'Saldo indisponivel';
            return;
        }

        $this->saldo -= $valorASacar;
    }

    public function depositar(float $valorADepositar) : void
    {
        if($valorADepositar <= 0){
            echo 'O valor precisa ser positivo';
            return;
        }

       $this->saldo += $valorADepositar;
    }

    
    public function trasferir(float $valorATrasferir, Conta $contaDestino) : void
    {
        if($valorATrasferir > $this->saldo) {
            echo 'Saldo indisponivel';
            return;
        }

        $this->sacar($valorATrasferir);
        $contaDestino->depositar($valorATrasferir);
    }

    public function recuperarSaldo(): float
    {
        return $this->saldo;
    }

    public static function recuperaNumeroDeContas() : int
    {
        return Conta::$numeroDeContas;
    }

    public function recuperaNomeTitular(): string 
    {
        return $this->titular->recuperaNome();
    }
    
    public function recuperaCpfTitular(): string 
    {
        return $this->titular->recuperaCpf();
    }
}









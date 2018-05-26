<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 25/05/18
 * Time: 23:11
 */

namespace CDC\Loja\FluxoDeCaixa;


class Boleto
{
    private $valor;

    public function __construct($valor)
    {
        $this->valor = $valor;
    }

    public function getValor()
    {
        return $this->valor;
    }

}
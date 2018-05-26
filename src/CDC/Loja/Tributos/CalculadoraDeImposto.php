<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 26/05/18
 * Time: 08:55
 */

namespace CDC\Loja\Tributos;

use CDC\Loja\FluxoDeCaixa\Pedido;
use CDC\Loja\Tributos\TabelaInterface;

class CalculadoraDeImposto
{
    protected $tabela;

    public function __construct(TabelaInterface $tabela)
    {
        $this->tabela = $tabela;
    }

    public function calculaImposto(Pedido $pedido)
    {
        $taxa = $this->tabela->paraValor(
            $pedido->getValorTotal()
        );

        return $pedido->getValorTotal() * $taxa;
    }
}
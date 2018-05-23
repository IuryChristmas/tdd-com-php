<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 22/05/18
 * Time: 21:24
 */

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Exemplos\RelogioDoSistema;
use CDC\Loja\Tributos\TabelaInterface;

class GeradorDeNotaFiscal
{
    private $acoes;
    private $relogio;
    private $tabela;

    public function __construct($acoes, RelogioDoSistema $relogio, TabelaInterface $tabela)
    {
        $this->acoes = $acoes;
        $this->relogio = $relogio;
        $this->tabela = $tabela;
    }

    public function gera(Pedido $pedido)
    {
        $valorTabela = $this->tabela->paraValor($pedido->getValorTotal());
        $valorTotal = $pedido->getValorTotal() - ($pedido->getValorTotal() * $valorTabela);
        $nf =  new NotaFiscal(
            $pedido->getCliente(),
            $valorTotal,
            $this->relogio->hoje()
        );

        foreach ($this->acoes as $acao) {
            $acao->executa($nf);
        }

        return $nf;
    }
}
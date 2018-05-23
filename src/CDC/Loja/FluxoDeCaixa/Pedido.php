<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 22/05/18
 * Time: 21:15
 */

namespace CDC\Loja\FluxoDeCaixa;

class Pedido
{
    private $cliente;
    private $valorTotal;
    private $quantidadeItens;

    public function __construct($cliente, $valorTotal, $quantidadeItens)
    {
        $this->cliente = $cliente;
        $this->valorTotal = $valorTotal;
        $this->quantidadeItens = $quantidadeItens;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @return mixed
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    /**
     * @return mixed
     */
    public function getQuantidadeItens()
    {
        return $this->quantidadeItens;
    }



}
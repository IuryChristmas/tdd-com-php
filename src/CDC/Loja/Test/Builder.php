<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 10/05/18
 * Time: 21:49
 */

namespace CDC\Loja\Test;


use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\Produto;

class Builder
{
    public $carrinho;

    public function __construct()
    {
        $this->carrinho = new CarrinhoDeCompras();
    }

    public function comItens()
    {
        $valores = func_get_args();
        foreach ($valores as $valor){
            $this->carrinho->adiciona(
                new Produto("Item", $valor, 1)
            );
        }
        return $this;
    }

    public function cria()
    {
        return $this->carrinho;
    }
}
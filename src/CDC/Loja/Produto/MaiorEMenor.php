<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 23/04/18
 * Time: 23:07
 */

namespace CDC\Loja\Produto;

use CDC\Loja\Carrinho\CarrinhoDeCompras;

class MaiorEMenor
{
    private $menor;
    private $maior;

    public function encontra(CarrinhoDeCompras $carrinhoDeCompras)
    {
        foreach ($carrinhoDeCompras->getProdutos() as $produto) {
            if(empty($this->menor) || $produto->getValorUnitario() < $this->menor->getValorUnitario()) {
                $this->menor = $produto;
            }

            if(empty($this->maior) || $produto->getValorUnitario() > $this->maior->getValorUnitario()) {
                $this->maior = $produto;
            }
        }
    }

    public function getMenor()
    {
        return $this->menor;
    }

    public function getMaior()
    {
        return $this->maior;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 08/05/18
 * Time: 21:18
 */

namespace CDC\Loja\Produto;

use CDC\Loja\Test\TestCase;
use CDC\Loja\Carrinho\CarrinhoDeCompras;

class MaiorPrecoTest extends TestCase
{
    private $carrinho;

    protected function setUp()
    {
        $this->carrinho = new CarrinhoDeCompras();
        parent::setUp();
    }

    public function testDeveRetornarZeroSeCarrinhoVazio()
    {
        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(0, $valor, null, 0.0001);
    }

    public function testDeveRetornarValorDoItemSeCarrinhoCom1Elemento()
    {
        $this->carrinho->adiciona(new Produto("Geladeira", 1, 900.00));
        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(900.00, $valor, null, 0.0001);
    }

    public function testDeveRetornarMaiorValorSeCarrinhoComMuitosElementos()
    {
        $this->carrinho->adiciona(new Produto("Geladeira", 1, 900.00));
        $this->carrinho->adiciona(new Produto("Fogão", 1, 1500.00));
        $this->carrinho->adiciona(new Produto("Máquina de Lavar", 1, 750.00));
        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(1500.00, $valor, null, 0.0001);
    }
}
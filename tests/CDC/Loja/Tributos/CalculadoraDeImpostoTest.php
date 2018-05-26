<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 26/05/18
 * Time: 08:49
 */

namespace CDC\Loja\Tributos;


use CDC\Loja\Test\TestCase;
use CDC\Loja\FluxoDeCaixa\Pedido;
use CDC\Loja\Tributos\CalculadoraDeImposto;
use Mockery;

class CalculadoraDeImpostoTest extends TestCase
{
    public function testCalculoImpostoParaPedidosSuperiorA2000Reais()
    {
        $tabela = Mockery::mock("CDC\Loja\Tributos\TabelaInterface");
        $tabela->shouldReceive("paraValor")
            ->with(2500.0)
            ->andReturn(0.1);

        $pedido = new Pedido("Andre", 2500.0, 3);
        $calculadora = new CalculadoraDeImposto($tabela);
        $valor = $calculadora->calculaImposto($pedido);

        $this->assertEquals((2500.0 * 0.1), $valor, null, 0.00001);
    }
}
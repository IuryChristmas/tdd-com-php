<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 22/05/18
 * Time: 21:20
 */

namespace CDC\Loja\FluxoDeCaixa;


use CDC\Exemplos\RelogioDoSistema;
use CDC\Loja\Test\TestCase;
use CDC\Loja\FluxoDeCaixa\Pedido;
use CDC\Loja\FluxoDeCaixa\GeradorDeNotaFiscal;

class GeradorDeNotaFiscalTest extends TestCase
{
    public function testDeveInvocarAcoesPosteriores()
    {
        $acao1 = \Mockery::mock(
            "CDC\Loja\FluxoDeCaixa\AcaoAposGerarNotaInterface"
        );
        $acao1->shouldReceive("executa")->andReturn(true);
        $acao2 = \Mockery::mock(
            "CDC\Loja\FluxoDeCaixa\AcaoAposGerarNotaInterface"
        );
        $acao2->shouldReceive("executa")->andReturn(true);
        $tabela = \Mockery::mock("CDC\Loja\Tributos\TabelaInterface");
        //definindo futuro comportamento "paraValor"
        //que deve retornar 0.2 caso valor seja 1000.0
        $tabela->shouldReceive("paraValor")
            ->with(1000.0)
            ->andReturn(0.2);

        $relogio = new RelogioDoSistema();
        $gerador = new GeradorDeNotaFiscal([$acao1, $acao2], $relogio, $tabela);
        $pedido = new Pedido("Andre", 1000, 1);

        $nf = $gerador->gera($pedido);

        $this->assertTrue($acao1->executa($nf));
        $this->assertTrue($acao2->executa($nf));
        $this->assertNotNull($nf);
        $this->assertInstanceOf("CDC\Loja\FluxoDeCaixa\NotaFiscal", $nf);
    }

    public function testDeveConsultarATabelaParaCalcularValor()
    {
        //mockando em uma tabela ainda inexistente
        $tabela = \Mockery::mock("CDC\Loja\Tributos\TabelaInterface");
        //definindo futuro comportamento "paraValor"
        //que deve retornar 0.2 caso valor seja 1000.0
        $tabela->shouldReceive("paraValor")
            ->with(1000.0)
            ->andReturn(0.2);
        $pedido = new Pedido("Andre", 1000, 1);
        $relogio = new RelogioDoSistema();
        $gerador = new GeradorDeNotaFiscal($pedido, $relogio, $tabela);
        $nf = $gerador->gera($pedido);

        $this->assertEquals(1000 * 0.8, $nf->getValor(), null, 0.00001);
    }
}
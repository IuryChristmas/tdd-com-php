<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 25/05/18
 * Time: 23:19
 */

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\FluxoDeCaixa\Fatura;
use CDC\Loja\FluxoDeCaixa\Pagamento;
use CDC\Loja\FluxoDeCaixa\MeioPagamento;
use ArrayObject;

class ProcessadorDeBoletos
{
    public function processa(ArrayObject $boletos, Fatura $fatura)
    {
        foreach ($boletos as $boleto){
            $pagamento = new Pagamento($boleto->getValor(), MeioPagamento::BOLETO);

            $fatura->adicionaPagamento($pagamento);
        }
    }
}
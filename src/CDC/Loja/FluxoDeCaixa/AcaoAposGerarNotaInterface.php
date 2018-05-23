<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 22/05/18
 * Time: 22:00
 */

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\FluxoDeCaixa\NotaFiscal;

interface AcaoAposGerarNotaInterface
{
    public function executa(NotaFiscal $notaFiscal);
}
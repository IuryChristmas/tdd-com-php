<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 25/05/18
 * Time: 23:06
 */

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\FluxoDeCaixa\Pagamento;
use ArrayObject;

class Fatura
{
    private $cliente;
    private $valor;
    private $pagamentos;
    private $pago = false;

    public function __construct($cliente, $valor)
    {
        $this->cliente = $cliente;
        $this->valor = $valor;
        $this->pagamentos = new ArrayObject();
    }

    public function setPago($pago)
    {
        $this->pago = $pago;
    }

    public function isPago()
    {
        return $this->pago;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getPagamentos()
    {
        return $this->pagamentos;
    }

    public function adicionaPagamento(Pagamento $pagamento)
    {
        $this->pagamentos->append($pagamento);

        $valorTotal = 0;

        foreach ($this->pagamentos as $p){
            $valorTotal += $p->getValor();
        }

        if($valorTotal >= $this->valor) {
            $this->pago = true;
        }
    }
}
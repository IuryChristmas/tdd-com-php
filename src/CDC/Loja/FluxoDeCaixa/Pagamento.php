<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 25/05/18
 * Time: 23:13
 */

namespace CDC\Loja\FluxoDeCaixa;


class Pagamento
{
    private $valor;
    private $meioPagamento;

    public function __construct($valor, $meioPagamento)
    {
        $this->valor = $valor;
        $this->meioPagamento = $meioPagamento;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }
}
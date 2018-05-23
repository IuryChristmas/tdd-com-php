<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 22/05/18
 * Time: 21:17
 */

namespace CDC\Loja\FluxoDeCaixa;


class NotaFiscal
{
    private $cliente;
    private $valor;
    private $data;

    public function __construct($cliente, $valor, $data)
    {
        $this->cliente = $cliente;
        $this->valor = $valor;
        $this->data = $data;
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
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }



}
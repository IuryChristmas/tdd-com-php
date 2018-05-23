<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 30/04/18
 * Time: 21:53
 */

namespace CDC\Loja\RH;


class Funcionario
{
    protected $nome;
    protected $salario;
    protected $cargo;

    public function __construct($nome, $salario, $cargo)
    {
        $this->nome = $nome;
        $this->salario = $salario;
        $this->cargo = $cargo;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }


}
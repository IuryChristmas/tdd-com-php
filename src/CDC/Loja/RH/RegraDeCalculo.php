<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 16/05/18
 * Time: 23:42
 */

namespace CDC\Loja\RH;

use CDC\Loja\RH\Funcionario;

abstract class RegraDeCalculo
{

    public function calcula(Funcionario $funcionario)
    {
        $salario = $funcionario->getSalario();
        if($salario > $this->limite()) {
            return $salario * $this->porcentagemAcimaDoLimite();
        }
        return $salario * $this->porcentagemBase();
    }

    protected function limite(){}

    protected function porcentagemAcimaDoLimite(){}

    protected function porcentagemBase(){}
}
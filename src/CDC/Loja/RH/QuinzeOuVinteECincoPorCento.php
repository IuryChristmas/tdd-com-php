<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 16/05/18
 * Time: 23:44
 */

namespace CDC\Loja\RH;

use CDC\Loja\RH\RegraDeCalculo;

class QuinzeOuVinteECincoPorCento extends RegraDeCalculo
{

    protected function porcentagemBase()
    {
        return 0.85;
    }

    protected function porcentagemAcimaDoLimite()
    {
        return 0.75;
    }

    protected function limite()
    {
        return 2500;
    }

}
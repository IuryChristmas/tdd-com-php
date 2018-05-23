<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 16/05/18
 * Time: 23:44
 */

namespace CDC\Loja\RH;

use CDC\Loja\RH\RegraDeCalculo;

class DezOuVintePorCento extends RegraDeCalculo
{
    protected function porcentagemBase()
    {
        return 0.9;
    }

    protected function porcentagemAcimaDoLimite()
    {
        return 0.8;
    }

    protected function limite()
    {
        return 3000;
    }

}
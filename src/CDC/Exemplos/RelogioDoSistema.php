<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 22/05/18
 * Time: 22:22
 */

namespace CDC\Exemplos;

use CDC\Exemplos\RelogioInterface;
use DateTime;

class RelogioDoSistema implements RelogioInterface
{
    public function hoje()
    {
        return \DateTime::createFromFormat(
            'Y-m-d', date('Y-m-d')
        );
    }

}
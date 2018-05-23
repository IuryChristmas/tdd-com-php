<?php
/**
 * Created by PhpStorm.
 * User: christmas
 * Date: 30/04/18
 * Time: 22:02
 */

namespace CDC\Loja\RH;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;
use CDC\Loja\RH\Funcionario;
use CDC\Loja\RH\TabelaCargos;
use CDC\Loja\RH\CalculadoraDeSalario;

class CalculadoraDeSalarioTest extends PHPUnit
{
    public function testCalculoSalarioDesenvolvedoresComSalarioAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario("Andre", 1500.0, "desenvolvedor");
        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals($desenvolvedor->getSalario() * 0.9, $salario, null, 0.00001);
    }

    public function testCalculoSalarioDesenvolvedoresComSalarioAcimaDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario("Andre", 4000.0, "desenvolvedor");
        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals($desenvolvedor->getSalario() * 0.8, $salario, null, 0.00001);
    }

    public function testCalculoSalarioParaDBAsComSalarioAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $dba = new Funcionario("Mauricio", 1500.00, "dba");
        $salario = $calculadora->calculaSalario($dba);

        $this->assertEquals($dba->getSalario() * 0.85, $salario, null, 0.00001);
    }

    public function testCalculoSalarioParaDBAsComSalarioAcimaDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $dba = new Funcionario("Mauricio", 4500.00, "dba");
        $salario = $calculadora->calculaSalario($dba);

        $this->assertEquals($dba->getSalario() * 0.75, $salario, null, 0.00001);
    }
}
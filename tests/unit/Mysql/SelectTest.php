<?php

namespace QueryBuilder\Mysql;
use PHPUnit\Framework\TestCase;

class SelectTest extends TestCase
{
    public function testSelectSemFiltro()
    {
        $select = new Select;
        $select->table('pages');

        $actual = $select->getSql();
        $expected = 'SELECT * FROM pages;';

        $this->assertEquals($expected, $actual);
    }
    public function testSelectCemFiltro()
    {
        $select = new Select;
        $select->table('pages');

        $stub = $this->getMockBuilder(Filters::class)
            ->disableOriginalConstructor()
            ->getMock();
        $stub->method('getSql')
            ->willReturn('WHERE id=1 ORDER BY created desc');
        $select->filter($stub);

        $actual = $select->getSql();
        $expected = 'SELECT * FROM pages WHERE id=1 ORDER BY created desc;';

        $this->assertEquals($expected, $actual);
    }
    public function testSelectEspecificandoOsCampos()
    {
        $select = new Select();
        $select->table('users');
        $select->fields(['name','email']);

        $actual = $select->getSql();
        $expected = 'SELECT name, email FROM users;';

        $this->assertEquals($expected, $actual);
    }
}
<?php

namespace QueryBuilder\Mysql;
use PHPUnit\Framework\TestCase;

class FiltersTest extends TestCase
{
    public function testWhere()
    {
        $filter = new Filters;
        $filter->where('id','=',1);

        $actual = $filter->getSql();
        $expected = 'WHERE id=1';

        $this->assertEquals($expected, $actual);
    }

    public function testOrderByAndSelect()
    {
        $filter = new Filters;
        $filter->where('id','=',1);
        $filter->orderBy('created','desc');

        $actual = $filter->getSql();
        $expected = 'WHERE id=1 ORDER BY created desc';

        $this->assertEquals($expected, $actual);
    }

    public function testOrderBy()
    {
        $filter = new Filters;
        $filter->orderBy('created','desc');

        $actual = $filter->getSql();
        $expected = 'ORDER BY created desc';

        $this->assertEquals($expected, $actual);
    }
}
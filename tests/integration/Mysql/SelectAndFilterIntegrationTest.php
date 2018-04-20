<?php
/**
 * Created by PhpStorm.
 * User: Mangueira
 * Date: 20/04/2018
 * Time: 09:58
 */
namespace QueryBuilder\Mysql;
use PHPUnit\Framework\TestCase;


class SelectAndFilterIntegrationTest extends TestCase
{
    public function testSelectComFiltroWhereEorder()
    {
        $select = new Select;
        $select->table('pages');

        $filters = new Filters;
        $filters->where('id','=',1);
        $filters->orderBy('created','desc');

        $select->filter($filters);

        $actual = $select->getSql();
        $expected = 'SELECT * FROM pages WHERE id=1 ORDER BY created desc;';

        $this->assertEquals($expected, $actual);
    }
}
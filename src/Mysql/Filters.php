<?php
/**
 * Created by PhpStorm.
 * User: Mangueira
 * Date: 20/04/2018
 * Time: 09:39
 */

namespace QueryBuilder\Mysql;


class Filters
{
    private $sql = [];

    public function where(string $field, string $condition, $value)
    {
        $where = 'WHERE %s%s%s';
        $this->sql[] = sprintf($where, $field, $condition, $value);
        return $this;
    }

    public function orderBy(string $field, string $oder)
    {
        $this->sql[] = 'ORDER BY created desc';
        return $this;
    }

    public function getSql()
    {
        return implode(' ' , $this->sql);
    }


}
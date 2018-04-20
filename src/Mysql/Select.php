<?php
/**
 * Created by PhpStorm.
 * User: Mangueira
 * Date: 20/04/2018
 * Time: 09:22
 */
namespace QueryBuilder\Mysql;

class Select
{
    private $table;
    private $fields = [];
    private $filter = [];

    public function table(string $table)
    {
        $this->table = $table;
        return $this;
    }

    public function fields(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    public function getSql(): string
    {
        $fields = '*';
        if (!empty($this->fields)) {
            $fields = implode(', ', $this->fields);
        }

        $filter = '';
        if(!empty($this->filter)){
            $filter = ' '.$this->filter;
        }
        $query = 'SELECT %s FROM %s%s;';
        return sprintf($query, $fields, $this->table,$filter);
    }

    public function filter(Filters $filters)
    {
        $this->filter = $filters->getSql();
    }
}
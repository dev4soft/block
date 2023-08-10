<?php


namespace Block\Models;
use \Novokhatsky\DbConnect;


class BlockList
{
    private DbConnect $db;


    public function __construct(DbConnect $db)
    {
        $this->db = $db;
    }
}
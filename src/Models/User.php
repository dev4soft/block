<?php

namespace Block\Models;

class User
{
    public function __construct()
    {
    }


    public function checkpass($login, $pass)
    {
        return ($login === 'admin') && ($pass === '132435');
    }
}


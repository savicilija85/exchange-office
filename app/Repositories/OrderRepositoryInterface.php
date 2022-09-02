<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface OrderRepositoryInterface
{
    public function store(array $data) : Model;
}

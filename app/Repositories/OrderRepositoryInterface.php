<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface OrderRepositoryInterface
{
    public function getAllOrders(array $options = []) : array;
    public function store(array $data) : Model;
}

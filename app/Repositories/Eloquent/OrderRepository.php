<?php


namespace App\Repositories\Eloquent;


use App\Models\Order;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class OrderRepository implements OrderRepositoryInterface
{
    public function store(array $data): Model
    {
        return Order::create($data);
    }
}

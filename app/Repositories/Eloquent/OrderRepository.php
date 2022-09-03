<?php


namespace App\Repositories\Eloquent;


use App\Models\Order;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class OrderRepository implements OrderRepositoryInterface
{
    public function getAllOrders(array $options = []): array
    {
        $orders = Order::query();

        if(!empty($options)){
            if(!empty($options['sortBy']) && !empty($options['sortDesc'])){
                $options['sortDesc'][0] = $options['sortDesc'][0] === 'true' ? 'DESC' : 'ASC';
                $orders->orderBy($options['sortBy'][0], $options['sortDesc'][0]);
            }

            $options['itemsPerPage'] = intval($options['itemsPerPage']);
            $options['page'] = intval($options['page']);
            if($options['itemsPerPage'] > 0){
                $orders->paginate($options['itemsPerPage'], '*', 'page', $options['page']);
            }

        }

        $orders = $orders->get();
        $orders = [
            'orders' => $orders,
            'totalOrders' => Order::count()
        ];

        return $orders;
    }

    public function store(array $data): Model
    {
        return Order::create($data);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Orderdetail;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = new Order;

        $order->company_id = 1;
        $order->table_id = 1;
        $order->internal_id = 1;
        $order->user_id = 1;
        $order->save();

        $orderdetail = new Orderdetail();
        $orderdetail->product_id = 1;
        $orderdetail->order_id = $order->id;
        $orderdetail->quantity = 1;
        $orderdetail->unit_ammount = 3000;
        $orderdetail->total_ammount = 3000;
        $orderdetail->save();


        $orderdetail = new Orderdetail();
        $orderdetail->product_id = 2;
        $orderdetail->order_id = $order->id;
        $orderdetail->quantity = 1;
        $orderdetail->unit_ammount = 3000;
        $orderdetail->total_ammount = 3000;
        $orderdetail->save();

        $orderdetail = new Orderdetail();
        $orderdetail->product_id = 3;
        $orderdetail->order_id = $order->id;
        $orderdetail->quantity = 2;
        $orderdetail->unit_ammount = 3000;
        $orderdetail->total_ammount = 6000;
        $orderdetail->save();

        /*-------------------------------------*/
        $order = new Order;
        $order->company_id = 1;
        $order->table_id = 2;
        $order->internal_id = 2;
        $order->user_id = 1;
        $order->save();

        $orderdetail = new Orderdetail();
        $orderdetail->product_id = 1;
        $orderdetail->order_id = $order->id;
        $orderdetail->quantity = 1;
        $orderdetail->unit_ammount = 3000;
        $orderdetail->total_ammount = 3000;
        $orderdetail->save();
    }
}

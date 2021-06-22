<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashregister extends Model
{
    protected $fillable = [
        'user_id_open',
        'user_id_close',
        'company_id',
        'ammount_open',
        'closed',
        'created_at',
        'updated_at'];


    public function orders()
    {
        return $this->hasMany('App\Order');
    }


    public function getBreakdownAttribute(){
        $cal_iva    = 0.19/1.19;
        $cal_credit = 2.95/100;
        $cal_debit  = 1.49/100;

        $send['credit_card']=0;
        $send['debit_card']=0;
        $send['efective']=0;
        $send['transfer']=0;
        $send['discount']=0;
        $send['tip']=0;
        $send['delivery']=0;

        foreach ($this->orders as $key => $order) {
            $send['credit_card']+=$order->credit_card;
            $send['debit_card']+=$order->debit_card;
            $send['efective']+=$order->efective;
            $send['transfer']+=$order->transfer;
            $send['discount']+=$order->discount;
            $send['tip']+=$order->tip;
            $send['delivery']+=$order->delivery;
        }

        $send['credit_card_iva']        = round($send['credit_card']  * $cal_iva);
        $send['credit_card_comision']   = round($send['credit_card']  * $cal_credit);

        $send['debit_card_iva']         = round($send['debit_card']   * $cal_iva);
        $send['debit_card_comision']    = round($send['debit_card']   * $cal_debit);


        $send['efective_iva']       = round($send['efective']     * $cal_iva);
        $send['transfer_iva']       = round($send['transfer']     * $cal_iva);


        return (object) $send;
    }
}

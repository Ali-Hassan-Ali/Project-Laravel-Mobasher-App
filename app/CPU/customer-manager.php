<?php

namespace App\CPU;

use App\Model\CustomerWalletHistory;
use App\Model\SupportTicket;
use App\Model\Transaction;

class CustomerManager
{
    public static function create_support_ticket($data)
    {
        $support = new SupportTicket();
        $support->customer_id = $data['customer_id'];
        $support->subject = $data['subject'];
        $support->type = $data['type'];
        $support->priority = $data['priority'];
        $support->description = $data['description'];
        $support->status = $data['status'];
        $support->save();

        return $support;
    }

    public static function user_transactions($customer_id, $customer_type)
    {
        return Transaction::where(['payer_id' => $customer_id])->orWhere(['payment_receiver_id' => $customer_type])->get();
    }

    public static function user_wallet_histories($user_id)
    {
        return CustomerWalletHistory::where(['customer_id' => $user_id])->get();
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Classes\Factor;
use App\Classes\Gateway;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;


class OrderController extends Controller
{
    private $invoice;

    protected $order;

    public function buy($plan_id)
    {
        $plan = Plan::where('id', $plan_id)->first();

        $existsOrder = Order::whereNotNull(Order::PAID_AT)
            ->whereNotNull(Order::TRANSACTION_ID)
            ->where(Order::EXPIRED_AT,'>=',Carbon::now())->count();

        if ($existsOrder >= 1){
            return back();
        }


        $order = Order::create([
            Order::EXPIRED_AT => Carbon::now()->addMonths($plan->value),
            Order::USER_ID => auth()->id(),
            Order::PLAN_ID => $plan->id,
            Order::PRICE => $plan->price,
        ]);


        $factor = new Factor($order);

        $result = $this->pay($factor);

        return redirect()->to($result['action']);

    }

    public function pay(Factor $factor)
    {
        $order = $factor->getOrder();

        $invoice = $factor->detail([
            'description' =>  "$order->id"
        ]);

        $gateway = new Gateway(config('payment'));

        $gateway->callbackUrl(route('user.callback'));

        return $gateway->purchase($invoice, function ($driver, $transactionId) use ($factor) {

            $factor->getOrder()->update([
                Order::TRANSACTION_ID => $factor->getTransactionId()
            ]);

        })->pay()->jsonSerialize();

        return $payment;
    }

    public function verify(Request $request)
    {
        $transaction_id = $request->get('Authority');



        try {
            $this->order = Order::where(Order::TRANSACTION_ID, $transaction_id)
                ->first();

            $gateway = new Gateway(config('payment'));

            $reception = $gateway->amount($this->order->price)
                ->transactionId($transaction_id)
                ->verify()
                ->getReferenceId();

            Order::where(Order::TRANSACTION_ID,$transaction_id)->update([
               Order::PAID_AT => Carbon::now(),
               Order::RECEIPT_CODE => $reception,
            ]);

            return redirect('/');

        } catch (InvalidPaymentException $exception) {
            $this->order->delete();
            return redirect(route('user.plans'));
        }

    }


}

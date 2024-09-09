<?php

namespace App\Http\Controllers;

use App\Constants\Order\OrderStatusEnum;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Order;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::all();
        return view('admin.prices.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id, Request $request)
    {
        $plan = Plan::query()->find($id);
        $paymentType = $request->query('payment_type');

        $order = new Order();
        $order->user_id = auth()->id();
        $order->plan_id = $plan->id;
        $order->price = $plan->price;
        $order->status = OrderStatusEnum::PENDING->value;
        $order->save();

        if ($paymentType == 'Payme') {
            $merchant_id = config('services.payme.merchant_id');
            $order_id = $order->id;
            $amount = $order->price;
            $params = "m={$merchant_id};ac.order_id={$order_id};a={$amount}";
            $base64Params = base64_encode($params);
            $checkoutUrl = "https://checkout.paycom.uz/{$base64Params}";

            return redirect()->away($checkoutUrl);
        }
        if ($paymentType == 'Click') {
            $merchant_id = config('services.click.merchant_id');
            $service_id = config('services.click.service_id');
            $order_id = $order->id;
            $amount = $order->price;

            $url = "https://my.click.uz/services/pay?service_id={$service_id}&merchant_id={$merchant_id}&amount={$amount}&transaction_param={$order_id}";

            return redirect()->away($url);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        //
    }
}

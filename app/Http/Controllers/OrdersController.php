<?php

declare (strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrdersRequest;
use App\Services\OrderService;

/**
 * OrdersController
 * 
 * Class used to process user order data
 * 
 */
class OrdersController extends Controller
{
    public function __construct(
        private OrderService $orderService
    ) {}

    /**
     * order
     * 
     * Process order and return user to order review
     * or return error if order validation fails.
     *
     * @param OrdersRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public function order(OrdersRequest $request): \Illuminate\Contracts\View\View
    {
        if (!$request->isMethod('post')) {
            return view('index');
        }

        $validateData = $request->validated();
        // If data was not validated or was not saved to DB
        if (!$validateData) {
            return view('index');
        }

        $orderData = $this->orderService->processOrder($validateData);
        // If data was not validated or was not saved to DB
        if (!$orderData) {
            return view('index');
        }

        // Return user to order review with order data
        return view('order')->with('orderData', $orderData);

    }
    
}

<?php

declare (strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\OrdersRequest;

/**
 * OrdersController
 * 
 * Class used to process user order data
 * 
 */
class OrdersController extends Controller
{    
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
        if ($request->isMethod('post')) {
            $orderData = $this->processOrder($request);
            // Return user to order review
            if ($orderData) {
                return view('order')->with('orderData', $orderData);
            }
        }
    }
    
    /**
     * processOrder
     * 
     * Process user data by validating user input and saving data to DB
     *
     * @param OrdersRequest $request
     * @return array
     */
    private function processOrder(OrdersRequest $request): array
    {
        $validatedData = $request->validated();

        $orderData = [
            'client_name' => $validatedData['name'],
            'client_phone' => $validatedData['phone'],
            'tree_type' => $validatedData['product-type'],
            'tree_amount' => $validatedData['product-count'],
            'tree_size' => $validatedData['product-size'],
            'price' => $validatedData['product-price'],
            'delivery' => $request->input('with-delivery', false),
        ];

        Order::create($orderData);
        return $orderData;

    }
}

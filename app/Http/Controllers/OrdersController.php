<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{    
    /**
     * order
     * 
     * Process order and return user to order review
     * or return error if order validation fails.
     *
     * @param  mixed $request
     * @return void
     */
    public function order(Request $request) {

        if ($request->isMethod('post')) {

            // Validation
            $validated = $request->validate([
                'name' => 'required|regex:/[a-zA-Z0-9Ā-Žā-ž\s]{3,}/|max:20',
                'phone' => 'required|regex:/[0-9+-]{8,}/|max:20',
                'product-type' => 'required|regex:/[a-zA-ZĀ-Žā-ž\s]{5,}/|max:50',
                'product-count' => 'required|digits:1',
                'product-size' => 'required|digits:3',
                'product-price' => 'required|numeric|digits_between:2,3',
            ]);

            // If validation was successfull
            $order_data = [
                'client_name' => request('name'),
                'client_phone' => request('phone'),
                'chrystmas_tree_type' => request('product-type'),
                'chrystmas_tree_amount' => request('product-count'),
                'chrystmas_tree_size' => request('product-size'),
                'chrystmas_tree_price' => request('product-price'),
                'delivery' => request('with-delivery')
            ];

            // Save order in DB
            $order = new Order;

            $order->client_name = $order_data['client_name'];
            $order->client_phone = $order_data['client_phone'];
            $order->tree_type = $order_data['chrystmas_tree_type'];
            $order->tree_amount = $order_data['chrystmas_tree_amount'];
            $order->tree_size = $order_data['chrystmas_tree_size'];
            $order->price = $order_data['chrystmas_tree_price'];
            $order->delivery = $order_data['delivery'];

            // Return user to order review
            if ($order->save()) {
                return view('order')->with('order_data', $order_data);
            }
        }
    }
}
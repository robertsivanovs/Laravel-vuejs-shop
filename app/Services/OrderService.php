<?php

declare (strict_types=1);
namespace App\Services;

use App\Models\Order;

/**
 * OrderService
 * 
 */
class OrderService
{
    /**
     * processOrder
     * 
     * Process user data by validating user input and saving data to DB
     *
     * @param array $validatedData
     * @return array
     */
    public function processOrder(array $validatedData): array
    {
        if (!$validatedData) {
            return [];
        }

        // Data for storing user input to DB
        $orderData = [
            'client_name' => $validatedData['name'],
            'client_phone' => $validatedData['phone'],
            'tree_type' => $validatedData['product-type'],
            'tree_amount' => $validatedData['product-count'],
            'tree_size' => $validatedData['product-size'],
            'price' => $validatedData['product-price'],
            'delivery' => $validatedData['delivery'] ?? ""
        ];

        // Save the data to DB
        Order::create($orderData);
        return $orderData;

    }
}

<?php

namespace App\Http\Controllers;

use App\CustomerOrder;
use App\CustomerOrderDetails;
use App\FinishedProduct;
use App\FPrmitem;
use App\Http\Controllers\Controller;
use App\RawMaterial;
use Illuminate\Http\Request;

class ForecastingController extends Controller
{
    public function order(Request $request)
    {
        $orders = CustomerOrder::where('del_status', 'Live')->get();
        $title = 'Forecasting by Order';
        $order_id = $request->order_id;
        $quantity = $request->quantity;
        $product_id = [];
        $product_quantity = [];
        if ($order_id) {
            foreach ($order_id as $k => $value) {
                $order = CustomerOrderDetails::where('customer_order_id', $value)->where('del_status', 'Live')->get();
                foreach ($order as $key => $v) {
                    $product_id[] = $v->product_id;
                    $product_quantity[] = $v->quantity * $quantity[$k];
                }
            }
        }

        $obj = FinishedProduct::with(['rmaterials', 'rmaterials.rawMaterials.unit', 'nonInventory', 'rmaterials.rawMaterials', 'nonInventory.nonInventoryItem', 'stage'])->whereIn('id', $product_id)->get()->map(function ($item, $key) use ($product_quantity) {
            $item->required_quantity = $product_quantity[$key];
            $item->need_to_purchase = $item->current_total_stock < $item->required_quantity ? $item->required_quantity - $item->current_total_stock : 0;
            return $item;
        });
        return view('pages.forecasting.order', compact('orders', 'title', 'order_id', 'obj', 'product_quantity'));
    }

    public function product(Request $request)
    {
        $products = FinishedProduct::where('del_status', 'Live')->get();
        $title = 'Forecasting by Product';
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $material_id = [];
        $material_quantity = [];
        if ($product_id) {
            foreach ($product_id as $k => $value) {
                $rawMaterials = FPrmitem::where('finish_product_id', $value)->get();
                foreach ($rawMaterials as $key => $value) {
                    $material_id[] = $value->rmaterials_id;
                    $material_quantity[] = $value->consumption * $quantity[$k];
                }
            }
        }

        $obj = RawMaterial::whereIn('id', $material_id)->get()->map(function ($item, $key) use ($material_quantity) {
            $item->required_quantity = $material_quantity[$key];
            $item->need_to_purchase = $item->current_stock < $item->required_quantity ? $item->required_quantity - $item->current_stock : 0;
            return $item;
        });
        return view('pages.forecasting.product', compact('products', 'title', 'product_id', 'quantity', 'obj'));
    }
}

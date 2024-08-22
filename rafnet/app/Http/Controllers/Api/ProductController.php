<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::paginate();
        return response()->json($products);
    }
}
?>
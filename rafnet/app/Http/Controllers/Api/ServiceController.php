<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Services;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return response()->json($services);
    }
}

?>
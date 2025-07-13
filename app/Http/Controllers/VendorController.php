<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vendor;
class VendorController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'company_name' => 'required|string',
        ]);

        $vendor = Vendor::create([
            'user_id' => auth()->id(),
            'name' => $data['name'],
            'company_name' => $data['company_name'],
        ]);

        return response()->json($vendor, 201);
    }

    public function bulkStore(Request $request)
{
    $data = $request->validate([
        '*.name' => 'required|string',
        '*.company_name' => 'required|string',
    ]);

    $created = [];

    foreach ($data as $item) {
        $created[] = Vendor::create([
            'user_id' => auth()->id(),
            'name' => $item['name'],
            'company_name' => $item['company_name'],
        ]);
    }

    return response()->json([
        'message' => 'Bulk insert success',
        'data' => $created
    ]);
}

}

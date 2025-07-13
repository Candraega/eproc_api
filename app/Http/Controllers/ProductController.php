<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    public function index()
    {
        return Product::whereHas('vendor', function ($q) {
            $q->where('user_id', auth()->id());
        })->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        // Check if the vendor belongs to the user
        $vendor = Vendor::where('id', $data['vendor_id'])->where('user_id', auth()->id())->firstOrFail();

        $product = Product::create($data);

        return response()->json($product, 201);
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Request $request, Product $product)
    {
        $this->authorizeProduct($product);

        $data = $request->validate([
            'name' => 'string',
            'description' => 'string|nullable',
            'price' => 'numeric',
        ]);

        $product->update($data);

        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $this->authorizeProduct($product);
        $product->delete();

        return response()->json(null, 204);
    }

    private function authorizeProduct(Product $product)
    {
        if ($product->vendor->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
    }

    public function bulkStore(Request $request)
{
    $data = $request->validate([
        '*.vendor_id' => 'required|exists:vendors,id',
        '*.name' => 'required|string',
        '*.description' => 'nullable|string',
        '*.price' => 'required|numeric',
    ]);

    $created = [];

    foreach ($data as $item) {
        // Optional: cek vendor milik user
        $vendor = Vendor::where('id', $item['vendor_id'])->where('user_id', auth()->id())->first();
        if (!$vendor) continue;

        $created[] = Product::create($item);
    }

    return response()->json([
        'message' => 'Bulk insert success',
        'data' => $created
    ]);
}

}

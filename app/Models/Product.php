<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['vendor_id', 'name', 'description', 'price'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}

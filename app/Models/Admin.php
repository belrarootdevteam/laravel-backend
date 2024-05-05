<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }

    public function preorders()
    {
        return $this->hasMany(Preorder::class);
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
}

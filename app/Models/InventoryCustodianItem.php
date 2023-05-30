<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventoryCustodianItem extends Model
{
    use SoftDeletes;
    protected $connection = 'PROPERTY_MANAGEMENT_INVENTORY_CONNECTION';
    use HasFactory;
    protected $fillable = [
        'ic_id',
        'item_id',
        'quantity',
        'unit',
        'unit_cost',
        'unit_total_cost',
        'inventory_item_no',
        'est_useful_life',
    ];

    public function inventoryCustodian()
    {
        return $this->belongsTo(InventoryCustodian::class, 'id', 'ic_id');
    }

    public function item()
    {
        return $this->hasMany(Item::class, 'id', 'item_id');
    }
}

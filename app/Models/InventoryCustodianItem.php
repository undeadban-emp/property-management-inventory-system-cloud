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
        'acquisition_date'
    ];

    public function inventoryCustodian()
    {
        return $this->belongsTo(InventoryCustodian::class, 'id', 'ic_id');
    }

    public function inventoryCustodianEndUser()
    {
        return $this->hasMany(InventoryCustodianItemEndUser::class, 'ic_item_id', 'id');
    }

    public function item()
    {
        return $this->hasMany(Item::class, 'id', 'item_id');
    }

    public function inventoryCustodianItemEndUser()
    {
        return $this->hasMany(InventoryCustodianItemEndUser::class, 'ic_item_id', 'id');
    }
}

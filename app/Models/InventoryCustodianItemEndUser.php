<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryCustodianItemEndUser extends Model
{
    use HasFactory;
    protected $connection = 'PROPERTY_MANAGEMENT_INVENTORY_CONNECTION';
    use HasFactory;
    protected $fillable = [
        'ic_item_id',
        'property_no',
        'end_user',
        'is_returned',
        'serial_no',
        'created_at', 
        'updated_at',
        'plate_number',
        'engine_number',
        'chassis_number',
        'status'
     ];

    public function item()
    {
        return $this->hasMany(Item::class, 'id', 'item_id');
    }

    public function inventoryCustodianItem()
    {
        return $this->belongsTo(InventoryCustodianItem::class, 'id', 'ic_item_id');
    }
}

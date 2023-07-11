<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyAcknowledgementItemEndUser extends Model
{
    use SoftDeletes;
    protected $connection = 'PROPERTY_MANAGEMENT_INVENTORY_CONNECTION';
    use HasFactory;
    protected $fillable = [
        'pa_item_id',
        'property_no',
        'end_user',
        'serial_no',
        'is_returned',
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

    public function propertyAcknowledgementItem()
    {
        return $this->belongsTo(PropertyAcknowledgementItem::class, 'pa_item_id', 'id');
    }
}

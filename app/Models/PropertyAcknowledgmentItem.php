<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyAcknowledgmentItem extends Model
{
    use SoftDeletes;
    protected $connection = 'PROPERTY_MANAGEMENT_INVENTORY_CONNECTION';
    use HasFactory;
    protected $fillable = [
        'pa_id',
        'quantity',
        'unit',
        'item_id',
        'acquisition_date',
        'acquisition_cost',
        'property_no',
        'end_user',
     ];
     public function propertyAcknowledgement()
    {
        return $this->belongsTo(PropertyAcknowledgement::class, 'id', 'pa_id');
    }

    public function item()
    {
        return $this->hasMany(Item::class, 'id', 'item_id');
    }
}

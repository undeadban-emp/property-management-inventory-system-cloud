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
        'acquisition_total_cost',
        'property_no',
     ];
    public function propertyAcknowledgement()
    {
        return $this->belongsTo(PropertyAcknowledgement::class, 'pa_id', 'id');
    }

    public function propertyAcknowledgementEndUser()
    {
        return $this->hasMany(PropertyAcknowledgementItemEndUser::class, 'pa_item_id', 'id');
    }

    public function item()
    {
        return $this->hasMany(Item::class, 'id', 'item_id');
    }
}

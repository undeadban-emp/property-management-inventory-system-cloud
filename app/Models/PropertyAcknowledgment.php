<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyAcknowledgment extends Model
{
    use SoftDeletes;
    protected $connection = 'PROPERTY_MANAGEMENT_INVENTORY_CONNECTION';
    use HasFactory;
    protected $fillable = [
        'office_code',
        'received_from',
        'received_from_pos',
        'received_by',
        'received_by_pos',
        'received_from_date',
        'received_by_date',
        'date_acquired',
        'note',
     ];
     public function propertyAcknowledgementItem()
     {
         return $this->hasMany(PropertyAcknowledgementItem::class, 'pa_id', 'id');
     }
}

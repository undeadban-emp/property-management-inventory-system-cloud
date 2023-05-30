<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $connection = 'PROPERTY_MANAGEMENT_INVENTORY_CONNECTION';
    use HasFactory;
    protected $fillable = [
        'main_item_no',
        'item_no',
        'description',
        'unit',
        'model_no',
        'serial_no',
        'brand',
        'type',
        'acquisition_date',
        'acquisition_cost',
        'market_appraisal',
        'appraisal_date',
        'remarks',
        'class_id',
        'nature_occupancy',
     ];
 
     public function inventoryCustodianItem()
     {
         return $this->belongsTo(InventoryCustodianItem::class, 'item_id', 'id');
     }
 
     public function propertyAcknowledgementItem()
     {
         return $this->belongsTo(PropertyAcknowledgementItem::class, 'item_id', 'id');
     }
}

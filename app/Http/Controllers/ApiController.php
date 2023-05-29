<?php

namespace App\Http\Controllers;

use App\Models\sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Models\PropertyAcknowledgment;
use App\Models\PropertyAcknowledgmentItem;

class ApiController extends Controller
{
    public function getData(Request $request)
    {
        try {
            $dataArray = $request->all();
            // Log::info($dataArray['data']);  
            foreach ($dataArray['data'] as $dataArrays) {
                // Log::info($dataArrays['property_acknowledgement_item']);  
                PropertyAcknowledgment::updateOrCreate(
                    [
                        'id' => $dataArrays['id']
                    ],
                    [
                        'office_code' => $dataArrays['office_code'],
                        'received_from' => $dataArrays['received_from'],
                        'received_from_pos' => $dataArrays['received_from_pos'],
                        'received_by' => $dataArrays['received_by'],
                        'received_by_pos' => $dataArrays['received_by_pos'],
                        'received_from_date' => $dataArrays['received_from_date'],
                        'received_by_date' => $dataArrays['received_by_date'],
                        'date_acquired' => $dataArrays['date_acquired'],
                        'note' => $dataArrays['note' ],
                        'deleted_at' => $dataArrays['deleted_at'],
                    ]
                );
                foreach($dataArrays['property_acknowledgement_item'] as $dataArraysItem){
                    PropertyAcknowledgmentItem::updateOrCreate(
                        [
                            'id' => $dataArraysItem['id']
                        ],
                        [
                            'pa_id' => $dataArraysItem['pa_id'],
                            'quantity' => $dataArraysItem['quantity'],
                            'unit' => $dataArraysItem['unit'],
                            'item_id' => $dataArraysItem['item_id'],
                            'acquisition_date' => $dataArraysItem['acquisition_date'],
                            'acquisition_cost' => $dataArraysItem['acquisition_cost'],
                            'property_no' => $dataArraysItem['property_no'],
                            'end_user' => $dataArraysItem['end_user'],
                            'deleted_at' => $dataArraysItem['deleted_at'],
                        ]
                    );
                }
            }
            return response()->json([
                'message' => 'Success',
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

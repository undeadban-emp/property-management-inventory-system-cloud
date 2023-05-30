<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\sample;
use Illuminate\Http\Request;
use App\Models\InventoryCustodian;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Models\InventoryCustodianItem;
use App\Models\PropertyAcknowledgment;
use App\Models\PropertyAcknowledgmentItem;

class ApiController extends Controller
{



    public function getDataPropertyAcknowledgement(Request $request)
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




    public function getDataItem(Request $request)
    {
        try{
            $dataItems = $request->all();
        // Log::info($dataItems['item']);
            foreach($dataItems['item'] as $items)
            {
                Item::updateOrCreate(
                    [
                        'id' => $items['id']
                    ],
                    [
                    'main_item_no' => $items['main_item_no'],
                    'item_no' => $items['item_no'],
                    'description' => $items['description'],
                    'unit' => $items['unit'],
                    'model_no' => $items['model_no'],
                    'serial_no' => $items['serial_no'],
                    'brand' => $items['brand'],
                    'type' => $items['type'],
                    'acquisition_date' => $items['acquisition_date'],
                    'acquisition_cost' => $items['acquisition_cost'],
                    'market_appraisal' => $items['market_appraisal'],
                    'appraisal_date' => $items['appraisal_date'],
                    'remarks' => $items['remarks'],
                    'class_id' => $items['class_id'],
                    'nature_occupancy' => $items['nature_occupancy']
                    ]
                );
            }
            return response()->json([
                'message' => 'Success',
            ]);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function getDataInventoryCustodian(Request $request)
    {
        try {
            $dataInventoryCustodian = $request->all();

            // Log::info($dataInventoryCustodian['InventoryCustodian']);  

            foreach ($dataInventoryCustodian['InventoryCustodian'] as $dataArrays) {

                // Log::info($dataArrays['property_acknowledgement_item']);  
                InventoryCustodian::updateOrCreate(
                    [
                        'id' => $dataArrays['id']
                    ],
                    [ 
                        'office_code' => $dataArrays['office_code'],
                        'fund_id' => $dataArrays['fund_id'],
                        'ics_no' => $dataArrays['ics_no'],
                        'received_from' => $dataArrays['received_from'],
                        'received_from_pos' => $dataArrays['received_from_pos'],
                        'received_by' => $dataArrays['received_by'],
                        'received_by_pos' => $dataArrays['received_by_pos'],
                        'received_from_date' => $dataArrays['received_from_date'],
                        'received_by_date' => $dataArrays['received_by_date' ],
                        'deleted_at' => $dataArrays['deleted_at'], 
                    ]
                );


                foreach($dataArrays['inventory_custodian_item'] as $dataArraysItem){
                    InventoryCustodianItem::updateOrCreate(
                        [
                            'id' => $dataArraysItem['id']
                        ],
                        [
                            'ic_id' => $dataArraysItem['ic_id'],
                            'item_id' => $dataArraysItem['item_id'],
                            'quantity' => $dataArraysItem['quantity'],
                            'unit' => $dataArraysItem['unit'],
                            'unit_cost' => $dataArraysItem['unit_cost'],
                            'unit_total_cost' => $dataArraysItem['unit_total_cost'],
                            'inventory_item_no' => $dataArraysItem['inventory_item_no'],
                            'est_useful_life' => $dataArraysItem['est_useful_life'],
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

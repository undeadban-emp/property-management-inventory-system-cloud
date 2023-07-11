<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Office;
use App\Models\sample;
use Illuminate\Http\Request;
use App\Models\InventoryCustodian;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Models\InventoryCustodianItem;
use App\Models\PropertyAcknowledgment;
use App\Models\PropertyAcknowledgmentItem;
use App\Models\InventoryCustodianItemEndUser;
use App\Models\PropertyAcknowledgementItemEndUser;
use Carbon\Carbon;

class ApiController extends Controller
{



    public function getDataPropertyAcknowledgement(Request $request)
    {
        try {
            $dataArray = $request->all();
            // Log::info($dataArray['data']);  
            foreach ($dataArray['data'] as $dataArrays) {

                $propertyAcknowledgment = PropertyAcknowledgment::updateOrCreate(
                    [
                        'id' => $dataArrays['id']
                    ],
                    [
                        'office_code' => $dataArrays['office_code'],
                        'date_acquired' => $dataArrays['date_acquired'],
                        'received_from' => $dataArrays['received_from'],
                        'received_from_pos' => $dataArrays['received_from_pos'],
                        'received_by' => $dataArrays['received_by'],
                        'received_by_pos' => $dataArrays['received_by_pos'],
                        'received_from_date' => $dataArrays['received_from_date'],
                        'received_by_date' => $dataArrays['received_by_date'],
                        'note' => $dataArrays['note' ],
                        'created_at' => $dataArrays['created_at'],
                        'updated_at' => $dataArrays['updated_at'],
                        'deleted_at' => $dataArrays['deleted_at']
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
                            'acquisition_total_cost' => $dataArraysItem['acquisition_total_cost'],
                            'property_no' => $dataArraysItem['property_no'],
                            'created_at' => $dataArraysItem['created_at'],
                            'updated_at' => $dataArraysItem['updated_at'],
                            'deleted_at' => $dataArraysItem['deleted_at']
                        ]
                    );


                    foreach($dataArraysItem['property_acknowledgement_end_user'] as $dataArraysItemEndUser){
                        PropertyAcknowledgementItemEndUser::updateOrCreate(
                            [
                                'id' => $dataArraysItemEndUser['id']
                            ],
                            [
                                'pa_item_id' => $dataArraysItemEndUser['pa_item_id'],
                                'property_no' => $dataArraysItemEndUser['property_no'],
                                'end_user' => $dataArraysItemEndUser['end_user'],
                                'serial_no' => $dataArraysItemEndUser['serial_no'],
                                'plate_number' => $dataArraysItemEndUser['plate_number'],
                                'engine_number' => $dataArraysItemEndUser['engine_number'],
                                'chassis_number' => $dataArraysItemEndUser['chassis_number'],
                                'status' => $dataArraysItemEndUser['status'],
                                'is_returned' => $dataArraysItemEndUser['is_returned'],
                                'created_at' => $dataArraysItemEndUser['created_at'],
                                'updated_at' => $dataArraysItemEndUser['updated_at'],
                                'deleted_at' => $dataArraysItemEndUser['deleted_at']
                            ]
                        );
                    }



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
            foreach($dataItems['item'] as $items)
            {
                // Log::info($items['item']);  
                
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
                    'isVehicle' => $items['isVehicle'],
                    'acquisition_date' => $items['acquisition_date'],
                    'acquisition_cost' => $items['acquisition_cost'],
                    'market_appraisal' => $items['market_appraisal'],
                    'appraisal_date' => $items['appraisal_date'],
                    'remarks' => $items['remarks'],
                    'class_id' => $items['class_id'],
                    'nature_occupancy' => $items['nature_occupancy'],
                    'created_at' => $items['created_at'],
                    'updated_at' => $items['updated_at']
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

            Log::info($dataInventoryCustodian['data']);  

            foreach ($dataInventoryCustodian['data'] as $dataArrays) {

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
                        'note' => $dataArrays['note'], 
                        'date_acquired' => $dataArrays['date_acquired'], 
                        'created_at' => $dataArrays['created_at'], 
                        'updated_at' => $dataArrays['updated_at'], 
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
                            'acquisition_date' => $dataArraysItem['acquisition_date'],
                            'created_at' => $dataArraysItem['created_at'],
                            'updated_at' => $dataArraysItem['updated_at'],
                            'deleted_at' => $dataArraysItem['deleted_at'],
                        ]
                    );
                    foreach($dataArraysItem['inventory_custodian_item_end_user'] as $dataArraysItemEndUser){
                        InventoryCustodianItemEndUser::updateOrCreate(
                            [
                                'id' => $dataArraysItemEndUser['id']
                            ],
                            [
                                'ic_item_id' => $dataArraysItemEndUser['ic_item_id'],
                                'property_no' => $dataArraysItemEndUser['property_no'],
                                'end_user' => $dataArraysItemEndUser['end_user'],
                                'is_returned' => $dataArraysItemEndUser['is_returned'],
                                'serial_no' => $dataArraysItemEndUser['serial_no'],
                                'plate_number' => $dataArraysItemEndUser['plate_number'],
                                'engine_number' => $dataArraysItemEndUser['engine_number'],
                                'chassis_number' => $dataArraysItemEndUser['chassis_number'],
                                'status' => $dataArraysItemEndUser['status'],
                                'created_at' => $dataArraysItemEndUser['created_at'],
                                'updated_at' => $dataArraysItemEndUser['updated_at'],
                                'deleted_at' => $dataArraysItemEndUser['deleted_at'],
                            ]
                        );
                    }
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



    public function getDataOffice(Request $request)
    {
        try{
            $dataOffice = $request->all();
            // Log::info($dataOffice['data']);  
            foreach($dataOffice['data'] as $office)
            {
                Office::updateOrCreate(
                    [
                        'OfficeCode' => $office['OfficeCode']
                    ],
                    [
                    'Description' => $office['Description'],
                    'OfficeShort' => $office['OfficeShort'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
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

}

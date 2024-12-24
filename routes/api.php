<?php

use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\ProvinceController;
use App\Http\Controllers\Api\SubdistrictController;
use App\Http\Controllers\Api\VillageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/provinces', ProvinceController::class);
Route::apiResource('/districts', DistrictController::class);
Route::apiResource('/subdistricts', SubdistrictController::class);
Route::apiResource('/villages', VillageController::class);
Route::get('/districts/province/{provinceId}', [DistrictController::class, 'getByProvince']);
Route::get('/subdistricts/district/{districtId}', [SubdistrictController::class, 'getByDistrict']);
Route::get('/villages/subdistrict/{subdistrictId}', [VillageController::class, 'getBySubdistrict']);
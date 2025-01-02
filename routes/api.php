<?php

use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\ProvinceController;
use App\Http\Controllers\Api\SubdistrictController;
use App\Http\Controllers\Api\VillageController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/provinces', ProvinceController::class)->names('api.provinces');
Route::apiResource('/districts', DistrictController::class)->names('api.districts');
Route::apiResource('/subdistricts', SubdistrictController::class)->names('api.subdistricts');
Route::apiResource('/villages', VillageController::class)->names('api.villages');
// Route::get('/districts/province/{provinceId}', [DistrictController::class, 'getByProvince']);
// Route::get('/subdistricts/district/{districtId}', [SubdistrictController::class, 'getByDistrict']);
// Route::get('/villages/subdistrict/{subdistrictId}', [VillageController::class, 'getBySubdistrict']);

// User Api
Route::apiResource('/users', UserController::class)->names('api.users');

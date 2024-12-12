<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserData;
use App\Http\Resources\UserDataResource;

class UserDataController extends Controller
{
    public function index()
    {
        return UserDataResource::collection(UserData::all());
    }
}

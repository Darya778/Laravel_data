<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\UserData;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function showData()
    {
        $files = Storage::files();
        $data = [];
        foreach ($files as $file) {
            if (strpos($file, 'form_data_') !== false) {
                $json = Storage::get($file);
                $data[] = json_decode($json, true);
            }
        }

        return view('data', ['data' => $data]);
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function processForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

	UserData::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $fileName = 'form_data_' . uniqid() . '.json';
        Storage::disk('local')->put($fileName, json_encode($data));

        return back()->with('success', 'Data saved successfully!');
    }
}

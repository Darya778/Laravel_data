<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
	$validated = $request->validate([
    	    'name' => 'required|string|max:255',
    	    'email' => 'required|email',
	]);

	$fileName = 'data_' . time() . '.json';
	Storage::put($fileName, json_encode($validated));

	return redirect()->back()->with('success', 'Форма была успешно отправлена!');
    }


    public function showData()
    {
	$data = \App\Models\UserData::all();
	return view('data', ['data' => $data]);
    }

    public function showElement($id)
    {
        $item = UserData::findOrFail($id);
        return view('element', ['item' => $item]);
    }

    public function editElement(Request $request, $id)
    {
        $item = UserData::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $item->update($validated);

        return redirect('/data')->with('success', 'Данные успешно обновлены!');
    }

    public function deleteElement($id)
    {
        $item = UserData::findOrFail($id);
        $item->delete();

        return redirect('/data')->with('success', 'Элемент успешно удалён!');
    }

    public function showTrashed()
    {
        $data = UserData::onlyTrashed()->get();
        return view('trashed', ['data' => $data]);
    }

    public function restoreElement($id)
    {
        $item = UserData::withTrashed()->findOrFail($id);
        $item->restore();

        return redirect('/data')->with('success', 'Элемент успешно восстановлен!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_data,email',
        ]);

        UserData::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        return redirect()->back()->with('success', 'Data added successfully!');
    }

    public function edit($id)
    {
        $item = UserData::findOrFail($id);

        return view('data.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
	$validated = $request->validate([
    	    'name' => 'required|string|max:255',
    	    'email' => 'required|email|unique:user_data,email,' . $id,
	]);

	$item = UserData::findOrFail($id);
	$item->update($validated);

	return redirect()->route('data.index')->with('success', 'Data updated successfully!');
    }

    public function destroy($id)
    {
	$item = UserData::findOrFail($id);
	$item->delete(); // Мягкое удаление

	return redirect()->route('data.index')->with('success', 'Data deleted successfully!');
    }

    public function trash()
    {
	$deletedData = UserData::onlyTrashed()->get();
	return view('data.trash', ['data' => $deletedData]);
    }

    public function restore($id)
    {
	UserData::withTrashed()->where('id', $id)->restore();
	return redirect()->route('data.trash')->with('success', 'Record restored successfully');
    }

    public function forceDelete($id)
    {
	UserData::withTrashed()->where('id', $id)->forceDelete();
	return redirect()->route('data.trash')->with('success', 'Record deleted permanently');
    }



}

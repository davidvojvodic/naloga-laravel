<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SelectedName;
use Illuminate\Support\Arr;

class NameController extends Controller
{
    public function index()
    {
        $selectedNames = SelectedName::all();
        return view('names', compact('selectedNames'));
    }

    public function selectName(Request $request)
    {
        $names = explode("\n", $request->input('names'));
        $selectedName = Arr::random($names);

        SelectedName::create(['name' => trim($selectedName)]);

        $names = array_filter($names, function($name) use ($selectedName) {
            return trim($name) !== trim($selectedName);
        });

        return redirect()->back()->withInput(['names' => implode("\n", $names)]);
    }
}

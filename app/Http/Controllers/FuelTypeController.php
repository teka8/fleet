<?php

namespace App\Http\Controllers;

use App\Models\FuelType;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
 
class FuelTypeController extends Controller
{
    public function index()
    {
        try {
            $fuelTypes = FuelType::paginate(10);
            return view('pages.fuelTypes.index', compact('fuelTypes'));
        } catch (\Exception $e) {
            Toastr::error('Something went wrong.'.$e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:fuel_types,name',
                'description' => 'nullable|string',
            ]);

            FuelType::create($validatedData);
            Toastr::success('Fuel Type added successfully!', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error('Something went wrong.'.$e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $fuelType = FuelType::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:fuel_types,name,' . $fuelType->id,
                'description' => 'nullable|string',
            ]);

            $fuelType->update($validatedData);
            Toastr::success('Fuel Type updated successfully!', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error('Something went wrong.'.$e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $fuelType = FuelType::findOrFail($id);
            $fuelType->delete();
            Toastr::success('Fuel Type deleted successfully!', 'Success');
            return redirect()->route('pages.fuelTypes.index');
        } catch (\Exception $e) {
            Toastr::error('Something went wrong.'.$e->getMessage(), 'Error');
            return redirect()->back();
        }
    }
}
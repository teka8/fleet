<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\FuelType;
use App\Models\Make;
use App\Models\Vehicle;
use App\Models\VModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::orderBy('created_at','desc')
        ->paginate(10);

        return view('pages.vehicles.index',compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $models = VModel::all();
        $makes = Make::all();
        $branches = Branch::all();
        $fuelTypes = FuelType::all();

        return view('pages.vehicles.create',compact('models','makes','branches','fuelTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'plate_number' => 'required|string|max:255',
                'model_id' => 'required|exists:models,id',  
                'branch_id' => 'required|exists:branches,id',  
                'fuel_type_id' => 'required|exists:fuel_types,id',  
                'year_of_manufacture' => 'required|digits:4|integer|between:1900,2100',
                'color' => 'required|string|max:50',
                'engine_number' => 'required|string|max:255',
                'is_public' => 'nullable|required',
                'image' => 'nullable|max:4098',
            ]);
    
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('vehicles/images', 'public');
                $imagePath =  'storage/' . $imagePath;
            } else {
                $imagePath = null;  
            }
    
            $vehicle = Vehicle::create([
                'plate_number' => $validatedData['plate_number'],
                'model_id' => $validatedData['model_id'],
                'branch_id' => $validatedData['branch_id'],
                'fuel_type_id' => $validatedData['fuel_type_id'],
                'year_of_manufacture' => $validatedData['year_of_manufacture'],
                'color' => $validatedData['color'],
                'engine_number' => $validatedData['engine_number'],
                'is_public' => $validatedData['is_public'],
                'image' => $imagePath, 
            ]);
            Toastr::success('Vehicle Added successfully!', 'Success');
            return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully!');
        } catch (\Throwable $th) {
            Toastr::error('Error:'.$th->getMessage(), 'Error');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $models = VModel::all();
        $makes = Make::all();
        $branches = Branch::all();
        $fuelTypes = FuelType::all();
        return view('pages.vehicles.edit',compact('vehicle','models','makes','branches','fuelTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $vehicle = Vehicle::findOrFail($id);

            $validatedData = $request->validate([
                'plate_number' => 'required|string|max:255',
                'model_id' => 'required|exists:models,id',
                'branch_id' => 'required|exists:branches,id',
                'fuel_type_id' => 'required|exists:fuel_types,id',
                'year_of_manufacture' => 'required|digits:4|integer|between:1900,2100',
                'color' => 'required|string|max:50',
                'engine_number' => 'required|string|max:255',
                'is_public' => 'nullable',
                'image' => 'nullable|max:4098',
            ]);

            if ($request->hasFile('image')) {
                if ($vehicle->image) {
                    Storage::delete('public/' . str_replace('storage/', '', $vehicle->image));
                }
                $imagePath = $request->file('image')->store('vehicles/images', 'public');
                $imagePath = 'storage/' . $imagePath;
            } else {
                $imagePath = $vehicle->image;
            }

            $vehicle->update([
                'plate_number' => $validatedData['plate_number'],
                'model_id' => $validatedData['model_id'],
                'branch_id' => $validatedData['branch_id'],
                'fuel_type_id' => $validatedData['fuel_type_id'],
                'year_of_manufacture' => $validatedData['year_of_manufacture'],
                'color' => $validatedData['color'],
                'engine_number' => $validatedData['engine_number'],
                'is_public' => $validatedData['is_public'],
                'image' => $imagePath,
            ]);
            Toastr::success('Updated successfully!', 'Success');
            return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully!');
        } catch (\Exception $e) {
            Toastr::error('Error:'.$e->getMessage(), 'Error');
            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}

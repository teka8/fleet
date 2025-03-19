<?php

namespace App\Http\Controllers;

use App\Models\Make;
use App\Models\VModel;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class VModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $models = VModel::orderBy('name')
            ->paginate(10);
            $makes = Make::all();

            return view('pages.models.index',compact('models','makes'));
        } catch (\Exception $e) {
            Toastr::error('Error'.$e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',  
                'make_id' => 'required',  
            ]);
    
            $model = VModel::create([
                'name' => $validatedData['name'],
                'make_id' => $validatedData['make_id'],
            ]);
            Toastr::success('Saved', 'Success');
            return redirect()->route('models.index')->with('success', 'Model created successfully!');
        } catch (\Throwable $e) {
            Toastr::error('Error'.$e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $model = VModel::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255', 
                'make_id' => 'required|exists:makes,id', 
            ]);
    
            $model->update([
                'name' => $validatedData['name'],
                'make_id' => $validatedData['make_id'],
            ]);
            Toastr::success('Updated', 'Success');
            return redirect()->route('models.index')->with('success', 'Model updated successfully!');
        } catch (\Throwable $e) {
            Toastr::error('Error'.$e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $model = VModel::findOrFail($id);
            $model->delete();
            Toastr::success('Deleted', 'Success');
            return redirect()->route('models.index')->with('success', 'Model deleted successfully!');
        } catch (\Throwable $th) {
            Toastr::error('Error'.$e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(VModel $vModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VModel $vModel)
    {
        //
    }
}

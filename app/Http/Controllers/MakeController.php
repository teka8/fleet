<?php

namespace App\Http\Controllers;

use App\Models\Make;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;


class MakeController extends Controller
{
    public function index()
    {
        try {
            $makes = Make::paginate(10);
            return view('pages.makes.index', compact('makes'));
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
                'logo' => 'nullable|max:4098',
            ]);

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
                $logoPath =  'storage/' . $logoPath;
            } else {
                $logoPath = null;
            }

            Make::create([
                'name' => $validatedData['name'],
                'logo' => $logoPath,
            ]);

            Toastr::success('Saved', 'Success');
            return redirect()->route('makes.index')->with('success', 'Make created successfully!');
        } catch (\Exception $e) {
            Toastr::error('Error'.$e->getMessage(), 'Error');
            return redirect()->route('makes.index')->with('error', 'Something went wrong.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $make = Make::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'logo' => 'nullable|max:4096',
            ]);

            if ($request->hasFile('logo')) {
                if ($make->logo) {
                    Storage::delete('public/' .  str_replace('storage/', '', $make->logo));
                }
                $logoPath = $request->file('logo')->store('logos', 'public');
                $logoPath =  'storage/' . $logoPath;
            } else {
                $logoPath = $make->logo;
            }

            $make->update([
                'name' => $validatedData['name'],
                'logo' => $logoPath,
            ]);
            Toastr::success('Updated', 'Success');
            return redirect()->route('makes.index')->with('success', 'Make updated successfully!');
        } catch (\Exception $e) {
            Toastr::error('Error'.$e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $make = Make::findOrFail($id);
            
            if ($make->logo) {
                Storage::delete('public/' . $make->logo);
            }

            $make->delete();
            Toastr::success('Deleted', 'Success');
            return redirect()->route('makes.index')->with('success', 'Make deleted successfully!');
        } catch (\Exception $e) {
            Toastr::error('Error'.$e->getMessage(), 'Error');
            return redirect()->back();
        }
    }
}
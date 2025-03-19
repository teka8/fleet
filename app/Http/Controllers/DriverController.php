<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Driver;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Validator;
use Brian2694\Toastr\Facades\Toastr;


class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $searchKey = $request->input('searchkey', '');

            // Fetch drivers with user, account, and branch details
            $query = DB::table('drivers')
                ->leftJoin('users', 'drivers.user_id', '=', 'users.id')
                ->leftJoin('vehicles', 'drivers.vehicle_id', '=', 'vehicles.id')
                ->select(
                    'drivers.id AS customer_id',
                    'drivers.license_number',
                    'drivers.license_front',
                    'drivers.license_back',
                    'drivers.license_expiry_date',
                    'drivers.vehicle_id',
                    'drivers.medical_status',
                    'vehicles.plate_number',

                    'users.first_name',
                    'users.middle_name',
                    'users.last_name',
                    'users.email',
                    'users.phone_number',
                    'users.address',
                    'users.photo',
                    'users.join_date',
                    'users.status',


                );

            if (!empty($searchKey)) {
                $query->where(function ($q) use ($searchKey) {
                    $q->where('users.phone_number', 'LIKE', '%' . $searchKey . '%')
                        ->orWhere(DB::raw('CONCAT(users.first_name, " ", users.middle_name, " ", users.last_name)'), 'LIKE', '%' . $searchKey . '%'); // Search in customer name
                });
            }

            $customers = $query->paginate(15);

            return view('pages.customer.index', compact('customers'));

        } catch (\Exception $e) {
            // dd($e);
            \Log::error("Error fetching drivers: " . $e->getMessage());
            Toastr::error('An error occurred while fetching drivers!', 'Error');
            return redirect()->route('home'); // Or your desired fallback route
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = DB::table('vehicles')->select('vehicles.*')->get();
        return view('pages.customer.register', compact('vehicles'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:15',
                'address' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'photo' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:8000',
                'license_front' => 'required|mimes:jpeg,png,jpg,gif,webp|max:8000',
                'license_back' => 'required|mimes:jpeg,png,jpg,gif,webp|max:8000',
                'license_expiry_date' => 'nullable|date',
                // 'vehicle_id' => 'nullable|integer|exists:vehicles,id',
                'vehicle_id' => 'nullable|integer',
                'medical_status' => 'nullable|string',
                'license_number' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                Toastr::error('Validation Error: ' . implode(', ', $validator->errors()->all()), 'Error');
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Create a new user
            $user = new User();
            $user->first_name = $request->input('first_name');
            $user->middle_name = $request->input('middle_name');
            $user->last_name = $request->input('last_name');
            $user->phone_number = $request->input('phone_number');
            $user->address = $request->input('address');
            $user->email = $request->input('email');
            $user->password = bcrypt('123456'); // You might want to generate a random password and email it to the user
            $user->join_date = now();
            $user->status = 'active';

            // Handle photo upload
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $imageName = $user->first_name . '_photo_' . time() . '.' . $image->extension();
                $imagePath = $image->storeAs('public/customer_data', $imageName);
                $user->photo = 'storage/customer_data/' . $imageName;
            }

            $user->save();

            // Create a new driver linked to the user
            $driver = new Driver();
            $driver->user_id = $user->id;
            $driver->vehicle_id = $request->input('vehicle_id');
            $driver->medical_status = $request->input('medical_status');
            $driver->license_number = $request->input('license_number');
            $driver->license_expiry_date = $request->input('license_expiry_date');

            // Handle license front upload
            if ($request->hasFile('license_front')) {
                $licenseFront = $request->file('license_front');
                $licenseFrontName = $user->first_name . '_license_front_' . time() . '.' . $licenseFront->extension();
                $licenseFrontPath = $licenseFront->storeAs('public/driver_data', $licenseFrontName);
                $driver->license_front = 'storage/driver_data/' . $licenseFrontName;
            }

            // Handle license back upload
            if ($request->hasFile('license_back')) {
                $licenseBack = $request->file('license_back');
                $licenseBackName = $user->first_name . '_license_back_' . time() . '.' . $licenseBack->extension();
                $licenseBackPath = $licenseBack->storeAs('public/driver_data', $licenseBackName);
                $driver->license_back = 'storage/driver_data/' . $licenseBackName;
            }

            $driver->save();

            DB::commit();

            // Redirect with success message
            Toastr::success('Driver created successfully!', 'Success');
            return redirect()->route('customers.index', $driver->id);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Driver Creation Error: ' . $e->getMessage());
            Toastr::error('Creating a new driver failed. Please try again later.', 'Error');
            return redirect()->back()->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            // Join the tables using the appropriate foreign keys
            $customer = DB::table('drivers')
                ->leftJoin('users', 'drivers.user_id', '=', 'users.id') // Join with the users table
                ->leftJoin('vehicles', 'drivers.vehicle_id', '=', 'vehicles.id')
                ->where('drivers.id', $id)
                ->select(
                    'drivers.id AS customer_id',
                    'drivers.license_number',
                    'drivers.license_front',
                    'drivers.license_back',
                    'drivers.license_expiry_date',
                    'drivers.vehicle_id',
                    'drivers.medical_status',
                    'vehicles.plate_number',
                    'users.first_name',
                    'users.middle_name',
                    'users.last_name',
                    'users.email',
                    'users.phone_number',
                    'users.address',
                    'users.photo',
                    'users.join_date',

                )
                ->first();

            if (!$customer) {
                Toastr::error('Driver not found!', 'Error');
                return redirect()->route('drivers.create');
            }

            return view('pages.customer.show', compact('customer'));
        } catch (\Exception $e) {
            \Log::error("Error fetching customer details: " . $e->getMessage());
            Toastr::error('An error occurred while fetching customer details!', 'Error');
            return redirect()->route('customers.create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = DB::table('drivers')
            ->leftJoin('users', 'drivers.user_id', '=', 'users.id')
            ->leftJoin('vehicles', 'drivers.vehicle_id', '=', 'vehicles.id')
            ->where('drivers.id', $id)
            ->select(
                'drivers.id AS customer_id',
                'drivers.license_number',
                'drivers.license_front',
                'drivers.license_back',
                'drivers.license_expiry_date',
                'drivers.vehicle_id',
                'drivers.medical_status',
                'vehicles.plate_number',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.email',
                'users.phone_number',
                'users.address',
                'users.photo',
                'users.join_date',
            )
            ->first();

        $vehicles = DB::table('vehicles')->select('id', 'plate_number')->get();  // Fetch all vehicles

        return view('pages.customer.edit', compact('customer', 'vehicles'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:15',
                'address' => 'required|string|max:255',
                'email' => 'required|email',
                'photo' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:8000',
                'kebeleid_front' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:8000',
                'kebeleid_back' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:8000',
                'accountType' => 'required',
                'initialbalance' => 'required|numeric|min:0',
            ]);

            $check = User::where('email', $validator->getValue('email'))->get();
            if (count($check) > 1) {
                Toastr::error('Email already exists :(', 'Error');
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // if ($validator) {
            //     dd('validation failed',$validator);
            //     Toastr::error('Driver update failed :(','Error');
            //     return redirect()->back()->withErrors($validator)->withInput();
            // }

            $customer = Driver::findOrFail($id);
            $user = User::where('id', $customer->user_id);

            $account = Account::where('customer_id', $customer->id);
            // Update user info
            $user->update([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'email' => $request->email,
            ]);

            $user = $user->first();

            // Handle photo upload
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $imageName = $user->first_name . '_photo' . '_' . time() . '.' . $request->photo->extension();
                $image->storeAs('public/customer_data', $imageName);
                $user->update(['photo' => 'storage/customer_data/' . $imageName]);
            }

            // Handle Kebele ID front upload
            if ($request->hasFile('kebeleid_front')) {
                $image = $request->file('kebeleid_front');
                $imageName = $user->first_name . '_kebele_id_front_' . time() . '.' . $request->kebeleid_front->extension();
                $image->storeAs('public/customer_data', $imageName);
                $customer->update(['id_front' => 'storage/customer_data/' . $imageName]);
            }

            // Handle Kebele ID back upload
            if ($request->hasFile('kebeleid_back')) {
                $image = $request->file('kebeleid_back');
                $imageName = $user->first_name . '_kebele_id_back_' . time() . '.' . $request->kebeleid_back->extension();
                $image->storeAs('public/customer_data', $imageName);
                $customer->update(['id_back' => 'storage/customer_data/' . $imageName]);
            }

            // Update account info
            $account->update([
                'account_type' => $request->accountType,
                'balance' => $request->initialbalance,
            ]);

            Toastr::success('Driver updated successfully!');
            return redirect()->route('drivers.index');
        } catch (\Exception $e) {

            Toastr::error($e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $customer)
    {
        //
    }
}

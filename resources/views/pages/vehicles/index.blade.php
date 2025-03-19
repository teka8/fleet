@extends('layouts.master')

@section('content')
    <!-- Page-content -->
    <div class="group-data-[sidebar-size=sm]:min-h-sm group-data-[sidebar-size=sm]:relative">
        <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

            <div
                class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
                <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                    <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                        <div class="grow">
                            <h5 class="text-16">List View</h5>
                        </div>
                        <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                            <li
                                class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                                <a href="#!" class="text-slate-400 dark:text-zink-200">Vehicles</a>
                            </li>
                            <li class="text-slate-700 dark:text-zink-100">
                                List View
                            </li>
                        </ul>
                    </div>
                    <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
                        <div class="xl:col-span-12">
                            <div class="card" id="usersTable">
                                <div class="card-body">
                                    <div class="flex items-center">
                                        <h6 class="text-15 grow">Vehicles List</h6>
                                        <div class="shrink-0">
                                            <a href="{{route('vehicles.create')}}" 
                                                class="text-white cursor-pointer btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i
                                                    data-lucide="plus" class="inline-block size-4"></i> <span
                                                    class="align-middle">Add new Vehicle</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="!py-3.5 card-body border-y border-dashed border-slate-200 dark:border-zink-500">
                                    <form action="{{route('vehicles.index')}}">
                                        @csrf
                                        @method('GET')
                                        <div class="grid grid-cols-2 gap-2 xl:grid-cols-12">
                                            <div class=" relative xl:col-span-2">
                                                <input type="text"
                                                    class="ltr:pl-8 search  rtl:pr-8  form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                    placeholder="Search for name, phone number"
                                                    autocomplete="off"
                                                    name="searchkey"
                                                    >
                                                <i data-lucide="search"
                                                    class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                                                
                                            </div><!--end col-->
                                            
                                            {{-- <div class="xl:col-span-2">
                                                <select
                                                    class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                    data-choices="" id="choices-single-default">
                                                    <option value="">Select Status</option>
                                                    <option value="Verified">Verified</option>
                                                    <option value="Waiting">Waiting</option>
                                                    <option value="Rejected">Rejected</option>
                                                    <option value="Hidden">Hidden</option>
                                                </select>
                                            </div><!--end col--> --}}
                                            {{-- <div class="xl:col-span-3 xl:col-start-10">
                                                <div class="flex gap-2 xl:justify-end">
                                                    <div>
                                                        <button type="button"
                                                            class="bg-white border-dashed text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20"><i
                                                                data-lucide="download" class="inline-block size-4"></i>
                                                            <span class="align-middle">Import</span></button>
                                                    </div>
                                                    <button
                                                        class="flex items-center justify-center size-[37.5px] p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"><i
                                                            data-lucide="sliders-horizontal" class="size-4"></i></button>
                                                </div>
                                            </div><!--end col--> --}}
                                            
                                        </div><!--end grid-->
                                        <div class="xl:col-span-2">
                                            <input type="submit" 
                                            class=" text-white cursor-pointer btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"
                                            value='Search'>
                                        </div>
                                        
                                    </form>
                                </div>


                                <div class="card-body">
                                    <div class="-mx-5 -mb-5 overflow-x-auto">
                                        <table
                                            class="w-full border-separate table-custom border-spacing-y-1 whitespace-nowrap">
                                            <thead class="text-left">
                                                <tr
                                                    class="relative rounded-md bg-slate-100 dark:bg-zink-600 after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">
                                                        <div class="flex items-center h-full">
                                                            <input id="CheckboxAll"
                                                                class="size-4 bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800 cursor-pointer"
                                                                type="checkbox">
                                                        </div>
                                                    </th>
                                                    {{-- <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="user-id">ID</th> --}}
                                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                                        data-sort="user-id">#</th>
                                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                                        data-sort="name">Plate Number</th>
                                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                                        data-sort="name">Model</th>
                                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                                        data-sort="name">Make</th>
                                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                                        data-sort="email">Year</th>
                                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                                        data-sort="phone-number">Color</th>
                                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                                        data-sort="joining-date">Engine Number</th>
                                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                                        data-sort="joining-date">Ownership</th>
                                                    {{-- <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                                        data-sort="status">Status</th> --}}
                                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @foreach ($vehicles as $vehicle)
                                                    <tr
                                                        class="relative rounded-md after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                            <div class="flex items-center h-full">
                                                                <input id="Checkbox1"
                                                                    class="size-4 bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative"
                                                                    type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                            <a href="{{route('vehicles.show',$vehicle->id)}}"
                                                                class="transition-all duration-150 ease-linear text-custom-500 hover:text-custom-600 user-id">{{ $vehicle->id }}</a>
                                                        </td>
                                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 location">
                                                            {{ $vehicle->plate_number }}</td>
                                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 location">
                                                            {{ $vehicle->model->name }}</td>
                                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 location">
                                                            {{ $vehicle->model->make->name }}</td>
                                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 location">
                                                            {{ $vehicle->year_of_manufacture }}</td>
                                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 email">
                                                            {{ $vehicle->color }}</td>
                                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 phone-number">
                                                            {{ $vehicle->engine_number }}</td>
                                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 phone-number">
                                                            @if ($vehicle->is_public == '0')
                                                                Private
                                                            @elseif($vehicle->is_public == '1')
                                                                Public
                                                            @endif
                                                        </td>
                                                        {{-- <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                            <span
                                                                class="px-2.5 py-0.5 text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent inline-flex items-center status">
                                                                <i data-lucide="check-circle" class="size-3 mr-1.5"></i>
                                                                {{ $vehicle->status }}
                                                            </span>
                                                        </td> --}}
                                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 flex space-x-2">
                                                            {{-- <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                href="#">
                                                                <i data-lucide="eye"
                                                                    class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i>
                                                            </a> --}}
                                                            <!-- Edit Button (Blue Icon) -->
                                                            <a href="{{route('vehicles.edit',$vehicle->id)}}"
                                                                class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 hover:bg-slate-100 hover:text-blue-500 focus:bg-slate-100 focus:text-blue-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                href="#!">
                                                                <i data-lucide="file-edit"
                                                                    class="inline-block size-4 ltr:mr-1 rtl:ml-1 text-blue-500"></i>
                                                            </a>

                                                            <!-- Delete Button (Red Icon) -->
                                                            <a data-modal-target="deleteModal{{ $vehicle->id }}"
                                                                class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 hover:bg-slate-100 hover:text-red-500 focus:bg-slate-100 focus:text-red-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                href="#!">
                                                                <i data-lucide="trash-2"
                                                                    class="inline-block size-4 ltr:mr-1 rtl:ml-1 text-red-500"></i>
                                                            </a>

                                                        </td>
                                                    </tr>

                                                    <!-- Edit User Modal -->
                                                    <div id="editUserModal{{ $vehicle->id }}" modal-center=""
                                                        class="fixed flex flex-col  transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
                                                        <div
                                                            class="w-screen md:w-[40rem] bg-white shadow rounded-md dark:bg-zink-600">
                                                            <div
                                                                class="flex items-center justify-between p-4 border-b dark:border-zink-300/20">
                                                                <h5 class="text-16">Edit Customer Information</h5>
                                                                <button
                                                                    data-modal-close="editUserModal{{ $vehicle->id }}"
                                                                    class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500">
                                                                    <i data-lucide="x" class="size-5"></i>
                                                                </button>
                                                            </div>
                                                            <div
                                                                class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                                                                <form action="{{ route('vehicles.update', $vehicle->id) }}"
                                                                    class="mt-10" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <!-- Include the method for updating -->
                                                                    <div class="mb-3">
                                                                        <label for="first_name"
                                                                            class="inline-block mb-2 text-base font-medium">First
                                                                            Name</label>
                                                                        <input type="text" name="first_name"
                                                                            id="first_name"
                                                                            value="{{ $vehicle->first_name }}"
                                                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"
                                                                            placeholder="Enter First name">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="middle_name"
                                                                            class="inline-block mb-2 text-base font-medium">Middle
                                                                            Name</label>
                                                                        <input type="text" name="middle_name"
                                                                            id="middle_name"
                                                                            value="{{ $vehicle->middle_name }}"
                                                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"
                                                                            placeholder="Enter Middle name">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="last_name"
                                                                            class="inline-block mb-2 text-base font-medium">Last
                                                                            Name</label>
                                                                        <input type="text" name="last_name"
                                                                            id="last_name" value="{{ $vehicle->last_name }}"
                                                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"
                                                                            placeholder="Enter Last name">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="phone_number"
                                                                            class="inline-block mb-2 text-base font-medium">Phone
                                                                            Number</label>
                                                                        <input type="text" name="phone_number"
                                                                            id="phone_number"
                                                                            value="{{ $vehicle->phone_number }}"
                                                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"
                                                                            placeholder="Enter Phone number">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="address"
                                                                            class="inline-block mb-2 text-base font-medium">address
                                                                            </label>
                                                                        <input type="text" name="address"
                                                                            id="address"
                                                                            value="{{ $vehicle->address }}"
                                                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"
                                                                            placeholder="Enter address">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="email"
                                                                            class="inline-block mb-2 text-base font-medium">Email</label>
                                                                        <input type="email" name="email"
                                                                            id="email" value="{{ $vehicle->email }}"
                                                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"
                                                                            placeholder="Enter email">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="password"
                                                                            class="inline-block mb-2 text-base font-medium">Password</label>
                                                                        <input type="password" name="password"
                                                                            id="password"
                                                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"
                                                                            placeholder="Enter password (leave blank to keep current)">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="password_confirmation"
                                                                            class="inline-block mb-2 text-base font-medium">Password
                                                                            Confirmation</label>
                                                                        <input type="password"
                                                                            name="password_confirmation"
                                                                            id="password_confirmation"
                                                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"
                                                                            placeholder="Enter password confirmation">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="role"
                                                                            class="inline-block mb-2 text-base font-medium">Role</label>
                                                                        <select name="role" id="role"
                                                                            class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">
                                                                            {{-- @foreach ($roles as $role)
                                                                                <option value="{{ $role->id }}"
                                                                                    {{ $vehicle->roles->contains($role->id) ? 'selected' : '' }}>
                                                                                    {{ $role->name }}
                                                                                </option>
                                                                            @endforeach --}}
                                                                        </select>
                                                                    </div>
                                                                    <div class="flex justify-end gap-2 mt-4">
                                                                        <button type="reset"
                                                                            data-modal-close="editUserModal{{ $vehicle->id }}"
                                                                            class="text-red-500 transition-all duration-200 ease-linear bg-white border-white btn hover:text-red-600 focus:text-red-600 active:text-red-600 dark:bg-zink-500 dark:border-zink-500">Cancel</button>
                                                                        <button type="submit"
                                                                            class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Update
                                                                            User</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- delete user --}}
                                                    <div id="deleteModal{{ $vehicle->id }}" modal-center=""
                                                        class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
                                                        <div
                                                            class="w-screen md:w-[25rem] bg-white shadow rounded-md dark:bg-zink-600">
                                                            <div
                                                                class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto px-6 py-8">
                                                                <div class="float-right">
                                                                    <button data-modal-close="deleteModal"
                                                                        class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i
                                                                            data-lucide="x" class="size-5"></i></button>
                                                                </div>
                                                                <img src="data:image/png;base64,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"
                                                                    alt="" class="block h-12 mx-auto">
                                                                <div class="mt-5 text-center">
                                                                    <h5 class="mb-1">Are you sure?</h5>
                                                                    <p class="text-slate-500 dark:text-zink-200">Are you
                                                                        certain you want to delete this record of
                                                                        <strong>{{ $vehicle->first_name }}</strong>?</p>
                                                                    <div class="flex justify-center gap-2 mt-6">
                                                                        <button type="button"
                                                                            data-modal-close="deleteModal{{ $vehicle->id }}"
                                                                            class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">
                                                                            Cancel
                                                                        </button>
                                                                        <form
                                                                            action="{{ route('users.destroy', $vehicle->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">
                                                                                Yes, Delete It!
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="noresult" style="display: none">
                                            <div class="py-6 text-center">
                                                <i data-lucide="search"
                                                    class="w-6 h-6 mx-auto text-sky-500 fill-sky-100 dark:fill-sky-500/20"></i>
                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than
                                                    199+ users We did not find any users for you search.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-center mt-8 md:flex-row">

                                        {{ $vehicles->links('pagination::tailwind') }}

                                    </div>
                                </div>


                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end grid-->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            
        </div>
    </div>
    {{-- add user --}}
    <div id="addUserModal" modal-center=""
        class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
        <div class="w-screen md:w-[40rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="flex items-center justify-between p-4 border-b dark:border-zink-300/20">
                <h5 class="text-16">Add User</h5>
                <button data-modal-close="addUserModal"
                    class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x"
                        class="size-5"></i></button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                <form action="{{ route('users.store') }}" class="mt-10" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username-field" class="inline-block mb-2 text-base font-medium">First Name</label>
                        <input type="text" name="first_name" id="username-field"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter First name">
                    </div>
                    <div class="mb-3">
                        <label for="username-field" class="inline-block mb-2 text-base font-medium">Midle Name</label>
                        <input type="text" name="middle_name" id="username-field"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter Midle name">
                    </div>
                    <div class="mb-3">
                        <label for="username-field" class="inline-block mb-2 text-base font-medium">Last Name</label>
                        <input type="text" name="last_name" id="username-field"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter Last name">
                    </div>
                    <div class="mb-3">
                        <label for="username-field" class="inline-block mb-2 text-base font-medium">phone_number</label>
                        <input type="phone" name="phone_number" id="username-field"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter Phone number">
                    </div>
                    <div class="mb-3">
                        <label for="username-field" class="inline-block mb-2 text-base font-medium">Address</label>
                        <input type="phone" name="address" id="username-field"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter Address">
                    </div>
                    <div class="mb-3">
                        <label for="email-field" class="inline-block mb-2 text-base font-medium">Email</label>
                        <input type="email" name="email" id="email-field"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="inline-block mb-2 text-base font-medium">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter password">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="inline-block mb-2 text-base font-medium">Password
                            Confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter password confirmation">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="inline-block mb-2 text-base font-medium">Select Role</label>
                        <select name="role" id="role"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">
                            {{-- @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <!-- Display Permissions -->
                    <div id="permissions-section" class="mb-3 hidden">
                        <label class="inline-block mb-2 text-base font-medium">Permissions</label>
                        <ul id="permissions-list" class="list-disc pl-5"></ul>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="reset" data-modal-close="addDocuments"
                            class="text-red-500 transition-all duration-200 ease-linear bg-white border-white btn hover:text-red-600 focus:text-red-600 active:text-red-600 dark:bg-zink-500 dark:border-zink-500">Cancel</button>
                        <button type="submit"
                            class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Add
                            User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--end add user-->


    <div class="fixed items-center hidden bottom-6 right-12 h-header group-data-[navbar=hidden]:flex">
        <button data-drawer-target="customizerButton" type="button"
            class="inline-flex items-center justify-center w-12 h-12 p-0 transition-all duration-200 ease-linear rounded-md shadow-lg text-sky-50 bg-sky-500">
            <i data-lucide="settings" class="inline-block w-5 h-5"></i>
        </button>
    </div>

    <div id="customizerButton" drawer-end=""
        class="fixed inset-y-0 flex flex-col w-full transition-transform duration-300 ease-in-out transform bg-white shadow ltr:right-0 rtl:left-0 md:w-96 z-drawer show dark:bg-zink-600">
        <div class="flex justify-between p-4 border-b border-slate-200 dark:border-zink-500">
            <div class="grow">
                <h5 class="mb-1 text-16">starcode Theme Customizer</h5>
                <p class="font-normal text-slate-500 dark:text-zink-200">Choose your themes & layouts etc.</p>
            </div>
            <div class="shrink-0">
                <button data-drawer-close="customizerButton"
                    class="transition-all duration-150 ease-linear text-slate-500 hover:text-slate-800 dark:text-zink-200 dark:hover:text-zink-50"><i
                        data-lucide="x" class="w-4 h-4"></i></button>
            </div>
        </div>
        <div class="h-full p-6 overflow-y-auto">
            <div>
                <h5 class="mb-3 underline capitalize text-15">Choose Layouts</h5>
                <div class="grid grid-cols-1 mb-5 gap-7 sm:grid-cols-2">
                    <div class="relative">
                        <input id="layout-one" name="dataLayout"
                            class="absolute w-4 h-4 border rounded-full appearance-none cursor-pointer ltr:right-2 rtl:left-2 top-2 vertical-menu-btn bg-slate-100 border-slate-300 checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500"
                            type="radio" value="vertical" checked="">
                        <label
                            class="block w-full h-24 p-0 overflow-hidden border rounded-lg cursor-pointer border-slate-200 dark:border-zink-500"
                            for="layout-one">
                            <span class="flex h-full gap-0">
                                <span class="shrink-0">
                                    <span
                                        class="flex flex-col h-full gap-1 p-1 ltr:border-r rtl:border-l border-slate-200 dark:border-zink-500">
                                        <span class="block p-1 px-2 mb-2 rounded bg-slate-100 dark:bg-zink-400"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                    </span>
                                </span>
                                <span class="grow">
                                    <span class="flex flex-col h-full">
                                        <span class="block h-3 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block h-3 mt-auto bg-slate-100 dark:bg-zink-500"></span>
                                    </span>
                                </span>
                            </span>
                        </label>
                        <h5 class="mt-2 text-center text-15">Vertical</h5>
                    </div>

                    <div class="relative">
                        <input id="layout-two" name="dataLayout"
                            class="absolute w-4 h-4 border rounded-full appearance-none cursor-pointer ltr:right-2 rtl:left-2 top-2 vertical-menu-btn bg-slate-100 border-slate-300 checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500"
                            type="radio" value="horizontal">
                        <label
                            class="block w-full h-24 p-0 overflow-hidden border rounded-lg cursor-pointer border-slate-200 dark:border-zink-500"
                            for="layout-two">
                            <span class="flex flex-col h-full gap-1">
                                <span class="flex items-center gap-1 p-1 bg-slate-100 dark:bg-zink-500">
                                    <span class="block p-1 ml-1 bg-white rounded dark:bg-zink-500"></span>
                                    <span class="block p-1 px-2 pb-0 bg-white dark:bg-zink-500 ms-auto"></span>
                                    <span class="block p-1 px-2 pb-0 bg-white dark:bg-zink-500"></span>
                                </span>
                                <span class="block p-1 bg-slate-100 dark:bg-zink-500"></span>
                                <span class="block p-1 mt-auto bg-slate-100 dark:bg-zink-500"></span>
                            </span>
                        </label>
                        <h5 class="mt-2 text-center text-15">Horizontal</h5>
                    </div>
                </div>

                <div id="semi-dark">
                    <div class="flex items-center">
                        <div class="relative inline-block w-10 mr-2 align-middle transition duration-200 ease-in">
                            <input type="checkbox" name="customDefaultSwitch" value="dark" id="customDefaultSwitch"
                                class="absolute block w-5 h-5 transition duration-300 ease-linear border-2 rounded-full appearance-none cursor-pointer border-slate-200 bg-white/80 peer/published checked:bg-white checked:right-0 checked:border-custom-500 arrow-none dark:border-zink-500 dark:bg-zink-500 dark:checked:bg-zink-400 checked:bg-none">
                            <label for="customDefaultSwitch"
                                class="block h-5 overflow-hidden transition duration-300 ease-linear border rounded-full cursor-pointer border-slate-200 bg-slate-200 peer-checked/published:bg-custom-500 peer-checked/published:border-custom-500 dark:border-zink-500 dark:bg-zink-600"></label>
                        </div>
                        <label for="customDefaultSwitch" class="inline-block text-base font-medium">Semi Dark (Sidebar &
                            Header)</label>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <!-- data-skin="" -->
                <h5 class="mb-3 underline capitalize text-15">Skin Layouts</h5>
                <div class="grid grid-cols-1 mb-5 gap-7 sm:grid-cols-2">
                    <div class="relative">
                        <input id="layoutSkitOne" name="dataLayoutSkin"
                            class="absolute w-4 h-4 border rounded-full appearance-none cursor-pointer ltr:right-2 rtl:left-2 top-2 vertical-menu-btn bg-slate-100 border-slate-300 checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500"
                            type="radio" value="default">
                        <label
                            class="block w-full h-24 p-0 overflow-hidden border rounded-lg cursor-pointer border-slate-200 dark:border-zink-500 bg-slate-50 dark:bg-zink-600"
                            for="layoutSkitOne">
                            <span class="flex h-full gap-0">
                                <span class="shrink-0">
                                    <span
                                        class="flex flex-col h-full gap-1 p-1 ltr:border-r rtl:border-l border-slate-200 dark:border-zink-500">
                                        <span class="block p-1 px-2 mb-2 rounded bg-slate-100 dark:bg-zink-400"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                    </span>
                                </span>
                                <span class="grow">
                                    <span class="flex flex-col h-full">
                                        <span class="block h-3 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block h-3 mt-auto bg-slate-100 dark:bg-zink-500"></span>
                                    </span>
                                </span>
                            </span>
                        </label>
                        <h5 class="mt-2 text-center text-15">Default</h5>
                    </div>

                    <div class="relative">
                        <input id="layoutSkitTwo" name="dataLayoutSkin"
                            class="absolute w-4 h-4 border rounded-full appearance-none cursor-pointer ltr:right-2 rtl:left-2 top-2 vertical-menu-btn bg-slate-100 border-slate-300 checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500"
                            type="radio" value="bordered" checked="">
                        <label
                            class="block w-full h-24 p-0 overflow-hidden border rounded-lg cursor-pointer border-slate-200 dark:border-zink-500"
                            for="layoutSkitTwo">
                            <span class="flex h-full gap-0">
                                <span class="shrink-0">
                                    <span
                                        class="flex flex-col h-full gap-1 p-1 ltr:border-r rtl:border-l border-slate-200 dark:border-zink-500">
                                        <span class="block p-1 px-2 mb-2 rounded bg-slate-100 dark:bg-zink-400"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                    </span>
                                </span>
                                <span class="grow">
                                    <span class="flex flex-col h-full">
                                        <span class="block h-3 border-b border-slate-200 dark:border-zink-500"></span>
                                        <span
                                            class="block h-3 mt-auto border-t border-slate-200 dark:border-zink-500"></span>
                                    </span>
                                </span>
                            </span>
                        </label>
                        <h5 class="mt-2 text-center text-15">Bordered</h5>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <!-- data-mode="" -->
                <h5 class="mb-3 underline capitalize text-15">Light & Dark</h5>
                <div class="flex gap-3">
                    <button type="button" id="dataModeOne" name="dataMode" value="light"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active">Light
                        Mode</button>
                    <button type="button" id="dataModeTwo" name="dataMode" value="dark"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">Dark
                        Mode</button>
                </div>
            </div>

            <div class="mt-6">
                <!-- dir="ltr" -->
                <h5 class="mb-3 underline capitalize text-15">LTR & RTL</h5>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="diractionOne" name="dir" value="ltr"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active">LTR
                        Mode</button>
                    <button type="button" id="diractionTwo" name="dir" value="rtl"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">RTL
                        Mode</button>
                </div>
            </div>

            <div class="mt-6">
                <!-- data-content -->
                <h5 class="mb-3 underline capitalize text-15">Content Width</h5>
                <div class="flex gap-3">
                    <button type="button" id="datawidthOne" name="datawidth" value="fluid"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active">Fluid</button>
                    <button type="button" id="datawidthTwo" name="datawidth" value="boxed"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">Boxed</button>
                </div>
            </div>

            <div class="mt-6" id="sidebar-size">
                <!-- data-sidebar-size="" -->
                <h5 class="mb-3 underline capitalize text-15">Sidebar Size</h5>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="sidebarSizeOne" name="sidebarSize" value="lg"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active">Default</button>
                    <button type="button" id="sidebarSizeTwo" name="sidebarSize" value="md"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">Compact</button>
                    <button type="button" id="sidebarSizeThree" name="sidebarSize" value="sm"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">Small
                        (Icon)</button>
                </div>
            </div>

            <div class="mt-6" id="navigation-type">
                <!-- data-navbar="" -->
                <h5 class="mb-3 underline capitalize text-15">Navigation Type</h5>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="navbarTwo" name="navbar" value="sticky"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active">Sticky</button>
                    <button type="button" id="navbarOne" name="navbar" value="scroll"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">Scroll</button>
                    <button type="button" id="navbarThree" name="navbar" value="bordered"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">Bordered</button>
                    <button type="button" id="navbarFour" name="navbar" value="hidden"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">Hidden</button>
                </div>
            </div>

            <div class="mt-6" id="sidebar-color">
                <!-- data-sidebar="" light, dark, brand, modern-->
                <h5 class="mb-3 underline capitalize text-15">Sizebar Colors</h5>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="sidebarColorOne" name="sidebarColor" value="light"
                        class="flex items-center justify-center w-10 h-10 bg-white border rounded-md border-slate-200 group active"><i
                            data-lucide="check"
                            class="w-5 h-5 hidden group-[.active]:inline-block text-slate-600"></i></button>
                    <button type="button" id="sidebarColorTwo" name="sidebarColor" value="dark"
                        class="flex items-center justify-center w-10 h-10 border rounded-md border-zink-900 bg-zink-900 group"><i
                            data-lucide="check"
                            class="w-5 h-5 hidden group-[.active]:inline-block text-white"></i></button>
                    <button type="button" id="sidebarColorThree" name="sidebarColor" value="brand"
                        class="flex items-center justify-center w-10 h-10 border rounded-md border-custom-800 bg-custom-800 group"><i
                            data-lucide="check"
                            class="w-5 h-5 hidden group-[.active]:inline-block text-white"></i></button>
                    <button type="button" id="sidebarColorFour" name="sidebarColor" value="modern"
                        class="flex items-center justify-center w-10 h-10 border rounded-md border-purple-950 bg-gradient-to-t from-red-400 to-purple-500 group"><i
                            data-lucide="check"
                            class="w-5 h-5 hidden group-[.active]:inline-block text-white"></i></button>
                </div>
            </div>

            <div class="mt-6">
                <!-- data-topbar="" light, dark, brand, modern-->
                <h5 class="mb-3 underline capitalize text-15">Topbar Colors</h5>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="topbarColorOne" name="topbarColor" value="light"
                        class="flex items-center justify-center w-10 h-10 bg-white border rounded-md border-slate-200 group active"><i
                            data-lucide="check"
                            class="w-5 h-5 hidden group-[.active]:inline-block text-slate-600"></i></button>
                    <button type="button" id="topbarColorTwo" name="topbarColor" value="dark"
                        class="flex items-center justify-center w-10 h-10 border rounded-md border-zink-900 bg-zink-900 group"><i
                            data-lucide="check"
                            class="w-5 h-5 hidden group-[.active]:inline-block text-white"></i></button>
                    <button type="button" id="topbarColorThree" name="topbarColor" value="brand"
                        class="flex items-center justify-center w-10 h-10 border rounded-md border-custom-800 bg-custom-800 group"><i
                            data-lucide="check"
                            class="w-5 h-5 hidden group-[.active]:inline-block text-white"></i></button>
                </div>
            </div>

        </div>
        <div class="flex items-center justify-between gap-3 p-4 border-t border-slate-200 dark:border-zink-500">
            <button type="button" id="reset-layout"
                class="w-full transition-all duration-200 ease-linear text-slate-500 btn bg-slate-200 border-slate-200 hover:text-slate-600 hover:bg-slate-300 hover:border-slate-300 focus:text-slate-600 focus:bg-slate-300 focus:border-slate-300 focus:ring focus:ring-slate-100">Reset</button>
            <a href="#!"
                class="w-full text-white transition-all duration-200 ease-linear bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100">Buy
                Now</a>
        </div>
    </div>
    <script src='assets/libs/choices.js/public/assets/scripts/choices.min.js'></script>
    <script src="assets/libs/%40popperjs/core/umd/popper.min.js"></script>
    <script src="assets/libs/tippy.js/tippy-bundle.umd.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/prismjs/prism.js"></script>
    <script src="assets/libs/lucide/umd/lucide.js"></script>
    <script src="assets/js/starcode.bundle.js"></script>
    <!-- list js-->
    <script src="assets/libs/list.js/list.min.js"></script>
    <script src="assets/libs/list.pagination.js/list.pagination.min.js"></script>

    <!-- User list init js -->
    <script src="assets/js/pages/apps-user-list.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <!-- End Page-content -->
@endsection

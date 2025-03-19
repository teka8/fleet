@extends('layouts.master')

@section('content')


    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

        <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                <div class="flex flex-col gap-2 py-4 md:flex-row justify-between md:items-center print:hidden">
                    {{-- <div class="grow">
                        <h5 class="text-16">Real-Time Tracking</h5>
                    </div> --}}
                    <div class=" flex items-center gap-2">
                        <div>
                            <select class="rounded-full form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                <option selected="">Select Vehicle</option>
                            </select>
                        </div>
                        <div>
                            <select class="rounded-full form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                <option selected="">Select Trip</option>
                            </select>
                        </div>
                    </div>
                    <ul class="flex items-center gap-2 text-sm font-normal">
                        <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                            <a href="#!" class="text-slate-400 dark:text-zink-200">Maps</a>
                        </li>
                        <li class="text-slate-700 dark:text-zink-100">
                            Real-Time Tracking
                        </li>
                    </ul>
                </div>
                <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-1">
                    <div class="card">
                        <div class=" w-full">
                            {{-- <h6 class="mb-4 text-gray-800 text-15 dark:text-white">Example</h6> --}}
                            <div id="leaflet-map" class="w-full leaflet-map "></div>
                        </div>
                    </div><!--end card-->
                    {{-- <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 text-gray-800 text-15 dark:text-white">Markers, Circles and Polygons</h6>
                            <div id="leaflet-map-marker" class="leaflet-map"></div>
                        </div>
                    </div><!--end card-->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 text-gray-800 text-15 dark:text-white">Working with Popups</h6>
                            <div id="leaflet-map-popup" class="leaflet-map"></div>
                        </div>
                    </div><!--end card-->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 text-gray-800 text-15 dark:text-white">Markers with Custom Icons</h6>
                            <div id="leaflet-map-custom-icons" class="leaflet-map"></div>
                        </div>
                    </div><!--end card-->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 text-gray-800 text-15 dark:text-white">Interactive Choropleth Map</h6>
                            <div id="leaflet-map-interactive-map" class="leaflet-map"></div>
                        </div>
                    </div><!--end card-->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 text-gray-800 text-15 dark:text-white">Layer Groups and Layers Control</h6>
                            <div id="leaflet-map-group-control" class="leaflet-map"></div>
                        </div>
                    </div><!--end card--> --}}
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

          
    </div>


{{-- <script src='../assets/libs/choices.js/public/assets/scripts/choices.min.js'></script>
<script src="../assets/libs/%40popperjs/core/umd/popper.min.js"></script>
<script src="../assets/libs/tippy.js/tippy-bundle.umd.min.js"></script>
<script src="../assets/libs/simplebar/simplebar.min.js"></script>
<script src="../assets/libs/prismjs/prism.js"></script>
<script src="../assets/libs/lucide/umd/lucide.js"></script>
<script src="../assets/js/starcode.bundle.js"></script> --}}
<!-- leaflet plugin -->
<script src="../assets/libs/leaflet/leaflet.js"></script>

<!-- leaflet map.init -->
<script src="../assets/js/pages/leaflet-us-states.js"></script>
<script src="../assets/js/pages/leaflet-map.init.js"></script>

<!-- App js -->
{{-- <script src="../assets/js/app.js"></script> --}}
@endsection



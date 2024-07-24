<x-app-layout>
    <x-slot name="header">
        <h2 class="flex text-gray-800 leading-tight space-x-2">
            <svg class="w-5 h-5 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span>/</span>
            @vite(['resources/css/app.css', 'resources/js/app.js'])
            <script src="https://cdn.tailwindcss.com"></script>
            <span>{{ __('Dashboard') }}</span>
        </h2>
    </x-slot>

    <section>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("You're logged in!") }}
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                        <div class="flex justify-between mb-6">
                            <div>
                                <div class="flex items-center mb-1">
                                    <div class="text-2xl font-semibold">2</div>
                                </div>
                                <div class="text-sm font-medium text-gray-400">Users</div>
                            </div>
                            <div class="dropdown">
                                <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                                <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                    <li>
                                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <a href="/gebruikers" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
                    </div>
                    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                        <div class="flex justify-between mb-4">
                            <div>
                                <div class="flex items-center mb-1">
                                    <div class="text-2xl font-semibold">100</div>
                                    <div class="p-1 rounded bg-emerald-500/10 text-emerald-500 text-[12px] font-semibold leading-none ml-2">+30%</div>
                                </div>
                                <div class="text-sm font-medium text-gray-400">Companies</div>
                            </div>
                            <div class="dropdown">
                                <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                                <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                    <li>
                                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="/dierenartsen" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
                    </div>
                    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                        <div class="flex justify-between mb-6">
                            <div>
                                <div class="text-2xl font-semibold mb-1">100</div>
                                <div class="text-sm font-medium text-gray-400">Blogs</div>
                            </div>
                            <div class="dropdown">
                                <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                                <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                    <li>
                                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
                        <div class="flex justify-between mb-4 items-start">
                            <div class="font-medium">Order Statistics</div>
                            <div class="dropdown">
                                <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                                <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                    <li>
                                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                            <div class="rounded-md border border-dashed border-gray-200 p-4">
                                <div class="flex items-center mb-0.5">
                                    <div class="text-xl font-semibold">10</div>
                                    <span class="p-1 rounded text-[12px] font-semibold bg-blue-500/10 text-blue-500 leading-none ml-1">$80</span>
                                </div>
                                <span class="text-gray-400 text-sm">Active</span>
                            </div>
                            <div class="rounded-md border border-dashed border-gray-200 p-4">
                                <div class="flex items-center mb-0.5">
                                    <div class="text-xl font-semibold">50</div>
                                    <span class="p-1 rounded text-[12px] font-semibold bg-emerald-500/10 text-emerald-500 leading-none ml-1">+$469</span>
                                </div>
                                <span class="text-gray-400 text-sm">Completed</span>
                            </div>
                            <div class="rounded-md border border-dashed border-gray-200 p-4">
                                <div class="flex items-center mb-0.5">
                                    <div class="text-xl font-semibold">4</div>
                                    <span class="p-1 rounded text-[12px] font-semibold bg-rose-500/10 text-rose-500 leading-none ml-1">-$130</span>
                                </div>
                                <span class="text-gray-400 text-sm">Canceled</span>
                            </div>
                        </div>
                        <div>
                            <canvas id="order-chart"></canvas>
                        </div>
                    </div>
                    <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                        <div class="flex justify-between mb-4 items-start">
                            <div class="font-medium">Earnings</div>
                            <div class="dropdown">
                                <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                                <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                    <li>
                                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[460px]">
                                <thead>
                                    <tr>
                                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Service</th>
                                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Earning</th>
                                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                                <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                            </div>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                                <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                            </div>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                                <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                            </div>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                                <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                            </div>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                                <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                            </div>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                                <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                            </div>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                                <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                            </div>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                                <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                            </div>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                                <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                            </div>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                                <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                            </div>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                        </td>
                                        <td class="py-2 px-4 border-b border-b-gray-50">
                                            <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
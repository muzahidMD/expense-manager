@extends('layouts.app')
@section('title', '')

@section('content')

    @if (session('success'))
        <div id="successAlert"
            class="flex items-center justify-between p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            <span>{{ session('success') }}</span>
            <button onclick="document.getElementById('successAlert').remove()"
                class="text-green-700 hover:text-green-900 font-bold">
                ✕
            </button>
        </div>
    @endif

    <div class="flex justify-between mb-3">
        <h1 class="text-base lg:text-xl font-bold text-gray-800 dark:text-white/90 mb-4">Users</h1>
    </div>

    <div>
        {{-- @if (count($applications) == 0)
            <div class="alert alert-danger flex items-center justify-center ">
                <p class="font-semibold text-xl text-red-500 py-3">No Job Application found</p>
            </div>
        @else --}}
        <!-- Filters -->
        {{-- <div
                class="p-6 mb-8 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700">

                <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Quick Filter</label>
                        <select name="filter" onChange="this.form.submit()"
                            class="w-full px-4 py-3 rounded-xl border text-base border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700">
                            <option value="">All Jobs</option>

                            @foreach ($jobs as $job)
                                <option value="{{ $job->id }}" {{ request('filter') == $job->id ? 'selected' : '' }}>
                                    {{ $job->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div> --}}

        {{-- new table --}}
        <div
            class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="w-full overflow-x-auto">
                <table class="w-full min-w-max">
                    <thead class="bg-gray-50 dark:bg-gray-700/50">
                        <tr>
                            <th class="px-6 py-4 text-left">User</th>
                            <th class="px-6 py-4 text-left">Email</th>
                            <th class="px-6 py-4 text-left">Role</th>
                            <th class="px-6 py-4 text-left">Permission</th>
                            <th class="px-6 py-4 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-2 divide-gray-200 dark:divide-gray-700">
                        {{-- @dd($users) --}}
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                {{-- <td class="px-6 py-5 font-medium">
                                    <p>{{ $loop->iteration }}</p>
                                </td> --}}
                                <td class="px-6 py-5">
                                    <p>{{ $user->full_name }}</p>
                                </td>
                                <td class="px-6 py-5">
                                    <p>{{ $user->email }}</p>
                                </td>
                                <td class="px-6 py-5">

                                </td>
                                <td class="px-6 py-5">

                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex gap-4">
                                        <button>
                                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z"
                                                    fill="" />
                                            </svg>
                                        </button>
                                        <button>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- new table --}}
        {{-- @endif --}}
    </div>
@endsection

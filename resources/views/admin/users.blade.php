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
                            <th class="px-6 py-4 text-left"> No.</th>
                            <th class="px-6 py-4 text-left">Name</th>
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
                                <td class="px-6 py-5 font-medium">
                                    <p>{{ $loop->iteration }}</p>
                                </td>
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
                                            <div class="icon-square-pen"></div>
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

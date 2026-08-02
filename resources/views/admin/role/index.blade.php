@extends('layouts.app')
@section('title', 'Role Management')

@section('content')
    <x-common.page-breadcrumb pageTitle="Role Management" />
    {{-- Success Alert --}}
    @if (session('success'))
        <div id="successAlert"
            class="flex items-center justify-between p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
            <span>{{ session('success') }}</span>
            <button onclick="document.getElementById('successAlert').remove()" class="font-bold hover:text-green-900">
                ✕
            </button>
        </div>
    @endif

    <div>
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                Roles List
            </h2>

            <a href="{{ route('roles.create') }}">
                <x-ui.button class="bg-primary-500 hover:bg-primary-600 text-white px-5 py-2.5 rounded-lg">
                    + Add Role
                </x-ui.button>
            </a>
        </div>

        {{-- Table --}}
        <div
            class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">

            <div class="w-full overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 dark:bg-gray-700/50 text-gray-600 dark:text-gray-300">
                        <tr>
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Role Name</th>
                            <th class="px-6 py-4">Permissions</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        {{-- @dd($roles->permissions->name ) --}}
                        @forelse ($roles as $role)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/40 transition">
                                <td class="px-6 py-4 font-medium text-gray-700 dark:text-gray-300">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-800 dark:text-white">
                                    {{ $role->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <button id="showPerIcon{{ $role->id }}"
                                        onclick="permissionShow('show', {{ $role->id }})"
                                        class="text-primary-500 hover:text-primary-700 transition">
                                        <x-svg.eye class="w-5 h-5" />
                                    </button>

                                    <button id="hidePerIcon{{ $role->id }}"
                                        onclick="permissionShow('hide', {{ $role->id }})"
                                        class="hidden text-gray-500 hover:text-gray-700 transition">
                                        <x-svg.eye-off class="w-5 h-5" />
                                    </button>

                                    <div id="permission{{ $role->id }}" class="hidden mt-3 flex flex-wrap gap-2">

                                        @foreach ($role->permissions as $item)
                                            <span
                                                class="bg-green-100 text-green-700 text-xs font-medium px-2.5 py-1 rounded-md">
                                                {{ $item->name }}
                                            </span>
                                        @endforeach

                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-3">
                                        <a href="{{ route('roles.edit', $role->id) }}"
                                            class="p-2 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-600 transition">
                                            <x-svg.edit class="w-4 h-4" />
                                        </a>

                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                class="p-2 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 transition">
                                                <x-svg.trash class="w-4 h-4" />
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-6 text-center text-gray-500 dark:text-gray-400">
                                    No roles found
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function permissionShow(param, id) {
            if (param === 'show') {
                $('#permission' + id).removeClass('hidden');
                $('#showPerIcon' + id).addClass('hidden');
                $('#hidePerIcon' + id).removeClass('hidden');
            } else {
                $('#permission' + id).addClass('hidden');
                $('#showPerIcon' + id).removeClass('hidden');
                $('#hidePerIcon' + id).addClass('hidden');
            }
        }
    </script>
@endpush

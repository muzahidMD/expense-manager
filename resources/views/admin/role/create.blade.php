@extends('layouts.app')
@section('title', 'Add Role')

@section('content')
    <x-common.component-card title="Add Role" class="max-w-5xl mx-auto">

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-6">

                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Role Name <span class="text-red-500">*</span>
                    </label>

                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter role name"
                        class="h-11 w-full rounded-lg border border-gray-300 px-4 text-sm focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:bg-gray-900 dark:border-gray-700 dark:text-white" />

                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Permissions
                    </label>

                    <div class="grid grid-cols-2 md:grid-cols-4  gap-3">
                        @foreach ($permissions as $permission)
                            <div class="flex items-center gap-2">
                                <input type="checkbox" id="permission{{ $permission->id }}" name="permissions[]"
                                    value="{{ $permission->id }}"
                                    class="rounded border-gray-300 text-primary-600 focus:ring-primary-500"
                                    {{ in_array($permission->name, old('permissions', [])) ? 'checked' : '' }}>
                                <label for="permission{{ $permission->id }}"
                                    class="text-sm text-gray-700 dark:text-gray-300">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Submit --}}
                <div class="flex justify-end mt-6">
                    <x-ui.button type="submit" class="bg-primary-300 hover:bg-primary-600">
                        Save Role
                    </x-ui.button>
                </div>

            </div>
        </form>

    </x-common.component-card>
@endsection

@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')
    <x-common.page-breadcrumb pageTitle="User Profile" />

    <div class="max-w-3xl mx-auto mt-6">
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl shadow-sm p-6">

            <!-- Header -->
            <div class="mb-6 text-center">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Edit Profile</h2>
                <p class="text-sm text-gray-400">Update your personal information</p>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- Profile Image -->
                <div class="flex flex-col items-center gap-3 mb-6">
                    <div class="relative group">
                        <img src="{{ $user->image_url }}" id="image"
                            class="w-32 h-32 rounded-full object-cover border-4 border-gray-200 dark:border-gray-700 shadow-md">

                        <!-- Hover Overlay -->
                        <label for="imageUpload"
                            class="absolute inset-0 flex items-center justify-center bg-black/40 rounded-full opacity-0 group-hover:opacity-100 transition cursor-pointer">
                            <span class="text-white text-sm">Change</span>
                        </label>

                        <input type="file" id="imageUpload" name="image" class="hidden">
                    </div>

                    <p class="text-xs text-gray-400">Click image to update</p>
                </div>

                <div class="space-y-5">
                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Full Name <span class="mandatory">*</span>
                        </label>
                        <input type="text" name="name" value="{{ $user->name }}"
                            class="w-full h-11 px-4 rounded-lg border border-gray-300 dark:border-gray-700 
                        bg-gray-50 dark:bg-gray-800 text-gray-800 dark:text-white
                        focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition">

                        @error('name')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Email Address
                        </label>
                        <input type="text" readonly value="{{ $user->email }}"
                            class="w-full h-11 px-4 rounded-lg border border-gray-200 dark:border-gray-700 
                        bg-gray-100 dark:bg-gray-800 text-gray-500 cursor-not-allowed">
                    </div>
                </div>

                <!-- Password Section -->
                <div class="mt-8 ">
                    <h3 class="text-md font-semibold text-gray-800 dark:text-white mb-4">
                        Change Password
                    </h3>

                    <div class="space-y-4">
                        <!-- New Password -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                New Password
                            </label>
                            <input type="password" name="password"
                                class="w-full h-11 px-4 rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-800 dark:text-white focus:ring-2 focus:ring-primary-500">
                            @error('password')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Confirm Password
                            </label>
                            <input type="password" name="password_confirmation"
                                class="w-full h-11 px-4 rounded-lg border border-gray-300 dark:border-gray-700  bg-gray-50 dark:bg-gray-800 text-gray-800 dark:text-white focus:ring-2 focus:ring-primary-500">
                        </div>

                    </div>
                </div>

                <!-- Button -->
                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="px-6 py-2.5 rounded-lg text-white text-sm font-medium bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 transition shadow-md">
                        Update Profile
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const image = document.getElementById('image');
            const inputImage = document.getElementById('imageUpload');

            if (!image || !inputImage) return;

            inputImage.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (!file) return;

                const objectUrl = URL.createObjectURL(file);
                image.src = objectUrl;

                image.onload = () => URL.revokeObjectURL(objectUrl);
            });
        });
    </script>
@endpush

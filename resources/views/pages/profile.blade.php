@extends('layouts.app')

@section('title', 'Edit Member')
{{-- @php
    use Illuminate\Support\Facades\Storage;
@endphp --}}

{{-- @php use Illuminate\Support\Facades\Storage; @endphp --}}

@section('content')
    <x-common.page-breadcrumb pageTitle="User Profile" />
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
        <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-7"> Update Profile</h3>



        {{-- <x-common.component-card title="Update Member Details" class="max-w-212 mx-auto"> --}}
        <form action="" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            @method('PUT')

            <div class="flex flex-col items-center md:flex-row md:items-start md:justify-start gap-4 my-4">
                <!-- Image Wrapper -->
                <div class="relative w-40 h-40">
                    <img src="{{ $user->image_url }}" id="image"
                        class="w-full h-full border-4 rounded-full object-cover">
                    <!-- Camera Icon -->
                    <label for="imageUpload"
                        class="absolute bottom-2 right-2 bg-primary-400 hover:bg-primary-500 text-white 
                        w-10 h-10 flex items-center justify-center 
                        rounded-full shadow cursor-pointer hover:scale-105 transition">

                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path
                                d="M9 3H15L17 5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V6C2 5.44772 2.44772 5 3 5H7L9 3ZM12 19C15.3137 19 18 16.3137 18 13C18 9.68629 15.3137 7 12 7C8.68629 7 6 9.68629 6 13C6 16.3137 8.68629 19 12 19ZM12 17C9.79086 17 8 15.2091 8 13C8 10.7909 9.79086 9 12 9C14.2091 9 16 10.7909 16 13C16 15.2091 14.2091 17 12 17Z">
                            </path>
                        </svg>
                    </label>

                    <input type="file" id="imageUpload" name="image" class="hidden">
                </div>
                <!-- Text -->
                <div class="text-center md:text-left">
                    <h2 class="font-semibold text-gray-900 text-lg">Photo</h2>
                    <p class="text-sm text-gray-400">
                        Click the camera icon to change
                    </p>
                </div>

            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="form-group">
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Name <span class="mandatory">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-primary-300 focus:ring-primary-500/10 dark:focus:border-primary-800 h-11 w-full rounded-lg border border-gray-300 bg-gray-100 px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                    @error('name')
                        <div class="text-error-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>



                <div class="form-group">
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Email <span class="mandatory">*</span>
                    </label>
                    <input type="text" name="email" value="{{ $user->email }}" placeholder="Designation"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-primary-300 focus:ring-primary-500/10 dark:focus:border-primary-800 h-11 w-full rounded-lg border border-gray-300 bg-gray-100 px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                    @error('designation')
                        <div class="text-error-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        LinkedIn Link <span class="mandatory">*</span>
                    </label>
                    <input type="text" id="linkedin" name="linkedin" value="{{ $user->password }}"
                        placeholder="LinkedIn Link"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-primary-300 focus:ring-primary-500/10 dark:focus:border-primary-800 h-11 w-full rounded-lg border border-gray-300 bg-gray-100 px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                    @error('linkedin')
                        <div class="text-error-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>


            </div>
            <div class="grid grid-cols-1 gap-6">
                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="btn btn-add-event bg-primary-500 hover:bg-primary-600 flex w-full justify-center rounded-lg px-4 py-2.5 text-sm font-medium text-white sm:w-auto">
                        Update
                    </button>
                </div>
            </div>
        </form>
        {{-- </x-common.component-card> --}}
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

                    image.onload = () => {
                        URL.revokeObjectURL(objectUrl);
                    }
                });
            });
        </script>
    @endpush

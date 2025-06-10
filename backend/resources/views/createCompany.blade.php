@extends('layouts.app')


@section('styles')

@endsection

@section('title')
Create Company
@endsection

@section('content')
<div class="flex justify-center align-center formCenter mt-36">
    <x-form method="POST" action="{{ route('CreateNewCompany') }}" class="w-[60%]">

        <div class="mb-6">
            <x-label for="default-input" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white" required >{{ __("Company name") }}</x-label>
            <input type="text" name="companyName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="flex items-center gap-2 mb-4">
            <input type="checkbox" name="isAdmin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <x-label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >{{ __("Is admin") }}</x-label>
        </div>
        <x-button color="green">
            submit
        </x-button>
    </x-form>
</div>
@endsection





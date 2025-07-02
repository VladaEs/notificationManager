@extends('layouts.dashboard')

@section('title')
    users
@endsection

@section('styles')
@endsection


@section('content')
    <div class="mainContent w-full h-[100vh] pl-5 pt-5 pr-5 pb-5 relative flex flex-col">
        <x-dashboard.header>{{ __('Users') }}</x-dashboard.header>
        <x-dashboard.underline />
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            {{ __('user Id') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Username') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Email') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Company Assigned to') }}
                        </th>
                    </tr>
                </thead>

                <tbody>
                    {{-- ootput data in a table --}}

                    @foreach ($users as $user)
                        <tr
                            class="bg-white border-b text-xl dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td scope="row" class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user['id'] }}
                            </td>

                            <td class="px-6 py-4 ">
                                {{ $user['name'] }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $user['email'] }}
                            </td>

                            <td class="px-6 py-4">

                                <livewire:user-company-select :userVal="$user" :dataArr="$companies" textValueName="name" />



                                {{-- <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="0" default class="bg-white text-gray-900">None</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company['id'] }}" class="bg-white text-gray-900">

                                    {{ $company['name'] }}
                                </option>
                            @endforeach
                            <select> --}}
                            </td>

                        </tr>
                    @endforeach
                    {{-- end ootput data in a table --}}

                </tbody>

            </table>
            <x-form method="POST" class="flex flex-row items-center" action="{{ route('newEmails') }}">
                <x-button data-tooltip-target="tooltip-light" data-tooltip-style="light" type="submit" class="m-2"
                    color='cyan'>Send notifications</x-button>
                <span> to</span>


                <select name='companyName'
                    class="w-[30%] ml-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    
                    @foreach ($companies as $company)
                        <option value="{{ $company['id'] }}" class="bg-white text-gray-900">
                            {{ $company['name'] }}
                        </option>
                    @endforeach
                    <select>


            </x-form>




        </div>
    </div>
@endsection

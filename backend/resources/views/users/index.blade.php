@extends('layouts.dashboard')

@section('title')
    users
@endsection

@section('styles')

@endsection


@section('content')

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-[30%]">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- ootput data in a table --}}
                       
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    
                                </th>
                                <td class="px-6 py-4">
                                    
                                </td>

                            </tr>
                        
                        {{--end ootput data in a table --}}

                    </tbody>

                </table>
            </div>


@endsection
@extends('layouts.dashboard', ['messagesAmount' => $NewMessagesAmount])



@section('styles')
@endsection



@section('title')
    Post {{ $event['id'] }}
@endsection



@section('content')
    <div class="mainContent w-full h-[100vh] pl-5 pt-5 pr-5 pb-5 relative flex flex-col">
        <x-dashboard.header>{{ $event['event_name'] }}</x-dashboard.header>
        <x-dashboard.underline />
        <div
            class="messageFeedWrapper relative w-[100%] h-[100%] rounded-xl  p-2 flex flex-col gap-2 overflow-y-scroll overflow-x-hidden">

            <div class="font-(family-name:--font-family-title) text-2xl flex flex-row justify-between m-5">
                <div>
                    <span class="underline capitalize">{{ $event['event_name'] }}</span> {{ __('was sent by') }} <span
                        class="underline capitalize">{{ $event['name'] }}</span>
                </div>
                <div class="text-xl">{{ \Carbon\Carbon::create($event['created_at'])->diffForHumans(now()) }}</div>
            </div>
            <span>Message Content:</span>





            <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
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
                        @foreach ($eventPayload as $key => $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $key }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item }}
                                </td>

                            </tr>
                        @endforeach
                        {{--end ootput data in a table --}}

                    </tbody>

                </table>
            </div>



            {{-- {{ dd($events) }} --}}
        </div>

    </div>
@endsection

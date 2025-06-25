@extends('layouts.dashboard', ["messagesAmount"=> $NewMessagesAmount])

@section('styles')
    
@endsection


@section('title')
    Dashboard
@endsection

@section("content")

    <div class="mainContent w-full h-[100vh] pl-5 pt-5 pr-5 pb-5 relative flex flex-col">
        <x-dashboard.header>Inbox</x-dashboard.header>
        <x-dashboard.underline/>
        <div class="messageFeedWrapper relative w-[100%] h-[100%] rounded-xl  p-2 flex flex-col gap-2 overflow-y-scroll overflow-x-hidden">
            
            @foreach ($events as $event)
            
                <x-dashboard.card :postId="$event['id']" @class(['newEvent' => $event["read_at"] == null])>
                <x-dashboard.cardimage></x-dashboardcardimage>
                <x-dashboard.cardtextbox>
                    <x-dashboard.cardtextcontent>
                        <p class="h1">{{ $event['event_name'] }}</p>
                        <span class="span">{{ $event["time_difference"] }}</span>
                    </x-dashboard.cardtextcontent>
                    <p class="p"></p>
                </x-dashboard.cardtextbox>
            </x-dashboard.card>


            @endforeach


    

            

{{-- {{ dd($events) }} --}}
        </div>

    </div>

@endsection

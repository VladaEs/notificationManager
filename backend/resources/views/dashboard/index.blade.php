@extends('layouts.dashboard', ["messagesAmount"=> $messagesAmount])

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
@endsection


@section('title')
    Dashboard
@endsection

@section("content")
    <div class="mainContent w-full h-[100vh] pl-5 pt-5 pr-5 pb-5 relative flex flex-col">
        <x-dashboard.header>Inbox</x-dashboard.header>
        <x-dashboard.underline/>
        <div class="messageFeedWrapper relative w-[100%] h-[100%] rounded-xl  p-2 flex flex-col gap-2 overflow-y-scroll overflow-x-hidden">
            
            <div class="card">
                <div class="img"></div>
                <div class="textBox">
                    <div class="textContent">
                    <p class="h1">Clans of Clash</p>
                    <span class="span">12 min ago</span>
                    </div>
                    <p class="p">Xhattmahs is not attacking your base!</p>
                <div>
                </div>
                </div>
            </div>

             <div class="card">
                <div class="img"></div>
                <div class="textBox">
                    <div class="textContent">
                    <p class="h1">Clans of Clash</p>
                    <span class="span">12 min ago</span>
                    </div>
                    <p class="p">Xhattmahs is not attacking your base!</p>
                <div>
                </div>
                </div>
            </div>

            


        </div>

    </div>

@endsection

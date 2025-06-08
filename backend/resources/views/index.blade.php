@extends('layouts.app')

@section("title")
    test
@endsection

@section("styles")
    <link rel="stylesheet" href="{{ asset('assets/css/main_page.css') }}">
@endsection

@section("content")

    <div class="mainViewContainer">
        <div class="blobs ">
            <div class="blob"></div>
            <div class="blob"></div>
        </div>

        <div  class="textMiddlePage w-[100%] h-[100%] flex flex-col justify-center items-center gap-5"> 
            <div class="pageTitle uppercase text-6xl font-[700]">
                Signal|Flow
            </div>
            <div class="title_description capitalize font-[700]">
                {{ __('Smart webhook listener with queue, logs, and real-time notifications') }}
            </div>
            <div class="buttonsLogin flex flex-row gap-5 mt-5">
                <x-login-button link="{{ route('register') }}" :arrow=false>
                    Sign up
                </x-login-button>
                <x-login-button link="{{ route('login') }}" >
                    Login
                </x-login-button>


            </div>
        </div>
    


    </div>

@endsection




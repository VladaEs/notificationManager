@extends('layouts.dashboard', ["messagesAmount"=> $NewMessagesAmount])



@section('styles')


@endsection



@section('title')
    Post {{ request()->input('id') }}
@endsection



@section('content')

@endsection
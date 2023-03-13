@extends('layouts.purchase')

@section('content')
    @livewire('payment',['order'=>$order])
@endsection

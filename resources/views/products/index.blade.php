@extends('layouts.purchase')

@section('content')
    @livewire('add-to-cart',['clothes'=>clothes,'cart'=>cart])
@endsection

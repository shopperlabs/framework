@extends('shopper::layouts.'. config('shopper.system.theme'))
@section('title', __('Carrier Shipping Methods'))

@section('content')

    <livewire:shopper-settings.carriers.general />

@endsection

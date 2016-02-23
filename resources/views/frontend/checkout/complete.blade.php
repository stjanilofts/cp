@extends('frontend.layout')

@section('title', 'Kvittun fyrir pöntun')

@section('content')

	<h3>Pöntun staðfest!</h3>
	<p style="font-family: Arial, Helvetica, sans-serif;">Takk fyrir að versla hjá okkur! Hér fyrir neðan má sjá kvittun fyrir pöntuninni.</p>

	@include('frontend.receipt', ['order' => $order])

@stop
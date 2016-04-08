@extends('admin.layout')

@section('content')

	@if(isset($coupon->title))
		<h1>{{ strtoupper($coupon->title) }}</h1>
	@endif

	{!! Form::model($coupon, array(
			'class' => 'uk-form uk-form-stacked',
			'route' => $route,
			'method' => $method
		)) !!}
		
		<div class="uk-form-row">
			<label class="uk-form-label" for="title">Kóði</label>

			<div class="uk-form-controls">
				{!! Form::text(
						'title',
						isset($coupon->title) ? $coupon->title : '',
						array(
							'class'=>'uk-width-1-1',
						)
					)
				!!}
			</div>
		</div>

		<div class="uk-form-row">
			<label class="uk-form-label" for="title">Afsláttur (0-100%)</label>
			<div class="uk-form-controls">
				{!! Form::text(
						'discount',
						$coupon->discount > 0 ? $coupon->discount : 0,
						array(
							'class'=>'uk-width-1-1',
						)
					)
				!!}
			</div>
		</div>

    	<div class="uk-form-row">
			<button class="uk-button uk-button-primary">Vista<i class="uk-icon-save uk-margin-left"></i></button>
		</div>

	{!! Form::close() !!}

@stop
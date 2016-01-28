@extends('frontend.layout')

@section('title', isset($page) ? $page->title : '')

@section('content')

	<div class="page">

		@if($page->hasSubs() || $page->hasParent())
			<div class="uk-grid" data-uk-grid-margin>
				<div class="uk-width-medium-1-4 uk-hidden-small">
					<nav class="submenu">
						{!! kalMenuFrom(\Request::segment(1)) !!}
					</nav>
				</div>

				<div class="uk-width-medium-3-4">
					{!! cmsContent($page) !!}
				</div>
			</div>
		@else
			{!! cmsContent($page) !!}
		@endif


		@if(\Request::is('hafa-samband'))
			<div>
				<br>
				<hr>
				<br>
				@include('frontend.forms.contact')
			</div>
		@endif
	</div>

@stop
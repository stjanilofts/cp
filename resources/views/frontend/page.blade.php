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

					<div class="uk-margin-top">
						<div class="fb-like" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
					</div>
				</div>
			</div>
		@else
			{!! cmsContent($page) !!}

			<div class="uk-margin-top">
				<div class="fb-like" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
			</div>
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
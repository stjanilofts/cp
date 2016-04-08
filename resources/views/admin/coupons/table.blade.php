@extends('admin.layout')

@section('content')


	<a class="uk-button uk-button-primary" href="/admin/coupons/create">Bæta við<i class="uk-icon-plus-circle uk-margin-left"></i></a>

	@if(isset($items))
		
		<table class="uk-table uk-table-striped uk-position-relative">

			<tbody class="uk-sortable" data-uk-sortable="{handleClass:'uk-sortable-handle', animation:0}">

				<tr>
					<th>Kóði</th>
					<th>Afsláttur (%)</th>
					<th>&nbsp;</th>
				</tr>

				@foreach($items as $item)

					<tr data-itemId="{{ $item->id }}">
						<td>
							<a href="/admin/coupons/{{ $item->id }}/edit">
								{{ $item->title }}
							</a>
						</td>

						<td>
							{{ (int)(trim($item->discount)) }}%
						</td>

						<td class="uk-text-right">
							{!! Form::open(['action' => ['CouponController@destroy', $item->id], 'method' => 'delete', 'class'=>'uk-padding-remove uk-margin-remove']) !!}
								<button class="uk-button-link delete-button uk-float-right uk-margin-left" style="cursor: pointer;"><i class="uk-icon-trash-o uk-text-danger"></i></button>
							{!! Form::close() !!}

							<button href="/admin/coupons/{{ $item->id }}/edit"
									title='Birta/fela'
									class="uk-button-link toggle-button"
									style="cursor: pointer;">
									<i class="uk-icon-eye {{ $item->status ? 'uk-text-success' : 'uk-text-danger' }}"></i>
							</button>
						</td>
					</tr>

				@endforeach

			</tbody>

		</table>

	@endif


	<script>
	$(function() {
		$('button.delete-button').click(function(e) {
			e.preventDefault();

			var $form = $(this).parents('form');

			UIkit.modal.confirm("Ertu viss um að þú viljir eyða?", function() {
				$form.submit();
			});
		});

		$('button.toggle-button').click(function(e) {
			$itemId = $(this).parents('tr').attr('data-itemId');

			var ctx = $(this);

			var $icon = ctx.find('i');

			var item = {
				_token: '{!! csrf_token() !!}',
				model: 'coupons',
				id: $itemId
			}
			
			$.post('/admin/formable/_toggle', item, function(data) {
			}).success(function(data) {
				console.log(data);

				if(data.status == "0")
				{
					$icon.removeClass('uk-text-success').addClass('uk-text-danger');
				}
				if(data.status == "1")
				{
					$icon.removeClass('uk-text-danger').addClass('uk-text-success');
				}
			}).error(function(data) {

			});
		});

	});
	</script>

@stop
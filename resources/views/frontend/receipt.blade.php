<div class="receipt">
	<h3 style="font-family: Arial, Helvetica, sans-serif;">#{{ strtoupper($order->reference) }}</h3>
	<p style="font-family: Arial, Helvetica, sans-serif;"><strong>Nafn:</strong> {{ ucfirst($order->nafn) }}</p>
	<p style="font-family: Arial, Helvetica, sans-serif;"><strong>Netfang:</strong> {{ strtolower($order->netfang) }}</p>
	<p style="font-family: Arial, Helvetica, sans-serif;"><strong>Símanúmer:</strong> {{ trim($order->simi) }}</p>
	<p style="font-family: Arial, Helvetica, sans-serif;"><strong>Pnr. og staður:</strong> {{ ($order->pnr.' '.$order->stadur) }}</p>
	<p style="font-family: Arial, Helvetica, sans-serif;"><strong>Heimilisfang:</strong> {{ ($order->heimilisfang) }}</p>
	<p style="font-family: Arial, Helvetica, sans-serif;"><strong>Afhendingarmáti:</strong> {{ ($order->getShippingOption()) }}</p>
	<p style="font-family: Arial, Helvetica, sans-serif;"><strong>Greiðslumáti:</strong> {{ ($order->getPaymentOption()) }}</p>

	<h3 style="font-family: Arial, Helvetica, sans-serif;">Pöntun</h3>
	<table style="border-collapse: collapse; border: 1px solid #DDDDDD;">
		<tr>
			{{-- <th>ID</th> --}}
			<th style="text-align: left; padding: 5px; border-collapse: collapse; border: 1px solid #DDDDDD; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">Vara</th>
			<!--<th style="text-align: left; padding: 5px; border-collapse: collapse; border: 1px solid #DDDDDD; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">Vnr.</th>-->
			<th style="text-align: center; padding: 5px; border-collapse: collapse; border: 1px solid #DDDDDD; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">Magn</th>
			<th style="text-align: right; padding: 5px; border-collapse: collapse; border: 1px solid #DDDDDD; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">Upphæð</th>
		</tr>
		@foreach($order->getItems() as $item)
			<tr>
				{{-- <td>{{ $item->id }}</td> --}}
				<td style="text-align: left; padding: 5px; border-collapse: collapse; border: 1px solid #DDDDDD; font-family: Arial, Helvetica, sans-serif;">{{ $item->title }}</td>
				<!--<td style="text-align: left; padding: 5px; border-collapse: collapse; border: 1px solid #DDDDDD; font-family: Arial, Helvetica, sans-serif;">{{ $item->vnr }}</td>-->
				<td style="text-align: center; padding: 5px; border-collapse: collapse; border: 1px solid #DDDDDD; font-family: Arial, Helvetica, sans-serif;">{{ $item->qty }}</td>
				<td style="text-align: right; padding: 5px; border-collapse: collapse; border: 1px solid #DDDDDD; font-family: Arial, Helvetica, sans-serif;">{{ kalFormatPrice($item->subtotal) }}</td>
			</tr>
		@endforeach

		<tr>
			<td colspan="3" style="text-align: right; padding: 5px; border-collapse: collapse; border: 1px solid #DDDDDD; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">
				Samtals {{ kalFormatPrice($order->total()) }}
			</td>
		</tr>
	</table>
</div>
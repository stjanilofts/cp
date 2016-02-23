@if($borgun->testing)
<h3>ÞAÐ ER KVEIKT Á PRUFUGREIÐSLUM!!!</h3>
@endif
<form id="form1" action="{{ $borgun->site }}" method="post" accept-charset="UTF-8" style="{{ $borgun->testing ? 'visibility: visible;' : 'visibility: hidden;' }}">
Merchantid : <input type="text" name="merchantid" value="{{ $borgun->MerchantId }}" /><br>
paymentgatewayid : <input type="text" name="paymentgatewayid" value="{{ $borgun->PaymentGatewayId }}" /><br>
checkhash : <input type="text" size=100 name="checkhash" value="{{ $borgun->checkHash() }}" /><br>
orderid : <input type="text" name="orderid" value="{{ $borgun->OrderId }}" /><br>
currency : <input type="text" name="currency" value="{{ $borgun->Currency }}" /><br>
language : <input type="text" name="language" value="{{ $borgun->Language }}" /><br>
returnurlsuccess : <input type="text" size=100 name="returnurlsuccess" value="{{ $borgun->ReturnUrlSuccess }}" /><br>
returnurlsuccess : <input type="text" size=100 name="returnurlsuccessserver" value="{{ $borgun->ReturnUrlSuccessServer }}" /><br>
returnurlcancel : <input type="text" size=100 name="returnurlcancel" value="{{ $borgun->ReturnUrlCancel }}" /><br>
returnurlerror : <input type="text" size=100 name="returnurlerror" value="{{ $borgun->ReturnUrlError }}" /><br>
@foreach($borgun->order->getItems() as $k => $item)
itemdescription_{{ $k }} : <input type="text" name="itemdescription_{{ $k }}" value="{{ $item->title }}" /><br>
itemcount_{{ $k }} : <input type="text" name="itemcount_{{ $k }}" value="{{ $item->qty }}" /><br>
itemunitamount_{{ $k }} : <input type="text" name="itemunitamount_{{ $k }}" value="{{ $item->price }}" /><br>
itemamount_{{ $k }} : <input type="text" name="itemamount_{{ $k }}" value="{{ $item->subtotal }}" /><br>
@endforeach
amount : <input type="text" name="amount" value="{{ $borgun->Amount }}" /><br>
pagetype : <input type="text" name="pagetype" value="0" /><br>
skipreceiptpage : <input type="text" name="skipreceiptpage" value="1" /><br>
<input type="submit" name="PostButton" />
</form>
@if( ! $borgun->testing)
<script>
var domReady = function(callback) { document.readyState === "interactive" || document.readyState === "complete" ? callback() : document.addEventListener("DOMContentLoaded", callback) }
domReady(function() { document.getElementById('form1').submit() });
</script>
@endif
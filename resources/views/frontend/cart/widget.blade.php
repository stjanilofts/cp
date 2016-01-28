<div v-cloak id="cart-widget" class="uk-text-center">
	<a :title="count > 0 ? count + ' hlut' + ((count > 1) ? 'i' : 'u') + 'r í körfunni' : 'Karfan þín'" href="/karfa/" class="cart-widget__link">
		<i class="uk-icon-large uk-icon-shopping-cart"></i>
		<span v-if="count > 0" class="cart-widget__info">@{{ count }}</span>
	</a>
	<!-- @{{ items | json 4 }} -->
</div>
<script>
var cart_widget = new Vue({
	el: '#cart-widget',

	data: {
		base: 0,
		items: {!! cartItems() !!}
	},

	ready: function() {
		$(document).ready(function() {
			setTimeout(function() {
				this.getCartItems();
			}.bind(this), 1);	
		}.bind(this));
	},

	methods: {
		increment: function(qty) {
			this.base = this.base + parseInt(qty, 10)
		},
		getCartItems: function() {
			this.$http.get('/_vorur/get-cart-items').then(function(response) {
				this.$set('items.items', response.data.items);
			}.bind(this));
		}
	},

	computed: {
		count: function() {
			var count = this.base

			this.items.items.filter(function(item) {
				count = count + parseInt(item.qty, 10)
			})				

			return count
		}
	}
})
</script>
$(function(){
const cartInfo=document.getElementById('cart-info');
const cart=document.getElementById('cart');
if(cartInfo){
cartInfo.addEventListener('click',function(){
	cart.classList.toggle('show-cart');
});
}
});

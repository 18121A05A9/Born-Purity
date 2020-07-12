$(function(){
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == document.getElementById('login')) {
        document.getElementById('login').style.display = "none";
        
    }
    else if(event.target==document.getElementById('signup')){
    	document.getElementById('signup').style.display='none';
    }
    else if(event.target==document.getElementById('sell')){
    	document.getElementById('sell').style.display='none';
    }
    else if(event.target==document.getElementById('contact')){
    	document.getElementById('contact').style.display='none';
    }
    else if (event.target==document.getElementById('location')) {
    	document.getElementById('location').style.display='none';
    }
     else if (event.target==document.getElementById('forgot')) {
    	document.getElementById('forgot').style.display='none';
    }
    else if (event.target==document.getElementById('order')) {
        document.getElementById('order').style.display='none';
    }

}
document.getElementById('continue-btn').onclick=function (event){
    document.getElementById('location').style.display='none';
    document.getElementById('order').style.display='block';
}
document.getElementById('reg').onclick=function (event){
	document.getElementById('login').style.display='none';
	document.getElementById('signup').style.display='block';
}
document.getElementById('for').onclick=function (event){
	document.getElementById('login').style.display='none';
	document.getElementById('forgot').style.display='block';
}
document.getElementById("signup-btn").onclick=function(event){
if (document.form1.psw.value!=document.form1.repsw.value) {
    alert("Passwordd mismatched");
    document.repsw.focus();
}
}
document.getElementById("continue-btn").onclick=function (){
        var x=document.forms["loc"]["pin"].value;
        console.log(x);
    }
const cartBtn=document.querySelectorAll('.add-cart');

if(cartBtn){
cartBtn.forEach(function(btn){
btn.addEventListener("click",function(event){
    console.log(cartBtn);
    const item={};
    let price=event.target.previousElementSibling.innerHTML;
let product=event.target.previousElementSibling.previousElementSibling.innerHTML;
item.product=product;
item.price=price.substr(8,);
console.log(item);
const cartItem=document.createElement("div");
cartItem.classList.add(
    "text-capitalize",
    "cart-item",
    );
cartItem.innerHTML='<p id="cart-item-title" class="font-weight-bold mb-0">${item.name}</p>';
const cart=document.getElementById("cart");
const total=document.querySelector(".cart-total-container");
cart.insertBefore(cartItem,total);
alert("item added to cart");

});
});
}
});

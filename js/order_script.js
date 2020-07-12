$(function (event){

	var r=window.location.search;
	 r=r.substr(5,);
	
	jQuery.support.cors = true;

	var xmlhttp = new XMLHttpRequest();
xmlhttp.onload= function () {
  if (this.readyState == 4 && this.status == 200) {

  var myObj = JSON.parse(this.responseText);
  var i,j,x;
  if(myObj.pin.indexOf(r)>=0){
  	i=myObj.pin.indexOf(r);
 document.getElementById("name").innerHTML=myObj.company[i].comp_name;
  for (j=0;j<myObj.company[i].image.length;j++) {
  	  var img = new Image();
  var s='img';
  var s1="product";
  var s2="price";
  var s3="order_sec";
  var element=document.createElement("BUTTON");
  element.innerHTML="Add to cart";
  element.setAttribute("class","add-cart");
  	s=s+(j+1);
  	s1=s1+(j+1);
  	s2=s2+(j+1);
  	s3=s3+(j+1);
  	img.src=myObj.company[i].image[j];
  	img.setAttribute("class","img-responsive");
   document.getElementById(s).appendChild(img);
   document.getElementById(s1).innerHTML=myObj.company[i].pro_name[j];
   document.getElementById(s2).innerHTML="price:"+myObj.company[i].price[j];
   var di=document.getElementById(s3);
   di.insertBefore(element,null);
     }


} else{
  	var x=document.getElementById('name');
  	x.innerHTML="<h1 class='text-center'> &#x1F629;Sorry for this inconvenience</h1><br><h3 class='text-center'>Our Born Purity services are not available at your location</h3>";
  	
  }
}  
};

xmlhttp.open("POST", "data/order_data.json", true);
xmlhttp.send();

});
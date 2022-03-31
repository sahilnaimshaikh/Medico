// console.log("hello sahil")


if (document.readyState == "loading") {
    document.addEventListener("DOMContentLoaded", ready)
}
else {
    ready();
}
function ready() {

    // below code under ready function are for triggering events 

    var removecartitemsbuttons = document.getElementsByClassName("btn-remove");
    // console.log(removecartitemsbuttons)
    for (let i = 0; i < removecartitemsbuttons.length; i++) {
        var button = removecartitemsbuttons[i];
        button.addEventListener("click", removeCartItem)
        //    console.log("clicked on Removed button"
    }

    var quantityinput = document.getElementsByClassName("cart-quantity-input");
    for (var i = 0; i < quantityinput.length; i++) {
        var input = quantityinput[i];
        input.addEventListener("change", quantitychanged);
    }

    var addtoCartClicked = document.getElementsByClassName("add-btn");
    for (var i = 0; i < addtoCartClicked.length; i++) {
        var button = addtoCartClicked[i];
        button.addEventListener("click", addtocartclicked)


    }

}
function addtocartclicked(event) {
    var button = event.target;
    var shopItem = button.parentElement.parentElement;
    var title = shopItem.getElementsByClassName("shop-item-title")[0].innerText;
    var price = shopItem.getElementsByClassName("shop-item-price")[0].innerText;
    var imagesrc = shopItem.getElementsByClassName("shop-item-image")[0].src;
    // console.log(title,price,imagesrc)

    addItemtoCart(title, price, imagesrc);
    shopItem.getElementsByClassName("add-btn")[0].innerText = "Added to cart"
    updateCartTotal();


}

function addItemtoCart(title, price, imagesrc) {
    var cartRow = document.createElement("div");
    cartRow.classList.add("cart-row");
    var cartItems = document.getElementsByClassName("cart-items")[0];
    var cartItemNames = cartItems.getElementsByClassName("cart-item-title");
    for( var i = 0 ; i < cartItemNames.length ; i ++)
    {
        if(cartItemNames[i].innerText == title){
            // alert("This Fruit is already added ")
            // return
        }
    }
    var cartItemContent = `
           <div class="cart-item border">
                    <img src="${imagesrc}" alt="" class="cart-item-image">
                    <div class="cart-item-title">${title}</div>
            </div>

            <div class="cart-price border "> ${price}</div>

            <div class="cart-quantity border">
                    <input type="number" class="cart-quantity-input" value="1">
                    <button class="btn btn-remove">Remove</button>
            </div>
    `
    cartRow.innerHTML= cartItemContent;
    cartItems.append(cartRow);
    cartRow.getElementsByClassName("btn-remove")[0].addEventListener("click",removeCartItem);
    cartRow.getElementsByClassName("cart-quantity-input")[0].addEventListener("change",quantitychanged);

}


function quantitychanged(event) {
    var input = event.target
    if (isNaN(input.value)  ) {
        input.value = 1;
    }
    if(input.value < 1){
        input.parentElement.parentElement.remove();

    }
    if( input.value > 2){
        alert("Maximum limit reached ")
        input.value = 2;
    }
    updateCartTotal();
}

function removeCartItem(event) {
    var buttonclicked = event.target;
    buttonclicked.parentElement.parentElement.remove();
    updateCartTotal();

}

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName("cart-items")[0];
    var cartRows = document.getElementsByClassName("cart-row");
    total = 0;
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i];
        var priceElement = cartRow.getElementsByClassName("cart-price")[0];
        var quantityElement = cartRow.getElementsByClassName("cart-quantity-input")[0];
        var price = parseFloat(priceElement.innerText.replace("₹",""));
        var quantity = quantityElement.value;
        //  console.log(price*quantity)
        total += (price * quantity);
    }
    document.getElementsByClassName("total-price-value")[0].innerText = " ₹" + total;
}
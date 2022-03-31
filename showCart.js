console.log("this is showcart file")

function showCart() {
    let products = localStorage.getItem('products');
    if (products == null) {
        
        productsArray = []
    }
    else {
        productsArray = JSON.parse(products);
    }
    // console.log(productsArray);
    
    if(productsArray.length==0){
        console.log("no products")
        document.getElementById("cart").style.display = "none";
        document.getElementById("emptyCart").style.display = "block"
    }
    else{
        document.getElementById("emptyCart").style.display = "none"
    }
    let html = "";
    let totalPrice = 0;
    Array.from(productsArray).forEach((e, index) => {
        let productName = e.productName;
        let productPrice = e.productPrice;
        let productCode = e.productCode;
        let productImgSrc = e.productImgSrc;
        totalPrice += parseInt(productPrice);
        html += `
                <div class="myCartItems">
                    <div class="cartItemImage">
                        <div class="itemImage"><img src=${productImgSrc} alt="">
                        </div>
                    </div>
                    <div class="cartItemDetails" >
                        <h5>${productName}</h5>
                        <h6>eligible for FREE delivery.</h6>
                        <h6>Product Code ${productCode}</h6>
                        <button type="button" id="${index}" onclick = removeProduct(this.id) class="btn btn-danger">Remove</button>
                    </div>
                    
                </div>
        
        `;
        document.getElementById("payPrice").value = productPrice-(productPrice/10);
         document.getElementById("product").value = productName;
    })
    let myCart = document.getElementById("myCart");
    myCart.innerHTML = html;
    document.getElementById('totalPrice').children[0].innerText = `Total Price : ${totalPrice}`;
    document.getElementById('totalPrice').children[1].innerText = `Total Dicount: 10%`;
    document.getElementById('totalPrice').children[2].innerText = `Payable Amount: ${totalPrice-(totalPrice/10)}`;
  
       
}
showCart();

function removeProduct(index) {

    let products = localStorage.getItem('products');
    if (products == null) {
        productsArray = []
    }
    else {
        productsArray = JSON.parse(products);
    }
    productsArray.splice(index, 1);
    localStorage.setItem('products', JSON.stringify(productsArray));
    showCart();
}

document.getElementById("submit").addEventListener("click",(e)=>{
// 
    localStorage.clear();
})


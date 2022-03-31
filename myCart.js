console.log("hello i am in myCart.js file")
document.getElementById("alert").style.display = "none";

let addToBagButton = document.getElementsByClassName("addToBagButton");
// console.log(addToBagButton)
// addToBagButton.addEventListener('click',addToBag(){
//     console.log("hello this is addto bag function")
// });

function goToCart(productName,productPrice,productCode,productImgSrc){
    let product = {
        productName : productName,
        productPrice : productPrice,
        productCode : productCode,
        productImgSrc : productImgSrc
    }
    let products = localStorage.getItem('products');
    if(products == null){
        productsArray = []
    }
    else{

        productsArray = JSON.parse(products);
    }
    if(productsArray.length == 0){
        productsArray.push(product);

        localStorage.setItem('products',JSON.stringify(productsArray));
        // console.log('clicked',product);
    }
    else{
        document.getElementById("alert").style.display = "block";
        console.log("cannot put item in the cart")
    }
    
}


Array.from(addToBagButton).forEach((e,index)=>{
    e.addEventListener('click',()=>{
        // console.log("add to bag button clicked on"+(index+1))
        let productName = e.parentNode.children[1].innerText;
        // console.log(productName)
        let productPrice = e.parentNode.children[2].innerText.slice(7);
        // console.log(productPrice)
        let productCode = e.parentNode.children[3].innerText.slice(14);
        let productImgSrc = e.parentNode.children[0].src;
        
        // document.getElementById("payPrice").value = productPrice;
        // document.getElementById("product").value = productName;

        console.log(productName,productPrice,productCode,productImgSrc)
        goToCart(productName,productPrice,productCode,productImgSrc);
        location.href = "http://localhost/medico/do_order.php";
    });
})


    
function test() {
    console.log("test");
}

function viewProduct(productElement) {
    const productData = productElement.getAttribute('data-product');
    localStorage.setItem('selectedProduct', productData);
    window.location.href = 'product.php?id=' + productData;
}
function saveName() {
    let element = document.getElementById("item");
    alert(element.value);
    let expireTime = new Date();
    expireTime.setTime(expireTime.getTime() + (10*24*60*60*1000));
    document.cookie = "item=" + element.value + "; expires=" + expireTime.toUTCString();
}
function test() {
    console.log("test");
}

function viewProduct(productElement) {
    const productData = productElement.getAttribute('data-product');
    localStorage.setItem('selectedProduct', productData);
    window.location.href = 'product.php?id=' + productData;
}
function addToCart(productId, quantity) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_to_cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    alert("Item added to cart successfully");
                } else {
                    alert("Error: " + response.message);
                }
            } else {
                alert("An error occurred. Please try again.");
            }
        }
    };

    var params = "product_id=" + encodeURIComponent(productId) +
                 "&quantity=" + encodeURIComponent(quantity);
    xhr.send(params);
}

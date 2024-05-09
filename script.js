document.getElementById("searchForm").addEventListener("submit", function(event) {
    event.preventDefault();
    var productRef = document.getElementById("productRef").value;
    if(productRef.trim() !== "") {
        fetchProductInfo(productRef);
    }
});

function fetchProductInfo(productRef) {
    var formData = new FormData();
    formData.append("productRef", productRef);

    fetch("fetch_product_info.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("productInfo").innerHTML = data;
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

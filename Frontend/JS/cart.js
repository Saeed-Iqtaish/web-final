function updateCartSummary() {
    let totalItems = 0;
    let totalPrice = 0;

    document.querySelectorAll(".cart-item").forEach(item => {
        const quantity = parseInt(item.querySelector(".cart-item-quantity").value, 10);
        const price = parseFloat(item.querySelector(".cart-item-price").textContent.replace('$', ''));

        totalItems += quantity;
        totalPrice += quantity * price;
    });

    document.getElementById("total-items").textContent = totalItems;
    document.getElementById("total-price").textContent = `$${totalPrice.toFixed(2)}`;
}

document.querySelectorAll(".cart-item-quantity").forEach(input => {
    input.addEventListener("change", updateCartSummary);
});

updateCartSummary();
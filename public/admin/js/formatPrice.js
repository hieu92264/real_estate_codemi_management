//thêm dấu chấm vào giá của form tạo và cập nhật bđs
document.addEventListener('DOMContentLoaded', function() {
    const priceInput = document.getElementById('price');

    function formatNumber(num) {
        return num.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function stripNumber(num) {
        return num.replace(/\./g, "");
    }

    priceInput.addEventListener('input', function(e) {
        e.target.value = formatNumber(e.target.value);
    });

    const form = priceInput.closest('form');
    form.addEventListener('submit', function(e) {
        priceInput.value = stripNumber(priceInput.value);
    });

    const priceDisplay = document.getElementById('price-display');
    if (priceDisplay) {
        priceDisplay.textContent = formatNumber(priceDisplay.textContent);
    }
});

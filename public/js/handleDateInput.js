document.addEventListener('DOMContentLoaded', function() {
    const checkinDate = document.getElementById("checkin-date");
    const checkoutDate = document.getElementById("checkout-date");

    checkinDate,addEventListener('change', function() {
        if (checkinDate.value >= checkoutDate.value) {
            checkoutDate.value = '';
        }
        const checkinValue = new Date(checkinDate.value);
        let checkoutValue = new Date(checkinValue);
        checkoutValue.setDate(checkoutValue.getDate() + 1);
        checkoutDate.min = checkoutValue.toISOString().slice(0,10);
    })
})

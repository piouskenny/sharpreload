const pin = document.getElementById("pin");

pin.addEventListener("input", function () {
    const pin_value = pin.value;

    const error_pin = document.getElementById("error_pin");

    if (pin_value.length < 4) {
        error_pin.innerHTML = "Pin cannot be less then 4 digits";
    } else {
        error_pin.innerHTML = "";
    }
});

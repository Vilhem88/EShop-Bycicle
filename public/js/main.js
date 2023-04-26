let selectedValue;
let forms = document.querySelectorAll("form");
let selectedQuantity = document.getElementsByClassName("quantity");

for (const param of selectedQuantity) {
    param.addEventListener("change", function () {
        selectedValue = this.value;
    });
}

forms.forEach(function (form) {
    form.addEventListener("submit", function (e) {
        e.preventDefault();
        let dbQuantity = this.getAttribute("data-available-quantity");

        if (+dbQuantity < +selectedValue) {
            alert(`Please select a max ${dbQuantity} items`);
        } else {
            this.submit();
        }
    });
});


const checkIfEmpty = (event) => {
    const form = document.querySelector('#add-product-form');
    const inputs = form.querySelectorAll('[add_product_input]');
    const dialog = document.querySelector('#dialog-add-product');



    inputs.forEach(input => {
        console.log(input.name);
        console.log(input.value);
        if (input.value == '') {
            form.addEventListener("submit", (event) => {
                event.preventDefault();
                dialog.showModal();
            });
        }
    });
}

const closeDialog = () => {
    const dialog = document.querySelector('#dialog-add-product');
    dialog.close();
}

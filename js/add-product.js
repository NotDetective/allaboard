const checkIfEmpty = () => {
    const form = document.querySelector('#add-product-form');
    const inputs = form.querySelectorAll('[add_product_input]');

    let empty = false;

    inputs.forEach(input => {
        if (empty == false){
            console.log(input.name);
            console.log(input.value);
            if (input.value === '') {
                empty = true;
            }
        }
    });

    if (empty == true) {
        form.addEventListener("submit", (event) => {
            event.preventDefault();
            alert('please fill in all the fields');
        });
    }
}
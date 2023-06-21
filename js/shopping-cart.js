const openCart = () => {
    const cart = document.querySelector('#shoppingcart');
    cart.show();

    console.log('open cart');
}

const closeCart = () => {
    const cart = document.querySelector('#shoppingcart');
    cart.close();

    console.log('close cart');
}

console.log('cart');
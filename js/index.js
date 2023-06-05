const slideshow = () => {
    const slideshow = document.querySelector('#slideshowimg');
    const images = [
        'img/trainImage1.png', 
        'img/trainImage2.png', 
        'img/trainImage3.png', 
        'img/trainImage4.png',
    ];
    let i = 0;
    setInterval(() => {
        if(i < images.length) {
            slideshow.setAttribute('src', images[i]);
            i++;
        } else {
            i = 0;
        }
    
        }, 3000);
        
}

slideshow()
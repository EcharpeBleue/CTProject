
let myCarouselElement = document.querySelector('#carouselExampleAutoplaying');
let myCarousel = new bootstrap.Carousel(myCarouselElement, { pause: false });

let pauseButton = document.querySelector('#pauseButton');
let playButton = document.querySelector('#playButton');

pauseButton.addEventListener('click', function () {
    myCarousel.pause();
});

playButton.addEventListener('click', function () {
    myCarousel.cycle();
});
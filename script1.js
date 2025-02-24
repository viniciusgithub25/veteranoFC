document.addEventListener('DOMContentLoaded', function() {//(event) => {
    var swiper = new Swiper('.swiper', { // Use .swiper-container
        slidesPerView: 1, // Define quantos slides aparecem ao mesmo tempo
        spaceBetween: 10, // Espaço entre slides
        loop: true, // Deixa o carrossel contínuo
        autoplay: {
            delay: 3000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});
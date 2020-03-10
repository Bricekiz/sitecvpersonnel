

const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.navbarHeader');
    const navLinks = document.querySelectorAll('.navbarHeader li');

    burger.addEventListener('click', () => {
        // Toggle now
        nav.classList.toggle('nav-active');

        // Animate links
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = ''
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;
            }
        });
        // Burger animation
        burger.classList.toggle('toggle');

    });
}

navSlide();



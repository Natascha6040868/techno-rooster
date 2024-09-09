document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.button');

    buttons.forEach(button => {
        button.style.transition = 'transform 0.3s ease';

        button.addEventListener('mouseenter', () => {
            button.style.transform = 'scale(1.2)';
        });

        button.addEventListener('mouseleave', () => {
            button.style.transform = 'scale(1)';
        });

        button.addEventListener('touchstart', () => {
            button.style.transform = 'scale(1.2)';
        });

        button.addEventListener('touchend', () => {
            button.style.transform = 'scale(1)';
        });
    });
});

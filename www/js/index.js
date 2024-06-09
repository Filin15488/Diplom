document.addEventListener('DOMContentLoaded', function () {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');

        question.addEventListener('click', () => {
            const answer = item.querySelector('.faq-answer');
            const isActive = item.classList.contains('active');

            // Устанавливаем высоту контента, чтобы вычислить высоту для анимации
            if (!isActive) {
                item.classList.add('active');
                answer.style.maxHeight = answer.scrollHeight + 'px';

                // После анимации установим maxHeight в none, чтобы сохранить высоту
                answer.addEventListener('transitionend', function handler() {
                    answer.style.maxHeight = 'none';
                    answer.removeEventListener('transitionend', handler);
                });
            } else {
                // При скрытии блока сначала убираем maxHeight
                answer.style.maxHeight = answer.scrollHeight + 'px';

                // Для анимации нужно обернуть в setTimeout, чтобы браузер применил предыдущее изменение
                setTimeout(() => {
                    answer.style.maxHeight = '0px';
                }, 0);

                item.classList.remove('active');
            }
        });
    });
});

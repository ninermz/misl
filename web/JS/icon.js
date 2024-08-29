document.addEventListener('DOMContentLoaded', function () {
    const bookmarkOffLinks = document.querySelectorAll('.bookmarks--off');
    const bookmarkOnLinks = document.querySelectorAll('.bookmarks--on');

    bookmarkOffLinks.forEach((bookmarkOffLink) => {
        const lessonId = bookmarkOffLink.getAttribute('data-lesson-id');
        const bookmarkOnLink = document.querySelector(`.bookmarks--on[data-lesson-id='${lessonId}']`);

        bookmarkOffLink.addEventListener('click', function (event) {
            event.preventDefault();
            bookmarkOffLink.style.display = 'none';
            bookmarkOnLink.style.display = 'inline';
            fetch(`/site/add-bookmark?lessonId=${lessonId}`);
        });

        bookmarkOnLink.addEventListener('click', function (event) {
            event.preventDefault();
            bookmarkOnLink.style.display = 'none';
            bookmarkOffLink.style.display = 'inline';
            fetch(`/site/remove-bookmark?lessonId=${lessonId}`)
                .then(response => {
                    if (response.ok) {
                        // Успешно удалено из закладок, можно добавить дополнительные действия, если нужно
                    } else {
                        // Обработка ошибки удаления из закладок, если необходимо
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
});
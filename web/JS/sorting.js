document.addEventListener('DOMContentLoaded', function() {
    const dropdownLinks = document.querySelectorAll('.dropdownContent a');
    const url = new URL(window.location.href);
    const currentSort = url.searchParams.get('sort') || '';
    const currentDirection = url.searchParams.get('direction') || 'desc';

    console.log(`Current Sort: ${currentSort}, Current Direction: ${currentDirection}`);

    dropdownLinks.forEach(link => {
        const sortType = link.getAttribute('data-sort');
        if (sortType === currentSort) {
            link.classList.add(currentDirection === 'asc' ? 'sorted-asc' : 'sorted-desc');
        }

        link.addEventListener('click', function(event) {
            event.preventDefault();
            let newDirection = 'desc';

            if (currentSort === sortType) {
                newDirection = (currentDirection === 'desc') ? 'asc' : 'desc';
            }

            url.searchParams.set('sort', sortType);
            url.searchParams.set('direction', newDirection);
            console.log(`Setting Sort: ${sortType}, Direction: ${newDirection}`);
            window.location.href = url.toString();
        });
    });
});
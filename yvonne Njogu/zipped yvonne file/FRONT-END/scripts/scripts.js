// Wait for the DOM to load
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll for the "Back to Top" button
    const backToTopBtn = document.getElementById('backtotop');
    backToTopBtn.addEventListener('click', function(event) {
        event.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Simple search form validation
    const searchForm = document.querySelector('#searchform form');
    searchForm.addEventListener('submit', function(event) {
        const searchInput = searchForm.querySelector('input[type="text"]');
        if (searchInput.value.trim() === '') {
            event.preventDefault(); // Prevent form submission
            alert('Please enter a search term.');
            searchInput.focus(); // Focus on the search input
        }
    });

    // Responsive navigation menu toggle
    const menuToggle = document.querySelector('#mainav');
    menuToggle.addEventListener('click', function(event) {
        const menuItems = this.querySelectorAll('ul.clear > li');
        menuItems.forEach(item => {
            item.classList.toggle('active');
        });
    });
});

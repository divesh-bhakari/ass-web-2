document.getElementById('applicationForm').onsubmit = function(event) {
    event.preventDefault();

    // Save data to the server and show the success modal
    document.getElementById('successModal').style.display = 'flex';
};

function resetForm() {
    document.getElementById('applicationForm').reset();
}

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

window.onscroll = function() {
    const backToTop = document.getElementById('backToTop');
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        backToTop.style.display = 'block';
    } else {
        backToTop.style.display = 'none';
    }
};

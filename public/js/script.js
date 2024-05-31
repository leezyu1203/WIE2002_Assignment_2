// public/js/script.js
document.addEventListener('DOMContentLoaded', (event) => {
    const stars = document.querySelectorAll('.star');
    const sendButton = document.getElementById('send-rating');
    const commentField = document.getElementById('comment');
    let selectedRating = 0;

    stars.forEach(star => {
        star.addEventListener('mouseover', handleMouseOver);
        star.addEventListener('mouseout', handleMouseOut);
        star.addEventListener('click', handleClick);
    });

    sendButton.addEventListener('click', handleSend);

    function handleMouseOver(event) {
        const value = event.target.getAttribute('data-value');
        highlightStars(value);
    }

    function handleMouseOut(event) {
        if (selectedRating) {
            highlightStars(selectedRating);
        } else {
            unhighlightStars();
        }
    }

    function handleClick(event) {
        const value = event.target.getAttribute('data-value');
        selectedRating = value;
        highlightStars(value);
    }

    function handleSend() {
        if (selectedRating) {
            alert('Thank you for rating our hotel!!');
            sendRating(selectedRating, commentField.value);
        } else {
            alert('Please select a rating before submitting.');
        }
    }

    function highlightStars(value) {
        stars.forEach(star => {
            if (star.getAttribute('data-value') <= value) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    }

    function unhighlightStars() {
        stars.forEach(star => {
            star.classList.remove('selected');
        });
    }

    function sendRating(value, comment) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/rate', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log('Rating submitted successfully!');
            }
        };
        xhr.send(`rating=${value}&comment=${encodeURIComponent(comment)}`);
    }
});

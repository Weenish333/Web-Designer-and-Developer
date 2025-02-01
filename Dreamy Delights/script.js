document.querySelector('.add_product').addEventListener('submit', function(event) {
    // Prevent form submission (only if using JavaScript for message display)
    event.preventDefault();

    // Display the message
    const messageBox = document.querySelector('.display_message');
    if (messageBox) {
        messageBox.style.display = 'block';
    }

    // Optionally, you can hide it after 2 seconds
    setTimeout(function() {
        if (messageBox) {
            messageBox.style.display = 'none';
        }
    }, 2000); // Message will disappear after 2 seconds

    // Optionally, you can add form submission logic here
    // e.g., submitting the form data via Ajax (if needed)
});

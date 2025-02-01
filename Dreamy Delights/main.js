let navbar = document.querySelector(".navbar");

document.querySelector("#menu-btn").onclick = () => {
    navbar.classList.toggle('active');
}

window.onscroll = () => {
    navbar.classList.remove('active');
}

let slides = document.querySelectorAll('.home .slides-container .slide');
let index = 0;

function next() {
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
}

function prev() {
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 //Login Form 
function showModal() {
    document.getElementById('user-modal').style.display = 'block';
    switchToSignIn(); // Show the sign-in form by default
  }
  
  function closeUserModal() {
    document.getElementById('user-modal').style.display = 'none';
}
 
function showRecoveryBox() {
    document.getElementById('sign-in-form').style.display = 'none';
    document.getElementById('recovery-box').style.display = 'block';
  }

  function closeRecoveryBox() {
    document.getElementById('recovery-box').style.display = 'none';
    document.getElementById('sign-in-form').style.display = 'block';
  }

  function closeModal() {
    document.getElementById('user-modal').style.display = 'none';
  }

  function switchToSignIn() {
    document.getElementById('sign-in-form').style.display = 'block';
    document.getElementById('register-form').style.display = 'none';
  }

  function switchToSignUp() {
    document.getElementById('sign-in-form').style.display = 'none';
    document.getElementById('register-form').style.display = 'block';
  }

 
// Optional: Close modal when clicking outside of it
window.onclick = function(event) {
    if (event.target === document.getElementById('user-modal')) {
        closeUserModal();
    }
}

// Function for logout (if you want a JavaScript alternative)
function logoutUser() {
    window.location.href = 'logout.php';
}
//password visibility
function togglePasswordVisibility(inputId) {
    const passwordInput = document.getElementById(inputId);
    const toggleIcon = passwordInput.nextElementSibling; // Eye icon element
  
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      toggleIcon.classList.replace("fa-eye", "fa-eye-slash"); // Switch icon
    } else {
      passwordInput.type = "password";
      toggleIcon.classList.replace("fa-eye-slash", "fa-eye"); // Switch back
    }
  }
  
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Close Search Modal
function openModal(searchValue) {
    // Set the value of the input field in the modal
    document.getElementById('search-input').value = searchValue;

    // Display the modal
    document.getElementById('search-modal').style.display = 'block';
}

function closeSearchModal() {
    document.getElementById('search-modal').style.display = 'none';
}

// Function to close the like modal
function closelikeModal() {
    document.getElementById('liked-products-modal').style.display = 'none';
}





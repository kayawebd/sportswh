"use strict";

/* TOP NAV BAR
 –––––––––––––––––––––––––––––––---------------*/

const menuToggle = document.getElementById("hamburgerMenu");
const menu = document.getElementById("menu");

if (menuToggle && menu) {
  menuToggle.setAttribute("aria-expanded", "false");
  menuToggle.setAttribute("aria-controls", "menu");
  menuToggle.addEventListener("click", () => {
    if (menu.classList.contains("show")) {
      menu.classList.remove("show");
      menuToggle.setAttribute("aria-expanded", "false");
    } else {
      menu.classList.add("show");
      menuToggle.setAttribute("aria-expanded", "ture");
    }
  });
}

/*  VOICE SEARCH
 –––––––––––––––––––––––––––––––---------------*/

function startDictation() {
  if (window.hasOwnProperty("webkitSpeechRecognition")) {
    var recognition = new webkitSpeechRecognition();
    recognition.continuous = false;
    recognition.interimResults = false;
    recognition.lang = "en-US";
    recognition.start();
    recognition.onresult = function (e) {
      document.getElementById("search").value = e.results[0][0].transcript;
      recognition.stop();
    };
    recognition.onerror = function (e) {
      recognition.stop();
    };
  } else {
    alert("Speech recognition is not supported in your browser.");
  }
}
/*  DELETE COMFIRMATION PROMPT
 –––––––––––––––––––––––––––––––---------------*/

// add onclick="return confirmDelete(event) in the link to show prompt
function confirmDelete(event) {
  console.log("confirmDelete function executed");
  if (!confirm("Are you sure want to delete?")) {
    event.preventDefault();
    return false;
  }
  return true;
}

/*  PASSWORD SHOW/HIDE
 –––––––––––––––––––––––––––––––---------------*/

const PASSWORD = document.getElementById("password");
const CONFIRM_PASSWORD = document.getElementById("confirmPassword");
const EYE = document.getElementsByClassName("eye");
const EYE_OPEN = document.getElementsByClassName("eyeOpen");
const EYE_CLOSE = document.getElementsByClassName("eyeClose");

if (PASSWORD || CONFIRM_PASSWORD) {
  for (let i = 0; i < EYE.length; i++) {
    EYE[i].addEventListener("click", function () {
      if (PASSWORD.type === "password") {
        PASSWORD.type = "text";
        if (CONFIRM_PASSWORD) {
          CONFIRM_PASSWORD.type = "text";
        }
        EYE_OPEN[i].style.display = "block";
        EYE_CLOSE[i].style.display = "none";
      } else {
        PASSWORD.type = "password";
        if (CONFIRM_PASSWORD) {
          CONFIRM_PASSWORD.type = "PASSWORD";
        }
        EYE_OPEN[i].style.display = "none";
        EYE_CLOSE[i].style.display = "block";
      }
    });
  }
}

/*  ADD TO CART shoppingQuantityCounter
 –––––––––––––––––––––––––––––––---------------*/
function increaseNumber(a, b) {
  var input = b.previousElementSibling;
  var value = parseInt(input.value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  input.value = value;
}

function decreaseNumber(a, b) {
  var input = b.nextElementSibling;
  var value = parseInt(input.value, 10);
  if (value > 1) {
    value = isNaN(value) ? 0 : value;
    value--;
    input.value = value;
  }
}

/*  SLIDE SHOW
 –––––––––––––––––––––––––––––––---------------*/

if (document.getElementById("slideshow")) {
  let slideIndex = 1;
  showSlides(slideIndex);

  // Next/previous controls
  function plusSlides(n) {
    showSlides((slideIndex += n));
  }
  // Thumbnail image controls
  function currentSlide(n) {
    showSlides((slideIndex = n));
  }
  // Automatic slideshow
  setInterval(function () {
    plusSlides(1);
  }, 5000);

  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slideshow_slides");
    let dots = document.querySelectorAll(".slideshow_indicator-dot");
    if (n > slides.length) {
      slideIndex = 1;
    }
    if (n < 1) {
      slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace("slideshow-active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " slideshow-active";
  }
  // when dot is clicked - display desired slide
  let dots = document.querySelectorAll(".slideshow_indicator-dot");
  dots.forEach(function (dot, index) {
    dot.addEventListener("click", function () {
      currentSlide(index + 1);
    });
  });
}

/* ABOUT PAGE - DYNAMIC FONT SIZE
 –––––––––––––––––––––––––––––––---------------*/
if (document.getElementById("aboutPage")) {
  const DYNAMIC_FONT = document.getElementById("dynamicFontSize");
  // const DYNAMIC_PADDING = document.getElementById("dynamicPadding");
  function adjustFontSize() {
    const VIEW_PORT_WIDTH = window.innerWidth || document.clientWidth;
    const FONT_SIZE = VIEW_PORT_WIDTH * 0.11;
    localStorage.setItem("fontSize", FONT_SIZE);
    if (VIEW_PORT_WIDTH <= 3200) {
      DYNAMIC_FONT.style.fontSize = FONT_SIZE + "px";
    }
  }
  window.addEventListener("load", adjustFontSize);
  window.addEventListener("resize", adjustFontSize);
  window.addEventListener("load", () => {
    const STORED_FONT_SIZE = localStorage.getItem("fontSize");
    if (STORED_FONT_SIZE) {
      DYNAMIC_FONT.style.fontSize = STORED_FONT_SIZE + "px";
    }
  });
}

/* CAHNGE HEADER BACKGROUND COLOR ON ABOUT PAGE
 –––––––––––––––––––––––––––––––---------------*/
const FULL_PATH = window.location.pathname;
const SPLITED_PATH = FULL_PATH.split("/");
const PATH_NAME = SPLITED_PATH[SPLITED_PATH.length - 1];
if (PATH_NAME === "about.php") {
  const SITE_HEADER = document.getElementById("siteHeader");
  const CATEGORY_NAV = document.querySelector(".categoryNav");
  const FOOTER = document.querySelector(".footerContainer");
  SITE_HEADER.style.backgroundColor = "black";
  CATEGORY_NAV.style.backgroundColor = "black";
  FOOTER.style.backgroundColor = "black";
}

/*  CONTACT FORM - CHARACTER COUNTER
 –––––––––––––––––––––––––––––––---------------*/

if (document.getElementById("contactPage")) {
  const textarea = document.getElementById("message");
  const charCount = document.getElementById("charCount");
  const maxChars = 1000;
  textarea.addEventListener("input", function () {
    const currentChars = textarea.value.length;
    const remainingChars = maxChars - currentChars;
    charCount.textContent = `Characters remaining: ${remainingChars}`;
    if (remainingChars < 0) {
      textarea.value = textarea.value.slice(0, maxChars);
      charCount.textContent = "Character limit reached.";
    }
  });
}

/*  FORM VALIDATION
 –––––––––––––––––––––––––––––––---------------*/

const contactForm = document.getElementById("contactForm");
if (contactForm) {
  const NAME_INPUT = document.getElementById("name");
  const EMAIL_INPUT = document.getElementById("email");
  const MESSAGE_INPUT = document.getElementById("message");

  const isRequired = (value) => (value === "" ? false : true);
  const isBetween = (length, min, max) => length >= min && length <= max;
  const isEmailValid = (email) =>
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
      email
    );

  const showError = (input, message) => {
    const FORM_FIELD = input.parentElement.parentElement;
    FORM_FIELD.classList.remove("success");
    FORM_FIELD.classList.add("error");
    const error = FORM_FIELD.querySelector("small");
    error.textContent = message;
  };

  const showSuccess = (input) => {
    const FORM_FIELD = input.parentElement.parentElement;
    FORM_FIELD.classList.remove("error");
    FORM_FIELD.classList.add("success");
    const error = FORM_FIELD.querySelector("small");
    error.textContent = "";
  };

  const validateName = () => {
    const name = NAME_INPUT.value.trim();
    if (!isRequired(name)) {
      showError(NAME_INPUT, "Name cannot be blank.");
      return false;
    } else if (!isBetween(name.length, 2, 50)) {
      showError(NAME_INPUT, "Name must be between 2 and 50 characters.");
      return false;
    }
    showSuccess(NAME_INPUT);
    return true;
  };

  const validateEmail = () => {
    const email = EMAIL_INPUT.value.trim();
    if (!isRequired(email)) {
      showError(EMAIL_INPUT, "Email cannot be blank.");
      return false;
    } else if (!isEmailValid(email)) {
      showError(EMAIL_INPUT, "Email is not valid.");
      return false;
    }
    showSuccess(EMAIL_INPUT);
    return true;
  };

  const validateMessage = () => {
    const message = MESSAGE_INPUT.value.trim();
    if (!isRequired(message)) {
      showError(MESSAGE_INPUT, "Message cannot be blank.");
      return false;
    } else if (!isBetween(message.length, 2, 1000)) {
      showError(
        MESSAGE_INPUT,
        "Message must be between 2 and 1000 characters."
      );
      return false;
    }
    showSuccess(MESSAGE_INPUT);
    return true;
  };

  // Input event listeners with debounce
  NAME_INPUT.addEventListener("input", debounce(validateName));
  EMAIL_INPUT.addEventListener("input", debounce(validateEmail));
  MESSAGE_INPUT.addEventListener("input", debounce(validateMessage));

  // Debounce function
  function debounce(func, delay = 1000) {
    let timeoutId;
    return function (...args) {
      clearTimeout(timeoutId);
      timeoutId = setTimeout(() => {
        func.apply(null, args);
      }, delay);
    };
  }

  const validateForm = () => {
    const isNameValid = validateName();
    const isEmailValid = validateEmail();
    const isMessageValid = validateMessage();

    return isNameValid && isEmailValid && isMessageValid;
  };

  const submitForm = (event) => {
    if (validateForm()) {
      contactForm.submit();
    } else {
      event.preventDefault();
      console.log("Form not submitted. Please fix the errors.");
    }
  };
  contactForm.addEventListener("submit", submitForm);

}






const createUserForm = document.getElementById("createUserForm");

if (createUserForm) {
  const NAME_INPUT = document.getElementById("userName");
  const EMAIL_INPUT = document.getElementById("email");
  const PASSWORD_INPUT = document.getElementById("password");
  const CONFIRM_PASSWORD_INPUT = document.getElementById("confirmPassword");

  const isRequired = (value) => value.trim() !== "";
  const isBetween = (value, min, max) => value.length >= min && value.length <= max;
  const isEmailValid = (email) =>
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);

  const showError = (input, message) => {
    const FORM_FIELD = input.parentElement;
    FORM_FIELD.classList.remove("success");
    FORM_FIELD.classList.add("error");
    const error = FORM_FIELD.querySelector("small");
    error.textContent = message;
  };

  const showSuccess = (input) => {
    const FORM_FIELD = input.parentElement.parentElement;
    FORM_FIELD.classList.remove("error");
    FORM_FIELD.classList.add("success");
    const error = FORM_FIELD.querySelector("small");
    error.textContent = "";
  };

  const validateName = () => {
    const name = NAME_INPUT.value;
    if (!isRequired(name)) {
      showError(NAME_INPUT, "Name cannot be blank.");
      return false;
    } else if (!isBetween(name, 2, 50)) {
      showError(NAME_INPUT, "Name must be between 2 and 50 characters.");
      return false;
    }
    showSuccess(NAME_INPUT);
    return true;
  };

  const validateEmail = () => {
    const email = EMAIL_INPUT.value;
    if (!isRequired(email)) {
      showError(EMAIL_INPUT, "Email cannot be blank.");
      return false;
    } else if (!isEmailValid(email)) {
      showError(EMAIL_INPUT, "Email is not valid.");
      return false;
    }
    showSuccess(EMAIL_INPUT);
    return true;
  };

  const isPasswordSecure = (password) => {
    const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})/;
    return re.test(password);
  };

  const validatePassword = () => {
    const password = PASSWORD_INPUT.value;
    if (!isRequired(password)) {
      showError(PASSWORD_INPUT, "Password cannot be blank.");
      return false;
    } else if (!isPasswordSecure(password)) {
      showError(
        PASSWORD_INPUT,
        "Password must have at least 8 characters, including at least 1 lowercase character, 1 uppercase character, 1 number, and 1 special character."
      );
      return false;
    }
    showSuccess(PASSWORD_INPUT);
    return true;
  };

  const validateConfirmPassword = () => {
    const confirmPassword = CONFIRM_PASSWORD_INPUT.value;
    const password = PASSWORD_INPUT.value;
    if (!isRequired(confirmPassword)) {
      showError(CONFIRM_PASSWORD_INPUT, "Please enter the password again.");
      return false;
    } else if (password !== confirmPassword) {
      showError(CONFIRM_PASSWORD_INPUT, "The passwords do not match.");
      return false;
    }
    showSuccess(CONFIRM_PASSWORD_INPUT);
    return true;
  };

  const validateForm = () => {
    const isNameValid = validateName();
    const isEmailValid = validateEmail();
    const isPasswordValid = validatePassword();
    const isConfirmPasswordValid = validateConfirmPassword();

    return isNameValid && isEmailValid && isPasswordValid && isConfirmPasswordValid;
  };

  const submitForm = (event) => {
    if (validateForm()) {
      createUserForm.submit();
    } else {
      event.preventDefault();
      console.log("Form not submitted. Please fix the errors.");
    }
  };
  createUserForm.addEventListener("submit", submitForm);
}




/*  STICKY HEADER
 –––––––––––––––––––––––––––––––---------------*/

 let lastScrollTop = 0;
 window.addEventListener('scroll', function(){
  const currentScroll = window.scrollY || this.document.documentElement.scrollTop;
  const header = document.getElementById('topHeader');
  if (currentScroll > lastScrollTop){
    header.classList.add('hidden');
  }else{
    header.classList.remove('hidden');
  }
  lastScrollTop = currentScroll;
 });
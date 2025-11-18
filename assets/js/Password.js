const password = document.getElementById("password");
const fill = document.getElementById("strength-fill");
const text = document.getElementById("strength-text");

password.addEventListener("input", () => {
    const value = password.value;
    let score = 0;

    // minimum lenght
    if (value.length >= 8) score++;

    // minimum 1 number
    if (/\d/.test(value)) score++;

    // minimum 1 upercase letter
    if (/[A-Z]/.test(value)) score++;

    // minimum 1 special character
    if (/[^A-Za-z0-9]/.test(value)) score++;

    //---------------------------------
    // Modification of the strenght bar
    //---------------------------------

    if (score === 0) {
        fill.style.width = "0%";
        text.textContent = "";
        text.style.color = "#777";
    }

    if (score === 1) {
        fill.style.width = "25%";
        fill.style.background = "red";
        text.textContent = "Weak";
        text.style.color = "red";
    }

    if (score === 2) {
        fill.style.width = "50%";
        fill.style.background = "orange";
        text.textContent = "Medium";
        text.style.color = "orange";
    }

    if (score === 3) {
        fill.style.width = "75%";
        fill.style.background = "orange";
        text.textContent = "Medium";
        text.style.color = "orange";
    }

    if (score === 4) {
        fill.style.width = "100%";
        fill.style.background = "green";
        text.textContent = "Strong";
        text.style.color = "green";
    }
});

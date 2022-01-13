const loginRequestUrl = 'includes/login.inc.php';
const loginForm = document.getElementById("loginForm");

loginForm.addEventListener("submit", e => {
    e.preventDefault();

    const formData = new FormData(loginForm);

    fetch(loginRequestUrl, {
        method: 'post',
        body: formData
    }).then((response) => {
        return response.json();
    }).then((result) => {

        if (result.hasMistakes) {
            const mistakes = result.mistakes;
            for (let mistakeClass in mistakes) {
                document.querySelector(".login-"+mistakeClass+"-mistake").innerText = mistakes[mistakeClass];
                if (mistakes[mistakeClass] !== "") {
                    loginForm.elements[mistakeClass].classList.add("input-mistake");
                } else {
                    loginForm.elements[mistakeClass].classList.remove("input-mistake");
                }
            }
        } else {
            location.replace("index.php");
        }
    }).catch((error) => {
        console.error(error);
    })
});
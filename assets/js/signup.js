const signupRequestUrl = 'includes/signup.inc.php';
const signupForm = document.getElementById("signupForm");

signupForm.addEventListener("submit", e => {
    e.preventDefault();

    const formData = new FormData(signupForm);

    fetch(signupRequestUrl, {
        method: 'post',
        body: formData
    }).then((response) => {
        return response.json();
    }).then((result) => {

        if (result.hasMistakes) {
            const mistakes = result.mistakes;
            for (let mistakeClass in mistakes) {
                document.querySelector(".signup-"+mistakeClass+"-mistake").innerText = mistakes[mistakeClass];
                if (mistakes[mistakeClass] !== "") {
                    signupForm.elements[mistakeClass].classList.add("input-mistake");
                } else {
                    signupForm.elements[mistakeClass].classList.remove("input-mistake");
                }
            }
        } else {
            location.replace("login.php");
        }
    }).catch((error) => {
        console.error(error);
    })
});
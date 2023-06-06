const correctColor = 'green';
const wrongColor = 'red';

let passwordMeetRequirements = false;

const registerFunction = () => {
    const dialog = document.querySelector('#dialog-account-register');
    const form = document.querySelector('#register-from')


    form.addEventListener("submit", (event) => {

        if (passwordMeetRequirements == false) {
            event.preventDefault();
            dialog.showModal();

        }

        if (containsSpace() == true) {
            event.preventDefault();
            dialog.showModal();
        }

    });
}

const closeDialog = (id) => {
    const dialog = document.querySelector(id);
    dialog.close();
}

const containsSpace = () => {
    const nameFieldElement = document.querySelector('#nameRegister');
    const passwordFieldElement = document.querySelector('#passwordRegister');
    if (!nameFieldElement.value.includes(' ') && !passwordFieldElement.value.includes(' ')) {
        return false;
    } else {
        return true;
    }
}

const passwordRequirersCheck = (id) => {

    passwordMeetRequirements = false;

    let containUpercase = false;
    let containLowercase = false;
    let containNumber = false;
    let containSpecialCharacter = false;
    let containLength = false;

    const inputtedPassword = document.querySelector('#' + id).value.split('');

    const SpecialCharacters = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;

    console.log(inputtedPassword);

    inputtedPassword.forEach(element => {
        if (containUpercase != true) {
            if (element.match(/[A-Z]/)) {
                containUpercase = true;
            }
        }
        if (containLowercase != true) {
            if (element.match(/[a-z]/)) {
                containLowercase = true;
            }
        }
        if (containSpecialCharacter != true) {
            if (element.match(SpecialCharacters)) {
                containSpecialCharacter = true;
            }
        }
        if (containNumber != true) {
            if (element.match(/[0-9]/)) {
                containNumber = true;
            }
        }
        if (containLength != true) {
            if (inputtedPassword.length >= 8) {
                containLength = true;
            }
        }
    });

    changeColorPasswordCheck(containUpercase, containLowercase, containNumber, containSpecialCharacter, containLength);

    if (containLowercase != false && containUpercase != false && containNumber != false && containSpecialCharacter != false && containLength != false) {
        passwordMeetRequirements = true;
    }
}

const changeColorPasswordCheck = (containUpercase, containLowercase, containNumber, containSpecialCharacter, containLength) => {
    const PRUpercase = document.querySelector('#passwordRequirementsUpercase');
    const PRLowercase = document.querySelector('#passwordRequirementsLowercase');
    const PRNumber = document.querySelector('#passwordRequirementsNumber');
    const PRSpecialCharacter = document.querySelector('#passwordRequirementsSpecialCharacter');
    const PRLength = document.querySelector('#passwordRequirementsLength');


    if (containUpercase == true) {
        PRUpercase.style.color = correctColor;
    } else {
        PRUpercase.style.color = wrongColor;
    }

    if (containLowercase == true) {
        PRLowercase.style.color = correctColor;
    } else {
        PRLowercase.style.color = wrongColor;
    }

    if (containNumber == true) {
        PRNumber.style.color = correctColor;
    } else {
        PRNumber.style.color = wrongColor;
    }

    if (containSpecialCharacter == true) {
        PRSpecialCharacter.style.color = correctColor;
    } else {
        PRSpecialCharacter.style.color = wrongColor;
    }

    if (containLength == true) {
        PRLength.style.color = correctColor;
    } else {
        PRLength.style.color = wrongColor;
    }


}

const showPasswordLogin = () => {
    const passwordInputElement = document.querySelector("#passwordLogin");
    if (passwordInputElement.type === "password") {
        passwordInputElement.type = "text";
    } else {
        passwordInputElement.type = "password";
    }
}

const showPasswordRegister = () => {
    const passwordInputElement = document.querySelector("#passwordRegister");
    if (passwordInputElement.type === "password") {
        passwordInputElement.type = "text";
    } else {
        passwordInputElement.type = "password";
    }
}

const loginFunction = () => {
    const passwordFieldElement = document.querySelector('#passwordLogin');
    const emailFieldElement = document.querySelector('#emailLogin');
    const form = document.querySelector('#login-from');
    const dialog = document.querySelector('#dialog-account-login');
    const loginError = document.querySelector('#login-error');

    form.addEventListener("submit", (event) => {

        if (passwordFieldElement.value == "" || emailFieldElement.value == "") {

            loginError.textContent = "Please fill in all fields";
            event.preventDefault();
            dialog.showModal();

        }

    });
}

const openDialogAndSetContent = (id, idTextElement, content) => {
    const dialog = document.querySelector(id);
    dialog.querySelector(idTextElement).textContent = content;
    dialog.showModal();

}
const PRUpercase = document.querySelector('#passwordRequirementsUpercase');
const PRLowercase = document.querySelector('#passwordRequirementsLowercase');
const PRNumber = document.querySelector('#passwordRequirementsNumber');
const PRSpecialCharacter = document.querySelector('#passwordRequirementsSpecialCharacter');
const PRLength = document.querySelector('#passwordRequirementsLength');

const correctColor = 'red';
const wrongColor = '';

const registerFunction = () => {
    const form = document.getElementById('register-from');

    let password = passwordMeetRequirements();

    
    console.log(password);

    if (password == false) {
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            alert('password does not meet requirements');
            return false;
        });
    }

    console.log(password);

    if (containsSpace() == false) {
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            alert('password, email or name can not contain a space');
            return false;
        });
    }    
    
}

const containsSpace = () => {
    const nameFieldElement = document.querySelector('#nameRegister');
    const passwordFieldElement = document.querySelector('#passwordRegister');
    if (!nameFieldElement.value.includes(' ') && !passwordFieldElement.value.includes(' ')) {
        return true;
    }else{
        return false;
    }
}

const passwordRequirers = (id) => {

    passwordRequirements = 0;

    const SpecialCharacters = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;

    const passwordFieldElement = document.querySelector('#' + id);

    if (passwordFieldElement.value.length >= 8) {
        PRLength.style.color = 'red';
    }else{
        PRLength.style.color = 'black';
    }

    if (passwordFieldElement.value.match(SpecialCharacters)) {
        PRSpecialCharacter.style.color = 'red';
    }else{
        PRSpecialCharacter.style.color = 'black'; 
    }

    if(passwordFieldElement.value.match(/[A-Z]/)){
        PRUpercase.style.color = 'red';
    }else{
        PRUpercase.style.color = 'black'; 

    }

    if(passwordFieldElement.value.match(/[a-z]/)){
        PRLowercase.style.color = 'red';
    }else{
        PRLowercase.style.color = 'black'; 
    }

    if(passwordFieldElement.value.match(/[0-9]/)){
        PRNumber.style.color = 'red';
    }else{
        PRNumber.style.color = 'black';
    }

}

const passwordMeetRequirements = () => {
    if(PRLength.style.color == 'red' && PRSpecialCharacter.style.color == 'red' && 
    PRUpercase.style.color == 'red' && PRLowercase.style.color == 'red' && PRNumber.style.color == 'red'){
        return true;
    }else{
        return false;
    }
}

const showPasswordLogin = () =>{
    
}

const showPasswordRegister = () => {
    const passwordInputElement = document.querySelector("#passwordRegister");
    if (passwordInputElement.type === "password") {
        passwordInputElement.type = "text";
    } else {
        passwordInputElement.type = "password";
    }
}

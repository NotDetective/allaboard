const correctColor = 'green';
const wrongColor = 'red';

var passwordMeetRequirements = 0;

const registerFunction = () => {
    const form = document.getElementById('register-from');
 
    console.log(passwordMeetRequirements);

    //the if statment that wont work for god knows why 
    if (passwordMeetRequirements != 1) {
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            alert('password does not meet requirements');
          
        });
    }

    if (containsSpace() != 1) {
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            alert('password, email or name can not contain a space');
           
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

const passwordRequirersCheck = (id) => {
    
    passwordMeetRequirements = 0;

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

    changeColorPasswordCheck(containUpercase , containLowercase, containNumber, containSpecialCharacter, containLength);

    if (containLowercase != false && containUpercase != false && containNumber != false && containSpecialCharacter != false && containLength != false) {
        passwordMeetRequirements = 1;    
    } 
}

const changeColorPasswordCheck = (containUpercase , containLowercase, containNumber, containSpecialCharacter, containLength) => {
    const PRUpercase = document.querySelector('#passwordRequirementsUpercase');
    const PRLowercase = document.querySelector('#passwordRequirementsLowercase');
    const PRNumber = document.querySelector('#passwordRequirementsNumber');
    const PRSpecialCharacter = document.querySelector('#passwordRequirementsSpecialCharacter');
    const PRLength = document.querySelector('#passwordRequirementsLength');
    

    if (containUpercase == true) {
        PRUpercase.style.color = correctColor;
    }else{
        PRUpercase.style.color = wrongColor;
    }

    if (containLowercase == true) {
        PRLowercase.style.color = correctColor;
    }else{
        PRLowercase.style.color = wrongColor;
    }

    if (containNumber == true) {
        PRNumber.style.color = correctColor;
    }else{
        PRNumber.style.color = wrongColor;
    }

    if (containSpecialCharacter == true) {
        PRSpecialCharacter.style.color = correctColor;
    }else{
        PRSpecialCharacter.style.color = wrongColor;
    }

    if (containLength == true) {
        PRLength.style.color = correctColor;
    }else{
        PRLength.style.color = wrongColor;
    } 
        
    
}

// const passwordRequirers = (id) => {

//     passwordRequirements = 0;

//     const SpecialCharacters = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;

//     const passwordFieldElement = document.querySelector('#' + id);

//     if (passwordFieldElement.value.length >= 8) {
//         PRLength.style.color = 'red';
//     }else{
//         PRLength.style.color = 'black';
//     }

//     if (passwordFieldElement.value.match(SpecialCharacters)) {
//         PRSpecialCharacter.style.color = 'red';
//     }else{
//         PRSpecialCharacter.style.color = 'black'; 
//     }

//     if(passwordFieldElement.value.match(/[A-Z]/)){
//         PRUpercase.style.color = 'red';
//     }else{
//         PRUpercase.style.color = 'black'; 

//     }

//     if(passwordFieldElement.value.match(/[a-z]/)){
//         PRLowercase.style.color = 'red';
//     }else{
//         PRLowercase.style.color = 'black'; 
//     }

//     if(passwordFieldElement.value.match(/[0-9]/)){
//         PRNumber.style.color = 'red';
//     }else{
//         PRNumber.style.color = 'black';
//     }

// }

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
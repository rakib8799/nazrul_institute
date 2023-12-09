const nameErr = getId('name_err');
// const usernameErr = getId('username_err');
const emailErr = getId('email_err');
const passwordErr = getId('password_err');
const confirmPasswordErr = getId('confirm_password_err');
const previousPasswordErr = getId('previous_password_err');
const newPasswordErr = getId('new_password_err');
const retypeNewPasswordErr = getId('retype_new_password_err');
const contactErr = getId('contact_err');

function validateName() {
    const name = getId('name').value;
    if (name.length === 0) {
        innerHtml(nameErr, "Name is required");
        nameErr.classList.add('text-danger');
        return false;
    }
    if (!name.match(/[a-zA-Z\s]{3,35}/)) {
        innerHtml(nameErr, "Invalid name");
        nameErr.classList.add('text-danger');
        return false;
    }
    innerHtml(nameErr, "Valid");
    nameErr.classList.remove('text-danger');
    nameErr.classList.add('text-success');
    return true;
}

// function validateUsername() {
//     const username = getId('username').value;
//     if(username.length===0){
//         innerHtml(usernameErr,"Username is required");
//         return false;
//     }
//     if(!username.match(/^[\w]{5,15}$/)){
//         innerHtml(usernameErr,"Invalid username");
//         return false;
//     }
//     innerHtml(usernameErr,"Valid");
//     return true;
// }

function validateEmail() {
    const email = getId('email').value;
    if (email.length === 0) {
        innerHtml(emailErr, "Email is required");
        emailErr.classList.add('text-danger');
        return false;
    }
    if (!email.match(/[\w]{5,15}([-.]\w)*@[\w]+\.[\w]{2,3}/)) {
        innerHtml(emailErr, "Invalid email");
        emailErr.classList.add('text-danger');
        return false;
    }
    innerHtml(emailErr, "Valid");
    emailErr.classList.remove('text-danger');
    emailErr.classList.add('text-success');
    return true;
}

function validatePassword() {
    const password = getId('password').value;
    if (password.length === 0) {
        innerHtml(passwordErr, "Password is required");
        passwordErr.classList.add('text-danger');
        return false;
    }
    if (!password.match(/(?!.*\s).{4,10}/)) {
        innerHtml(passwordErr, "Password must be 4 to 10 characters long");
        passwordErr.classList.add('text-danger');
        return false;
    }
    innerHtml(passwordErr, "Valid");
    passwordErr.classList.remove('text-danger');
    passwordErr.classList.add('text-success');
    return true;
}

function validateConfirmPassword() {
    const password = getId('password').value;
    const confirm_password = getId('confirm_password').value;
    if (confirm_password.length === 0) {
        innerHtml(confirmPasswordErr, "Confirm Password is required");
        confirmPasswordErr.classList.add('text-danger');
        return false;
    }
    if (!confirm_password.match(/(?!.*\s).{4,10}/)) {
        innerHtml(confirmPasswordErr, "Invalid confirm password");
        confirmPasswordErr.classList.add('text-danger');
        return false;
    }
    if (password !== confirm_password) {
        innerHtml(confirmPasswordErr, "Password does not match!");
        return false;
    }
    innerHtml(confirmPasswordErr, "Valid");
    confirmPasswordErr.classList.remove('text-danger');
    confirmPasswordErr.classList.add('text-success');
    return true;
}


function validatePreviousPassword() {
    const previousPassword = getId('previous_password').value;
    if (previousPassword.length === 0) {
        innerHtml(previousPasswordErr, "Current Password is required");
        previousPasswordErr.classList.add('text-danger');
        return false;
    }
    if (!previousPassword.match(/(?!.*\s).{4,10}/)) {
        innerHtml(previousPasswordErr, "Password must be 4 to 10 characters long");
        previousPasswordErr.classList.add('text-danger');
        return false;
    }
    innerHtml(passwordErr, "Valid");
    passwordErr.classList.remove('text-danger');
    passwordErr.classList.add('text-success');
    return true;
}

function validateNewPassword() {
    const newPassword = getId('new_password').value;
    if (newPassword.length === 0) {
        innerHtml(newPasswordErr, "New Password is required");
        newPasswordErr.classList.add('text-danger');
        return false;
    }
    if (!newPassword.match(/(?!.*\s).{4,10}/)) {
        innerHtml(newPasswordErr, "Password must be 4 to 10 characters long");
        newPasswordErr.classList.add('text-danger');
        return false;
    }
    innerHtml(passwordErr, "Valid");
    passwordErr.classList.remove('text-danger');
    passwordErr.classList.add('text-success');
    return true;
}

function validateRetypeNewPassword() {
    const previousPassword = getId('previous_password').value;
    const retypeNewPassword = getId('retype_new_password').value;
    if (retypeNewPassword.length === 0) {
        innerHtml(retypeNewPasswordErr, "Retype New Password is required");
        retypeNewPasswordErr.classList.add('text-danger');
        return false;
    }
    if (!retypeNewPassword.match(/(?!.*\s).{4,10}/)) {
        innerHtml(retypeNewPasswordErr, "Invalid retype new password");
        retypeNewPasswordErr.classList.add('text-danger');
        return false;
    }
    if (previousPassword !== retypeNewPassword) {
        innerHtml(retypeNewPasswordErr, "Password does not match!");
        return false;
    }
    innerHtml(retypeNewPasswordErr, "Valid");
    retypeNewPasswordErr.classList.remove('text-danger');
    retypeNewPasswordErr.classList.add('text-success');
    return true;
}

function validateContact() {
    const contact = getId('contact').value;
    if (contact.length === 0) {
        innerHtml(contactErr, "Contact is required");
        contactErr.classList.add('text-danger');
        return false;
    }
    if (!contact.match(/01[3-9]{1}[0-9]{8}/)) {
        innerHtml(contactErr, "Invalid contact");
        contactErr.classList.add('text-danger');
        return false;
    }
    innerHtml(contactErr, "Valid");
    contactErr.classList.remove('text-danger');
    contactErr.classList.add('text-success');
    return true;
}

function validateRole() {
    const role_as = getId('role_as').value;
    if (role_as.length === 0) {
        innerHtml(role_asErr, "Role is required");
        role_asErr.classList.add('text-danger');
        return false;
    }
    innerHtml(role_asErr, "Valid");
    role_asErr.classList.remove('text-danger');
    role_asErr.classList.add('text-success');
    return true;
}



function getId(name) {
    const id = document.getElementById(name);
    return id;
}

function innerHtml(name, text) {
    name.innerHTML = text;
}


function formData() {
    if (!validateName() || !validateEmail() || !validatePassword() || !validateConfirmPassword() || !validateContact())
        return false;
    else return true;
}


function loginFormData() {
    if (!validateEmail() || !validatePassword())
        return false;
    else return true;
}

function adminFormData() {
    if (!validateName() || !validateEmail())
        return false;
    else return true;
}

function adminFormPassData() {
    if (!validatePreviousPassword() || !validateNewPassword() || !validateRetypeNewPassword())
        return false;
    else return true;
}
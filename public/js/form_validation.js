const firstName = document.getElementById('first_name');
const lastName = document.getElementById('last_name');
const nic = document.getElementById('nic');
const email = document.getElementById('email');
const gender = document.getElementById('gender');
const contactNo = document.getElementById('contact_no');
const password = document.getElementById('password');
const confPassword = document.getElementById('conf_password');

const form = document.getElementById('regForm');

const green = '#4caf50';
const red = '#f44336';

form.addEventListner('submit', function(event){
	event.preventDefault();
	if(validateFirstName() && validateLastName() && validateNIC() && validateEmail() && validateGender() && validateContactNo() && validatePassword() && validateConfPassword()){
		const name = firstName.value;
		const container = document.querySelector('div.login-form-container');
		const loader = document.createElement('div');
		loader.className = 'progress';
		const loadingBar = document.createElement('div');
		loadingBar.className = 'interminate';
		loader.appendChild(loadingBar);
		container.appendChild(loader);
		setTimeOut(function(){
			const loaderDiv = document.querySelector('div.progress');
			const panel = document.createElement('div');
			panel.className = 'card-panel green';
			const text = document.createElement('span');
			text.className = 'white-text';
			text.appendChild(
				document.createTextNode(
					`Sign up successful, welcome to Wasthra ${name}`
					)
				);
			panel.appendChild(text);
			container.replaceChild(panel, loaderDiv);
		}, 1000);
	}
});

function validateFirstName(){
	if(checkEmpty(firstName)) return;
	if(!checkOnlyLetters(firstName)) return;
	return true;
}

function validateLastName(){
	if(checkEmpty(lastName)) return;
	if(!checkOnlyLetters(lastName)) return;
	return true;
}

function validatePassword(){
	if(checkEmpty(password)) return;
	if(!meetLength(password,4,100)) return;
	return true;
}

function validateConfPassword(){
	if(password.className!== 'valid'){
		setInvalid(confPassword, 'Password must be valid');
		return;
	}

	if(password.value !== confPassword.value){
		setInvalid(confPassword, 'Password must match');
		return;
	} else{
		setValid(confPassword);
	}
	return true;
}

function validateEmail(){
	if(checkEmpty(lastName)) return;
	if(!containCharacters(email,5)) return;
	return true;
}


function checkEmpty(field){
	if(isEmpty(field.value.trim())){
		setInvalid(field, `${field.name} must not be empty`);
		return true;
	} else{
		setValid(field);
		return false;
	}
}

function isEmpty(value){
	if(value === ''){
		return true;
	} else{
		return false;
	}
}

function setInvalid(field,message){
	field.className = 'invalid';
	field.nextElementSibling.innerHTML = message;
	field.nextElementSibling.style.color = red;
}

function setValid(field){
	field.className = 'vslif';
	field.nextElementSibling.innerHTML = '';
	field.nextElementSibling.style.color = green;
}

function checkOnlyLetters(field){
	if(/^[a-zA-Z ]+$/.test(field.value)){
		setValid(field);
		return true;
	} else{
		setInvalid(field, `${field.name} must contain only letters`);
		return false;
	}
}

function meetLength(field,minLength,maxLength){
	if(field.value.length >= minLength && field.value.length < maxLength){
		setValid(field);
		return true;
	} else if(field.value.length < minLength){
		setInvalid(field, `${field.name} must contain at least ${minLength} characters`);
		return false;
	} else{
		setInvalid(field, `${field.name} must contain less than ${maxLength} characters`);
		return false;
}

function containsCharacters(field,code){
	let regEx;
	switch(code){
		case 1:
		regEx = /(?=.*[a-zA-Z])/;
		return matchWithRegEx(regEx,field,'Must contain at least one letter');
		case 2:
		regEx = /(?=.*\d)(?=.*[a-zA-Z])/;
		return matchWithRegEx(regEx,field,'Must contain at least one letter and one number');
		case 3:
		regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
		return matchWithRegEx(regEx,field,'Must contain at least one uppercase letter, one lowercase letter and one number');
		case 4:
		regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)/;
		return matchWithRegEx(regEx,field,'Must contain at least one uppercase letter, one lowercase letter, one number and one special character');
		case 5:
		regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return matchWithRegEx(regEx,field,'Enter valid email address');
		default:
		return false;	
	}
}

function matchWithRegEx(regEx,field,message){
	if(field.value.match(regEx)){
		setValid(field);
		return true;
	} else{
		setInvalid(field,message);
		return false;
	}
}

const green = '#4CAF50';
const red = '#F44336';

/**
 * Check whether the input field is empty
 *
 * @param  mixed field -- Field that need to be checked whether empty or not
 * @return bool
 */
function checkIfEmpty(field) {

  if (isEmpty(field.value.trim())) {
    setInvalid(field, `${field.dataset.helper} must not be empty`);
    return true;
  } else {
    setValid(field);
    return false;
  }
}

/**
 * Check whether the given string is empty
 *
 * @param  string value -- String that need to be checked whether empty or not
 * @return bool
 */
function isEmpty(value) {

  if (value === '') {
    return true;
  } else {
    return false;
  }
}

/**
 * Check whether the checkbox is checked
 *
 * @param  mixed field -- Field that need to be checked whether checked or not
 * @return bool
 */
function checkIfChecked(field) {

  for (i in field) {
    if (field[i].checked == true) {
      return true;
    }
  }

  setinvalidWithoutColor(field[field.length - 1], `Should be selected`);

  return false;
}

/**
 * Make the given field invalid
 *
 * @param  mixed field -- Field that need to be set as invalid
 * @param  string message -- Message that need to be displayed in the popup
 * @return void
 */
function setInvalid(field, message) {

  field.style.borderColor = red;
  field.nextElementSibling.classList.add("show");
  field.nextElementSibling.style.color = red;
  field.nextElementSibling.innerHTML = message;
}

/**
 * Make the given field valid
 *
 * @param  mixed field -- Field that need to be set as valid
 * @return void
 */
function setValid(field) {

  field.style.borderColor = green;
  field.nextElementSibling.innerHTML = '';
  field.nextElementSibling.classList.remove("show");
}

/**
 * Make the given field invalid without changing the color
 *
 * @param  mixed field -- Field that need to be set as invalid
 * @param  string message -- Message that need to be displayed in the popup
 * @return void
 */
function setinvalidWithoutColor(field, message) {

  field.nextElementSibling.classList.add("show");
  field.nextElementSibling.style.color = red;
  field.nextElementSibling.innerHTML = message;
}

/**
 * Check whether the field contains only characters
 *
 * @param  mixed field -- Field that need to be checked
 * @return bool
 */
function checkIfOnlyLetters(field) {

  if (/^[a-zA-Z ]+$/.test(field.value)) {
    setValid(field);
    return true;
  } else {
    setInvalid(field, `${field.dataset.helper} must contain only letters`);
    return false;
  }
}

/**
 * Check whether the field contains only numbers
 *
 * @param  mixed field -- Field that need to be checked
 * @return bool
 */
function checkIfOnlyNumbers(field) {
  if (/^[0-9]+$/.test(field.value)) {  
    setValid(field);
    return true;
  } else {
    setInvalid(field, `${field.dataset.helper} must contain only numbers`);
    return false;
  }
}

function checkIfOnlyPrice(field) {
  if (/^[0-9]+\.?[0-9]{1,2}$/.test(field.value)) {  
    setValid(field);
    return true;
  } else {
    setInvalid(field, `${field.dataset.helper} must contain only numbers`);
    return false;
  }
}

/**
 * Check whether the field contains given number of characters
 *
 * @param  mixed field -- Field that need to be checked
 * @param  int minLength -- Number of minimum characters
 * @param  int maxLength -- Number of maximum characters
 * @return bool
 */
function meetLength(field, minLength, maxLength) {

  if (field.value.length >= minLength && field.value.length < maxLength) {
    setValid(field);
    return true;
  } else if (field.value.length < minLength) {
    setInvalid(field, `${field.dataset.helper} must be at least ${minLength} characters long`);
    return false;
  } else {
    setInvalid(field, `${field.dataset.helper} must be shorter than ${maxLength} characters`);
    return false;
  }
}

function meetValue(field, minLength, maxLength) {

  if (field.value >= minLength && field.value < maxLength) {
    setValid(field);
    return true;
  } else if (field.value < minLength) {
    setInvalid(field, `${field.dataset.helper} must be in range ${minLength}-${maxLength-1}`);
    return false;
  } else {
    setInvalid(field, `${field.dataset.helper} must be in range ${minLength}-${maxLength-1}`);
    return false;
  }

}

/**
 * Check whether the field contains special patterns of characters
 *
 * @param  mixed field -- Field that need to be checked
 * @param  int type -- Type of the pattern
 * @return bool
 */
function containsCharacters(field, type) {

  let regEx;
  switch (type) {
    case 1:
      // contain at least one letter
      regEx = /(?=.*[a-zA-Z])/;
      return matchWithRegEx(regEx, field, 'Must contain at least one letter');
    case 2:
      // contain at least one letter and one number
      regEx = /(?=.*\d)(?=.*[a-zA-Z])/;
      return matchWithRegEx(regEx, field, 'Must contain at least one letter and one number');
    case 3:
      // contain at least one uppercase, lowercase and number
      regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
      return matchWithRegEx(regEx, field, 'Must contain at least one uppercase, one lowercase letter and one number');
    case 4:
      // contain at least one uppercase, lowercase, number and special char
      regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)/;
      return matchWithRegEx(regEx, field, 'Must contain at least one uppercase, one lowercase letter, one number and one special character');
    case 5:
      // check for email pattern
      regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return matchWithRegEx(regEx, field, 'Must be a valid email address');
      //check address line 1
    case 6:
      regEx = /^[0-9]{1,4}(([\-\/][0-9]{1,4})|(\/[A-Z]{1,2})|(\/[0-9][A-Z]))*$/; 
      return matchWithRegEx(regEx, field, 'Must be a valid address line 1');
      //check price categoryID
    case 7:
      regEx = /^[P][R][C][0-9]{3,}$/;
      return matchWithRegEx(regEx,field,'Must be contain a format of PRCXXX');  
    default:
      return false;
  }
}

/**
 * Check whether the field value matches with the regular expression
 *
 * @param  mixed field -- Field that need to be checked
 * @param  int regEx -- Regular expression
 * @param  int message -- Message that need to be displayed if doesn't match
 * @return bool
 */
function matchWithRegEx(regEx, field, message) {

  if (field.value.match(regEx)) {
    setValid(field);
    return true;
  } else {
    setInvalid(field, message);
    return false;
  }
}

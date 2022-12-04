window.onload = () => {
    let submitBtn = document.getElementById('submit');
    let title = document.getElementById('title');
    let firstname = document.getElementById('first-name');
    let lastname = document.getElementById('last-name');
    let email = document.getElementById('email');
    let telephone = document.getElementById('telephone');
    let company = document.getElementById('company');
    let type = document.getElementById('type');
    let assignedTo = document.getElementById('assigned-to');
    const titleVal = title.value.trim();
    const firstnameVal = firstname.value.trim(); 
    const lastnameVal = lastname.value.trim(); 
    const emailVal = email.value.trim(); 
    const telephoneVal = telephone.value.trim(); 
    const companyVal = company.value.trim();
    const assignedToVal = assignedTo.options[assignedTo.selectedIndex].text;
    const typeVal = type.options[type.selectedIndex].text;
    let validated;
    submitBtn.addEventListener("click", (e)=>{
        validated = true;
        e.preventDefault();
        validateInputs();

        let xhr = new XMLHttpRequest();
        let url = "cc-action-page.php?title="+titleVal+"&firstname="+firstnameVal+"&lastname="+lastnameVal+"&email="+emailVal+"&telephone="+telephoneVal+"&company="+companyVal+"&type="+typeVal+"&assignedTo="+assignedToVal;
        xhr.onreadystatechange = () => {
            if (xhr.readyState = XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    let status = xhr.responseText;
                    let result = document.getElementById('result');
                    result.innerHTML = status;
                } else {
                    alert("There was an error retrieving the requested information.");
                }
            }
        };
        xhr.open("GET",url,true);
        xhr.send();
    });

    const setError = (e, msg) => {
        const formGroup = e.parentElement;
        const errorDisplay = formGroup.querySelector('.error');
        errorDisplay.innerText = msg;
        formGroup.classList.add('error');
        formGroup.classList.remove('success');
    };

    const setSuccess = e => {
        const formGroup = e.parentElement;
        const errorDisplay = formGroup.querySelector('.error');
        errorDisplay.innerText = '';
        formGroup.classList.add('success');
        formGroup.classList.remove('error');
    };

    const isValidEmail = email => {
        const regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return regex.test(String(email).toLowerCase());
    };

    const isValidTelephone = tele => {
        const regex = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
        return regex.test(tele);
    }

    const validateInputs = () => {
        if (firstnameVal=='') {
            setError(firstname, 'First name is required');
            validated=false;
        } else {
            setSuccess(firstname);
        }

        if (lastnameVal=='') {
            setError(lastname, 'Last name is required');
            validated=false;
        } else {
            setSuccess(lastname);
        }

        if (emailVal=='') {
            setError(email, 'Email is required');
            validated=false;
        } else if (!isValidEmail(emailVal)) {
            setError(email, 'Please provide a valid email address');
            validated=false;
        } else {
            setSuccess(email);
        }

        if (telephoneVal=='') {
            setError(telephone, 'Telephone number is required');
            validated=false;
        } else if (!isValidTelephone(telephoneVal)) {
            setError(telephone, 'Please provide a valid telephone number');
            validated=false;
        } else {
            setSuccess(telephone);
        }

        if (companyVal=='') {
            setError(company, 'Company name is required');
            validated=false;
        } else {
            setSuccess(company);
        }
    }
}


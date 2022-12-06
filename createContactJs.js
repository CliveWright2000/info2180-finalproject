window.onload = () => {
    const submitBtn = document.getElementById('submit');
    const title = document.getElementById('title');
    const firstname = document.getElementById("first-name");
    const lastname = document.getElementById('last-name');
    const email = document.getElementById('email');
    const telephone = document.getElementById('telephone');
    const company = document.getElementById('company');
    const type = document.getElementById('type');
    const assignedTo = document.getElementById('assigned-to');

    submitBtn.addEventListener("click", (e)=>{
        e.preventDefault();
        validateInputs();
        typeVal = type.options[type.selectedIndex].text;
        assignedVal = assignedTo.options[assignedTo.selectedIndex].text;
        if (validateInputs()) {
            let xhr = new XMLHttpRequest();
            let url = "cc-action-page.php?title="+title.value+"&firstname="+firstname.value+"&lastname="+lastname.value+"&email="+email.value+"&telephone="+telephone.value+"&company="+company.value+"&type="+typeVal+"&assignedTo="+assignedVal;
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
        }
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
        let validate = true;
        const firstnameVal = firstname.value; 
        const lastnameVal = lastname.value; 
        const emailVal = email.value; 
        const telephoneVal = telephone.value; 
        const companyVal = company.value;

        if (firstnameVal=='') {
            setError(firstname, 'First name is required');
            validate=false;
        } else {
            setSuccess(firstname);
        }

        if (lastnameVal=='') {
            setError(lastname, 'Last name is required');
            validate=false;
        } else {
            setSuccess(lastname);
        }

        if (emailVal=='') {
            setError(email, 'Email is required');
            validate=false;
        } else if (!isValidEmail(emailVal)) {
            setError(email, 'Please provide a valid email address');
            validate=false;
        } else {
            setSuccess(email);
        }

        if (telephoneVal=='') {
            setError(telephone, 'Telephone number is required');
            validate=false;
        } else if (!isValidTelephone(telephoneVal)) {
            setError(telephone, 'Please provide a valid telephone number');
            validate=false;
        } else {
            setSuccess(telephone);
        }

        if (companyVal=='') {
            setError(company, 'Company name is required');
            validate=false;
        } else {
            setSuccess(company);
        }
        
        return validate;
    }
}


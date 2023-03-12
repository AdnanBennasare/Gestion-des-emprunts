

    console.log("fff");
    function setErrorFor(element,errorMessage) {

        // ==================
        const parent = element.closest('.formvalid');
        if (parent.classList.contains('formvalid-success')) {
            parent.classList.remove('formvalid-success');
        }
        parent.classList.add('formvalid-error');
        // ---------------
        const small = parent.querySelector('small');
        small.textContent = errorMessage;
    }


    function setSuccessFor(element) {
        const parent = element.closest('.formvalid');
        if (parent.classList.contains('formvalid-error')) {
            parent.classList.remove('formvalid-error');
        }

        parent.classList.add('formvalid-success');
        const small = parent.querySelector('small');
        small.textContent = ' ';
    }

    //   ========================---------
    form = document.querySelector('#formProfile');
    const nameProfile = document.querySelector("#nameProfile");
    const cinProfile = document.querySelector("#cinProfile");
    const adresseProfile = document.querySelector("#adresseProfile");
    const emailProfile = document.querySelector("#emailProfile");
    const phoneProfile = document.querySelector("#phoneProfile");
    const nicknameProfile = document.querySelector("#nicknameProfile");
    const pwdProfile = document.querySelector("#password1Profile");
    const pwd_repeatedProfile = document.querySelector('#pwd_repeatedProfile');
    const OccupationProfile = document.querySelector("#OccupationProfile");
    const birth_dateProfile = document.querySelector("#dateProfile");
    const checkbox = document.getElementById('openmodaldetails');

    //   ========================---------



    document.querySelector('#formProfile').addEventListener('submit',(event) => {
        validate_Form_updat_announce();

        console.log(isFormValid_updat_announce());

        if (isFormValid_updat_announce() == true) {
            form.submit();
            console.log('svggd')
        } else {
            event.preventDefault();
        }

    });


    function isFormValid_updat_announce() {
        const inputContainers = form.querySelectorAll('.formvalid');
        let result = true;
        inputContainers.forEach((container) => {
            if (container.classList.contains('formvalid-error')) {
                result = false;
            }
        });
        return result;
        console;log(result);
    }


    function validate_nameProfile() {
        if (nameProfile.value.match(/^[a-zA-ZÀ-ÿ ]+$/)) {
            setSuccessFor(nameProfile);
        } else {
            setErrorFor(nameProfile,'champ obligatoir');
        }
    }

    function validate_checkbox() {
        if (checkbox.checked) {
            setSuccessFor(checkbox);
        } else {
            setErrorFor(checkbox,'champ obligatoir');
        }
    }


    function validate_cinProfile() {
        if (cinProfile.value.match(/[a-zA-Z]{2,10}/g)) {
            setSuccessFor(cinProfile);
        } else {
            setErrorFor(cinProfile,'champ obligatoir');
        }
    }


    function validate_adresseProfile() {
        if (adresseProfile.value.match(/[a-zA-Z]{3,30}/g)) {
            setSuccessFor(adresseProfile);
        } else {
            setErrorFor(adresseProfile,'champ obligatoir');
        }
    }


    function validate_emailProfile() {
        if (emailProfile.value.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/g)) {
            setSuccessFor(emailProfile);
        } else {
            setErrorFor(emailProfile,'champ obligatoir');
        }
    }



    function validate_OccupationProfile() {
        if (OccupationProfile.value !== "") {
            setSuccessFor(OccupationProfile);
        } else {
            setErrorFor(OccupationProfile,'champ obligatoir');
        }
    }

    function validate_birth_dateProfile() {
        if (birth_dateProfile.value !== "") {
            setSuccessFor(birth_dateProfile);
        } else {
            setErrorFor(birth_dateProfile,'champ obligatoir');
        }
    }


    function validate_phoneProfile() {
        if (phoneProfile.value.match(/0(6|7|5)[0-9]{8}$/g)) {
            setSuccessFor(phoneProfile);
        } else {
            setErrorFor(phoneProfile,'champ obligatoir');
        }
    }



    function validate_nicknameProfile() {
        if (nicknameProfile.value.match(/[a-zA-Z]{3,10}/g)) {
            setSuccessFor(nicknameProfile);
        } else {
            setErrorFor(nicknameProfile,'champ obligatoir');
        }
    }




    function validate_pwdProfile() {
        if (pwdProfile.value.match(/[a-zA-Z]{3,10}/g)) {
            setSuccessFor(pwdProfile);
        } else {
            setErrorFor(pwdProfile,'champ obligatoir');
        }
    }

    function validate_pwd_repeatedProfile() {
        if (pwd_repeatedProfile.value !== "" && pwd_repeatedProfile.value == pwdProfile.value) {
            setSuccessFor(pwd_repeatedProfile);
        } else {
            setErrorFor(pwd_repeatedProfile,'champ obligatoir');
        }
    }

    function validate_Form_updat_announce() {
        validate_nameProfile();
        validate_nicknameProfile();
        validate_adresseProfile();
        validate_emailProfile();
        validate_phoneProfile();
        validate_cinProfile();
        validate_pwdProfile();
        validate_pwd_repeatedProfile();
        validate_birth_dateProfile();
        validate_OccupationProfile();
        validate_checkbox();
    }

document.getElementById('signupbtn').onclick = function (){

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
    form = document.querySelector('#form');
    const name = document.querySelector("#name");
    const cin = document.querySelector("#cin");
    const adresse = document.querySelector("#adresse");
    const email = document.querySelector("#email");
    const phone = document.querySelector("#phone");
    const nickname = document.querySelector("#nickname");
    const pwd = document.querySelector("#password1");
    const pwd_repeated = document.querySelector('#pwd_repeated');
    const Occupation = document.querySelector("#Occupation");
    const birth_date = document.querySelector("#date");

    //   ========================---------



    document.querySelector('#form').addEventListener('submit',(event) => {
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
    }


    function validate_name() {
        if (name.value.match(/^[a-zA-ZÀ-ÿ ]+$/)) {
            setSuccessFor(name);
        } else {
            setErrorFor(name,'champ obligatoir');
        }
    }
    function validate_cin() {
        if (cin.value.match(/[a-zA-Z][0-9]{1,10}/g)) {
            setSuccessFor(cin);
        } else {
            setErrorFor(cin,'champ obligatoir');
        }
    }


    function validate_adresse() {
        if (adresse.value.match(/[a-zA-Z]{3,30}/g)) {
            setSuccessFor(adresse);
        } else {
            setErrorFor(adresse,'champ obligatoir');
        }
    }


    function validate_email() {
        if (email.value.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/g)) {
            setSuccessFor(email);
        } else {
            setErrorFor(email,'champ obligatoir');
        }
    }



    function validate_Occupation() {
        if (Occupation.value !== "") {
            setSuccessFor(Occupation);
        } else {
            setErrorFor(Occupation,'champ obligatoir');
        }
    }

    function validate_birth_date() {
        if (birth_date.value !== "") {
            setSuccessFor(birth_date);
        } else {
            setErrorFor(birth_date,'champ obligatoir');
        }
    }


    function validate_phone() {
        if (phone.value.match(/0(6|7|5)[0-9]{8}$/g)) {
            setSuccessFor(phone);
        } else {
            setErrorFor(phone,'champ obligatoir');
        }
    }



    function validate_nickname() {
        if (nickname.value.match(/[a-zA-Z][0-9]{3,10}/g)) {
            setSuccessFor(nickname);
        } else {
            setErrorFor(nickname,'champ obligatoir');
        }
    }




    function validate_pwd() {
        if (pwd.value.match(/^[a-zA-Z0-9]+$/g)) {
            setSuccessFor(pwd);
        } else {
            setErrorFor(pwd,'champ obligatoir');
        }
    }

    function validate_pwd_repeated() {
        if (pwd_repeated.value !== "" && pwd_repeated.value == pwd.value) {
            setSuccessFor(pwd_repeated);
        } else {
            setErrorFor(pwd_repeated,'champ obligatoir');
        }
    }

    function validate_Form_updat_announce() {
        validate_name();
        validate_nickname();
        validate_adresse();
        validate_email();
        validate_phone();
        validate_cin();
        validate_pwd();
        validate_pwd_repeated();
        validate_birth_date();
        validate_Occupation();
    }

}
   


const validation = new JustValidate("#signup");

validation
    .addField("#name",[
        {
            rule: "required"
        }
    ])

    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        }
    ])

    .addField("#password", [
        {
            rule: "required"
        },
        {
            rule: "password"
        },
        {
            validator: (value) => () => 
            {
                return fetch("email_validator.php?email=" + encodeURIComponent(value))
                    .then(function(response){
                        return response.json();
                    })
                    .then(function(json)
                    {
                        return json.available
                    });
            },

            errorMessage: "Email already registred"
        }
    ])

    .addField("#password_confirmation", [
        {
            validator: (value, fields) =>
            {
                return value === fields["#password"].elem.value;
            },
            errorMessage: "Passwords don't match"
        }
    ])

    .onSuccess((event)=>{
        document.getElementById("signup").submit();
    })
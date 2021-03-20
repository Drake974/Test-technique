//modal page gestion des utilisateurs
const addUser = () => {
    validator = $("#modalAddUser").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            last_name:{
                required: true,   
            }
        },
        rules: {
            first_name:{
                required: true,  
            }
        },
        rules: {
            number:{
                required: true,
                digits: true,
                min: 1000,
                max: 9999
            }
        }
    })
}
//modal modification page gestion des utilisateurs
const editUser = () => {
    validator = $("#modalEditUser").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            last_name_edit:{
                required: true,   
            }
        },
        rules: {
            first_name_edit:{
                required: true,  
            }
        },
        rules: {
            number_edit:{
                required: true,
                digits: true,
                min: 1000,
                max: 9999
            }
        }
    })
}
/* Variable pour la page home*/
const homeDate = () => {
    validator = $("#homeDateChoose").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        
        rules: {
            search_date:{
                required: true,
                date: true
            }
        }
        
    })
}

const homeIdentity = () => {
    validator = $("#homeIdentity").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            user_identity:{
                required: true,
                digits: true,
                min: 1000,
                max: 9999
            }
        }
        
    })
}

/* Variable pour la page login */
const loginPage = () => {
    validator = $("#loginPage").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            identity:{
                required: true
            },
            password:{
                required: true
            }
        }
        
    })
}
//page destion des ordinateurs
//ajout
const addComputer = () => {
    validator = $("#addComputer").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            register_number_computer:{
                required: true,
                digits: true,
                min: 1000,
                max: 9999
            }
        }
        
    })
}
//modifier
const editComputer = () => {
    validator = $("#editComputerModal").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            edit_computer_number:{
                required: true,
                digits: true,
                min: 1000,
                max: 9999
            }
        }
        
    })
}
//gestion des réservations
//afficher
const showUsers = () => {
    validator = $("#formUserRegister").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            user_show:{
                required: true,
                digits: true,
                min: 1000,
                max: 9999
            }
        }
        
    })
}
//reserver
const userBooking = () => {
    validator = $("#formDateRegister").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            date_poste:{
                required: true,
                date: true  
            }
        },
        rules: {
            time_date:{
                required: true 
            }
        },
        rules: {
            id_poste:{
                required: true
            }
        }
    })
}
//afficher par date
const showDateBooking = () => {
    validator = $("#formDateBooking").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            date_show:{
                required: true,
                date: true  
            }
        },
        rules: {
            time_date_show:{
                required: true,  
            }
        },
        rules: {
            id_poste_show:{
                required: true,
            }
        }
    })
}
//afficher par identifiant
const showBooking = () => {
    validator = $("#formIdentitySelect").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            select_identity_user:{
                required: true,
                digits: true,
                min: 1000,
                max: 9999
            }
        }
        
    })
}
//******************************************************************* */
//REGLES COMMUNES
//******************************************************************* */
//Modification des messages d'erreurs
jQuery.extend(jQuery.validator.messages, {
    required: "Ce champ est obligatoire",
    email: "Veuillez saisir une adresse email valide (ex: xxx.yyy@zzz.com)",
    date: "Veuillez saisir une date conforme",
    dateISO: "Veuillez saisir une date conforme (jour/mois/annee)",
    digits: "Seuls les chiffres sont autorisés",
    equalTo: "Les mots de passe sont différents",
    password: "mot passe incorrecte",
    search_room: "La ville entrer est inconnu",
    maxlength: jQuery.validator.format("Ce champ doit contenir au moins {0} caractères."),
    minlength: jQuery.validator.format("{0} caractères minimum."),
    max: jQuery.validator.format("Valeur inférieur ou égal à {0}."),
    min: jQuery.validator.format("Valeur supérieur ou égal à {0}.")
});
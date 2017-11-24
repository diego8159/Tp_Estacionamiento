$(document).ready(function () {

    $("#loginForm").bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-zoom-in'
        },

        fields: {
            usuario: {
                validators: {
                    notEmpty: {
                        message: 'El nombre de usuario es requerido'
                    },
                     stringLength: {
                        min: 4,
                        max: 9,
                        message:'Por favor. Ingrese entre 4 y 9 caracteres'
                    }
                }
            },
            clave: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña es requerida'
                    },
                    stringLength: {
                        min: 4,
                        message:'Por favor. Ingrese minimo 4 numeros'
                    },
                     regexp: {

						regexp: /^[0-9]+$/,
						message: 'El campo password solo puede contenter numeros'

					}
                }
            }

        
        }
    });


});
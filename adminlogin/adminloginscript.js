$(document).ready(function() {
    $('#admin_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                        notEmpty: {
                        message: 'Please enter your First Name'
                    },
                }
            },
            adminpassword: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your Password'
                    },
                }
            },
            
            }
        })
       
});
$(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please enter your First Name'
                    }
                }
            },
             last_name: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please enter your Last Name'
                    }
                }
            },
			 user_password: {
                validators: {
                     stringLength: {
                        min: 3,
                    },
                    identical: {
                        field: 'confirm_password',
                        message: 'The password and its confirm are not the same'
                    },
                    notEmpty: {
                        message: 'Please enter your Password'
                    }
                }
            },
			confirm_password: {
                validators: {
                     stringLength: {
                        min: 3,
                    },
                    identical: {
                        field: 'user_password',
                        message: 'The confirm and its password are not the same'
                    },
                    notEmpty: {
                        message: 'Please confirm your Password'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your Email Address'
                    },
                    emailAddress: {
                        message: 'Please enter a valid Email Address'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your Address'
                    },
                    Address: {
                        message: 'Please enter a valid Address'
                    }
                }
            },

            ssn: {
                validators: {
                    stringLength: {
                    min: 10,
                },
                    notEmpty: {
                    message: 'Please enter your SSN'
                }
                }
            },

            cardholder: {
                validators: {
                    stringLength: {
                    min: 3,
                },
                    notEmpty: {
                    message: 'Please enter the Card holder name'
                }
                }
            },

            Cardnumber: {
                validators: {
                    stringLength: {
                    min: 10,
                },
                    notEmpty: {
                    message: 'Please enter your Card number'
                }
                }
            },

            cvc: {
                validators: {
                    stringLength: {
                    min: 3,
                    max: 3,

                },
                    notEmpty: {
                    message: 'Please enter your CVC'
                }
                }
            },

            dateofbirth: {
                validators: {
                    lessThan: {
                        value: 2002,
                        inclusive: false,
                        message: 'Must be born before 2003'
                    },
                    notEmpty: {
                        message: 'Please enter your Date of Birth'
                    }
                }
            },
            
            contact_no: {
                validators: {
                  stringLength: {
                        min: 3, 
                        max: 20,
                  },
                    notEmpty: {
                        message: 'Please enter your Contact No.'
                     }
                
            },
                }
            }
        })
        
});
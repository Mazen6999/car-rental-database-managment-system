$(document).ready(function() {
    $('#res_form').bootstrapValidator({
        fields: {
            
        
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
            user_password: {
                validators: {
                     stringLength: {
                        min: 3,
                    },
                    notEmpty: {
                        message: 'Please enter your Password'
                    }
                }
            },
        
        
            carbrand: {
            validators: {
                stringLength: {
                    min: 2,
                    message: 'Please enter the car brand'
                },    
                notEmpty: {
                    message: 'Please enter the car brand'
                },
            }
        },

        carmodel: {
            validators: {
                stringLength: {
                    min: 2,
                    message: 'Please enter the car model'
                    
                },
                notEmpty: {
                    message: 'Please enter the car model'
                },
            }
        },
        caryear: {
            validators: {
                stringLength: {
                    min: 4,
                    message: 'Please enter the Car year'
                },
                lessThan: {
                    value: 2023,
                    inclusive: false,
                    message: 'Must be made before 2023'
                },
                greaterThan: {
                    value: 2000,
                    inclusive: false,
                    message: 'Must be made after 2000'
                },
                notEmpty: {
                    message: 'Please enter the Car year'
                },
            }
        },
        carseats: {
            validators: {
                lessThan: {
                    value: 14,
                    inclusive: false,
                    message: 'Seats must be under 14 seats'
                },
                notEmpty: {
                    message: 'Please enter the number of Car seats'
                },
            }
        },
        cardoors: {
            validators: {
                lessThan: {
                    value: 5,
                    inclusive: false,
                    message: 'Doors must be under 5 doors'
                },
                notEmpty: {
                    message: 'Please enter the number of Car doors'
                },
            }
        },
        carcolor: {
            validators: {

                color: {
                    type: ['hex', 'rgb', 'hsl', 'keyword'],
                    message: 'Enter a valid Color'
                },
                notEmpty: {
                    message: 'Please enter the color of the car'
                },
            }
        },
        location: {
            validators: {
                
                notEmpty: {
                    message: 'Please enter a Location'
                },
            }
        },
        carfuel: {
            validators: {

                
                notEmpty: {
                    message: 'Please choose the engine type'
                },
            }
        },

        pickupdate: {
            validators: {

                
                notEmpty: {
                    message: 'Please choose the engine type'
                },
            }
        },

        returndate: {
            validators: {

                notEmpty: {
                    message: 'Please choose the engine type'
                },
            }
        },
          
        }
    })
});
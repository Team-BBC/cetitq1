$(function(){
                //this runs a function if login button is clicked
                $('#login').click(function(e){

                var valid = this.form.checkValidity();

                    if(valid){
                        var username = $('#username').val();
                        var password = $('#password').val();
                    }

                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'jslogin.php',
                        //send the user and password to jslogin.php
                        data:  {username: username, password: password},
                        success: function(data){    //returns 1 if the login was correct.
                            alert(data);
                            if($.trim(data) === "1"){
                                setTimeout(' window.location.href =  "../admin.php"', 1000);
                            }
                        },
                        error: function(data){
                            alert('Hubo errores iniciando sesion');
                        }
                    });

                });
            });


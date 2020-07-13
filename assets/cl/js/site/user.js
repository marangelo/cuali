(function ($) {
    'use strict';
    var baseUrl=$('base').attr("href");
    var appLanguage=[];
    var filterTicketForm=$("#filterTicketForm");
    var tileOverlay=$('.tile-overlay');
    var ticketsList=$('#ticketsList');
    var filterTicketModal=$("#filterTicketModal");
    var addTicketForm=$("#addTicketForm");
    var replyTicketForm=$("#replyTicketForm");
    var inputAttachment=$("#inputAttachment");
    var updateProfileForm=$("#updateProfileForm");
    var updatePasswordForm=$("#updatePasswordForm");

    /*============================================
    TICKETS
    ==============================================*/
    //CALL LIST TICKETS FUNCTION
    if(ticketsList.length>0){
        listTickets(0);
    }

    //FILTER TICKETS
    filterTicketForm.on('submit',function(e){
        e.preventDefault();
        var loader = Ladda.create( document.querySelector('#filterButton'));
        loader.start();
        listTickets(0);
        filterTicketModal.modal('hide');
        loader.stop();
    });

    //WHEN CLICK DELETE BUTTON
    ticketsList.on('click',"#deleteButton",function () {
        var ticket_id=$(this).attr("data-id");
        deleteTicket(ticket_id);
    });

    //LIST TICKETS
    function listTickets(page_num){
        var form=filterTicketForm;
        $.ajax({
            type: 'POST',
            url:'list_casos_ajax/'+page_num,
            data:form.serialize(),
            dataType: 'json',
            async: false,
            beforeSend: function () {
                    tileOverlay.show();
            },
            success: function (data) {
                if (data.success) {
                    //append tickets data
                    ticketsList.html(data.content);
                    //hide loader
                    tileOverlay.fadeOut("slow");
                    // Detect pagination click
                    $('#pagination a').on('click',function(e){
                        e.preventDefault(); 
                        var pageno = $(this).attr('data-ci-pagination-page');
                        listTickets(pageno);
                    });
                } else {
                    showAlert('error',appLanguage[0]['text_error'],appLanguage[0]['alert_loading_list_error']);
                }
            },
            error: function () {
                showAlert('error',appLanguage[0]['text_error'],appLanguage[0]['alert_went_wrong']);
            }
        });
    }



    //REPLY TO TICKET
    if(replyTicketForm.length>0){
        var loader = Ladda.create( document.querySelector('#replyTicketButton'));
        //summernote
        $(".summertext").summernote({
            toolbar: [
              ['style', ['bold', 'italic', 'underline', 'clear']],
              ['para', ['ul', 'ol']]
            ]
        });
        replyTicketForm.validate({
            rules: {
                reply_content: {
                    required: true
                }
            },
            messages: {
                reply_content: {
                    required: appLanguage[0]['alert_enter_reply']
                }
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback");
                error.insertAfter(element);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
            submitHandler: function(form) {
                var reply_file = $('#inputAttachment').prop('files')[0];
                var form_data = new FormData();
                form_data.append('ticket_id', $('#replyTicketForm input[name="ticket_id"]').val());
                form_data.append('reply_content', $('#replyTicketForm textarea[name="reply_content"]').val());
                form_data.append('reply_file', reply_file);
                // TICKET REPLY AJAX
                $.ajax({
                    type: "POST",
                    url: baseUrl + "user/reply_to_ticket",
                    data: form_data,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        //show button loader
                        loader.start();
                    },
                    success: function (data) {
                        if (data.success) {
                            loader.stop();
                            showAlert('success',appLanguage[0]['text_success'],data.message);
                            window.setTimeout(function(){
                                location.reload(); 
                            },2000);
                        } else {
                            loader.stop();
                            showAlert('error',appLanguage[0]['text_error'],data.message);

                        }
                    },
                    error: function () {
                        loader.stop();
                        showAlert('error',appLanguage[0]['text_error'],appLanguage[0]['alert_went_wrong']);
                    }
                });
        
            }
        });
    }


    /*============================================
    PROFILE
    ==============================================*/
    //UPDATE PROFILE
    if(updateProfileForm.length>0){
        var loader = Ladda.create( document.querySelector('button[type=submit]'));
        updateProfileForm.validate({
            rules: {
                full_name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true,
                    minlength: 4
                },
                mobile: {
                    required: true
                }
            },
            messages: {
                full_name: {
                    required: appLanguage[0]['alert_enter_fullname']
                },
                email: {
                    required: appLanguage[0]['alert_enter_email'],
                    email:appLanguage[0]['alert_enter_valid_email'],
                    minlength: appLanguage[0]['alert_enter_valid_email_lenght']
                },
                mobile: {
                    required: appLanguage[0]['alert_enter_mobile']
                }
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback");
                error.insertAfter(element);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
            submitHandler: function(form) {
                // UPDATE PROFILE AJAX
                $.ajax({
                    type: "POST",
                    url: baseUrl + "user/update_profile",
                    data: updateProfileForm.serialize(),
                    dataType: 'json',
                    async: false,
                    beforeSend: function() {
                        //show button loader
                        loader.start();
                    },
                    success: function (data) {
                        if (data.success) {
                            loader.stop();
                            showAlert('success',appLanguage[0]['text_success'],data.message);
                        } else {
                            
                            loader.stop();
                            showAlert('error',appLanguage[0]['text_error'],data.message);

                        }
                    },
                    error: function () {
                        loader.stop();
                        showAlert('error',appLanguage[0]['text_error'],appLanguage[0]['alert_went_wrong']);
                    }
                });
        
            }
        });
    }

    //CHANGE PASSWORD
    if(updatePasswordForm.length>0){
        var loader = Ladda.create( document.querySelector('button[type=submit]'));
        updatePasswordForm.validate({
            rules: {
                old_password: {
                    required: true,
                    
                },
                new_password: {
                    required: true,
                    minlength: 8,
                    maxlength: 15
                },
                confirm_new_password: {
                    required: true,
                    minlength: 8,
                    maxlength: 15,
                    equalTo: "#inputNewPassword",
                }
            },
            messages: {
                old_password: {
                    required: appLanguage[0]['alert_enter_old_password']
                },
                new_password: {
                    required: appLanguage[0]['alert_enter_new_password'],
                    minlength:appLanguage[0]['alert_enter_new_password_minlength'],
                    minlength: appLanguage[0]['alert_enter_new_password_maxlength']
                },
                confirm_new_password: {
                    required: appLanguage[0]['alert_enter_confirm_password'],
                    minlength:appLanguage[0]['alert_enter_confirm_password_minlength'],
                    minlength: appLanguage[0]['alert_enter_confirm_password_maxlength'],
                    equalTo: appLanguage[0]['alert_enter_password_repeat']
                }
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback");
                error.insertAfter(element);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
            submitHandler: function(form) {
                // CHANGE PASSWORD AJAX
                $.ajax({
                    type: "POST",
                    url: baseUrl + "user/change-password",
                    data: updatePasswordForm.serialize(),
                    dataType: 'json',
                    async: false,
                    beforeSend: function() {
                        //show button loader
                        loader.start();
                    },
                    success: function (data) {
                        if (data.success) {
                            loader.stop();
                            showAlert('success',appLanguage[0]['text_success'],data.message);
                            window.setTimeout(function(){
                                location.reload(); 
                            },2000);
                        } else {
                            loader.stop();
                            showAlert('error',appLanguage[0]['text_error'],data.message);
                        }
                    },
                    error: function () {
                        loader.stop();
                        showAlert('error',appLanguage[0]['text_error'],appLanguage[0]['alert_went_wrong']);
                    }
                });
        
            }
        });
    }


    //SHOW ALERT
    function showAlert(type,head,message){
        $.toast({heading: head ,text: message,loader: false,position : 'bottom-right',showHideTransition: 'fade', icon: type });
    }

})(jQuery);
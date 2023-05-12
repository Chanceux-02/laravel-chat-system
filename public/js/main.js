$(document).ready(function(){
    //to send
    function sendData() {
        var index_form_btn = $('#sendForm1');
        index_form_btn.on('click', function(event) {
            event.preventDefault();  
            let form = $(this).closest('form');
            var url = form.attr('action');
            var data = form.serialize();
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(data) {
                    console.log('sent!');
                    form[0].reset();
                },
                error: function(jqXHR, textStatus, errorThrown) { // if ajax is not success
                    console.log(textStatus, errorThrown);
                }
            });
        });
    }
     //for single chat sending data
     function sendDataSingleChat() {
        var index_form_btn = $('#singleChatSubmitBtn');
        index_form_btn.on('click', function(event) {
            event.preventDefault();  
            let form = $(this).closest('form');
            var url = form.attr('action');
            var data = form.serialize();
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(data) {
                    console.log('sent!');
                    form[0].reset();
                },
                error: function(jqXHR, textStatus, errorThrown) { // if ajax is not success
                    console.log(textStatus, errorThrown);
                }
            });
        });
    }
        
    //to fetch in realtime in index
    var interval = 500;    
    let url = '/group-chat/fetch';
    function fetchData() {  
        $.ajax({
            type: 'GET',
            url: url,
            success: function(data) {
                $('#chatContainer').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) { // if ajax is not success
                console.log(textStatus, errorThrown);
            }
        });
    }
    

    //for single chat fetch in realtime
    function clickedUser(){
        let this_attr = window.location.href;
        let parts = this_attr.split('/');
        let id = parts[parts.length - 1];
        let userurl = '/chat-to-user-ajax/'+id;
        $.ajax({
            type: 'GET',
            url: userurl,
            success: function(data) {
                $('#singleChatContainer').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) { // if ajax is not success
                console.log(textStatus, errorThrown);
            }
        });
    }
    
    function checkIfLoggedIn(){
        $.ajax({
            type: 'GET',
            url: '/check-login',
            success: function(response) {
                if (response.logged_in) {
                     setInterval(function() {
                        let this_attr = window.location.href;
                        if (this_attr == 'http://127.0.0.1:8000/') {
                            fetchData();
                        } else {
                            clickedUser();   
                        }
                      }, interval);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) { // if ajax is not success
                console.log(textStatus, errorThrown);
            }
        });
    }

    checkIfLoggedIn()
    sendData();
    sendDataSingleChat();
    
});
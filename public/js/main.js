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
        
    //to fetch in realtime
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

    function fetchData() {  
        let url = '/chat-to-user/{id}';
        $.ajax({
            type: 'GET',
            url: url,
            success: function(data) {
                $('#singleChatContainer').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) { // if ajax is not success
                console.log(textStatus, errorThrown);
            }
        });
    }

    sendData();
    setInterval(fetchData, interval);

    
    // Extract the last part of the URL (i.e. the ID)
    
    let test132 = $('.contactUser');
    test132.on('click', function(event) {
        event.preventDefault();  
        test132.each(function(){
            let this_ = $(this);
            this_.click(function(){
                console.log('test');
                const test = window.location.href;
                const id = test.substring(test.lastIndexOf('/') + 1);
                console.log(test);
            });
        });
    });
});
$('.grid-view tbody tr').on('click', function(){
    var data = $(this).attr('id');


    // var name = $('#name').val().trim();
    // var surname = $('#surname').val().trim();
    // // var text = $('p').text();
    // var text = $("#mailForm").find("p").text()

    if(typeof data == 'undefined'){
        var name = $(this).find(':nth-child(3)').text();
        $('#result').text(name+' has no comments');
        return false;
    }else{
        $.ajax({
            'url':'programming/comments?Id='+data,
            'type':'POST',
            'cache':'false',
            'data':{'Id':data},
            'dataType':'html',
            'success':function(data){
                if(!data){
                    console.log(data);  
                    return;
                }else{
                    $('#result').html(data);
                    return;
                    // console.log($('table table-striped table-bordered').documentElement.innerHTML);
                }
            }
        });
    }
   

    // $.ajax({
    //     'url':'programming/test',
    //     'type':'POST',
    //     'cache':'false',
    //     'data':{'name':name,
    //             'surname':surname,
    //         'text':text},
    //     'dataType':'json',
    //     'beforeSend':function(){
    //         $('#sendmail').prop('disabled',true);
    //     },
    //     'success':function(data){
    //         if(!data){
    //             alert('There were errors, mail did not send');
    //         }else{
    //             $('#mailForm').trigger('reset');
    //             $('#sendmail').prop('disabled',false);
    //             // alert(data.text);    
    //             console.log(data);
    //         }           
            
    //     }
    // });

});




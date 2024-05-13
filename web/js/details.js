

// var thead = $('#result table thead tr');

// $(thead).each(function (index) {
//     $(this).find('th').each(function () {
//         let t = $(this).text();
//         $(this).remove('a');
//         $(this).html(t);
//     });


// });
// // collect rows
// var tbody = $('#result table tbody');
// var html_t = '<table border=\"1\" cellspacing=\"3\" cellpadding=\"4\">'+'<tr>' + thead.html() + '</tr>' + tbody.html()+'</table>';

// $('#pdf').on(
//     'click',
//     function () {
//         $.ajax({
//         type: 'POST',
//         url: 'http://localhost:8888/yii_crud/web/index.php/pdf-creator/index',
//         data: html_t,
//         success: function(data){
//             console.log('Success');
//         },
//         // dataType: dataType
//         });
//     }
// );
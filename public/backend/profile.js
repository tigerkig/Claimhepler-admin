$(document).ready(function (){
   $('#cancel_update').click(function (){
      $('#form_1_update').iCheck('uncheck');
      $('#form_2_update').iCheck('uncheck');
      $('#form_3_update').iCheck('uncheck');
   })

   $('#info_save').click(function (){

      if($('#UserName').val() == '' || $('#UserEmail').val() == '' || $('#UserPassword').val() == '' || $('#ConfirmPassword').val() == '') {

         toastr.error("Please enter the all data.", "User Information" );

      } else if ($('#UserPassword').val() != $('#ConfirmPassword').val()) {

         toastr.error("No match password.", "User Information" );

      } else {
         // read and edit check
         if($('#read-edit').is(':checked') == true) {
            var read_edit = 0;
         } else {
            var read_edit = 1;
         }

         //form permission check
         var form_1 = form_2 = form_3 = 0;
         if($('#form_1').is(':checked') == true) {
            form_1 = 1;
         }
         if($('#form_2').is(':checked') == true) {
            form_2 = 2;
         }
         if($('#form_3').is(':checked') == true) {
            form_3 = 3;
         }

         var form_result = form_1 + '||' + form_2 + '||' + form_3;
         $.post(
            'save_data',
            {
               '_token': $('meta[name="_token"]').attr('content'),
               'UserName': $('#UserName').val(),
               'UserEmail': $('#UserEmail').val(),
               'UserPassword': $('#UserPassword').val(),
               'ConfirmPassword': $('#ConfirmPassword').val(),
               'read_edit': read_edit,
               'form_permission': form_result
            }, 
            function(data)
            { 
               if(data != 'exist'){
                  toastr.success('Successful insert data', 'Database information');
                  // show_users(JSON.parse(data));
                  setTimeout(() => {  location.reload(); }, 500);
                  $('#cancel').click();
                  $($('#static').find('input')).val('');
               } else {
                  toastr.warning('Exist email', 'Database information');
               }
            });
      }
      

   })

   $('#info_save_update').click(function (){

      if($('#UserName_update').val() == '' || $('#UserEmail_update').val() == '') {

         toastr.error("Please enter the all data.", "User Information" );

      } else if ($('#UserPassword_update').val() != $('#ConfirmPassword_update').val()) {

         toastr.error("No match password.", "User Information" );

      } else {
         // read and edit check
         if($('#read-edit_update').is(':checked') == true) {
            var read_edit = 0;
         } else {
            var read_edit = 1;
         }

         //form permission check
         var form_1 = form_2 = form_3 = 0;
         if($('#form_1_update').is(':checked') == true) {
            form_1 = 1;
         }
         if($('#form_2_update').is(':checked') == true) {
            form_2 = 2;
         }
         if($('#form_3_update').is(':checked') == true) {
            form_3 = 3;
         }

         var form_result = form_1 + '||' + form_2 + '||' + form_3;
         $.post(
            'update_data',
            {
               '_token':$('meta[name="_token"]').attr('content'),
               'id':$('#update_id').val(),
               'UserName': $('#UserName_update').val(),
               'UserEmail': $('#UserEmail_update').val(),
               'UserPassword': $('#UserPassword_update').val(),
               'read_edit': read_edit,
               'form_permission': form_result
            }, 
            function(data)
            { 
               toastr.success('Successful update data', 'Database information');
               $('#cancel').click();
               setTimeout(() => {  location.reload(); }, 500);
            });
      }
      

   })

   $('#user_delete').click(function (){
      var user_id = [];
      for(var i = 0; i < $($('#sample_2').find('input')).length; i++) {
         if($($($('#sample_2').find('input'))[i]).is(':checked') == true) {
            user_id.push($($($('#sample_2').find('input'))[i]).val())
         }
      }

      if(user_id.length == 0) {
         toastr.error('Please select items.', 'User information');
      } else {
         $.post(
            'delete_data',
            {
               '_token':$('meta[name="_token"]').attr('content'),
               'delete_id': JSON.stringify(user_id)
            }, 
            function(data)
            { 
               if(data == 'success') {
                  toastr.success('Successful delete data', 'Database information');
                  setTimeout(() => {  location.reload(); }, 500);
                  
               }
   
            });
      }

   })

   $('#user_edit').click(function () {
      var user_id = [];
      for(var i = 0; i < $($('#sample_2').find('input')).length; i++) {
         if($($($('#sample_2').find('input'))[i]).is(':checked') == true) {
            user_id.push($($($('#sample_2').find('input'))[i]).val());
         }
      }
      if(user_id.length == 1) {
         $('#toggle').click();
         $.post(
            'select_data',
            {
               '_token':$('meta[name="_token"]').attr('content'),
               'select_id': user_id[0]
            }, 
            function(data)
            { 
               var select_user = JSON.parse(data);
               $('#update_id').val(select_user[0].id);
               $('#UserName_update').val(select_user[0].name);
               $('#UserEmail_update').val(select_user[0].email);
               if(select_user[0].read_edit == '1') {
                  $("#read-edit_update").bootstrapSwitch('state', false);
               }else {
                  $("#read-edit_update").bootstrapSwitch('state', true);
               }
               var permission = select_user[0].form_permission.split('||');
               if(permission[0] == '1'){
                  $('#form_1_update').iCheck('check');
               }
               if(permission[1] == '2'){
                  $('#form_2_update').iCheck('check');
               }
               if(permission[2] == '3'){
                  $('#form_3_update').iCheck('check');
               }

            });
      } else {
         toastr.error('Please select only one', 'User information');
      }
      
   })
})

// function show_users(data) { 
//    $('#sample_2 tbody').html('');
//    var index = 1;
//    data.forEach(element => {
//       $('#sample_2 tbody').append([
//          '<tr class="odd gradeX">',
//             '<td><input type="checkbox" class="checkboxes" value="'+ element.id +'"/></td>',
//             '<td>'+ index++ +'</td>',
//             '<td>'+ element.name +'</td>',
//             '<td><a href="#">'+ element.email +' </a></td>',
//             '<td id="td_form_'+ element.id +'"></td>',
//             '<td id="td_r_e_'+ element.id +'"></td>',
//          '</tr>' 
//       ].join(''));

//       var permission = element.form_permission.split('||');
//       for(let i = 0; i < 3; i++) {
//          if(permission[i] != 0) {
//             $('#td_form_' + element.id).append([
//                '<span class="label label-sm label-success" style="margin:3px;">FORM '+ permission[i] +' </span>'
//             ].join(''));
//          }
//       }

//       if(element.read_edit == 0) {
//          $('#td_r_e_' + element.id).append([
//             '<span class="label label-sm label-warning">Read-only </span>'
//          ].join(''));
//       } else {
//          $('#td_r_e_' + element.id).append([
//             '<span class="label label-sm label-danger">Edit-only </span>'
//          ].join(''));
//       }

//    });


// }
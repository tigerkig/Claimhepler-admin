var reference_id = '';
var Policy_No = '';
function detail(params) {
   if($('#is_read_edit').val() == 0) {
      $('#save_change').prop('disabled', true);
      $('#remark').prop('disabled', true);
      $('#status').prop('disabled', true);
   }
   $.post(
      'form_1_remark_status',
      {
         '_token': $('meta[name="_token"]').attr('content'),
         'id': params
      }, 
      function(data)
      { 
         var column_data = JSON.parse(data);
         console.log(column_data[0]);
         // employee
         $('#Employee_show_1').text(column_data[0]['Employee_Date']);
         $('#Employee_show_2').text(column_data[0]['Employee_Description']);
         $('#Employee_show_3').text(column_data[0]['Employee_Sick_From']);
         $('#Employee_show_4').text(column_data[0]['Employee_Sick_To']);
         $('#Employee_show_5').text(column_data[0]['Employee_Nature']);

         //personal
         $('#Personal_show_1').text(column_data[0]['Personal_Date']);
         $('#Personal_show_2').text(column_data[0]['Personal_Description']);
         $('#Personal_show_3').text(column_data[0]['Personal_Sick_From']);
         $('#Personal_show_4').text(column_data[0]['Personal_Sick_To']);
         $('#Personal_show_5').text(column_data[0]['Personal_Nature']);
         $('#Personal_show_6').text(column_data[0]['Personal_recovered']);

         //Repatriation
         $('#Repatriation_show_1').text(column_data[0]['Repatriation_Date']);
         $('#Repatriation_show_2').text(column_data[0]['Repatriation_Description']);
         $('#Repatriation_show_3').text(column_data[0]['Repatriation_Reason']);
         $('#Repatriation_show_4').text(column_data[0]['Repatriation_recovered']);

         //Clinical
         $('#Clinical_show_1').text(column_data[0]['Clinical_Date']);
         $('#Clinical_show_2').text(column_data[0]['Clinical_Diagnosis']);
         $('#Clinical_show_3').text(column_data[0]['Clinical_HK']);
         $('#Clinical_show_4').text(column_data[0]['Clinical_recovered']);

         //surgical
         $('#Surgical_show_1').text(column_data[0]['Surgical_Date']);
         $('#Surgical_show_2').text(column_data[0]['Surgical_Description']);
         $('#Surgical_show_3').text(column_data[0]['Surgical_Diagonsis']);
         $('#Surgical_show_4').text(column_data[0]['Surgical_HK']);

         //Dental
         $('#Dental_show_1').text(column_data[0]['Clinical_Date']);
         $('#Dental_show_2').text(column_data[0]['Dental_Diagonsis']);
         $('#Dental_show_3').text(column_data[0]['Dental_HK']);

         //Loss
         $('#Loss_show_1').text(column_data[0]['Loss_Date']);
         $('#Loss_show_2').text(column_data[0]['Loss_Diagonsis']);
         $('#Loss_show_3').text(column_data[0]['Loss_Period_From']);
         $('#Loss_show_4').text(column_data[0]['Loss_Period_To']);

         //replacement
         $('#Replacement_show_1').text(column_data[0]['Replacement_Reason']);
         $('#Replacement_show_2').text(column_data[0]['Replacement_HK']);
         
         


         Policy_No = column_data[0]['Policy_No'];
         reference_id = column_data[0]['reference_id'];
         
      });
}

function remark_status_save() {
   if($('#remark').val() == '' || $('#status').val() == '') {
      toastr.success('Please insert all data.', 'User Information');
   } else {
      $.post(
         'form_1_remark_status_save',
         {
            '_token': $('meta[name="_token"]').attr('content'),
            'remark': $('#remark').val(),
            'status': $('#status').val(),
            'reference_id': reference_id,
            'Policy_No': Policy_No
         }, 
         function(data)
         { 
            if(data == 'success') {
               toastr.success('Successful insert data.', 'Database Information');
               // $('#modal-xl').modal('hide');
               $('#status').val('');
               $('#remark').val('');
               $('#save_change').prop('disabled', true);
               $('#remark').prop('disabled', true);
               $('#status').prop('disabled', true);
            }
         });
   }
   
}
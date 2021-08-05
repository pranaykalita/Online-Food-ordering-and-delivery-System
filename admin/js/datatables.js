

// datatable
$(document).ready(function() {
  $('#dataTable').DataTable({
    "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
    "pageLength": 5,
    "ordering": false
  });
});
$(document).ready(function() {
  $('#dataTable2').DataTable({
    "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
    "pageLength": 5,
    "ordering": false
  });
});

// notification


 function shownotification(option = '')
 {
   
    $.ajax({
      type: "POST",
      url: "./common/fetchnotification.php",
      data: {
        // "read": true,
        option: option
      },
      dataType: 'json',
      success: function (data)
      {
        $('.notidetails').html(data.notification);
        if(data.unreadnotification > 0)
      
          {
            $('.count-number').html(data.unreadnotification);
          }
        else
        {

          $('.count-number').html("");
        }
        
      }
    });
 }




 function clicknotification(){
   $('.readnotific').click(function (e) { 
     $.ajax({
       type: "POST",
       url: "datafetch.php",
       data: {
        readdone: true,
       },
       success: function (response) {
         console.log(response);
       }
     });
   });
 }

function loadDoc() 
{
  setInterval(function()
  {
  shownotification();
  },1000);

}
clicknotification();
loadDoc();


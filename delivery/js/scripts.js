/*!
    * Start Bootstrap - SB Admin v7.0.2 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2021 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

$(document).ready( function () {
    $('#datatablesSimple').DataTable({
        "order": [[ 5, "desc" ]]
    });
} );

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});


// deliveryORd.php

$(document).ready(function () {

        var ord_id = $('.invid').html();
        $.ajax({
            type: 'POST',
            url: './common/deldata.php',
            data: {
                'view_delord': true,
                'invoiceid': ord_id,
            },
            success: function (response) {
                $('.ordtable').html(response);
            }
        });
});

// record.php
$(document).ready(function () {  

    $('#datatablesSimple').on('click','.Rviewdetail', function (e) {  
        e.preventDefault();

        var invoice = $(this).closest("tr").find(".Rinvoice").text();
        console.log(invoice);

        $.ajax({
            type: "POST",
            url: "./common/deldata.php",
            data: {
                'Rview':true,
                'invoice': invoice,
            },
            success: function (response) {
                $('.allrecordtable').html(response);
            }
        });
    });
});

// index.php


function loadindex() {
    setInterval(function()
    {
        $.ajax({
            type: "POST",
            url: "./common/deldata.php",
            data: {
                checkbtn : true,
            },
            success: function (response) {
               $('.loaddata').html(response);
            }
        });
    },3000);
 }
 loadindex();


//  clock

// clock
function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("topclock").innerText = time;
    document.getElementById("topclock").textContent = time;
    
    setTimeout(showTime, 1000);
    
  }
  
  showTime();
  

//   show modal
$(document).ready(function () {
  
 
    $('#paymode').change(function()
    {
      var title = $(this).val();
      if(title == "Upi")
      {
        $('.modal').modal('show');
      }
    });
  
  });
  
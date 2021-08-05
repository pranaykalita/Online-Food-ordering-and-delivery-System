// category.php
$(document).ready(function(){

    $('#dataTable').on('click' ,'.update_btn' ,function(e){
        e.preventDefault();

        var cat_id = $(this).closest("tr").find(".catid").text();

        $.ajax({
            type: 'POST',
            url:'datafetch.php',
            data: {
                'editbtn':true,
                'cat_id': cat_id,
            },
            success: function(response){
                $.each(response, function (key, value) { 
                    $('#editname').val(value['cat_name']);
                    $('#cat_id').val(value['cat_id']);
                });
                // $('#updatecat').modal('show');
            }
        });
    });
});

// menu.php
$(document).ready(function(){

    $('#dataTable').on('click','.edit_food',function(e){
        e.preventDefault();
        var cat_id = $(this).closest("tr").find(".menuid").text();
        
        $.ajax({
            type: 'POST',
            url:'datafetch.php',
            data: {
                'editmenu':true,
                'menuid': cat_id,
            },
            success: function(response){
                $.each(response, function (key, value) { 
                    $('#menid').val(value['menu_id']);
                    $('.upiname').val(value['menu_name']);
                    $('.upiprice').val(value['menu_price']);
                    $('.upicat').val(value['menu_category']);
                    $('.upiqty').val(value['menu_quantity']);
                });
            }
        });
    });

});

// delivery update
$(document).ready(function(){
    $('#dataTable2').on('click','.editdel',function (e) {  
        e.preventDefault();
        var delid = $(this).closest("tr").find(".delid").text();
        // alert(delid);

        $.ajax({
            type: "POST",
            url: "datafetch.php",
            data: {
                'getdata' : true,
                'delid' : delid,
            },
            success: function (response) {
                $.each(response, function (key, value) { 
                     $('#delid').val(value['id']);
                     $('#uname').val(value['del_name']);
                     $('#uphone').val(value['del_phone']);
                     $('#uemail').val(value['delemail']);
                     $('#uadd').val(value['deladdress']);
                     $('#upass').val(value['delpass']);
                });
                
            }
        });
    });
});

// neworders.php
$(document).ready(function () {

    $('#dataTable').on('click','.viewdetails' ,function (e) {
        e.preventDefault();

        var ord_id = $(this).closest("tr").find(".ord_id").text();

        $.ajax({
            type: 'POST',
            url: 'datafetch.php',
            data: {
                'view_neworder': true,
                'orderid': ord_id,
            },
            success: function (response) {
                $('.ordview').html(response);
            }
        });
    });
});


// neworders.php details
$(document).ready(function () {

    $('#dataTable').on('click', '.viewdetails',function (e) {
        e.preventDefault();

        var ord_id = $(this).closest("tr").find(".ord_id").text();

     $.ajax({
            type: 'POST',
            url: 'datafetch.php',
            data: {
                'view_ordr_det': true,
                'ordno': ord_id,
            },
            success: function (response) {
                $.each(response, function (key, value) { 
                    $('.pmode').text(value['selpaymode']);
                    $('.name').text(value['ord_user']);
                    $('.phone').text(value['ord_phone']);
                    $('.add').text(value['ord_addrs']);
                    $('.total').text("₹ "+value['ord_totlprice']).appen;
                });
            }
        });
    });
});

// orders.php

$(document).ready(function(){

    $('#dataTable').on('click' , '.view_btn' ,function(e){
        e.preventDefault();

        var ord_viewid = $(this).closest("tr").find(".ord_id").text();

        $.ajax({
            type: 'POST',
            url:'datafetch.php',
            data: {
                'chek_viewBtn':true,
                'ord_view': ord_viewid,
            },
            success: function(response){
                
                $('.orddet').html(response);
            }
        });
    });
});

// staff.php
$(document).ready(function(){

    $('#dataTable').on('click','.editemp',function(e){
        e.preventDefault();

        var cat_id = $(this).closest("tr").find(".stfid").text();

        $.ajax({
            type: 'POST',
            url:'datafetch.php',
            data: {
                'editemp':true,
                'empid': cat_id,
            },
            success: function(response){
                $.each(response, function (key, value) { 
                    $('#stfid').val(value['staff_id']);
                    $('.name').val(value['staff_name']);
                    $('.email').val(value['staff_email']);
                    $('.tel').val(value['staff_number']);
                    $('.addr').val(value['staff_address']);
                    $('.oocup').val(value['occupation']);
                });
            }
        });
    });
});

// settings.php
$(document).ready(function(){

    $('.editpasswd').click(function(e){
        e.preventDefault();

        var cat_id = $(this).closest("tr").find(".admid").text();

        $.ajax({
            type: 'POST',
            url:'datafetch.php',
            data: {
                'editpass':true,
                'adminid': cat_id,
            },
            success: function(response){
                $.each(response, function (key, value) { 
                    $('#adminid').val(value['admin_id']);
                    $('.name').val(value['admin_name']);
                    $('.paswd').val(value['admin_pass']);
                });
            }
        });
    });
});

// show pass
function myFunction() {
    var x = document.getElementById("paswd");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  // delevery.php details
$(document).ready(function () {

    $('.orddet').click(function (e) {
        e.preventDefault();

        var ord_id = $(this).closest("tr").find(".delordid").text();

        $.ajax({
            type: 'POST',
            url: 'datafetch.php',
            data: {
                'delyvbtn': true,
                'orddelid': ord_id,
            },
            success: function (response) {
                $.each(response, function (key, value) { 
                    $('.delname').text(value['ord_user']);
                    $('.deladd').text(value['ord_addrs']);
                    $('.deltotal').text(value['ord_totlprice']);
                });
            }
        });
    });
});

// delivery.php ord_items
$(document).ready(function () {

    $('.orddet').click(function (e) {
        e.preventDefault();

        var ord_id = $(this).closest("tr").find(".delordid").text();

        $.ajax({
            type: 'POST',
            url: 'datafetch.php',
            data: {
                'vorddel': true,
                'vordid': ord_id,
            },
            success: function (response) {
                $('.orditmview').html(response);
            }
        });
    });
});


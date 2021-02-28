// category.php
$(document).ready(function(){

    $('.update_btn').click(function(e){
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

    $('.edit_food').click(function(e){
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

// neworders.php
$(document).ready(function () {

    $('.viewdetails').click(function (e) {
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

    $('.viewdetails').click(function (e) {
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
                    $('.name').text(value['ord_user']);
                    $('.add').text(value['ord_addrs']);
                    $('.total').text(value['ord_totlprice']);
                });
            }
        });
    });
});

// orders.php

$(document).ready(function(){

    $('.view_btn').click(function(e){
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

    $('.editemp').click(function(e){
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


// managecategory.php
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

// manageitem.php
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
                    console.log(response);
                });
            }
        });
    });
});
// manageorder.php
$(document).ready(function () {

    $('.viewdetails').click(function (e) {
        e.preventDefault();

        var ord_id = $(this).closest("tr").find(".ord_id").text();

        $.ajax({
            type: 'POST',
            url: 'datafetch.php',
            data: {
                'viewBtn': true,
                'order_id': ord_id,
            },
            success: function (response) {
                $('.ordview').html(response);
            }
        });
    });
});

// orders.php

$(document).ready(function(){

    $('.view_btn').click(function(e){
        e.preventDefault();

        var stud_id = $(this).closest("tr").find(".ord_id").text();

        $.ajax({
            type: 'POST',
            url:'datafetch.php',
            data: {
                'chek_viewBtn':true,
                'stud_ifBtn': stud_id,
            },
            success: function(response){
                $('.orddet').html(response);
            }
        });
        // console.log(stud_id);
    });
});
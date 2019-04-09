/*  Begin  */

var rolling_number_request = 0;

$(document).on('click','.edit_main_users',function(){
    $("#edit_main_users_modal").modal("show");

    var user_id = $(this).attr("id");
    $("#hidden_text").val(user_id);

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            user_id: user_id,
            edit_main_users: ''
        },
        success: function (response) {
            if (response.done == true) {
            
             $('#txt_username').val(response.user_username);
             $('#txt_email').val(response.user_email);
             $('#txt_contact').val(response.user_contact);
             $('#txt_full_name').val(response.user_name);
             $('#txt_user_status').val(response.user_status);
             $('#txt_branch_name').val(response.user_branch);
             $('#txt_position').val(response.user_position);

             $('#hidden_position').val(response.user_position_id);
             $('#hidden_branch').val(response.user_branch_id);
             $('#hidden_my_branch_id').val(response.my_branch_users_id);


            } else {
                alert('Error');
                console.log(response);
            }
        }
    });

});

$('#form_edit_main_user').submit(function () {
    var user_username = $('#txt_username').val();
    var user_password = $('#txt_new_password').val();
    var user_work_type = $('#txt_position').val();
    var user_work_type_id = $('#hidden_position').val();
    var user_email = $('#txt_email').val();
    var user_contact = $('#txt_contact').val();
    var user_full_name = $('#txt_full_name').val();
    var user_branch = $('#txt_branch_name').val();
    var user_branch_id = $('#hidden_branch').val();
    var my_branch_id = $('#hidden_my_branch_id').val();

    var user_id = $("#hidden_text").val();

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            user_username: user_username,
            user_password: user_password,
            user_work_type:user_work_type,
            user_work_type_id:user_work_type_id,
            user_branch_id:user_branch_id,
            user_branch:user_branch,
            user_email:user_email,
            user_contact:user_contact,
            user_full_name:user_full_name,
            user_id:user_id,
            my_branch_id:my_branch_id,
            update_main_user:''
        },
        success: function (response) {
            if (response.done == true) {
            $("#edit_main_users_modal").modal("hide");  
            alert("Success");
            window.location.reload();
           
            } else {
               alert("Error");
               console.log(response);
               console.log(response.run_query_ssw_users_table);
               console.log(response.run_query_2_ssw_main_table);

            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;

});



$(document).on('click','.approve_product_request',function(e){
    e.preventDefault();
      var getting_request_id = $(this).attr("id");
    
  
      $.ajax({
          type: 'post',
          url: '../ajax.php',
          dataType: 'JSON',
          data: {
              getting_request_id: getting_request_id,
              get_pending_request_details: ''
          },
          success: function (response) {
              if (response.done == true) {
  
              $("#approve_product_modal").modal("show");
              
               $('#txt_sending_branch').val(response.sending_branch);
               $('#txt_item_id').val(response.item_id);
               $('#txt_item_description').val(response.item_description);
               $('#txt_item_sent').val(response.item_sent);
               $('#txt_quantity_required').val(response.quantity_required);
               $('#txt_quantity_sent').val(response.quantity_given);

               $('#hidden_text').val(response.hidden_id);
  
              } else {
                  alert('Error');
                  console.log(response);
              }
          }
      });
  })

   $('#form_approve_product').submit(function () {

    var item_id = $('#txt_item_id').val();
    var quantity_given = $('#txt_quantity_sent').val();

    var request_id =   $('#hidden_text').val();

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            item_id:item_id,
            quantity_given:quantity_given,
            request_id:request_id,
            approve_products:''
        },
        success: function (response) {
            if (response.done == true) {
            $("#approve_product_modal").modal("hide");  
            alert("Success");
            window.location.reload();

            console.log(response.select_query);
            console.log(response.update_query);
           
            } else {
               alert("Error");
               console.log(response);
               console.log(response.select_query);
                console.log(response.update_query);
            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;

});



$(document).on('click','.send_product_request',function(e){
  e.preventDefault();
    var getting_request_id = $(this).attr("id");
  

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            getting_request_id: getting_request_id,
            get_request_details: ''
        },
        success: function (response) {
            if (response.done == true) {

            $("#transfer_product_modal").modal("show");
            
             $('#txt_receiving_branch').val(response.sending_branch);
             $('#txt_item_description').val(response.item_description);
             $('#txt_item_id').val(response.item_id);
             $('#txt_quantity_required').val(response.quantity_required);
             $('#hidden_text').val(response.request_id);
             $('#hidden_branch').val(response.sending_branch_id);

            } else {
                alert('Error');
                console.log(response);
            }
        }
    });
})

$("#select_my_request_product").change(function(){
    var get_item_id = $(this).val();
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            get_item_id: get_item_id,
            get_my_product_details: ''
        },
        success: function (response) {
            if (response.done == true) {
           $("#txt_quantity_remain").val(response.product_item_avail);
            } else {
                alert('Error');
                console.log(response);
            }
        }
    });    
})


$('#form_transfer_product').submit(function () {
    var receiving_branch =  $('#hidden_branch').val();
    var item_description  =  $('#txt_item_description').val();
    var item_id  =  $('#txt_item_id').val();
    var item_quantity_required  =  $('#txt_quantity_required').val();
    var request_id  =  $('#hidden_text').val();

    var item_sending_text = $('#select_my_request_product :selected').text();
    var item_sending = $('#select_my_request_product').val();
    var quantity_sending = $('#txt_transfer_quantity').val();

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            receiving_branch:receiving_branch,
            item_description:item_description,
            item_id:item_id,
            item_quantity_required:item_quantity_required,
            request_id:request_id,
            item_sending_text:item_sending_text,
            item_sending:item_sending,
            quantity_sending:quantity_sending,
            transfer_products:''
        },
        success: function (response) {
            if (response.done == true) {
            $("#transfer_product_modal").modal("hide");  
            alert("Success");
            window.location.reload();
           
            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;

});



$("#txt_request_quantity_required").keyup(function(){
    var current_value = $(this).val();

    if(current_value == null){
        $("#btn_add_request_item").attr('disabled','disabled');
    }else{
        $("#btn_add_request_item").removeAttr('disabled');
    }
})

$("#select_branch").change(function(){
    var branch_name = $("#select_request_branch :selected").text();
    $("#send_to_branch").html(branch_name);
})

$(".delete_requests").on('click',function(){
   var request_item_id = $(this).attr("id");

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            request_item_id:request_item_id,
            delete_request_products: ''
        },
        success: function (response) {
            if (response.done == true) {
               alert('Success');
               window.location.reload();

            } else {
                alert('Error');
                console.log(response);
            }
        }
    });    
})



$("#btn_add_request_item").on('click',function(){
    var get_sending_to_branch = $("#select_request_branch").val();
    var item_description = $("#select_request_product :selected").text();
    var item_branch_id = $("#select_request_product").val();
    var item_quantity = $("#txt_request_quantity_required").val();
    var request_id = $("#request_invoice").html();

    rolling_number_request++;

    var button_id = rolling_number_request;

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            get_sending_to_branch: get_sending_to_branch,
            item_description:item_description,
            item_quantity:item_quantity,
            request_id:request_id,
            item_branch_id:item_branch_id,
            button_id:button_id,
            request_products: ''
        },
        success: function (response) {
            if (response.done == true) {
                var insert_row_live = "<tr><td>"+item_description+"</td><td>"+item_quantity+"</td><td><button class='del_request btn btn-danger btn-md' id="+rolling_number_request+">Delete</button></td></tr>";
            
                $("#live_request_table_body").append(insert_row_live);

                $(".del_request").bind('click',delete_request_item);

            } else {
                alert('Error');
                console.log(response);
            }
        }
    });    
})


function delete_request_item(){
    alert('Removed');
    $(this).closest ('tr').remove();
    var item_id = $(this).attr('id');

    var request_id = $("#request_invoice").text();

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            request_id:request_id,
           item_id:item_id,
           del_request_item:''
        },
        success: function (response) {
            if (response.done == true) {
                console.log(response);
                $('#btn_add_request_item').attr('disabled','disabled');

        } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
    }); 

}

$("#btn_cancel_request").on('click',function(){

    var request_id = $("#request_invoice").html();

    rolling_number_request++;

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            
            request_id:request_id,
            cancel_request_products: ''
        },
        success: function (response) {
            if (response.done == true) {
               alert('Request Cancelled Successfully');

            } else {
                alert('Error');
                console.log(response);
            }
        }
    });    
})

$("#btn_send_request").on('click',function(){
    alert("Request Sent Successfully");
})



$(document).on('click','.edit_users',function(){
    $("#edit_users_modal").modal("show");

    var user_id = $(this).attr("id");
    $("#hidden_text").val(user_id);

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            user_id: user_id,
            edit_users: ''
        },
        success: function (response) {
            if (response.done == true) {
            
             $('#txt_username').val(response.user_username);
             $('#select_user_type :selected').html(response.user_type);
             $('#txt_email').val(response.user_email);
             $('#txt_contact').val(response.user_contact);
             $('#txt_full_name').val(response.user_name);
             $('#txt_user_status').val(response.user_status);


            } else {
                alert('Error');
                console.log(response);
            }
        }
    });

});

$('#form_edit_user').submit(function () {
    var user_username = $('#txt_username').val();
    var user_password = $('#txt_password').val();
    var user_work_type = $('#select_user_type').val();
    var user_email = $('#txt_email').val();
    var user_contact = $('#txt_contact').val();
    var user_full_name = $('#txt_full_name').val();

    var user_id = $("#hidden_text").val();

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            user_username: user_username,
            user_password: user_password,
            user_work_type:user_work_type,
            user_email:user_email,
            user_contact:user_contact,
            user_full_name:user_full_name,
            user_id:user_id,
            update_user:''
        },
        success: function (response) {
            if (response.done == true) {
            $("#edit_users_modal").modal("hide");  
            alert("Success");
            window.location.reload();
           
            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;

});

$(document).on('click','.delete_users',function(){
    $("#delete_users_modal").modal("show");

    var user_id = $(this).attr("id");
    $("#hidden_text_del").val(user_id);
});

$('#form_delete_user').submit(function () {
    var user_id = $('#hidden_text_del').val();  
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            user_id:user_id,
            delete_user:''
        },
        success: function (response) {
            if (response.done == true) {
            $("#delete_users_modal").modal("hide");
              alert("Success");
            window.location.reload();
            } else {
               alert("Cannot Be Delete Because It Is Connected To Another Database Table");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });
    return false;
});

$(document).on('click','.lock_users',function(){
    $("#lock_users_modal").modal("show");

    var user_id = $(this).attr("id");
    $("#hidden_text_lock").val(user_id);
    $("#lock_status").val(2);
});

$(document).on('click','.unlock_users',function(){
    $("#unlock_users_modal").modal("show");

    var user_id = $(this).attr("id");
    $("#hidden_text_unlock").val(user_id);
    $("#unlock_status").val(1);
});

$('#form_unlock_user').submit(function () {
    var user_id = $('#hidden_text_unlock').val(); 
    var current_status = $('#unlock_status').val(); 
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            user_id:user_id,
            current_status:current_status,
            lock_user:''
        },
        success: function (response) {
            if (response.done == true) {
            $("#unlock_users_modal").modal("hide");
              alert("Success");
            window.location.reload();
            } else {
               alert("Cannot Be Delete Because It Is Connected To Another Database Table");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });
    return false;
});

$('#form_lock_user').submit(function () {
    var user_id = $('#hidden_text_lock').val(); 
    var current_status = $('#lock_status').val(); 
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            user_id:user_id,
            current_status:current_status,
            lock_user:''
        },
        success: function (response) {
            if (response.done == true) {
            $("#lock_users_modal").modal("hide");
              alert("Success");
            window.location.reload();
            } else {
               alert("Cannot Be Delete Because It Is Connected To Another Database Table");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });
    return false;
});



$(document).on('click','.edit_products',function(){
    $("#edit_product_modal").modal("show");

    var product_id = $(this).attr("id");
    $("#hidden_text").val(product_id);

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            product_id: product_id,
            edit_product: ''
        },
        success: function (response) {
            if (response.done == true) {
            
                $('#txt_item_name').val(response.product_name);
                $('#select_item_category :selected').html(response.product_category);                                 
                $('#txt_unit_price').val(response.product_unit_price); 
                $('#txt_item_available').val(response.product_item_avail); 
                $('#txt_expiry').val(response.product_expiry); 
            } else {
                alert('Error');
                console.log(response);
            }
        }
    });

});

$('#form_edit_product').submit(function () {
    var item_name = $('#txt_item_name').val();
    var item_category = $('#select_item_category').val();
    var item_unit_price = $('#txt_unit_price').val();
    var item_quantity_avail = $('#txt_item_available').val();
    var item_expiry = $('#txt_expiry').val();

    var product_id = $("#hidden_text").val();
   
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            item_name: item_name,
            item_category: item_category,
            item_unit_price:item_unit_price,
            item_quantity_avail:item_quantity_avail,
            item_expiry:item_expiry,
            product_id:product_id,
            update_product:''
        },
        success: function (response) {
            if (response.done == true) {
                $("#edit_product_modal").modal("hide");
              alert("Success");
              window.location.reload();                

            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;

});


$(document).on('click','.delete_products',function(){
    $("#delete_products_modal").modal("show");

    var product_id = $(this).attr("id");
    $("#hidden_text_del").val(product_id);
});


$('#form_delete_product').submit(function () {
    var product_id = $('#hidden_text_del').val();  
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            product_id:product_id,
            delete_product:''
        },
        success: function (response) {
            if (response.done == true) {
            $("#delete_products_modal").modal("hide");
              alert("Success");
            window.location.reload();
            } else {
               alert("Cannot Be Delete Because It Is Connected To Another Database Table");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });
    return false;
});




$(document).on('click','.edit_me',function(){
    $("#edit_category_modal").modal("show");

    var category_id = $(this).attr("id");
    $("#hidden_text").val(category_id);

     $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            category_id: category_id,
            edit_category_name: ''
        },
        success: function (response) {
            if (response.done == true) {
                $('#txt_category').val(response.category_name);                                
            } else {
                alert('Error');
            }
        }
    });
});

$(document).on('click','.delete_me',function(){
    $("#delete_category_modal").modal("show");

    var category_id = $(this).attr("id");
    $("#hidden_text_del").val(category_id);
});

$('#form_delete_category').submit(function () {
    var category_id = $('#hidden_text_del').val();  
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            category_id:category_id,
            delete_category:''
        },
        success: function (response) {
            if (response.done == true) {
            $("#delete_category_modal").modal("hide");
              alert("Success");
            window.location.reload();
            } else {
               alert("Cannot Be Delete Because It Is Connected To Another Database Table");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });
    return false;
});


$('#form_edit_category').submit(function () {
    var category_name = $('#txt_category').val();
    var category_id = $('#hidden_text').val();
    
   
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            category_name: category_name,
            category_id:category_id,
            update_category:''
        },
        success: function (response) {
            if (response.done == true) {
            $("#edit_category_modal").modal("hide");
              alert("Success");
            window.location.reload();
            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;

});



$('#form_add_category').submit(function () {
    var category_name = $('#txt_category').val();
    
   
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            category_name: category_name,
            add_new_category:''
        },
        success: function (response) {
            if (response.done == true) {
              alert("Success");
            window.location.reload();
            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;

});



$('#form_add_product').submit(function () {
    var item_name = $('#txt_item_name').val();
    var item_category = $('#select_item_category').val();
    var item_unit_price = $('#txt_unit_price').val();
    var item_quantity_avail = $('#txt_item_available').val();
    var item_expiry = $('#txt_expiry').val();
   
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            item_name: item_name,
            item_category: item_category,
            item_unit_price:item_unit_price,
            item_quantity_avail:item_quantity_avail,
            item_expiry:item_expiry,
            add_new_product:''
        },
        success: function (response) {
            if (response.done == true) {
              alert("Success");
              window.location.reload();                

            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;

});

var rolling_number = 0;

$("#my_selected_table").dataTable();

$('#form_add_user').submit(function () {
    var user_username = $('#txt_username').val();
    var user_password = $('#txt_password').val();
    var user_work_type = $('#select_user_type').val();
    var user_email = $('#txt_email').val();
    var user_contact = $('#txt_contact').val();
    var user_full_name = $('#txt_full_name').val();
    var user_branch = $('#select_user_branch').val();
    var user_branch_name = $('#select_user_branch :selected').text();

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            user_username: user_username,
            user_password: user_password,
            user_work_type:user_work_type,
            user_email:user_email,
            user_contact:user_contact,
            user_full_name:user_full_name,
            user_branch:user_branch,
            user_branch_name:user_branch_name,
            add_new_user:''
        },
        success: function (response) {
            if (response.done == true) {
              alert("Success");
            window.location.reload();
           
            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;

});


$('#form_add_cash_customer').submit(function () {
    var customer_name = $('#txt_full_name').val();
    var customer_email = $('#txt_email').val();
    var customer_contact = $('#txt_contact').val();
    var customer_branch = $('#select_customer_branch').val();
    var customer_address = $('#txt_address').val();
    var customer_type  = "ca";
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            customer_name: customer_name,
            customer_email: customer_email,
            customer_contact:customer_contact,
            customer_branch:customer_branch,
            customer_address:customer_address,
            customer_type:customer_type,
            add_new_customer:''
        },
        success: function (response) {
            if (response.done == true) {
            alert("Success");
            window.location.reload();
            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
    });

    return false;

});

$('#form_add_credit_customer').submit(function () {
    var customer_name = $('#txt_full_name').val();
    var customer_email = $('#txt_email').val();
    var customer_contact = $('#txt_contact').val();
    var customer_branch = $('#select_customer_branch').val();
    var customer_address = $('#txt_address').val();
    var customer_type  = "cr";
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            customer_name: customer_name,
            customer_email: customer_email,
            customer_contact:customer_contact,
            customer_branch:customer_branch,
            customer_address:customer_address,
            customer_type:customer_type,
            add_new_customer:''
        },
        success: function (response) {
            if (response.done == true) {
            alert("Success");
           window.location.reload();
            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
    });

    return false;

});


$('#form_stock_officer').submit(function () {
    var so_container_number = $('#txt_container_no').val();
    var so_product_name = $('#select_product_name').val();
    var so_product_category = $('#select_product_category').val();
    var so_expected_quantity = $('#txt_expected_quantity').val();
    var so_supplier = $('#txt_supplier').val();
    var so_shortages = $('#txt_shortages').val();
    var so_date = $('#txt_date').val();
    var so_driver_name = $('#txt_driver_name').val();
    var so_car_number = $('#txt_car_number').val();

    if(so_shortages == ""){
        var so_shortages = 0;
    }
  
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            so_container_number: so_container_number,
            so_product_name: so_product_name,
            so_product_category:so_product_category,
            so_expected_quantity:so_expected_quantity,
            so_supplier:so_supplier,
            so_shortages:so_shortages,
            so_date:so_date,
            so_driver_name:so_driver_name,
            so_car_number:so_car_number,
            stock_officer_record:''
        },
        success: function (response) {
            if (response.done == true) {
            alert("Success");
           window.location.reload();
        
        
        } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
    });

    return false;

});


$(".btn_approve").on('click',function(){
  var product_value =  $(this).attr("id");
  $('#txt_hidden_text').val(product_value);

  
  $.ajax({
    type: 'post',
    url: '../ajax.php',
    dataType: 'JSON',
    data: {
        product_value: product_value,
        product_details: ''
    },
    success: function (response) {

        if (response.done == true) {

            $('#txt_product_name').val(response.product_name);
            $('#txt_product_category').val(response.product_category);
            $('#txt_container_no').val(response.container_number);
            $('#txt_expected_quantity').val(response.expected_quantity);
            $('#txt_shortages').val(response.shortages);
            $('#txt_supplier').val(response.supplier);
            
            $('#txt_stock_date').val(response.date);
            $('#txt_car_number').val(response.car_number);
            
            $("#myModal").modal("show");
                                                

        } else {
            alert('Error');

            
        }
    }
});

});


$('#form_approve_stock_officer').submit(function () {
    var quantity_received = $('#txt_quantity_received').val();
    var production_date = $('#txt_production_date').val();
    var expiry_date = $('#txt_expiry_date').val();
    var receiver = $('#txt_receiver').val();
    var hidden_text = $('#txt_hidden_text').val();
   
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            quantity_received: quantity_received,
            production_date: production_date,
            expiry_date:expiry_date,
            receiver:receiver,
            hidden_text:hidden_text,
            stock_officer_approve:''
        },
        success: function (response) {
            if (response.done == true) {
            $("#myModal").modal("hide");
            alert("Success");
            window.location.reload();

        } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
    });

    return false;

});


$(".btn_approve_warehouse_manager").on('click',function(){
    var product_value =  $(this).attr("id");
    $('#txt_hidden_text').val(product_value); 
    
    $.ajax({
      type: 'post',
      url: '../ajax.php',
      dataType: 'JSON',
      data: {
          product_value: product_value,
          product_details_warehouse_manager: ''
      },
      success: function (response) {
  
          if (response.done == true) {
  
              $('#txt_product_name').val(response.product_name);
              $('#txt_product_category').val(response.product_category);
              $('#txt_container_no').val(response.container_number);
              $('#txt_expected_quantity').val(response.expected_quantity);
              $('#txt_shortages').val(response.shortages);
              $('#txt_supplier').val(response.supplier);
              
              $('#txt_stock_date').val(response.date);
              $('#txt_car_number').val(response.car_number);

              $('#txt_quantity_received').val(response.quantity_received);
              $('#txt_production_date').val(response.production_date);
              $('#txt_expiry_date').val(response.expiry_date);
              $('#txt_receiver').val(response.receiver);

              $('#txt_cat_number').val(response.product_category_number);

              
              $("#myModal").modal("show");

              console.log(response.product_name);
              console.log(response.product_category);
              console.log(response.product_category_number);
                                                  
  
          } else {
              alert('Error');
  
              
          }
      }
  });
  
  });


$('#approve_warehouse_manager').submit(function () {
    var product_name = $('#txt_product_name').val();
    var product_category = $('#txt_cat_number').val();
    var expiry_date = $('#txt_expiry_date').val();
    var quantity_received = $('#txt_quantity_received').val();

    var hidden_text = $('#txt_hidden_text').val();  
   
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            product_name: product_name,
            product_category: product_category,
            expiry_date:expiry_date,
            quantity_received:quantity_received,
            hidden_text:hidden_text,
            approve_warehouse:''
        },
        success: function (response) {
            if (response.done == true) {
            $("#myModal").modal("hide");
            alert("Success");
            window.location.reload();

        } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
    });

    return false;

});


$("#select_product").change(function(){

var product_id = $(this).val();
$("#valid_id").val(product_id);

$.ajax({
    type: 'post',
    url: '../ajax.php',
    dataType: 'JSON',
    data: {
        product_id: product_id,
        find_product_cost: ''
    },
    success: function (response) {
        if (response.done == true) {
            $("#txt_quantity_avail").val(response.items_available);
            $("#txt_unit_price").val(response.unit_price);

        } else {
            alert('Error');

            $('.edit_response').html('<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' + response.data + '</div>');
        }
    }
});

})


$("#txt_quantity").keyup(function(){
    var entered_amount = $(this).val();
    var unit_cost = $("#txt_unit_price").val();

    var calculated_amount = (entered_amount*unit_cost);
    $("#txt_total").val(calculated_amount);
});

$("#txt_discount").keyup(function(){
    var discount_given = $(this).val();

    var entered_amount = $("#txt_quantity").val();
    var unit_cost = $("#txt_unit_price").val();

    var calculated_amount = (entered_amount*unit_cost);

    var discounted_amount = ((discount_given/100)*calculated_amount);
    var real_amount = calculated_amount-discounted_amount;
    $("#txt_total").val(real_amount);
});

$("#txt_customer_name").keyup(function(){
    var now_text = $(this).val();
    $("#customer_name").html(now_text);
})

$("#txt_amount_paid").keyup(function(){
    var get_total = $("#txt_total").val();
    var current_amount = $(this).val();

    if(get_total == current_amount){
        $("#btn_add_item").removeAttr('disabled');
    }else{
        $("btn_add_item").attr('disabled','disabled');
    }
})





$("#btn_add_item").on('click',function(){
    var item_description = $("#select_product :selected").text();
    var item_quantity = $("#txt_quantity").val();
    var item_price = $("#txt_unit_price").val();
    var total_amount = $("#txt_total").val();
    var selected_id = $("#valid_id").val();
    var discount_given = $("#txt_discount").val();
    var amount_paid = $("#txt_amount_paid").val();
    var inv_id = $("#product_invoice").text();
    var custo_name = $("#customer_name").text(); 

    if(discount_given == ""){
        var discount_given = 0;
    }

    rolling_number++;
    
 $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            item_description: item_description,
            button_id:rolling_number,
            item_quantity: item_quantity,
            item_price:item_price,
            total_amount:total_amount,
            selected_id:selected_id,
            discount_given:discount_given,
            amount_paid:amount_paid,
            inv_id:inv_id,
            custo_name:custo_name,
            add_transaction:''
        },
        success: function (response) {
            if (response.done == true) {        
                
                var insert_row_live = "<tr><td>"+item_description+"</td><td>"+item_quantity+"</td><td>"+item_price+"</td><td>"+total_amount+"</td></tr>";
                var insert_row = "<tr><td>"+item_description+"</td><td>"+item_quantity+"</td><td>"+item_price+"</td><td>"+total_amount+"</td><td><button class='del_trans_"+rolling_number+" btn btn-danger btn-md' id="+rolling_number+">Delete</button></td></tr>";
            
                $("#live_table_body").append(insert_row_live);
                $("#down_table_body").append(insert_row);
            
                if( typeof total_cost_array != "undefined"
                && total_cost_array != null
                && total_cost_array.length != null
                && total_cost_array.length > 0 &&
                typeof total_id_array != "undefined"
                && total_id_array != null
                && total_id_array.length != null
                && total_id_array.length > 0 &&
                typeof total_discount_array != "undefined"
                && total_discount_array != null
                && total_discount_array.length != null
                && total_discount_array.length > 0 &&
                typeof total_unit_cost_array != "undefined"
                && total_unit_cost_array != null
                && total_unit_cost_array.length != null
                && total_unit_cost_array.length > 0 &&
                typeof total_quantity_buying_array != "undefined"
                && total_quantity_buying_array != null
                && total_quantity_buying_array.length != null
                && total_quantity_buying_array.length > 0 &&
                typeof total_amount_pay_array != "undefined"
                && total_amount_pay_array != null
                && total_amount_pay_array.length != null
                && total_amount_pay_array.length > 0
            ){  
                total_discount_array.push(discount_given);
                total_id_array.push(selected_id);
                total_cost_array.push(total_amount);
                total_unit_cost_array.push(item_price);
                total_quantity_buying_array.push(item_quantity);
                total_amount_pay_array.push(amount_paid);
            
                }else{

                    total_discount_array = [];
                    total_id_array = [];
                    total_cost_array = [];
                    total_unit_cost_array = [];
                    total_quantity_buying_array = [];
                    total_amount_pay_array = [];
            
                    total_discount_array.push(discount_given);
                    total_id_array.push(selected_id);
                    total_cost_array.push(total_amount);
                    total_unit_cost_array.push(item_price);
                    total_quantity_buying_array.push(item_quantity);
                    total_amount_pay_array.push(amount_paid);
                }
            
                var new_total = 0;
                var new_discount = 0;
                var amount_pay = 0;
            
                for(var i = 0; i < total_cost_array.length; ++i) {
                     new_total += parseInt(total_cost_array[i]);
                }
            
                for(var i = 0; i < total_discount_array.length; ++i) {
                    new_discount += parseInt(total_discount_array[i]);
               }
            
               for(var i = 0; i < total_amount_pay_array.length; ++i) {
                amount_pay += parseInt(total_amount_pay_array[i]);
            }
            
               $(".txt_total_holder").html(new_total);
               $(".txt_discount_holder").html(new_discount);
               $(".txt_amount_paid_holder").html(amount_pay);
            
                $("#txt_quantity").val("");
                $("#txt_unit_price").val("");
                $("#txt_total").val("");
                $("#valid_id").val("");
                $("#txt_discount").val("");
                $("#txt_amount_paid").val("");
            
                $(".del_trans_"+rolling_number+"").bind('click',delete_item);
               
                $('#btn_add_item').attr('disabled','disabled');

                console.log('Success');
                console.log(new_discount);

        } else {
               alert("Items Are Less Than Quantity Remain");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
    });  

   

});


function delete_item(){
    alert('Removed');
    $(this).closest ('tr').remove();
    var item_id = $(this).attr('id');

    var transaction_id = $("#product_invoice").text();

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
           transaction_id:transaction_id,
           item_id:item_id,
           del_transaction_item:''
        },
        success: function (response) {
            if (response.done == true) {
                console.log(response);
                $('#btn_add_item').attr('disabled','disabled');

        } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
    }); 



    var item_to_be_deleted = 3+parseInt(item_id);

    removeLive(item_to_be_deleted);

    var item_index = item_id - 1;

    total_discount_array.splice(item_index);
    total_id_array.splice(item_index);
    total_cost_array.splice(item_index);
    total_unit_cost_array.splice(item_index);
    total_quantity_buying_array.splice(item_index);
    total_amount_pay_array.splice(item_index);

    var new_total = 0;
    var new_discount = 0;
    var amount_pay = 0;

    for(var i = 0; i < total_cost_array.length; ++i) {
         new_total += parseInt(total_cost_array[i]);
    }

    for(var i = 0; i < total_discount_array.length; ++i) {
        new_discount += parseInt(total_discount_array[i]);
   }

   for(var i = 0; i < total_amount_pay_array.length; ++i) {
    amount_pay += parseInt(total_amount_pay_array[i]);
}

   $(".txt_total_holder").html(new_total);
   $(".txt_discount_holder").html(new_discount);
   $(".txt_amount_paid_holder").html(amount_pay);


  
} 

function removeLive(item_id){
    console.log( $('table#live_table tr:nth-child('+parseInt(item_id)+')').remove() );
}
    

$('#delete_transaction').on('click',function(){

    var transaction_id = $("#product_invoice").text();

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
           transaction_id:transaction_id,
           del_transaction:''
        },
        success: function (response) {
            if (response.done == true) {
                window.location.reload();
                console.log(response);

        } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
    });  


});


$('#form_add_new_branch').submit(function () {
    
    var branch_name = $('#txt_branch_name').val();
    var branch_manager_email = $('#txt_branch_manager_email').val();
    var branch_manager_contact = $('#txt_branch_manager_contact').val();
    var branch_manager_user_name = $('#txt_branch_manager_user_name').val();
    var branch_manager_full_name = $('#txt_branch_manager_full_name').val();
    var branch_manager_pass = $('#txt_branch_manager_password').val();
    var branch_manager_pass_verify = $('#txt_verify_password').val();

    if(branch_manager_pass == branch_manager_pass_verify){
   
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            branch_name: branch_name,
            branch_manager_user_name: branch_manager_user_name,
            branch_manager_full_name:branch_manager_full_name,
            branch_manager_pass:branch_manager_pass,
            branch_manager_email:branch_manager_email,
            branch_manager_contact:branch_manager_contact,
            create_new_branch:''
        },
        success: function (response) {
            if (response.done == true) {
            alert("Success");
            window.location.reload();

        } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
    });

}else{

    alert("Passwords Do Not Match");
}

    return false;

});






/*      End           */



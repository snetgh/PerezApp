
<div id="global">
<div class="container-fluid">

                <div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">List Of Requests</div>
                            <div class="panel-body">
                            <table class="table" id="my_selected_table">
                                <thead>
                                    <tr>
                                        <th>Request ID</th>
                                        <th>Item Description</th>
                                        <th>Quantity Required</th>
                                        <th>Branch Requesting</th>
                                        <th>Item ID</th>
                                        <th>Target Branch</th>
                                        <th>Request Timestamp</th>
                                
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                   <?php  

                                   $my_branch_id = $_COOKIE['bi'];

                                    $get_request_query = mysqli_query($connection,"SELECT * FROM checked_branch_request_table JOIN system_branches ON checked_branch_request_table.receiving_branch = system_branches.system_branch_id");
                                    while ($get_each_request = mysqli_fetch_array($get_request_query)) { ?>      
                                        <tr>
                                            <th scope="row"><?php echo $get_each_request["request_id"]; ?></th>
                                            <td><?php echo $get_each_request["item_description"]; ?></td>
                                            <td><?php echo $get_each_request["quantity_required"]; ?></td>
                                            <td><?php echo $get_each_request["sending_branch"]; ?></td>
                                            <td><?php echo $get_each_request["item_id"]; ?></td>
                                            <td><?php echo $get_each_request["system_branch_name"]; ?></td>
                                            <td><?php echo $get_each_request["request_timestamp"]; ?></td>
                                            
                                        </tr>


                                  <?php  }  ?>
                                   
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
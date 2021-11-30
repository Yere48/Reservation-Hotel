<?php $this->load->view('backend/header');
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Management Data Room </h4>
                        <div class="toolbar">
                            <button class="btn btn-primary" onclick="additem()">
                                <span class="btn-label">
                                    <i class="material-icons">add</i>
                                </span> Add Room
                            </button>
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Room Type</th>
                                        <th>Room Number</th>
                                        <th>Room Flor</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($room as $room): ?> 
                                    <tr>
                                        <td><?php echo $no++; ?>.</td>
                                        <td><?php echo $room['room_type'] ?></td>
                                        <td><?php echo $room['room_number'] ?></td>
                                        <td><?php echo $room['floor'] ?></td>
                                        <td class="text-center">
                                            <button type="button" onclick="edit(<?php echo $room['roomID'] ?>)" style="width: 10px;" class="btn btn-warning btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" onclick="dell(<?php echo $room['roomID'] ?>)" style="width: 10px;" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
                                                <i class="material-icons">delete_forever</i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>

<!-- Classic Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
                <h4 class="modal-title" id="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="form" class="form-horizontal">
                    <div class="card-content">
                        <input type="hidden" id="roomID" name="roomID">
                        <div class="row">
                            <label style="margin-top: 25px;" class="col-sm-3 label-on-left">Room Type</label>
                            <div class="col-sm-9">
                                <div class="form-group label-floating is-empty">
                                    <select id="roomtypeID" name="roomtypeID" required class="selectpicker form-control" placeholder="Choose City" data-size="7">
                                        <option disabled value="">Chose Room Type</option>
                                        <?php foreach ($roomtype as $list): ?>
                                        <option value="<?php echo $list['roomtypeID']; ?>"><?php echo $list['room_type']; ?> </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label style="margin-top: 25px;" class="col-sm-3 label-on-left">Room Number</label>
                            <div class="col-sm-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="number" class="form-control" placeholder="Please fill this form" id="room_number" name="room_number" required="true" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label style="margin-top: 25px;" class="col-sm-3 label-on-left">Room Flor</label>
                            <div class="col-sm-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="number" class="form-control" placeholder="Please fill this form" id="floor" name="floor" required="true" >
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" class="btn btn-info btn-simple">Save</button>
                <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Cancle</button>
            </div>
        </div>
    </div>
</div>
<!--  End Modal -->

<?php $this->load->view('backend/footer');?>

<script type="text/javascript">
    $("#nav-text").html("Room Management");
    $("#menu-room").addClass("active");

    var saveMethod = "ADD";

    window.baseUrl = '<?php echo base_url(); ?>';

    $(document).ready(function() {
        demo.initFormExtendedDatetimepickers();
    });


    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });

    $("#btnSave").click(function() {
        $("#form").submit();
    });

    function setFormValidation(id) {
        $(id).validate({
            submitHandler: function() {
              simpan();
            },
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });
    }

    $(document).ready(function() {
        setFormValidation('#form');
    });

    function additem() {
        saveMethod = 'ADD';
        $("#myModal").modal();
        $('#form')[0].reset(); // reset form on modals
        $('#modal-title').text('Form Add Employe'); // Set Title to 
    }

    function simpan()
    {
        $('#btnSave').text('Saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable
        if (saveMethod=="ADD") {
            var url = "<?php echo site_url('room/ajax_add')?>";
        } else {
            var url = "<?php echo site_url('room/ajax_update')?>";
        }
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {

                if(data.status) //if success close modal and reload ajax table
                {
                  swal({
                    title: "Good job!",
                    text: "Data Success Full Saved",
                    type: "success",
                    timer: 2000,
                    showConfirmButton: false
                  });
                  setTimeout(function() {
                    location.reload();
                  }, 2000);
                }

                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              swal({
                title: "Good job!",
                text: "Data Failed to Save",
                type: "error",
                timer: 2000,
                showConfirmButton: false
              });
              $('#btnSave').text('Save'); //change button text
              $('#btnSave').attr('disabled',false); //set button enable 

            }
        });
    }

    function edit(id)
    {
        saveMethod="EDIT";
        $("#roomtypeID option[value='']").remove();
        $('#form')[0].reset(); // reset form on modals
       


        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('room/ajax_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('#roomID').val(data.roomID);
                $('#roomtypeID').val(data.roomtypeID);
                $('#room_number').val(data.room_number);
                $('#floor').val(data.floor);
                $('#modal-title').text('Form Edit Room');
                $("#myModal").modal();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function dell(id)
    {
        swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it',
            confirmButtonClass: "btn btn-success",
            cancelButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).then(function() {
            $.ajax({
              url : "<?php echo site_url('room/ajax_delete')?>/"+id,
              type: "POST",
              dataType: "JSON",
              success: function(data)
              {
                  swal({
                    title: 'Deleted!',
                    text: 'Your data has been deleted.',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 2000
                  })
                  location.reload();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  swal({
                      title: 'Cancelled',
                      text: 'Your data is safe :)',
                      type: 'error',
                      confirmButtonClass: "btn btn-info",
                      buttonsStyling: false
                  })
              }
          });
          
        }, function(dismiss) {
          // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
          if (dismiss === 'cancel') {
            swal({
              title: 'Cancelled',
              text: 'Your data is safe :)',
              type: 'error',
              confirmButtonClass: "btn btn-info",
              buttonsStyling: false
            })
          }
        })
    }
</script>
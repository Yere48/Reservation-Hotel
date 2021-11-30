<?php $this->load->view('backend/header');?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Management Data Employee </h4>
                        <div class="toolbar">
                            <button class="btn btn-primary" onclick="additem()">
                                <span class="btn-label">
                                    <i class="material-icons">add</i>
                                </span> Add Employee
                            </button>
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>NIP/<br>NIK</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Birthday</th>
                                        <th>Username</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($employee as $emp): ?> 
                                    <tr>
                                        <td><?php echo $no++; ?>.</td>
                                        <td><?php echo $emp['firstname'] ?> <?php echo $emp['lastname'] ?></td>
                                        <td><?php echo $emp['nip'] ?> <br><?php echo $emp['nik'] ?></td>
                                        <td><?php echo $emp['email'] ?></td>
                                        <td><?php echo $emp['phone'] ?></td>
                                        <td><?php echo date('d-m-Y',strtotime($emp['dateofbirth'])) ?></td>
                                        <td><?php echo $emp['username'] ?></td>
                                        <td class="text-center">
                                            <button type="button" onclick="edit(<?php echo $emp['employeeID'] ?>)" style="width: 10px;" class="btn btn-warning btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" onclick="dell(<?php echo $emp['employeeID'] ?>)" style="width: 10px;" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
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
                        <input type="hidden" id="employeeID" name="employeeID">
                        <div class="row">
                            <label style="margin-top: 25px;" class="col-sm-3 label-on-left">First Name</label>
                            <div class="col-sm-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Please fill this form" id="firstname" name="firstname" required="true" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label style="margin-top: 25px;" class="col-sm-3 label-on-left">Last Name</label>
                            <div class="col-sm-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Please fill this form" id="lastname" name="lastname" required="true" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label style="margin-top: 25px;" class="col-sm-3 label-on-left">NIP</label>
                            <div class="col-sm-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Please fill this form" id="nip" name="nip" required="true" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label style="margin-top: 25px;" class="col-sm-3 label-on-left">NIK</label>
                            <div class="col-sm-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Please fill this form" id="nik" name="nik" required="true" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label style="margin-top: 25px;" class="col-sm-3 label-on-left">email</label>
                            <div class="col-sm-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="email" class="form-control" placeholder="Please fill this form" id="email" name="email" required="true" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label style="margin-top: 25px;" class="col-sm-3 label-on-left">phone</label>
                            <div class="col-sm-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="number" class="form-control" placeholder="Please fill this form" id="phone" name="phone" required="true" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label style="margin-top: 25px;" class="col-sm-3 label-on-left">Birthday</label>
                            <div class="col-sm-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control datepicker" placeholder="Please fill this form" id="dateofbirth" name="dateofbirth" required="true" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label style="margin-top: 25px;" class="col-sm-3 label-on-left">Username</label>
                            <div class="col-sm-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Please insert your username" id="username" name="username" required="true" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label style="margin-top: 25px;" class="col-sm-3 label-on-left">Password</label>
                            <div class="col-sm-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Please insert your password" required="true" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label style="margin-top: 25px;" class="col-sm-3 label-on-left">Photo</label>
                            <div class="col-sm-9">
                                <input id="photo" name="photo" type="hidden">
                                <input style="margin-top:15px;" id="foto_file" name="file" type="file" multiple>
                            </div>
                            <div id="foto_file-preview"></div>                            
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
    $("#nav-text").html("Employee Management");
    $("#menu-employee").addClass("active");

    var saveMethod = "ADD";

    window.baseUrl = '<?php echo base_url(); ?>';

    $(document).ready(function() {
        demo.initFormExtendedDatetimepickers();
    });

    $(function () {
        'use strict';
        var url_foto = "<?php echo site_url('employee/upload_foto')?>";
        $('#foto_file').fileupload({
            url: url_foto,
            dataType: 'json',
            done: function (e, data) {
                window.foto = data.result.file;
                var imgPrev = '<img src="'+window.baseUrl+'/'+window.foto+'" style="margin-top: 20px;" width="300" />';
                $("#foto_file-preview").html(imgPrev);
                $("#photo").val(window.foto);
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
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
            var url = "<?php echo site_url('employee/ajax_add')?>";
        } else {
            var url = "<?php echo site_url('employee/ajax_update')?>";
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
        $("#password").attr("required", false);
        $('#form')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('employee/ajax_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('#employeeID').val(data.employeeID);
                $('#firstname').val(data.firstname);
                $('#lastname').val(data.lastname);
                $('#nip').val(data.nip);
                $('#nik').val(data.nik);
                $('#email').val(data.email);
                $('#phone').val(data.phone);
                $('#dateofbirth').val(todate(data.dateofbirth));
                $('#username').val(data.username);
                window.foto = data.photo;
                var imgPrev = '<img src="'+window.baseUrl+'/'+window.foto+'" style="margin-top: 20px;" width="300" />';
                $("#foto_file-preview").html(imgPrev);
                $("#photo").val(window.foto);
                $('#modal-title').text('Form Edit Employee');
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
              url : "<?php echo site_url('employee/ajax_delete')?>/"+id,
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

    function todate(thedate) {
        var parts =thedate.split('-');
        return parts[2]+'/'+parts[1]+'/'+parts[0];
    }
</script>
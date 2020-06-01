@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title m-0 text-dark">Roles</h1>
            </div>
        </div>
    </div>
</div>
    <!-- <h1 class="m-0 text-dark">Senseis</h1> -->
   @if(Session::has('message'))
      <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      {{Session::get('message')}}
      </div>
   @endif
@stop

@section('content')
    <div class="row">
        <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <div>
                <input type="submit" value="Create new Role" class="btn btn-success btn-sm float-left create_role">
            </div>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0" style="margin-top: 12px; ">
          <table class="table table-striped " id="role_table" style="width: 100%!important">
              <thead>
                  <tr>
                      <th >
                          #
                      </th>
                      <th >
                           Role Name
                      </th>
                      <th style="width: 15%;float: right;" >
                        Actions
                      </th>
                  </tr>
              </thead>
              <tbody class="user_list">
   
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
        </div>
    </div>

      <!-- View role modal open -->
      <div class="modal fade" id="role_modal">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #003e80;color: white;font-family: initial;">
              <h4 class="modal-title">View Role</h4>
            <!--   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
            </div>
            <div class="modal-body">
               <div class="form-group">
                <label for="inputEstimatedBudget">Name</label>
               <input type="text" name="role_name" class="form-control" id="role_name" disabled>
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Display Name</label>
                 <input type="text" name="display_name" class="form-control" id="display_name" disabled>
              </div>
             
            
            </div>
            <div class="modal-footer ">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <!-- Update role modal open -->
      <div class="modal fade" id="role_update_modal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header" style="    background-color: #17a2b8;color: aliceblue;font-family: initial;">
              <h4 class="modal-title">Update Role</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form >

               <div class="form-group">
                 {!! csrf_field() !!}
                <label for="inputEstimatedBudget">Name</label>
                <input type="text" name="display_name" class="form-control" id="dname" disabled>
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Display Name</label>
                
                  <input type="text" name="role_name" class="form-control" id="rname" >
                 <input type="hidden" name="r_id" class="form-control" id="r_id" disabled>
              </div>
              </form>
            </div>
            <div class="modal-footer ">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info save_update" >Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


     <!-- Create role modal open -->
      <div class="modal fade" id="role_create_modal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header" style="    background-color: #1e7e34;color: aliceblue;font-family: initial;">
              <h4 class="modal-title">Create Role</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                            <!-- form start -->
              <form role="form" id="quickForm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="displayname">Display Name</label>
                    <input type="text" name="displayname" class="form-control" id="displayname" placeholder="display name">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
            </div>
            <div class="modal-footer ">
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <!-- Delete role modal open -->
      <div class="modal fade" id="remove_modal">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #6f1b23;color: white;font-family: initial;">
              <h4 class="modal-title">Delete Role</h4>
            <!--   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
            </div>
            <div class="modal-body">
              Are you sure to delete this role :- <span name="rolename" id="rolename"></span>
              <input type="hidden" name="roleid" id="roleid">
            </div>
            <div class="modal-footer ">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@stop
  

  
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script>


$(document).ready(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    getList('roles/all', true);

    function getList(url, bindTable) {
        $.ajax({
            url:url,
            dataType:'json',
            success:function(res) {
                console.log(res)
               var trHtml='';
               var list = '';

               $.each(res, function (i, item) {
               trHtml +='<tr><td>'+'#'+'</td><td>'+ 
                item.display_name  +
                    '</td><td class="project-actions text-right ">'+
                        '  <a href="#" ><span class="btn btn-primary btn-sm view_role" data-dname='+item.display_name+' data-name='+item.name+' > <i class="fas fa-folder"></i>View</span></a>' + 
                        '   <a href="#" class="edit_role" data-id='+item.id+' data-name='+item.name+' data-dname='+item.display_name+'><span class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt"></i> Edit</span></a>' + 
                          '   <a href="#"  class="delete_role" data-removeid='+item.id+' data-rname='+item.name+'><span class="btn btn-danger btn-sm "> <i class="fas fa-trash"></i> Delete</span></a>'
                    +'</td></tr>'
               })

               $('.user_list').html(trHtml)
               // $('.senesei_list').append(list);

               if(bindTable) {
                  $("#role_table").DataTable({
                    "responsive": true,
                    "autoWidth": true,
                  });
               }


               
            }
        })
    }


    // View role
    $('body').on('click', '.view_role', function() {
        var name = $(this).attr("data-dname");
        var display_name = $(this).attr("data-name");

        $('#role_name').val(name);
        $('#display_name').val(display_name);
        
        $('#role_modal').modal('show')
    })


    // Open edit popup modal
    $('body').on('click', '.edit_role', function() {
        var name = $(this).attr("data-dname");
        var display_name = $(this).attr("data-name");
        var id = $(this).attr("data-id");

        $('#rname').val(name);
        $('#dname').val(display_name);
        $('#r_id').val(id);
        $('#role_update_modal').modal('show')

    })


    // Call update role api
    $('body').on('click', '.save_update', function() {
        var rname = $('#rname').val();
        var r_id = $('#r_id').val();
        var url = '/role/edit';
        var body = { id:r_id, name:rname};

        // ajax call for api
        $.ajax({
          type: "POST",
           headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: url,
          dataType: 'json',
          contentType: "application/json; charset=utf-8",
          data:JSON.stringify( body ),
            success:function(res) {
              // Hide modal
              $('#role_update_modal').modal('hide');
              // Fetch list
              getList('roles/all', false);

              // SHow success msg
              toastr.success('Success, ' + res.msg)   
            }
        });
    });

      // Open delete role modal
      $('body').on('click', '.delete_role', function() {
      var id = $(this).attr("data-removeid");
      var name = $(this).attr("data-rname");

        $('#rolename').val(name);
        $('#roleid').val(id);

        // Open modal
        $('#remove_modal').modal('show')
        
    });

    $('body').on('click', '.create_role', function() {
      $('#role_create_modal').modal('show');
    });

    $('body').on('click', '.create_new_role', function() {
      var name = $('#name').val();
      var dname = $('#dname').val();
      var url = '/role/edit';
      var body = { id:r_id, name:rname};

        // ajax call for api
        $.ajax({
          type: "POST",
           headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: url,
          dataType: 'json',
          contentType: "application/json; charset=utf-8",
          data:JSON.stringify( body ),
            success:function(res) {
              // Hide modal
              $('#role_update_modal').modal('hide');
              // Fetch list
              getList('roles/all', false);

              // SHow success msg
              toastr.success('Success, ' + res.msg)   
            }
        });

    });

  // Validate form fields
  $.validator.setDefaults({
    submitHandler: function () {
      var name = $('#name').val();
      var dname = $('#displayname').val();
      var body = { name:name, dname:dname};


      $.ajax({
        type: "POST",
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/role/create',
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        data:JSON.stringify( body ),
          success:function(res) {
            // Hide modal
            $('#role_create_modal').modal('hide');

            // Fetch list
            getList('roles/all', false);

            // SHow success msg
            toastr.success('Success, ' + res.msg)   
          }
      });
    }
  });
})



</script>


<script>
$(document).ready(function () {

  $('#quickForm').validate({
    rules: {
      name: {
        required: true,
        // name: true,
      },
      displayname: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      name: {
        required: "Please enter a name ",
        // name: "Please enter a vaild email address"
        minlength: "Your name must be at least 4 characters long"
      },
      displayname: {
        required: "Please enter a display name",
        minlength: "Your display name must be at least 4 characters long"
      }
      // terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>


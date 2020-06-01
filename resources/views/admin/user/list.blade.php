@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title m-0 text-dark">Users</h1>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <div>
                <input type="submit" value="Create new User" class="btn btn-success btn-sm float-left create_user">
            </div>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects" id="user_table" style="margin-top: 10px;">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 12%">
                          Team Members
                      </th>
                      <th style="width: 13%">
                           Name
                      </th>

                      <th>
                          Email
                      </th>
                      <th>
                          Organization
                      </th>
                      <th>
                          Role
                      </th>
                      <th style="width: 6%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
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
      <div class="modal fade" id="view_user_modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #003e80;color: white;font-family: initial;">
              <h4 class="modal-title">View User</h4>
            <!--   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
            </div>
            <div class="modal-body">
               <div class="form-group">
                <label for="inputEstimatedBudget">Name</label>
               <input type="text" name="name" class="form-control" id="name" disabled>
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Email</label>
                 <input type="text" name="useremail" class="form-control" id="useremail" disabled>
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Organization</label>
                 <input type="text" name="org_id" class="form-control" id="org_id" disabled>
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Role</label>
                 <input type="text" name="user_role_id" class="form-control" id="user_role_id" disabled>
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


      <!-- View role modal open -->
      <div class="modal fade" id="create_user_modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #003e80;color: white;font-family: initial;">
              <h4 class="modal-title">Create New User</h4>
            <!--   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
            </div>
            <div class="modal-body">
               <div class="form-group">
                <label for="inputEstimatedBudget">Name</label>
               <input type="text" name="name" class="form-control" id="name" >
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Email</label>
                 <input type="text" name="useremail" class="form-control" id="useremail" >
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Organization</label>
                 <input type="text" name="org_id" class="form-control" id="org_id" >
              </div>
                <div class="form-group">
                  <label>Roles</label>
                  <select name="user_role_id" class="form-control select2bs4 user_roles" style="width: 100%;"  id="user_role_id">
                  </select>
                </div>
            </div>
            <div class="modal-footer ">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info" data-dismiss="modal">Create</button>
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
    getList('users/all');
    getRoles('roles/all');


    function getRoles(url) {
       $.ajax({
          url:url,
          dataType:'json',
          success:function(res) {
            var list = '';
            $.each(res, function (i, item) {
                    list +='<option> '+ item.display_name  +'</option>'
               });

            $('.user_roles').append(list);
          }
       })
    }



    function getList(url) {
        $.ajax({
            url:url,
            dataType:'json',
            success:function(res) {
                console.log(res)
               var trHtml='';
               var list = '';

               $.each(res, function (i, item) {
               trHtml +='<tr><td>'+'#'+'</td><td>'+((item.user_img && item.user_img!=null) ?' <img src='+(item.user_img) + ' class="img-circle" style="width:50px"/>' : ' <img src="https://adminlte.io/themes/v3/dist/img/avatar3.png" class="img-circle" style="width:50px"/>')+'</td><td>'+ 
                item.name  +'</td><td>'+item.email+'</td><td>'+(item.org_id ? item.org_id : '---')+'</td><td>'+
                    (item.role_id ? item.role_id : '---')+'</td><td>'+(item.status=='active' ? '<span class="label info">active</span>' : '<span class="label danger">in-active</span>')+
                    '</td><td class="project-actions text-right">'+
                        '  <a href="#" class="view_user" data-name='+item.name+' data-email='+item.email+' data-org='+item.org_id+' data-role='+item.role_id+'><span class="btn btn-primary btn-sm "> <i class="fas fa-folder"></i> View</span></a>' + 
                        '   <a href="/admin/sensei/details/'+item.m_id+'"><span class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt"></i> Edit</span></a>' + 
                          '   <a href="/admin/sensei/details/'+item.m_id+'"><span class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> Delete</span></a>'
                    +'</td></tr>'
               })

               $('.user_list').html(trHtml)

                $("#user_table").DataTable({
                  "responsive": true,
                  "autoWidth": true,
                });

               
            }
        })
    }



    // $('body').on('click', '.past_meeting', function() {
    //     alert('working')
    // })

    $('body').on('click', '.view_user', function() {
      var name = $(this).attr('data-name');
      var email = $(this).attr('data-email');
      var org_id = $(this).attr('data-org');
      var role_id = $(this).attr('data-role');

      $('#name').val(name);
      $('#useremail').val(email);
      $('#org_id').val(org_id);
      $('#user_role_id').val(role_id);


        $('#view_user_modal').modal('show')
    })

    $('body').on('click', '.create_user', function() {
        $('#create_user_modal').modal('show')
        
    })
})

</script>

<script type="text/javascript">
  $(document).ready(function() {
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
  })
</script>
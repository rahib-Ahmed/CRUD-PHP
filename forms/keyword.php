xz<?php
session_start();
$Fullname=$_SESSION["Fullname"];
$RegDateTime=$_SESSION["RegDateTime"];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | General Form Elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <script>
	  $(document).ready(function()
					   {
		 getcategory(); 
		  gettable();
	  });
	  function SaveForm(){
		  var FormHasError=false;
		  var Keyword=$('#Keyword').val();
		  var Catname=$('#ddlCategory').val();
		  
		  if(Keyword.length==0){
			$('#hard').addClass('form-group has-error');
			  FormHasError=true;
		  }
		  if(Keyword.length>0){
			  $('#hard').removeClass();
				$('#hard').addClass('form-group');
		  }
		  if(FormHasError==false)
			{
				$.ajax({
					type:'POST',
					url:'../1library/databasegateway/gatewaykey.php',
					data:{Keyword: Keyword,Catname:Catname},
					dataType:"JSON",
					beforeSend: function()
					{
						$('#day').fadeIn(0);
					},
					success: function(data)
					{
						$('#day').html(data[0].Message);
						$('#day').addClass('alert alert-success');
						$('#day').fadeOut(3000);
						
						$('#Keyword').val('');
						$('#ddlCategory').val('');
					},
					error:function(err)
					{
						$('#day').html(err);
						$('#day').addClass('alert alert-danger');
						$('#day').fadeOut(3000);
					}
				});		
			}
	  }
	 
	  function getcategory()
	  {
		   
		  $.ajax({
			  type:'POST',
			  url:'../1library/getcategorydropdowngateway/getcategory.php',
			  dataType:'JSON',
			  success:function(data)
			  {
				  var items="";
				  for(var i=0;i<data.length;i++)
					  {
						  var ID=data[0].Row.ID;
						  var CategoryName=data[i].Row.CategoryName;
						  items=items+"<option value="+ID+">"+CategoryName+"</option>";
					  }
				  $('#ddlCategory').append(items);
				  console.log(items);
			  },
			  error:function(err)
			  {
				  console.log(err);
			  }
			  
		  });
	 }
	  function gettable()
	  {
		  $.ajax(
		  {
			  type:'POST',
			  url:'../1library/tablegateway/keytable.php',
			  
			  success:function(data)
			  {
				  $('#TblCat').html(data);
				  
			  },
			  error:function(err)
			  {
				  console.log(err);
			  } 
		  });
	  }
	    function Active(ID)
	  {
		  //console.log("Active");
      $.ajax({
          type:'POST',
          url:'../1library/actiongateway/keyword/active.php',
          data:{ID: ID},
          dataType:'JSON',
          success: function(data)
          {
           //Showallrecord();
          },
          error: function(err)
          {
            console.log(err);
          }
      });
	  }
	   function inactive(ID)
	  {
		  //console.log("inactive");
		   $.ajax({
          type:'POST',
          url:'../1library/actiongateway/keyword/inactive.php',
          data:{ID: ID},
          dataType:'JSON',
          success: function(data)
          {
           Showallrecord();
          },
          error: function(err)
          {
            console.log(err);
          }
      });
	  }
	   function EditRecord(ID)
	  {
		  //console.log("editRecord");
	  }
	   function DeleteRecord(ID)
	  {
		 // console.log("deleteRecord");
		  	   $.ajax({
          type:'POST',
          url:'../1library/actiongateway/keyword/delete.php',
          data:{ID: ID},
          dataType:'JSON',
          success: function(data)
          {
           Showallrecord();
          },
          error: function(err)
          {
            console.log(err);
          }
      });
	  }
	</script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php
	include("../1dashboard/mainheader.php");
	?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php
	include("../1dashboard/mainsidebar.php");
	?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Keyword Form</h3>
            </div>
           <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="postform" method="post">
              <div class="box-body">
                  <div class="form-group" id="hard">
                  <label for="" class="col-sm-2 control-label">Keyword</label>

                  <div  class="col-sm-10">
                    <input type="text" class="form-control"  name="Keyword" id="Keyword" placeholder="Category Description">
                  </div>
                </div>
                 <div class="form-group" id="">
                  <label for="" class="col-sm-2 control-label">Select Category</label>

                  <div  class="col-sm-10">
                    <select  class="form-control" id="ddlCategory">
                    <option value="">Select Category</option>
                    </select>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input id="btnCancel" type="button" class="btn btn-default" value="Cancel">
                <input id="btnSave" type="button" class="btn btn-info pull-right" value="Save" onClick="SaveForm()">
              </div>
              <div id="day">
              	
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
       
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
      <div class="row">
   	 <div class="col-md-12">
    	 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SNo</th>
                  <th>Keyword</th>
                  <th>CatID</th>
                  <th>Action</th>
                  <th>statusID</th>	
                </tr>
                </thead>
                <tbody id="TblCat">
               
                </tbody>
                <tfoot>
                <tr>
                  <th>SNo</th>
                  <th>Keyword</th>
                  <th>CatID</th>
                  <th>Action</th>
                  <th>statusID</th>	
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>  
	</div>
      <!-- /.row -->
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
	include("../1dashboard/footer.php");
	?>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
	include("../1dashboard/footer.php");
	?>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>			
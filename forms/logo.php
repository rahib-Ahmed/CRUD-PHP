<?php
session_start();
$Fullname=$_SESSION["Fullname"];
$RegDateTime=$_SESSION["RegDateTime"];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">
	  $(document).ready( function()
					   {
		  Showallrecord();
		 
	  });
	  
	  	function InsertRecord()
	  	{
			//console.log("Hello");
			
			var FormHasError=false;
			var  logN=$('#logN').val();
			var  logIcon=$('#logIcon').val();
			var  logLink=$('#logLink').val();
			//console.log(RollNo);
			if(logN.length==0)
			{
				$('#trying').addClass('form-group has-error');
				FormHasError=true;
				
			}
			if(logN.length>0)
			{
				$('#trying').removeClass();
				$('#trying').addClass('form-group');
			}
			var status=0;	// Write validationcode for all Controls
		if(FormHasError==false)
			{
				$.ajax({
					type:'POST',
					url:'../1library/databasegateway/gatewaylogo.php	',
					data:{logN:logN,logIcon:logIcon,logLink:logLink},
					dataType:"JSON",
					beforeSend: function()
					{
						$('#Res').fadeIn(0);
					},
					success: function(data)
					{
						$('#Res').html(data[0].Message);
						$('#Res').addClass('alert alert-success');
						$('#Res').fadeOut(3000);
						
						$('#logN').val('');
						$('#logIcon').val('');
						$('#logLink').val('');
					},
					error:function(err)
					{
						console.log(err);
						$('#Res').html(err);
						$('#Res').addClass('alert alert-danger');
						$('#Res').fadeOut(3000);
					}
					
				});		
			}
			
		}
	  function Showallrecord()
	  {
		  $.ajax({
			  type:'POST',
			  url:'../1library/tablegateway/logotable.php',
			  
			  success:function(data)
			  {
				  $('#TblCat').html(data);
				  
			  },
			  error:function(err)
			  {
				  console.log(err);
			  }
			  
			  
		  });	``
	  }
	 
	  function Active(ID)
	  {
		  //console.log("Active");
      $.ajax({
          type:'POST',
          url:'../1library/actiongateway/logo/active.php',
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
	   function inactive(ID)
	  {
		  //console.log("inactive");
		   $.ajax({
          type:'POST',
          url:'../1library/actiongateway/logo/inactive.php',
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
          url:'../1library/actiongateway/logo/delete.php',
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
              <h3 class="box-title">Logo Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="frmCategoryAdd" method="post" action="">
              <div class="box-body">
                <div class="form-group" id="trying">
                  <label for="" class="col-sm-2 control-label">Logo Name</label>

                  <div  class="col-sm-10">
                    <input type="text" class="form-control" name="logN" id="logN" placeholder="Enter Category Name">
                  </div>
                </div>
                <div class="form-group" id="hard">
                  <label for="" class="col-sm-2 control-label">Logo Icon</label>

                  <div  class="col-sm-10">
                    <input type="file" class="form-control"  name="logIcon" id="logIcon" placeholder="Category Description">
                  </div>
                </div>
                  <div class="form-group" id="hard">
                  <label for="" class="col-sm-2 control-label">Logo link</label>

                  <div  class="col-sm-10">
                    <input type="url" class="form-control"  name="logLink" id="logLink" placeholder="Category Description">
                  </div>
                </div>
                
                
                 
              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input id="btnCancel" type="button" class="btn btn-default" value="Cancel">
                <input id="btnSave" type="button" class="btn btn-info pull-right" value="Save" onClick="InsertRecord()">
              </div>
             	<div id="Res"></div>	
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
        
          <!-- /.box -->
        </div>
      
      </div>
     
      
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
                  <th>Logoname</th>
                  <th>LogoIcon</th>
                  <th>LogoLink</th>
                  <th>Action</th>
                  <th>StatusID</th>	
                </tr>
                </thead>
                <tbody id="TblCat">
               
                </tbody>
                <tfoot>
               
                <tr>
                  <th>SNo</th>
                  <th>Logoname</th>
                  <th>LogoIcon</th>
                  <th>LogoLink</th>
                   <th>Action</th>
                  <th>StatusID</th>	
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
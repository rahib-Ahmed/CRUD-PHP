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
      
  
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"></script>
  
  <script>
	 		 $(document).ready(function()
			{
	//			 getKeywordID();
		    showAllrecord();
				 getCategory();
				 showAllrecordAdmin();
	//	    getCategoryID();
	    });
            
	  //data table of user comments ------->
     function showAllrecord()
     {
		    $.ajax(
        {
			  type:'POST',
			  url:'../1library/tablegateway/commenttable.php',
			  success:function(data)
			  {
				  $('#tblCategory').html(data);
			  },
			  error: function(err)
			  {
				  console.log(err);
			  }
		    });
	  }
	  
	  //data table for admin  panel 
	  function showAllrecordAdmin()
     {
		    $.ajax(
        {
			  type:'POST',
			  url:'../1library/tablegateway/admincomment.php',
			  success:function(data)
			  {
				  $('#tblCategoryadmin').html(data);
			  },
			  error: function(err)
			  {
				  console.log(err);
			  }
		    });
	  }
	  //insert record of user comment ------>
	  function InsertRecordAdmin()
	  {
		  var formhaserror=false;
		  var Comment=$('#Comment').val();
		  
			  if(Comment.length==0)
			{
				$('#trying').addClass('form-group has-error');
				formhaserror=true;
				
			}
			if(Comment.length>0)
			{
				$('#trying').removeClass();
				$('#trying').addClass('form-group');
			};
		  var UserID=$('#UserID').val();
		  
		  if(formhaserror=false);
		  {
			  $.ajax({
				  type:'POST',
					url:'../1library/databasegateway/adminreply.php',
					data:{UserID:UserID,Comment:Comment},
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
						
						$('#catname').val('');
						$('#catdescript').val('');
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
	  //drop down of user comment in admin panel ------->
	 function getCategory()
	  {
		  $.ajax({
			  type:'POST',
			  url:'../1library/getcategorydropdowngateway/getusercomment.php',
			  dataType:'JSON',
			  success:function(data)
			  {
				  var items="";
				  for(var i=0;i<data.length;i++)
					  {
						  var ID=data[i].Row.ID;
						  var UserName=data[i].Row.UserName;
						  items=items+"<option value="+ID+">"+UserName+"</option>";
					  }
				  $('#UserID').append(items);
				  console.log(items);
			  },
			  error:function(err)
			  {
				  console.log(err);
			  }
			  
		  });
	  }
	  //action of user comments ------->
	  function Active(ID)
	  {
		  //console.log("Active");
      $.ajax({
          type:'POST',
          url:'../1library/actiongateway/comment/active.php',
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
          url:'../1library/actiongateway/comment/inactive.php',
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
	   function EditRecord(ID)
	  {
		  //console.log("editRecord");
	  }
	   function DeleteRecord(ID)
	  {
		 // console.log("deleteRecord");
		  	   $.ajax({
          type:'POST',
          url:'../1library/actiongateway/comment/delete.php',
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
	  //action of admin reply ------->
	  
	  
	  
	    function Activea(ID)
	  {
		  //console.log("Active");
      $.ajax({
          type:'POST',
          url:'../1library/actiongateway/admincomment/active.php',
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
	   function inactivea(ID)
	  {
		  //console.log("inactive");
		   $.ajax({
          type:'POST',
          url:'../1library/actiongateway/admincomment/inactive.php',
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
	   function EditRecorda(ID)
	  {
		  //console.log("editRecord");
	  }
	   function DeleteRecorda(ID)
	  {
		 // console.log("deleteRecord");
		  	   $.ajax({
          type:'POST',
          url:'../1library/actiongateway/admincomment/delete.php',
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
<a href=""
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
          
          <!-- /.box -->
          <!-- general form elements disabled -->
          <div class="row">
   	 <div class="col-md-12">
    	 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table - Comments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No.</th>
                  <th>UserName</th>
                  <th>Comment</th>
                  <th>Email</th>
                  <th>CreatedDateTime</th>
                  <th>Action</th>
                  <th>StatusID</th>
                  
                 </tr>
                </thead>
                <tbody id="tblCategory"> 
                
                  
                </tbody>
                <tfoot>
               <tr>
                  <th>S.No.</th>
                  <th>UserName</th>
                  <th>Comment</th>
                  <th>Email</th>
                  <th>CreatedDateTime</th>
                  <th>Action</th>
                  <th>StatusID</th>
                  
                 </tr>
                </tfoot>
              </table>
            </div>
            
            <!-- /.box-body -->
          </div>
          <form class="form-horizontal" id="frmCategoryAdd" method="post" action="">
             <div style="padding-right: 120px" class="box">
               <br>
<br>
                 <div class="form-group" id="">
                  <label for="" class="col-sm-2 control-label">Select User :</label>

                  <div  class="col-sm-10">
                    <select  class="form-control" id="UserID">
                    <option value="">Select User</option>
                    </select>
                  </div>
                </div>

                <div class="form-group" id="trying">
                  <label for="" class="col-sm-2 control-label">Comment : </label>

                  <div  class="col-sm-10">
                    <input type="text" class="form-control" name="Comment" id="Comment" placeholder="Leave a Reply Here">
                  </div>
                  <div style="padding-top: 50px; padding-right: 15px">
                  <input id="btnSave" type="button" class="btn btn-info pull-right" value="Save" onClick="InsertRecordAdmin()">
                  
                  </div>
                  <div id="Res"></div>
                  
<br>
<br>
<br>

                </div>
                </div>
            
                
                </form>
                <div class="box">
                 <div class="box-header">
              <h3 class="box-title">Data Table -Admin Comments</h3>
            </div>
                <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No.</th>
                  <th>UserID</th>
                  <th>Comment</th>
                  
                  <th>CreatedDateTime</th>
                  <th>Action</th>
                  <th>StatusID</th>
                  
                 </tr>
                </thead>
                <tbody id="tblCategoryadmin"> 
                
                  
                </tbody>
                <tfoot>
               <tr>
                  <th>S.No.</th>
                  <th>UserID</th>
                  <th>Comment</th>
                  
                  <th>CreatedDateTime</th>
                  <th>Action</th>
                  <th>StatusID</th>
                  
                 </tr>
                </tfoot>
              </table>
            </div>
            </div>
          <!-- /.box -->
        </div>
        
        
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
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
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!--
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script src="src/bootstrap-wysihtml5.js"></script>
-->

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('Descript');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
 
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
 <!--<script>
	 $(function(){
                        CKEDITOR.replace( 'descript' );
	  
	  $(".descript").wysihtml5();
	 });
                </script>-->
</body>
</html>
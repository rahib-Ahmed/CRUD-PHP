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
				 getKeywordID();
		    showAllrecord();
		    getCategoryID();
	    });
            
	  
     function showAllrecord()
     {
		    $.ajax(
        {
			  type:'POST',
			  url:'../1library/tablegateway/posttable.php',
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
	  function getCategoryID()
    {
		  $.ajax(
        {
			  type:"POST",
			  url:"../1library/getcategorydropdowngateway/getcategory.php",
			  dataType:"JSON",
			  
			  success:function(data)
			  {
				  var items="";
				  for(var i=0;i<data.length;i++)
          {
					  var ID=data[i].Row.ID;
					  var CategoryName=data[i].Row.CategoryName;
					  items=items+"<option value="+ID+">"+CategoryName+"</option>";
				  }
				  $('#ddlCategoryName').append(items);
				  console.log(items);
			  },
			  error:function(err)
        {
				 // console.log("error"+err);
			  }
			  
				
		    });
    }
	  function getKeywordID()
	  {
		   $.ajax(
        {
			  type:"POST",
			  url:"../1library/getcategorydropdowngateway/getcatkey.php",
			  dataType:"JSON",
			  
			  success:function(data)
			  {
				  var items="";
				  for(var i=0;i<data.length;i++)
          {
					  var ID=data[i].Row.ID;
					  var CategoryName=data[i].Row.Keyword;
					  items=items+"<option value="+ID+">"+CategoryName+"</option>";
				  }
				  $('#ddlKeyword').append(items);
				  console.log(items);
			  },
			  error:function(err)
        {
				  console.log("error"+err);
			  }
			  
				
		    });
	  }
    
	 function Save()
	  {
		  var FormHasError=false;
		  var title=$('#Title').val();
		  //console.log(title);

      var category=$('#ddlCategoryName option:selected').val();
		 // console.log(category);
      var key=$('#ddlKeyword option:selected').val();
		  //console.log(key);
		  var thumbnail=$('#Thumb').val();
		  var ThumbnailFile = $('#Thumb')[0].files[0];
		  var des=CKEDITOR.instances.Descript.getData();
		  var Postdate="";
      if(title.length==0 || category.length==0)
	  	  {
			$('#something').addClass('form-group has-error');
			  FormHasError=true;
		  }
		  if(title.length>0 && category.length>0)
		  {
			  $('#something').removeClass();
				$('#something').addClass('form-group');
		  }
		  
		  //var Description=CKEDITOR.instances.descript.getData();
		  /*if(Description.length==0)
			  {
				  $('#boo').addClass('form-group has-error');
			  FormHasError=true;
			  }
		  else{
			  $('#boo').removeClass();
				$('#boo').addClass('form-group');*/
		  
		  var statusID=0;
		  if(FormHasError==false)
			{
				var FD= new FormData();
				FD.append('title',title);
				FD.append('category',category);
				FD.append('key',key);
				FD.append('thumbnail',thumbnail);
				FD.append('des',des);
				FD.append('statusID',statusID);
				FD.append('F1',ThumbnailFile);
				FD.append('Postdate',Postdate);
				
				$.ajax({
					type:'POST',
					url:'../1library/databasegateway/postgateway.php',
					data:FD,
					contentType:false,
					processData:false,
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
						
						$('#Title').val('');
						$('#ddlCategoryName').val('');
						$('#ddlKeyword').val('');
						
						$('#Thumb').val('');
						$('#Descript').val('');
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
	  function Active(ID)
	  {
		  //console.log("Active");
      $.ajax({
          type:'POST',
          url:'../1library/actiongateway/post/active.php',
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
          url:'../1library/actiongateway/post/inactive.php',
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
          url:'../1library/actiongateway/post/delete.php',
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
              <h3 class="box-title">Post Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="postform" method="post">
              <div class="box-body">
                <div class="form-group" id="something">
                  <label for="" class="col-sm-2 control-label">Title</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="Title" name="Title" placeholder="Enter Title">
                  </div>
                  <label for="" class="col-sm-2 control-label">Select Category</label>
                <div class="col-sm-4">
                     	<select class="form-control" id="ddlCategoryName">
                  		<option value="">Select Category</option>
                  	</select>
                  </div>

                
                  
                </div>
               
               <div class="form-group" id="glass">
                   <label for="" class="col-sm-2 control-label">Keyword</label>
                <div class="col-sm-4">
                     	<select class="form-control" id="ddlKeyword">
                  		<option value="">Select Keyword</option>
                  	</select>
                  </div>
                  
                   <label for="" class="col-sm-2 control-label">Thumbnails</label>
                  
                  <div class="col-sm-4">
                    <input type="file" class="form-control" id="Thumb" name="Thumb" placeholder="Drop Thumbnail">
                  </div>
                  
                  </div>
                  
                  <div id="boo" class="form-group">
                 
                    <label for="" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-9">
					  <textarea rows="10" cols="30"  class="form-control" id="Descript" name="Descript" rows="60" cols="90" placeholder="Description Here"></textarea>
                  </div>
                  
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input id="btnCancel" type="button" class="btn btn-default" value="Cancel">
                <input id="btnSave" type="button" class="btn btn-info pull-right" value="Save" onClick="Save()">
              </div>
              <div id="day">
              	
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
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
                  <th>S.No.</th>
                  <th>Title</th>
                  <th>Category Name</th>
                  <th>Keyword Name</th>
                  <th>Thumbnails</th>
                  <th>Description</th>
                  <th>Action</th>
                  <th>StatusID</th>
                 </tr>
                </thead>
                <tbody id="tblCategory"> 
                
                  
                </tbody>
                <tfoot>
               <tr>
                  <th>S.No.</th>
                  <th>Title</th>
                  <th>Category Name</th>
                  <th>Keyword Name</th>
                  <th>Thumbnails</th>
                  <th>Description</th>
                  <th>Action</th>
                  <th>StatusID</th>
                 </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
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
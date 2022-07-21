<?php 
session_start();
require "../../koneksi.php";
if (!isset($_SESSION["login"]) || $_SESSION['user'] != 'admin') {
  header("Location: ".base_url."login.php");
  exit;
}
?>
<div class="row"> 
	<div id="isitabeluser">
		<div class="col-sm-12">      	
		<h1 class="text-center">Data user</h1>
		<br><br>
		<div class="row btntambah">
			<div class="col-sm-2">
				
			</div>
		</div>
        <table class="table table-hover table-bordered" id="dataku">
		  <thead>
		  	<tr>
		  		<th>id</th>
		  		<th>nilai</th>
	      
		  	
		  	</tr>
		  </thead>

		  <tbody>
		  	<?php 
		  	$no=1;
		  	$query = "SELECT * FROM tbl_score";

		  	$result = mysqli_query($con, $query);
		  
		  	
		  	while ($row=mysqli_fetch_assoc($result)
		  		  ) : ?>

		  	<tr>
		  		<td><?=$row['id'] ?></td>
		  		<td><?=$row['score'] ?></td>
           
		  	</tr>
		  
		  <?php endwhile; ?>
		  </tbody>
		</table>
      </div>
	</div>             
      

</div>



      <div class="modal-footer">

        
        
      </div>
    </div>
  </div>
</div>
<!-- end modal tambahuser -->

<script>
$(document).ready(function() {
	$("#dataku").dataTable({

	  	"order": [],
    	"columnDefs": [ {
	      "defaultContent": "-",
	      "targets"  : 'no-sort',
	      "targets": "_all",
	      "orderable": false,
	    }]

	});


});

  function edit_user(id) {
    $('#isi_edituser').load('ajax/edit_user.php?id='+id);
  }


  function hapus_user(id) {
     swal({
      title: "Yakin akan menghapus User??",
      text: "Data akan hilang jika dihapus!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel please!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        $.ajax({
            url : "ajax/hapus_user.php",
            type: "POST",
            data: {id:id},
            success: function(data){
                swal("Deleted!", "Data has been deleted.", "success");
                $('#isitabeluser').load('ajax/isitabeluser.php');
            },
            error: function (jqXHR, textStatus, errorThrown){
                swal("Error !", "Error deleting data", "error");
            }
        });
        
      } else {
        swal("Cancelled", "oke.. data user masih aman :)", "error");
      }
    });
  }
 


  function saving_tambah_user(){
  	var url = "ajax/tambah_user.php";
        var formData = new FormData($('#form_tambah_user')[0]);
        if ($('#username').val()=='' || $('#password').val()=='') {
        	$('#tambah_user').modal('hide');
        	swal("Warning !", "Isi dulu bro semuanya", "error");
        }else{
	        	$.ajax({
	            url : url,
	            type: "POST",
	            data: formData,
	            contentType: false,
	            processData: false,
	            dataType: "JSON",
	            success: function(data)
	            {

	                if(data.status) //if success
	                {
	                    
	                    $('#tambah_user').modal('hide');
	                    swal("Success!", "Successfully Added", "success");
	                    $('#isitabeluser').load('ajax/isitabeluser.php');
	                                        
	                }

	               
	                
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                swal("Error !", "Error added data", "error");
	                
	            }
	            
	        });
        }
        
  }
 
  function saving_user() {
    var url = "ajax/ubah_user.php";
        var formData = new FormData($('#form_edit_user')[0]);
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data)
            {

                if(data.status) //if success
                {
                    
                    $('#user_edit').modal('hide');
                    swal("Success!", "Successfully edit", "success");
                    $('#isitabeluser').load('ajax/isitabeluser.php');
                                        
                }

               
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Error !", "Error edit data", "error");
                
            }
            
        });

  }

</script>
<style type="text/css">
	.footer {
		text-align: center; 
		font-family: arial, sans-serif; 
		color: grey; 
		font-size: 15px;
		background-color: rgb(34, 34, 34);
	}
</style>

<!-- footer -->
<div class="row">
	<div class="col footer pt-2">
	    <p>Copyright &copy; <?php echo date('Y'); ?>.All Rights Reserved  | Designed by SOLVE:X Techonolgies Limited</p>
	</div>
</div>

  <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){

      //hide showresult div
      $('#showresult').hide();

      $('#search').keyup(function(){
       //get search box value
      var searchdata =$('#search').val();

      //send search data to search.php using $.ajax()
      $.ajax({
        url: "search.php",
        type: "post",
        data: "data="+searchdata,
        success: function(response){
          $('#showresult').show();
          $('#showresult').html(response);
        }
      });

      });
      //hide the showmember div
      $('#search').blur(function(){
          $('#showresult').hide();
        
      });

    });
  </script>

<?php 
  ob_flush(); //Flush (send) the output buffer
?>
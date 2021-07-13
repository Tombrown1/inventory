 
 
 <!-- FOOTER -->
 <footer> 
      <!-- <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2021 Arecent Solutions, inc. &middot; <a href="#">www.tombrowngodwin.com</a> &middot; <a href="#">Terms</a></p>
      </footer> -->   
 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')</script> -->
    <!-- <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script> -->
      <script src="../assets/jquery/cdn.jsdelivr.net_npm_jquery@3.2_dist_jquery.min"></script>
      <script src="../assets/js/cdnjs.cloudflare_ajax_lib.min.js"></script>
     <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../assets/jquery/bootstrap.min.js"></script>

    <script>
      // Edit of Supplier Form
      $(document).ready(function(){
        $('.editbtn').on('click', function() {
          $('#editsup').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            $('#sup_id').val(data[0]);
            $('#sup_name').val(data[1]);
            $('#sup_comp').val(data[2]);
            $('#phone').val(data[3]);
            $('#address').val(data[4]);
        });
      });

      </script>
      <script>
       // Delete  Supplier Modal Form
       $(document).ready(function(){
        $('.deletebtn').on('click', function() {
          $('#deletesup').modal('show');

          $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_id').val(data[0]);
           
        });
      });

      </script>

       <script>
      //Edit of Product Form
      $(document).ready(function(){
        $('.editprd').on('click', function() {
          $('#editprod').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();


          //console.log(data);            
          $('#prod_id').val(data[0]);     
          $('$prod_name').val(data[1]);
          $('#quantity').val(data[2]);
          $('#measurement').val(data[3]);
          $('$original_price').val(data[4])
          $('#price').val(data[5]);
          $('#selling_price').val(data[6]);
          $('$supplier').val(data[7]);
        });
      });
     
    </script>
    
     <!-- Copyright -->
     
  <!-- <div class="text-center p-3" style="background-color: #17a2b8; ">
    © 2020 Copyright:
    <a class="text-light" href="#">tombrowngodwin.com</a>
  </div> -->
  <!-- Copyright -->
</footer>
</body>
</html>


  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
  <script src="../js/Chart.roundedBarCharts.js"></script>
  <script src="../js/custom.js"></script>
  
  <!-- End custom js for this page-->
  

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script type="text/javascript">
	function PrintPage() {
         window.print();

         var residentID = $('#searchddl').val();
                var category = $('#select').val();
                        
                $.ajax({
                        url: "../code/printcode.php",
                        type: 'POST',
                        data: {
                            "printindigencyBTN": true,
                            "residentID": residentID,
                            "purpose": category,
                        },
                        success: function(response) {
                            
                        }
                })
        // Swal.fire({
        // title: 'Are you sure?',
        // text: "You won't be able to revert this!",
        // icon: 'warning',
        // showCancelButton: true,
        // confirmButtonColor: '#3085d6',
        // cancelButtonColor: '#d33',
        // confirmButtonText: 'Yes, print it!'
        // }).then((result) => {
            
        //     if (result.isConfirmed) {
                
        //         var residentID = $('#searchddl').val();
        //         var category = $('#select').val();
                        
        //         $.ajax({
        //                 url: "../code/printcode.php",
        //                 type: 'POST',
        //                 data: {
        //                     "printBTN": true,
        //                     "residentID": residentID,
        //                     "purpose": category,
        //                 },
        //                 success: function(response) {
                            
        //                 }
        //         })
        //     }
        // })
        
	}
    // function printNow(){
    //     window.print();
    // }
</script>

<script type="text/javascript">
	function PrintPageres() {
         window.print();

         var residentID = $('#searchddl').val();
                var category = $('#select').val();
                        
                $.ajax({
                        url: "../code/printcode.php",
                        type: 'POST',
                        data: {
                            "printresidentBTN": true,
                            "residentID": residentID,
                            "purpose": category,
                        },
                        success: function(response) {
                            
                        }
                })
        // Swal.fire({
        // title: 'Are you sure?',
        // text: "You won't be able to revert this!",
        // icon: 'warning',
        // showCancelButton: true,
        // confirmButtonColor: '#3085d6',
        // cancelButtonColor: '#d33',
        // confirmButtonText: 'Yes, print it!'
        // }).then((result) => {
            
        //     if (result.isConfirmed) {
                
        //         var residentID = $('#searchddl').val();
        //         var category = $('#select').val();
                        
        //         $.ajax({
        //                 url: "../code/printcode.php",
        //                 type: 'POST',
        //                 data: {
        //                     "printBTN": true,
        //                     "residentID": residentID,
        //                     "purpose": category,
        //                 },
        //                 success: function(response) {
                            
        //                 }
        //         })
        //     }
        // })
        
	}
    // function printNow(){
    //     window.print();
    // }
</script>

<script type="text/javascript">
	function PrintPagebrgy() {
         window.print();

         var residentID = $('#searchddl').val();
                var category = $('#select').val();
                        
                $.ajax({
                        url: "../code/printcode.php",
                        type: 'POST',
                        data: {
                            "printbarangayBTN": true,
                            "residentID": residentID,
                            "purpose": category,
                        },
                        success: function(response) {
                            
                        }
                })
        // Swal.fire({
        // title: 'Are you sure?',
        // text: "You won't be able to revert this!",
        // icon: 'warning',
        // showCancelButton: true,
        // confirmButtonColor: '#3085d6',
        // cancelButtonColor: '#d33',
        // confirmButtonText: 'Yes, print it!'
        // }).then((result) => {
            
        //     if (result.isConfirmed) {
                
        //         var residentID = $('#searchddl').val();
        //         var category = $('#select').val();
                        
        //         $.ajax({
        //                 url: "../code/printcode.php",
        //                 type: 'POST',
        //                 data: {
        //                     "printBTN": true,
        //                     "residentID": residentID,
        //                     "purpose": category,
        //                 },
        //                 success: function(response) {
                            
        //                 }
        //         })
        //     }
        // })
        
	}
    // function printNow(){
    //     window.print();
    // }
</script>




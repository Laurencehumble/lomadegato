
        // Disable form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
            }, false);
        })();

        function triggerClick() {

          document.querySelector('#profileImage').click();
          
      }
      
      function displayImage(e) {
          if (e.files[0]) {
              var reader = new FileReader();
      
              reader.onload = function(e){
                  document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
              }
              reader.readAsDataURL(e.files[0]);
          }
      }
      
      function CalculateAge() {
          var curYear = new Date().getUTCFullYear();
          var age = curYear - document.getElementById('txtday').value;
          var age = curYear - document.getElementById('txtMonth').value;
          var age = curYear - document.getElementById('txtYear').value;
          document.getElementById('age').innerHTML = age;
      }
      
      function formatDate(date){
          var d = new Date(date),
              month = '' + (d.getMonth() + 1),
              day = '' + d.getDate(),
              year = d.getFullYear();
      
          if (month.length < 2) month = '0' + month;
          if (day.length < 2) day = '0' + day;
      
          return [year, month, day].join('-');
      
      }
      
      function getAge(dateString){
          var birthdate = new Date().getTime();
          if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
              // variable is undefined or null value
              birthdate = new Date().getTime();
          }
          birthdate = new Date(dateString).getTime();
          var now = new Date().getTime();
          // now find the difference between now and the birthdate
          var n = (now - birthdate)/1000;
          if (n < 604800){ // less than a week
              var day_n = Math.floor(n/86400);
              if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
                  // variable is undefined or null
                  return '';
              }else{
                  return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';
              }
          } else if (n < 2629743){ // less than a month
              var week_n = Math.floor(n/604800);
              if (typeof week_n === 'undefined' || week_n === null || (String(week_n) === 'NaN')){
                  return '';
              }else{
                  return week_n + ' week' + (week_n > 1 ? 's' : '') + ' old';
              }
          } else if (n < 31562417){ // less than 24 months
              var month_n = Math.floor(n/2629743);
              if (typeof month_n === 'undefined' || month_n === null || (String(month_n) === 'NaN')){
                  return '';
              }else{
                  return month_n + ' month' + (month_n > 1 ? 's' : '') + ' old';
              }
          }else{
              var year_n = Math.floor(n/31556926);
              if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
                  return year_n = '';
              }else{
                  return year_n + ' year' + (year_n > 1 ? 's' : '') + ' old';
              }
          }
      }
      
      function getAgeVal(pid){
          var birthdate = formatDate(document.getElementById("birthday").value);
          var count = document.getElementById("birthday").value.length;
          if (count=='10'){
              var age = getAge(birthdate);
              var str = age;
              var res = str.substring(0, 1);
              if (res =='-' || res =='0'){
                  document.getElementById("birthday").value = "";
                  document.getElementById("age").value = "";
                  $('#birthday').focus();
                  return false;
              }else{
                  document.getElementById("age").value = age;
              }
          }else{
              document.getElementById("age").value = "";
              return false;
          }
      }
      
      // function setAccess() {
      //     var id = this.id.replace("voter", "precint"),
      //       field = document.getElementById(id);
      //     if (this.value == "no") {
      //       field.setAttribute('readonly', 'readonly');
      //     } else {
      //       field.removeAttribute('readonly');
      //     }
        
      //   }
      
      //   window.addEventListener("load", function() {
      //     document.querySelectorAll("[id^=voter]").forEach(function(sel) {
      //       sel.addEventListener("change", setAccess);
      //       // Initialise the fields in case of PHP setting the selected attribute
      //       if ("createEvent" in document) {
      //         var evt = document.createEvent("HTMLEvents");
      //         evt.initEvent("change", false, true);
      //         sel.dispatchEvent(evt);
      //       } else {
      //         sel.fireEvent("onchange");
      //       }
      //     });
      //   })
      //   function setAccess() {
      //       var id = this.id.replace("voter1", "precint1"),
      //         field = document.getElementById(id);
      //       if (this.value == "no") {
      //         field.setAttribute('readonly', 'readonly');
      //       } else {
      //         field.removeAttribute('readonly');
      //       }
          
      //     }
        
      //     window.addEventListener("load", function() {
      //       document.querySelectorAll("[id^=voter1]").forEach(function(sel) {
      //         sel.addEventListener("change", setAccess);
      //         // Initialise the fields in case of PHP setting the selected attribute
      //         if ("createEvent" in document) {
      //           var evt = document.createEvent("HTMLEvents");
      //           evt.initEvent("change", false, true);
      //           sel.dispatchEvent(evt);
      //         } else {
      //           sel.fireEvent("onchange");
      //         }
      //       });
      //     })

      $('.voter').change(function(){
        var val = $(this).val();
        if(val=='no'){
            $('.precint').prop('disabled', 'disabled');
        }else{
            $('.precint').prop('disabled', false);
        }
    });
    $('.voter1').change(function(){
      var val = $(this).val();
      if(val=='no'){
          $('.precint1').prop('disabled', 'disabled');
      }else{
          $('.precint1').prop('disabled', false);
      }
  });


      
        function myFunction(x) {
          x.classList.toggle("change");
          $("#mobile-menu").toggleClass("menu-hidden", 800, "easeOutQuint");
        };
      
       
        
      
      
      
               /* 2nd category */
      
               
                 
      
                  function printDiv(divName) {
                      var printContents = document.getElementById(divName).innerHTML;
                      var originalContents = document.body.innerHTML;
      
                      document.body.innerHTML = printContents;
      
                      window.print();
      
                      document.body.innerHTML = originalContents;
                  }
      
                  $(document).ready(function () {
                      $('select').selectize({
                          sortField: 'text'
                      });
                  });
      
                  $("#searchButton").live("click", function() {
                      $("#results").load("/SearchResults.php?s=" + $("#searchBox").val());
                  });
      
      
                  function editPos(that){
                    pos = $(that).attr('data-pos');
                    order = $(that).attr('data-order');
                    id = $(that).attr('data-id');
                
                    $('#position').val(pos);
                    $('#order').val(order);
                    $('#pos_id').val(id);
                }

                function editChair(that){
                    title = $(that).attr('data-title');
                    id = $(that).attr('data-id');
                
                    $('#chair').val(title);
                    $('#chair_id').val(id);
                }

                
      
                 
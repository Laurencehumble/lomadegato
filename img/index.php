<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <link rel="shortcut icon" type="image/x-icon" href="img/Brgy-logo.png">
    <title>Loma De Gato</title>
    <link rel="icon" href="index.html">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!--CSS INDEX-->
    <link rel="stylesheet" href="css/index.css">

    <!--Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style>
    h1,h2,h3,h4,h5,h6 {font-family: "Oswald"}
    body {font-family: "Open Sans"}
  </style>

  </head>
<body>

    <!--Time-->
    <script type="text/javascript">
      tday=new Array	("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
      tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

      function GetClock(){
      var d=new Date();
      var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
      var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

      if(nhour==0){ap=" AM";nhour=12;}
      else if(nhour<12){ap=" AM";}
      else if(nhour==12){ap=" PM";}
      else if(nhour>12){ap=" PM";nhour-=12;}

      if(nmin<=9) nmin="0"+nmin;
      if(nsec<=9) nsec="0"+nsec;

      document.getElementById('clockbox').innerHTML=""+tmonth[nmonth]+" "+ndate+", "+nyear+" "+tday[nday]+", "+nhour+":"+nmin+":"+nsec+ap+"";
      }
      window.onload=function(){
      GetClock();
      setInterval(GetClock,1000);
      }
    </script>
 
    <!--Navbar-->
    <nav class="navbar col-lg-12 col-12 p-1 navbar-expand-lg navbar-light bg-light sticky-top border-bottom">
      <a class="navbar-brand brand-logo ml-2 generate"> <img src="img/Brgy-logo.png" alt="" style="width:10%;"></a>
      <a class="font-weight-bold col-sm-5 text-center" id="clockbox" style="font-size:15px;"></a>
      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="my-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link px-2" href="https://www.facebook.com/LomaDeGatoOfficial"><i class="bi bi-facebook"></i></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="https://twitter.com/MarileNews?submit.x=18&submit.y=12"><i class="bi bi-twitter"></i></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="https://www.youtube.com/channel/UCtmYMqvqKgIsM76jw0n-tLQ/featured"><i class="bi bi-youtube"></i></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="index2.php"><i class="bi-person-circle"></i></a></li>
        </ul>
      </div>
    </nav>
    <?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                   <?php unset($_SESSION['message']); ?>
                <?php endif ?>
    <!--Logo-->
    <br>
      <div style="text-align:center;"><!--img src="img/Brgy-logo.png" alt="Paris" style="width:10%;"-->
        <h1 class="text-center w3-xxxlarge"><b>BAYAN NG MARILAO </b></h1>
        <h6 class="text-center">Welcome to the official website of <span class="w3-tag">Barangay Loma De Gato</span></h6>
      </div>

    <div class="container">
      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 font-weight-bold" href="index.php">Home</a>
          <a class="p-2 font-weight-bold" href="about.html">About Loma De Gato</a>
          <a class="p-2 font-weight-bold" href="news.html">News</a>
          <a class="p-2 font-weight-bold" href="brgy-services.html">Barangay Services</a>
          <a class="p-2 font-weight-bold" href="contact.html">Contact Us</a>
        </nav>
      </div>
    </div>
    
    
    <!--Announcement with Picture-->
    
    <style>
      .jumbotron {
        width: 300%;
        height: 300px;
      }
      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
      
    </style>
    <div class="container-fluid">
      <!--img src="img/Loma-De-Gato.png" alt="Image"/-->
    </div>
    <hr class="wp-block-separator"/>
  
    

    <!--Top-->
    <div class="content-wrapper">
      <div class="container">
        <div class="row" data-aos="fade-up">
          <div class="col-xl-8 stretch-card grid-margin">
            <div class="position-relative">
              <h1 class="display-3 text-center">COVID-19 HEALTH PROTOCOLS</h1>
                <p></p>
              <hr class="wp-block-separator"/>
              <img src="img/Project1.jpg" alt="banner" class="img-fluid"/>
              <div class="banner-content">
                <div class="fs-12 mb-3"></div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 stretch-card grid-margin">
            <div class="card bg-light text-dark">
              <div class="card-body">
                <h2 class="text-center">MARILAO COVID-19 UPDATE</h2>
                <h5 class="text-center">As of January 5, 2021</h5>
              </div>
                <div class="d-flex pt-4 align-items-center justify-content-between">
                  <div class="rotate-img">
                    <img src="news-img/latest-news.jpeg" alt="thumb" class="img-fluid img-thumbnail"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr class="wp-block-separator"/>

    <!--Vaccination News-->
    <div class="container">
      <section class="demo-section mb-5">
        <h3 class="display-3 text-center">Vaccination News</h3>
        <div class="lead-demo py-5">
            <nav>
                <ul class="nav nav-tabs nav-fill nav-tabs-collapse-sm nav-tabs-danger" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active font-weight-bold" id="bayahinan-tab" data-toggle="tab" href="#bayahinan" role="tab" aria-controls="bayahinan" aria-expanded="true">Bayanihan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" id="vaccine1-tab" data-toggle="tab" href="#vaccine1" role="tab" aria-controls="vaccine1" aria-expanded="false">SM Marilao</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" id="vaccine2-tab" data-toggle="tab" href="#vaccine2" role="tab" aria-controls="vaccine2" aria-expanded="false">Municipal Annex Building</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" id="vaccine3-tab" data-toggle="tab" href="#vaccine3" role="tab" aria-controls="vaccine3" aria-expanded="false">Prenza National High School</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" id="vaccine4-tab" data-toggle="tab" href="#vaccine4" role="tab" aria-controls="vaccine4" aria-expanded="false">Loma De Gato</a>
                    </li>
                </ul>
            </nav>
            <div class="tab-content pt-5">
                <div class="tab-pane fade show active" id="bayahinan" role="tabpanel" aria-labelledby="bayahinan-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="text-center">Makilahok na sa ating National Vaccination Days mula Disyembre 15 hanggang 17!</h1>
                            <br>
                            <p>Bukas ang ating 4 vaccination sites sa Marilao:</p>
                            <p>May mga handa rin tumulong sa pagrehistro sa ating mga vaccination site.</p>
                              <li>SM Marilao Event Center</li>
                              <li>Prenza National High School</li>
                              <li>Municipal Annex Building (RHU 1)</li>
                              <li>Metrogate Club House, Loma de Gato</li>
                            <br>
                            <p>Mangyaring tignan ang schedule ng bawat vaccination site sa ibaba.</p>
                            <p>Siguruhing naka-rehistro na sa link <a href="bit.ly/3l7XaIG">bit.ly/3l7XaIG</a> bago pumunta sa lugar ng bakunahan. May mga handa rin tumulong sa pagrehistro sa ating mga vaccination site.</p>
          
                            <p>PAALALA: Kinakailangang may kasama silang isang magulang o kamag-anak na edad 21 y/o pataas na may authorization letter ng magulang, dahil ito ay pipirma sa isang consent form para mabakunahan ang bata.</p>
                        </div>
                        <div class="col-md-6">
                            <img src="vaccine-img/1.jpg" width="540px" alt="tab img" class="img-fluid rounded-lg">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="vaccine1" role="tabpanel" aria-labelledby="vaccine1-tab">
                    <div class="row">
                        <div class="col-md-6">
                          <h1 class="text-center">Marilao Vaccine Schedule</h1>
                          <h2 class="text-center">SM Marilao Event Center Vaccination Site</h2>
                          <br>
                            <p>Siguruhing naka-rehistro na sa link <a href="bit.ly/3l7XaIG">bit.ly/3l7XaIG</a> bago pumunta sa lugar ng bakunahan. May mga handa rin tumulong sa pagrehistro sa ating mga vaccination site.</p>
                            <p>DALHIN ANG MGA SUMUSUNOD:</p>
                            <p class="text-center font-weight-bold">Para sa ADULT POPULATION (18 y/o above):</p>
                            <li>Valid ID na MARILAO ang address (kung and ID ay hindi sa MARILAO naka-address, kumuha ng Barangay Certification) at Ballpen</li>
                          <br>
                            <p class="text-center font-weight-bold">Para sa PEDIATRIC POPULATION (12-17 y/o):</p>
                            <li>Dalhin lamang ang Birth Certificate at ID ng bata gayundin ang ID ng magulang o guardian bilang katibayan na siya ay ang magulang o isang kamag-anak nito at Ballpen.</li>
                          <br>
                            <p><b>PAALALA:</b> Kinakailangang may kasama silang isang magulang o kamag-anak na edad 21 y/o pataas na may authorization letter ng magulang, dahil ito ay pipirma sa isang consent form para mabakunahan ang bata.</p>
                        </div>
                        <div class="col-md-6">
                            <img src="vaccine-img/Vaccine-sched1.jpg" width="540px" alt="tab img" class="img-fluid rounded-lg">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="vaccine2" role="tabpanel" aria-labelledby="vaccine2-tab">
                    <div class="row">
                        <div class="col-md-6">
                          <h1 class="text-center">Marilao Vaccine Schedule</h1>
                          <h2 class="text-center">Municipal Annex Building (RHU 1)</h2>
                          <br>
                            <p>Siguruhing naka-rehistro na sa link <a href="bit.ly/3l7XaIG">bit.ly/3l7XaIG</a> bago pumunta sa lugar ng bakunahan. May mga handa rin tumulong sa pagrehistro sa ating mga vaccination site.</p>
                            <p>DALHIN ANG MGA SUMUSUNOD:</p>
                            <p class="text-center font-weight-bold">Para sa ADULT POPULATION (18 y/o above):</p>
                            <li>Valid ID na MARILAO ang address (kung and ID ay hindi sa MARILAO naka-address, kumuha ng Barangay Certification) at Ballpen</li>
                          <br>
                            <p class="text-center font-weight-bold">Para sa PEDIATRIC POPULATION (12-17 y/o):</p>
                            <li>Dalhin lamang ang Birth Certificate at ID ng bata gayundin ang ID ng magulang o guardian bilang katibayan na siya ay ang magulang o isang kamag-anak nito at Ballpen.</li>
                          <br>
                            <p><b>PAALALA:</b> Kinakailangang may kasama silang isang magulang o kamag-anak na edad 21 y/o pataas na may authorization letter ng magulang, dahil ito ay pipirma sa isang consent form para mabakunahan ang bata.</p>
                        </div>
                        <div class="col-md-6">
                            <img src="vaccine-img/Vaccine-sched2.jpg" width="540px" alt="tab img" class="img-fluid rounded-lg">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="vaccine3" role="tabpanel" aria-labelledby="vaccine3-tab">
                    <div class="row">
                        <div class="col-md-6">
                          <h1 class="text-center">Marilao Vaccine Schedule</h1>
                          <h2 class="text-center">Prenza National High School Vaccination Site</h2>
                          <br>
                            <p>Siguruhing naka-rehistro na sa link <a href="bit.ly/3l7XaIG">bit.ly/3l7XaIG</a> bago pumunta sa lugar ng bakunahan. May mga handa rin tumulong sa pagrehistro sa ating mga vaccination site.</p>
                            <p>DALHIN ANG MGA SUMUSUNOD:</p>
                            <p class="text-center font-weight-bold">Para sa ADULT POPULATION (18 y/o above):</p>
                            <li>Valid ID na MARILAO ang address (kung and ID ay hindi sa MARILAO naka-address, kumuha ng Barangay Certification) at Ballpen</li>
                          <br>
                            <p class="text-center font-weight-bold">Para sa PEDIATRIC POPULATION (12-17 y/o):</p>
                            <li>Dalhin lamang ang Birth Certificate at ID ng bata gayundin ang ID ng magulang o guardian bilang katibayan na siya ay ang magulang o isang kamag-anak nito at Ballpen.</li>
                          <br>
                            <p><b>PAALALA:</b> Kinakailangang may kasama silang isang magulang o kamag-anak na edad 21 y/o pataas na may authorization letter ng magulang, dahil ito ay pipirma sa isang consent form para mabakunahan ang bata.</p>
                        </div>
                        <div class="col-md-6">
                            <img src="vaccine-img/Vaccine-sched3.jpg" width="540px" alt="tab img" class="img-fluid rounded-lg">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="vaccine4" role="tabpanel" aria-labelledby="vaccine4-tab">
                    <div class="row">
                        <div class="col-md-6">
                          <h1 class="text-center">Marilao Vaccine Schedule</h1>
                          <h2 class="text-center">Loma De Gato Vaccination Site</h2>
                          <br>
                            <p>Siguruhing naka-rehistro na sa link <a href="bit.ly/3l7XaIG">bit.ly/3l7XaIG</a> bago pumunta sa lugar ng bakunahan. May mga handa rin tumulong sa pagrehistro sa ating mga vaccination site.</p>
                            <p>DALHIN ANG MGA SUMUSUNOD:</p>
                            <p class="text-center font-weight-bold">Para sa ADULT POPULATION (18 y/o above):</p>
                            <li>Valid ID na MARILAO ang address (kung and ID ay hindi sa MARILAO naka-address, kumuha ng Barangay Certification) at Ballpen</li>
                          <br>
                            <p class="text-center font-weight-bold">Para sa PEDIATRIC POPULATION (12-17 y/o):</p>
                            <li>Dalhin lamang ang Birth Certificate at ID ng bata gayundin ang ID ng magulang o guardian bilang katibayan na siya ay ang magulang o isang kamag-anak nito at Ballpen.</li>
                          <br>
                            <p><b>PAALALA:</b> Kinakailangang may kasama silang isang magulang o kamag-anak na edad 21 y/o pataas na may authorization letter ng magulang, dahil ito ay pipirma sa isang consent form para mabakunahan ang bata.</p>
                        </div>
                        <div class="col-md-6">
                            <img src="vaccine-img/Vaccine-sched4.jpg" width="540px" alt="tab img" class="img-fluid rounded-lg">
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </section>
    </div>


    <!--Events-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <div class="container">
      <section class="demo-section mb-5">
        <h3 class="display-3 text-center">Events</h3>
        <br>
    <!-- start event block -->
    <div class="row align-items-center event-block no-gutters margin-40px-bottom">
        <div class="col-lg-5 col-sm-12">
            <div class="position-relative">
                <img src="events-img/Event1.jpg" alt="">
                <div class="events-date">
                    <div class="font-size28">11</div>
                    <div class="font-size14">December</div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-sm-12">
            <div class="padding-60px-lr md-padding-50px-lr sm-padding-30px-all xs-padding-25px-all">
                <h5 class="margin-15px-bottom md-margin-10px-bottom font-size22 md-font-size20 xs-font-size18 font-weight-500">
                  <a href="https://www.facebook.com/LomaDeGatoOfficial/posts/276237251216037" class="text-theme-color">7th Anniversary</a></h5>
                <ul class="event-time margin-10px-bottom md-margin-5px-bottom">
                    <li><i class="far fa-clock margin-10px-right"></i> 01:30 PM - 04:30 PM</li>
                    <li><i class="fas fa-user margin-5px-right"></i> Aero Instructor : Ms. Vicky Calderon</li>
                </ul>
                <p class="text-justify">Pagdiriwang ng ika- 7 na anibersaryo ng I Like Aero ng Phase 2 Heritage Homes sa pangunguna ng kanilang Aero Instructor, Ms. Vicky Calderon at HOA President Badeth Molina.</p>
                <a class="butn small margin-10px-top md-no-margin-top" href="https://www.facebook.com/LomaDeGatoOfficial/posts/276237251216037">Read More <i class="fas fa-long-arrow-alt-right margin-10px-left"></i></a>
            </div>
        </div>
    </div>
    <!-- end event block -->

    <!-- start event block -->
    <div class="row align-items-center event-block no-gutters margin-40px-bottom">
        <div class="col-lg-7 order-2 order-lg-1">
            <div class="padding-60px-lr md-padding-50px-lr sm-padding-30px-all xs-padding-25px-all">
                <h5 class="margin-15px-bottom md-margin-10px-bottom font-size22 md-font-size20 xs-font-size18 font-weight-500">
                  <a href="https://www.facebook.com/LomaDeGatoOfficial/posts/276195324553563" class="text-theme-color">Pagdiriwang ng Kapistahan</a></h5>
                <ul class="event-time margin-10px-bottom md-margin-5px-bottom">
                    <li><i class="far fa-clock margin-10px-right"></i> 11:00 AM - 12:30 PM</li>
                    <li><i class="fas fa-user margin-5px-right"></i> Speaker : Alexa Zone</li>
                </ul>
                <p class="text-justify">Pagdiriwang ng Kapistahan ng Inang Guadalupe sa St. Claire Phase Deca Homes.</p>
                <a class="butn small margin-10px-top md-no-margin-top" href="https://www.facebook.com/LomaDeGatoOfficial/posts/276195324553563">Read More <i class="fas fa-long-arrow-alt-right margin-10px-left"></i></a>
            </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2">
            <div class="position-relative">
                <img src="events-img/Event2.jpg" alt="">
                <div class="events-date">
                    <div class="font-size28">11</div>
                    <div class="font-size14">December</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end event block -->

    <!-- start event block -->
    <div class="row align-items-center event-block no-gutters margin-40px-bottom">
        <div class="col-lg-5 col-sm-12">
            <div class="position-relative">
                <img src="events-img/Event3.jpg" alt="">
                <div class="events-date">
                    <div class="font-size28">10</div>
                    <div class="font-size14">December</div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-sm-12">
            <div class="padding-60px-lr md-padding-50px-lr sm-padding-30px-all xs-padding-25px-all">
                <h5 class="margin-15px-bottom md-margin-10px-bottom font-size22 md-font-size20 xs-font-size18 font-weight-500">
                  <a href="https://www.facebook.com/LomaDeGatoOfficial/posts/276929074480188" class="text-theme-color">Mentorship Program</a></h5>
                <ul class="event-time margin-10px-bottom md-margin-5px-bottom">
                    <li><i class="far fa-clock margin-10px-right"></i> 09:20 AM - 12:00 AM</li>
                    <li><i class="fas fa-user margin-5px-right"></i> Ma. Veronica "Nica" Dela Cruz</li>
                </ul>
                <p class="text-justify">Nagsagawa ng Alay kay Ate at Kuya ang Sangguniang Kabataan sa pangunguna ni SK Chairperson Ma. Veronica "Nica" Dela Cruz, sa tulong din ng Sangguniang Barangay sa pangunguna ng Punong Barangay Kap Ma. Lourdes "Babes" San Andres.
                  Nagpamigay ng school supplies, grocery pack at bigas sa mga indigent na mga kabataan. </p>
                <a class="butn small margin-10px-top md-no-margin-top" href="https://www.facebook.com/LomaDeGatoOfficial/posts/276929074480188">Read More <i class="fas fa-long-arrow-alt-right margin-10px-left"></i></a>
            </div>
        </div>
    </div>
    <!-- end event block -->

    <!-- start event block -->
    <div class="row align-items-center event-block no-gutters margin-40px-bottom">
        <div class="col-lg-7 order-2 order-lg-1">
            <div class="padding-60px-lr md-padding-50px-lr sm-padding-30px-all xs-padding-25px-all">
                <h5 class="margin-15px-bottom md-margin-10px-bottom font-size22 md-font-size20 xs-font-size18 font-weight-500">
                  <a href="https://www.facebook.com/LomaDeGatoOfficial/posts/276237251216037" class="text-theme-color">Kapistahan ng Inang Guadalupe</a></h5>
                <ul class="event-time margin-10px-bottom md-margin-5px-bottom">
                    <li><i class="far fa-clock margin-10px-right"></i> 10:00 AM - 09:00 PM</li>
                    <li><i class="fas fa-user margin-5px-right"></i> Rev Fr. Ronaldo "Fr. Gboi" Samonte</li>
                </ul>
                <p class="text-justify">Pagdiriwang ng Kapistahan ng Inang Guadalupe sa Deca Homes sa pangunguna ng Bishop Most Rev Dennis Villarojo, City of Malolos Bulacan at Rev Fr. Ronaldo "Fr. Gboi" Samonte, Paring Tagapangasiwa ng Our Lady of Guadalupe Parish Deca Homes.</p>
                <a class="butn small margin-10px-top md-no-margin-top" href="https://www.facebook.com/LomaDeGatoOfficial/posts/276237251216037">Read More <i class="fas fa-long-arrow-alt-right margin-10px-left"></i></a>
            </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2">
            <div class="position-relative">
                <img src="events-img/Event4.jpg" alt="">
                <div class="events-date">
                    <div class="font-size28">25</div>
                    <div class="font-size14">Sep</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end event block -->

    <!-- start event block -->
    <div class="row align-items-center event-block no-gutters">
        <div class="col-lg-5 col-sm-12">
            <div class="position-relative">
                <img src="events-img/Event5.jpg" alt="">
                <div class="events-date">
                    <div class="font-size28">8</div>
                    <div class="font-size14">Dec</div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-sm-12">
            <div class="padding-60px-lr md-padding-50px-lr sm-padding-30px-all xs-padding-25px-all">
                <h5 class="margin-15px-bottom md-margin-10px-bottom font-size22 md-font-size20 xs-font-size18 font-weight-500">
                  <a href="event-details.html" class="text-theme-color">Pista ng Immaculada Concepcion</a></h5>
                <ul class="event-time margin-10px-bottom md-margin-5px-bottom">
                    <li><i class="far fa-clock margin-10px-right"></i> 11:00 AM - 09:00 PM</li>
                    <li><i class="fas fa-user margin-5px-right"></i></i> Punong Brgy Ma Lourdes San Andres</li>
                </ul>
                <p class="text-justify">Pagdiriwang ng Pista ng Immaculada Concepcion at pagsinaya ng ipinagawang covered court sa Marilao Green Subd.
                  Sa pangunguna ni Rev. Fr. Edward Pecson, kasama ang Punong Bayan Ricardo Silvestre at Sangguniang Bayan, Punong Brgy Ma Lourdes San Andres at Sangguniang Barangay at Marilao Green Subd. Homeowners Assoc. Inc. Officers.</p>
                <a class="butn small margin-10px-top md-no-margin-top" href="https://www.facebook.com/LomaDeGatoOfficial/posts/276195324553563">Read More <i class="fas fa-long-arrow-alt-right margin-10px-left"></i></a>
            </div>
        </div>
    </div>
    <!-- end event block -->

</div>

    <!--Footer-->
    <div class="container-fluid">
      <div class="footer-lower">
        <div class="media-container-row">
            <div class="col-sm-12">
                <hr>
            </div>
        </div>
        <div class="media-container-row mbr-white">
            <div class="col-sm-6 copyright">
                <p class="mbr-text mbr-fonts-style display-7">
                    © Copyright 2021 Loma De Gato
                </p>
            </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Reminder!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Thank you for your inquiry. We would like to inform you that in order to claim your clearances, in our Barangay, you need to bring valid identification along with required fee. This policy ensure security and accuracy of the clearance process.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.href='index.php'">Close</button>
      </div>
    </div>
  </div>
</div>
    <!--Live ChatBot-->
    <!-- Start of HubSpot Embed Code -->
    <script type="text/javascript" id="hs-script-loader" async defer src="//js-na1.hs-scripts.com/39640196.js"></script>
    <!-- End of HubSpot Embed Code -->





    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/style.css" rel="stylesheet">
    <link href="css/Homelayout.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/loginstyle.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="js/jsDatePick.jquery.min.1.3.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $('#header').load('layout/header.php');
          $('#footer').load('layout/footer.php');
        });
    </script>
    
		<title>Xplore Malaysia</title>
	</head>

  <body> 
  <div id="header"></div>
  <div style="background-color: #5cb5be; display: block;">
    <img style="position:absolute; left:0; right:0; margin-top:3px;"src="img/bghead2.png" >
  </div>
  </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
  
  <div class="container">
     
    <div class="row">
    
    <ul class="list1">

      <div class = "modal fade" id = "HotelsBooking" >
        <div class = "modal-dialog">
         <div class = "modal-content">
                  <div style="background-color: #5cb5be;font-size:30px;font-weight:bold;" class = "modal-header">
                      <p style="color: #ffffff;">Hotels</p>
                  </div>
                  <div class="modal-body">
                    <form ="hotelfrm">
                      <label>Destination : </label>
                      <select id="dropdown" class="inputbox">
                         <option value="Destination">Destination</option>
                          <option value="Penang">Penang</option>
                          <option value="Pahang">Pahang</option>
                          <option value="Ipoh">Ipoh</option>
                          <option value="Kuala Lumpur">Kuala Lumpur</option>
                           <option value="Terengganu">Terengganu</option>
                           <option value="Melaka">Melaka</option>
                           <option value="Johor">Johor</option>
                            <option value="Sabah">Sabah</option>
                             <option value="Sarawak">Sarawak</option>
                      </select>
                      
                      <br />

                      <label>Check-in Date : </label>
                      <input type="text" class="inputbox" id="In" />
                      <br />

                      <label>Check-Out Date : </label>
                      <input type="text" class="inputbox" id="Out" />
                      <br/>

                      <label>Guests: </label>
                      <input type="number" class="inputbox" size="10" min="1" max="12" id="guests"/>
                      <br /><br/> <br /><br/> <br /><br/>


                      
                      <a input type="button" style="position: absolute; left: 260px; top: 150px;" id="hotelsearch" class = "btn btn-default"  onclick = "validate();">Search</a>
                      
                  </div>
                      
                   <div class = "modal-footer">

                        <img style="position:absolute;left:0px; right:100px; margin-bottom:20px;width:100%;" src="img/footer.jpg">
                        
                  </div>
                </form>
              </div> 
          </div>
      </div>         

      <li>
        <a href="#HotelsBooking" role="button" data-toggle="modal" class="btn btn-primary btn2">
            <strong>
              <img src="img/hotel.png">
            </strong>
              <span>hotels</span>
        </a>
      </li>


      <div class = "modal fade" id = "CarsBooking" >
        <div class = "modal-dialog">
         <div class = "modal-content">
                  <div style="background-color: #5cb5be;font-size:30px;font-weight:bold;" class = "modal-header">
                      <p style="color: #ffffff;">Cars</p>
                  </div>
                  <div class="modal-body">
                    <form ="CarsFrm">
                      <label>Types of Car : </label>
                      <select id="dropdown" class="inputbox">
                         <option value="Cars">--------Cars-------</option>
                          <option value="Saga">Proton Saga</option>
                          <option value="Myvi">Perodua Myvi</option>
                          <option value="Vios">Toyota Vios</option>
                          <option value="Camry">Toyota Camry</option>
                           <option value="Exora">Proton Exora</option>
                           <option value="Estima">Toyota Estima</option>
                          
                      </select>
                      
                      <br />

                      <label>Pick-Up Date : </label>
                      <input type="text" class="inputbox" id="In" />
                      <br />

                      <label>Return Date : </label>
                      <input type="text" class="inputbox" id="Out" />
                      <br/>

                      <label>Amount: </label>
                      <input type="number" class="inputbox" size="10" min="1" max="5" id="amounts"/>
                      <br /><br/> <br /><br/> <br /><br/>


                      
                      <a input type="button" style="position: absolute; left: 260px; top: 150px;" id="CarsBooking" class = "btn btn-default">Book</a>
                      
                  </div>
                      
                   <div class = "modal-footer">

                        <img style="position:absolute;left:0px; right:100px; margin-bottom:20px;width:100%;" src="img/footer.jpg">
                        
                  </div>
                </form>
              </div> 
          </div>
      </div>         

     <li>
      <a href="#CarsBooking" role="button" data-toggle="modal" class="btn btn-primary btn2">
        <strong>
          <img src="img/cars.png">
        </strong>
          <span>cars</span>
      </a>
    </li>


<div class = "modal fade" id = "PackagesBooking" >
        <div class = "modal-dialog">
         <div class = "modal-content">
          
                  <div style="background-color: #5cb5be;font-size:30px;font-weight:bold;" class = "modal-header">
                      <p style="color: #ffffff;">Packages</p>
                  </div>
                  <div class="modal-body">
                    <form ="CarsFrm">
                      <label>Types of Packages : </label>
                      <select id="dropdown" class="inputbox">
                         <option value="Packages">--------Packages-------</option>
                          <option value="Sabah">Sabah 4 days 3 nights Trip</option>
                          <option value="Penang">Penang 3 days 2 nights Trip</option>
                          <option value="Pahang">Genting 2 days 1 night Trip</option>
                          
                          
                      </select>
                      
                      <br />

                      <label>Depart Date : </label>
                      <input type="text" class="inputbox" id="In" />
                      <br />

                      <label>Return Date : </label>
                      <input type="text" class="inputbox" id="Out" />
                      <br/>

                      <label>Person: </label>
                      <input type="number" class="inputbox" size="10" min="1" max="12" id="person"/>
                      <br /><br/> <br /><br/> <br /><br/>


                      
                      <a input type="button" style="position: absolute; left: 260px; top: 150px;" id="PackagesBooking" class = "btn btn-default">Search</a>
                      
                  </div>
                      
                   <div class = "modal-footer">

                        <img style="position:absolute;left:0px; right:100px; margin-bottom:20px;width:100%;" src="img/footer.jpg">
                        
                  </div>
                </form>
              </div> 
          </div>
      </div>         

     <li>
      <a href="#PackagesBooking" role="button" data-toggle="modal" class="btn btn-primary btn2">
        <strong>
          <img src="img/package.png">
        </strong>
          <span>packages</span>
      </a>
    </li>
   </ul>
    </div>
  </div>

</br></br></br></br>
  <hr class="hr2">

<div class="title1" style="text-shadow: 2px 2px 2px #081246;">
  <strong>This Year's Hot Tours</strong>
  <span>Great Ideas For Family Rest</span>
</div>

</br></br></br></br>
 </div><!--header-->



  <div class="container">
  <div class="row">
    
  <div class="owlbox">
    <div id="owl-demo" class="owl-carousel owl-theme" style="opacity:1; display:block;"> 
      <div class="owl-wrapper-outer">
        <div class="owl-wrapper" style="width: 100%; margin-left: 0px; display:block;">
                          
                          <div class="owl-item">
                            <div style=""class="item">
                               <a href="#" class="box1">
                                    <div class="title2">Selangor<em>Selangor</em></div>
                                    <figure><img src="img/a.jpg" alt=""></figure>
                                    <div class="">
                                        <div class="info2">
                                            <div class="title3"><strong>#</strong>
                                              <span>#</span>
                                            </div>
                                            <div class="title4"><span>#</span> 
                                              <strong>#</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title5">book now!<em>book now!</em></div>
                               </a>
                           </div>
                         </div>

                           <div class="owl-item">
                           <div class="item">
                               <a href="#" class="box1">
                                    <div class="title2">
                                      Penang<em>Penang</em>
                                    </div>
                                    <figure><img src="img/b.jpg" alt=""></figure>
                                    <div class="">
                                        <div class="info2">
                                            <div class="title3"><strong>#</strong>
                                              <span>#</span>
                                            </div>
                                            <div class="title4"><span>#</span> <strong>$#</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title5">
                                      book now!<em>book now!</em>
                                    </div>
                               </a>
                           </div>
                         </div>

                         <div class="owl-item">
                           <div class="item">
                               <a href="#" class="box1">
                                    <div class="title2">
                                      Sabah<em>Sabah</em>
                                    </div>
                                    <figure><img src="img/c.jpg" alt=""></figure>
                                    <div class="">
                                        <div class="info2">
                                            <div class="title3"><strong>#</strong>
                                              <span>#</span></div>
                                            <div class="title4"><span>#</span>
                                             <strong>#</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title5">
                                      book now!<em>book now!</em>
                                    </div>
                               </a>
                           </div>
                         </div>

                         <div class="owl-item">
                          <div class="item">
                               <a href="#" class="box1">
                                    <div class="title2">
                                      Kedah<em>kedah</em>
                                    </div>
                                    <figure><img src="img/b.jpg" alt=""></figure>
                                    <div class="">
                                        <div class="info2">
                                            <div class="title3">
                                              <strong>#</strong>
                                              <span>#</span>
                                            </div>
                                            <div class="title4">
                                              <span>#</span> 
                                              <strong>#</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title5">
                                      book now!<em>book now!</em>
                                    </div>
                               </a>
                           </div>
                         </div>


                         
          </div>
        </div>
        </div>
      </div>
    </div>
    <div class="customNavigation">
      <a class="prev">
        <img src="img/arrowprev.png" alt="">
      </a>
      <a class="next">
        <img src="img/arrownext.png" alt="">
      </a>
</div>
  </div>

<hr class="hr3">
<div >
  <strong class="social_font"> Follow Us On</strong>
</div>

<div class="social">
  <a href="#"><img src="img/instagram.png" alt="instagram"></a>
  <a href="http://www.fb.com/xploremalaysia" target="_blank"><img src="img/facebook.png" alt="facebook"></a>
  <a href="#"><img src="img/twitter.png" alt="twitter"></a>
</div>

<div id ="footer"></div>
</div>
</body>
</html>

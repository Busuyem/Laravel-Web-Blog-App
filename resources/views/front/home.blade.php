@extends('layouts.app')

        @section('content')
       
           

    <!--Home carousel-->
        
            <div id="carouselExampleIndicators" class="carousel carousel-fade" data-ride="carousel" data-interval = "2500">
                
                <!--<ol class="carousel-indicators">
                    <li data-target="#carousel-fade" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-fade" data-slide-to="1"></li>
                    <li data-target="#carousel-fade" data-slide-to="2"></li>
                    <li data-target="#carousel-fade" data-slide-to="2"></li>
                </ol>-->
        
            <div class="carousel-inner">
                <div class="carousel-item active">
                
                <img src="images/fan4.jpg" class="d-block w-100" alt="NOIMG" id  = "caro">
                    <div class="carousel-caption" id= "carocap">
                       <h2>Good</h2>
                        <p>This is the first carousel</p>
                    </div>
                </div>

                <div class="carousel-item">
                <img src="images/fr5.jpg" class="d-block w-100" alt="NOIMG" id  = "caro">
                    <div class="carousel-caption" id= "carocap">
                       <h2>Good</h2>
                        <p>This is the second carousel</p>
                    </div>
                </div>

                <div class="carousel-item">
                
                     <img src="images/lap4.jpg" class="d-block w-100" alt="NOIMG" id  = "caro">
                     <div class="carousel-caption" id= "carocap">
                       <h2>Good</h2>
                        <p>This is the third carousel</p>
                    </div>
                </div>

                <div class="carousel-item">
                <img src="images/phone2.jpg" class="d-block w-100" alt="NOIMG" id  = "caro">
                    <div class="carousel-caption" id= "carocap" >
                       <h2>Good</h2>
                        <p>This is the fourth carousel</p>
                    </div>
                </div>

            
            </div>
    
        
        
        </div>
        @endsection
    
    
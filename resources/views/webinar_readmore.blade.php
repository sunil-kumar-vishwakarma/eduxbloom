@extends('frontent.layouts.app')
@section('title', 'EduX | Student')
@section('content')
<link rel="stylesheet" href="{{asset('css/events.css')}}">
  <style> 



.navbar-brand div{
    font-size: 27px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: white;
    font-weight: bold;
    margin-top: 17px;
}


.navbar-brand{
    display: flex;
    gap: 15px;
}
    .hrading{
        margin-top: 150px;
        text-align: center;
        align-items: center;
    }

  .hrading h1 {
    font-size: 40px;
    font-weight: bold;
    max-width: 700px;
    margin: 0 auto 30px auto;
    text-align: center;
}

.hrading p {
    font-size: 20px;
    font-weight: 500;
    text-align: center;
    white-space: normal;
    padding: 0;
}

#blu {
    font-weight: bold;
    color: blue;
    text-align: center;
    padding: 0;
}


  .img {
    display: flex;
    justify-content: center;
    margin: 0 auto;
    max-width: 90%;
}

.img img {
    max-width: 100%;
    width:545px;
    height: auto;
}


  .description {
    max-width: 1000px;
    margin: 0 auto;
    line-height: 2;
    font-size: 18px;
    text-align: justify;
}


    .description ul li{
        list-style:disc;
    }

    #card1{
        display: flex;
    }

/* For tablets and smaller desktops */
@media (max-width: 992px) {
  .hrading {
    margin-top: 100px;
  }
  .hrading h1 {
    font-size: 32px;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    max-width: 90%;
  }
  .img {
    margin-left: auto;
    margin-right: auto;
    display: flex;
    justify-content: center;
    height: auto;
    width: 90%;
  }
  .description {
    margin-left: auto;
    margin-right: auto;
    max-width: 90%;
  }
}

/* For mobile screens */
@media (max-width: 768px) {
  .hrading {
    margin-top: 80px;
  }
  .hrading h1 {
    font-size: 28px;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
  }
  .img {
    margin-left: auto;
    margin-right: auto;
    display: flex;
    justify-content: center;
    height: auto;
    width: 100%;
  }
  .description {
    margin-left: auto;
    margin-right: auto;
    max-width: 95%;
    font-size: 16px;
    text-align: justify;
  }
  
 .card1-webinars {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 30px;
    margin: 40px auto;
    max-width: 1200px;
}


#card1{

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
        margin-left: 44px;
}

#c1{
margin-left:156px;
margin-top:40px;
}

#c2{
margin-left:156px;
}


  
  .blog{
            display: inline;
        font-size: 38px;
        margin-left: 66px;
  }
  
  
  .card1-webinars .row {
    flex-direction: column;
  }
  .card-webinar-learn {
    width: 90%;
    margin: auto;
  }
}

/* For smaller mobile screens */
@media (max-width: 480px) {
  .hrading {
   
            margin-top: 105px;
  }
  .hrading h1 {
    font-size: 24px;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
  }
  .img {
    width: 100%;
  }
  .description {
    font-size: 14px;
    line-height: 1.6;
  }
  .card-webinar-learn {
    width: 100%;
  }
}

.card1-webinars {
    border-color: #fff;
    margin-top: -141px;
    /* margin-top: 450px; */
    /* margin-left: 200px; */
}
.card1-webinars .card-webinar-learn {
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    margin-bottom: 20px;
    transition: all .3sease-in-out;
    height: 343px;
    width: 350px;
    padding-right: 10px;
}


.card-webinar-learn {
    height: 600px;
    width: 350px;
    vertical-align: middle;
    margin-right: 50px;
    display: flex
;
    align-items: center;
    text-align: center;
    margin: 200px;
    padding: 20px;
    margin-bottom: 90px;
}


.card-webinar-learn {
    --bs-card-spacer-y: 1rem;
    --bs-card-spacer-x: 1rem;
    --bs-card-title-spacer-y: 0.5rem;
    --bs-card-title-color: ;
    --bs-card-subtitle-color: ;
    --bs-card-border-width: var(--bs-border-width);
    --bs-card-border-color: var(--bs-border-color-translucent);
    --bs-card-border-radius: var(--bs-border-radius);
    --bs-card-box-shadow: ;
    --bs-card-inner-border-radius: calc(var(--bs-border-radius) -(var(--bs-border-width)));
    --bs-card-cap-padding-y: 0.5rem;
    --bs-card-cap-padding-x: 1rem;
    --bs-card-cap-bg: rgba(var(--bs-body-color-rgb), 0.03);
    --bs-card-cap-color: ;
    --bs-card-height: ;
    --bs-card-color: ;
    --bs-card-bg: var(--bs-body-bg);
    --bs-card-img-overlay-padding: 1rem;
    --bs-card-group-margin: 0.75rem;
    position: relative;
    display: flex
;
    flex-direction: column;
    min-width: 0;
    height: var(--bs-card-height);
    color: var(--bs-body-color);
    word-wrap: break-word;
    background-color: var(--bs-card-bg);
    background-clip: border-box;
    border: var(--bs-card-border-width) solid var(--bs-card-border-color);
    border-radius: var(--bs-card-border-radius);
}


.card-img-top1 {
    /* display: flex
; */
    width: 250px;
    /* height: 230px; */
    object-fit: cover;
    /* border-radius: 50%; */
    margin: 10px auto;
    border: 5px solid #fff;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}
.webinar-readmore{
  margin-left: 81px;
}

.webinar-readmore1{
  margin-left: 157px;
}

.card1-webinars button {
    color: #0064e1;
    border: none;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-weight: lighter;
    text-align: left;
      display: block;
    margin: 20px auto 0 auto;
}
  </style>

        <div class="hrading">
            <h1>These Are the Trends That Shaped International Education in 2024</h1>

        </div><br>

        <div class="img">
            <img src="{{asset('images/Ireland-Banner-2-–-St-Patricks-Day-q3lqzy1kxy9jp5gtjqh6qoqdglvbd0pn962rudqpq8.png')}}" class="img" alt="...">
        </div><br><br>


        <div class="description">
            <p style="max-width: 100%;text-align: justify; line-height: 2; font-size: 18px;">The international education sector was defined by change in 2024,
                 as policy updates continued to affect student choice and institutional operations.
                  As we wrap up the year, it’s easy to see the sector as more complex and with more 
                  uncertainty ahead. While that complexity isn’t a bad thing, navigating this
                   new landscape requires careful attention to shifting trends.<br><br>

                This year, the popularity of the “Big Four” English-language destinations1 receded.
                 Meanwhile, destinations like Germany, Ireland, and South Korea welcomed more students
                  than ever, and surging interest from countries like Ghana and Nepal reshaped campuses.
                   These trends demonstrate that international student interests are diversifying,
                    setting the stage for future shifts in 2025.<br><br>
                
                We covered these topics and more in 2024 to provide our readers with real-time strategic 
                insights. Let’s take a look at some of the most pivotal moments and learnings from the 
                past 12 months.</p>
        </div><br><br>

        <h1 style="font-size: 40px; font-weight: bold; text-align: center;">Key Insights at a Glance</h1><br><br>

        <div class="description">
            <ul>
                <li>Policy changes in Canada, the United Kingdom, and Australia aimed to limit international student inflows at specific study levels. However, these limitations negatively impacted destination appeal and contributed to downturns across most levels of study, not just the ones targeted by these measures.
                </li>

                <li>News published in source countries about international students in Canada, Australia, the UK, and the US has polarized year-over-year since the pandemic, affecting student outlook.</li>

                <li>Growing student populations from Nepal and Ghana have helped to diversify campuses across major Anglophone study destinations.</li>

                <li>Edu-X Pulse Surveys this fall highlighted rising student interest in studying in the US and the UK, where Australia and Canada have become less desirable.</li>
            </ul>
        </div>
         
            
            <h1 class="blog">Our Latest Blogs</h1>

            <!-- <div class="card1">
              <div class="row row-cols-1 row-cols-md-3 g-4" id=card1>
                <div class="col">
                  <div class="card">
                    <img src="{{asset('images/Canada-Study-Permit-Processing-Times-Falling-q8awoecm53hn8hwocxuqxnf3deq9nnh2p9klnrj2dc.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                 <br><br>
                      <p class="card-text"><a  href="#">Why Choose Canada as an International Student</a></p><br>
                      <h6>October 17, 2024</h6>
                    </div>
                  <button><a href="webinar-readmore.html" >Read More</a></button>
                  </div>
                </div>
                <div class="col">
                  <div class="card" id="c2">
                    <img src="{{asset('images/AI035-Banner-1-qvnbbiv0vl6ajzw0bx7l4mbvn2lpuygoy0l63akqm8.png')}}" class="card-img-top" alt="..." id="colimg">
                    <div class="card-body">
                      <br><br>
                      <p class="card-text" ><a  href="#" >The Early Impacts of Canada’s International Student Cap on Postgraduate Studies</a></p><br>
                      <h6>October 17, 2024</h6>
                    </div>
                    <button  id="colbutton"><a href="webinar-readmore.html">Read More</a></button>
                  </div>
                </div>
                <div class="col">
                  <div class="card" id="c3">
                    <img src="{{asset('images/Ireland-Banner-2-–-St-Patricks-Day-q3lqzy1kxy9jp5gtjqh6qoqdglvbd0pn962rudqpq8.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <br><br>
                      <p class="card-text"><a  href="#">Cost of Living in Ireland</a></p><br>
                      <h6>October 17, 2024</h6>
                    </div>
                    <button><a href="webinar-readmore.html">Read More</a></button>
                  </div>
                </div>
               
                  </div>
                </div>
          </div> -->

          <div class="card1-webinars">
            <div class="row-cols-1 row-cols-md-3 g-4" id="card1">
              <div class="col">
                <div class="card-webinar-learn webinar-readmore1">
                  <img src="{{asset('images/Canada-Study-Permit-Processing-Times-Falling-q8awoecm53hn8hwocxuqxnf3deq9nnh2p9klnrj2dc.png')}}" class="card-img-top1" alt="...">
                  <div class="card-body">
               <br><br>
                    <p class="card-text"><a  href="#">Why Choose Canada as an International Student</a></p><br>
                    <h6><strong>October 17, 2024</strong></h6>
                  </div>
                  <button><a href="{{route('webinar.readmore')}}" >Read More</a></button>
                </div>
              </div>
              <div class="col">
                <div class="card-webinar-learn webinar-readmore" id="c1">
                  <img src="{{asset('images/AI035-Banner-1-qvnbbiv0vl6ajzw0bx7l4mbvn2lpuygoy0l63akqm8.png')}}" class="card-img-top1" alt="..." id="colimg">
                  <div class="card-body">
                    <br><br>
                    <p class="card-text" ><a  href="#" >The Early Impacts of Canada’s International Student Cap on Postgraduate Studies</a></p><br>
                    <h6><strong>October 17, 2024</strong></h6>
                  </div>
                  <button><a href="{{route('webinar.readmore')}}" >Read More</a></button>
                </div>
              </div>
              <div class="col">
                <div class="card-webinar-learn card2" id="c2">
                  <img src="{{asset('images/Ireland-Banner-2-–-St-Patricks-Day-q3lqzy1kxy9jp5gtjqh6qoqdglvbd0pn962rudqpq8.png')}}" class="card-img-top1" alt="...">
                  <div class="card-body">
                    <br><br>
                    <p class="card-text"><a  href="#">Cost of Living in Ireland</a></p><br>
                    <h6><strong>October 17, 2024</strong></h6>
                  </div>
                  <button><a href="{{route('webinar.readmore')}}" >Read More</a></button>
                </div>
              </div>
             
                </div>
              </div>
        </div> 


   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

   

  

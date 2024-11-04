<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Welcome-ClickNet Org</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Clicknet,clicknet.org, clicknet, adsense, adstera, increase adsense earnings, adsense earnings per 1000 visitors, adsense earnings per 1000 visitors, adsense boost, increase ad earnings, " name="keywords">
  <meta content="Clicknet enables you increase your adsense earnings thrugh a community of visit for visit exchange" name="description">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- Favicons -->c
  <link href="{{ asset('homepage/img/click3.PNG') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('homepage/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('homepage/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('homepage/css/style.css') }}" rel="stylesheet">
<!-- Global site tag (gtag.js) - Google Analytics -->


</head>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/614611cfd326717cb6822a61/1ffsrb5tl';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="{{route('welcome')}}" ><img src="{{ asset('homepage/img/click3.PNG') }}" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{route('welcome')}}">Home</a></li>
          <li><a href="{{route('aboutus')}}">About Us</a></li>
          <li><a href="{{route('privacy')}}">Prvacy Policy</a></li>
                    <li><a href="{{route('toc')}}">Terms of Service</a></li>

          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <!--<li><a href="#team">Team</a></li>-->
          <!-- <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
              <!-- <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul> -->
          <!-- </li> -->
          <li><a href="#contact">Contact Us</a></li>
          <li><a href="{{ route('register')}}" style="color:white;" class="btn btn-primary btn-sm ml-3">Register Now</a></li>

          <li><a href="{{ route('login')}}"  style="color:white;" class="btn btn-success btn-sm ml-3">Login</a></li>

        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="{{ asset('homepage/img/intro-img.svg') }}" alt="" class="img-fluid">
      </div>
     
<!-- header -->


      <div class="intro-info">
        <h2>We provide<br><span>solutions</span><br>for your business!</h2>
        <div>
          <a href="{{ route('register')}}" class="btn-get-started scrollto" id="regbtn">Create your Account</a>
          <a href="#services" class="btn-services scrollto">Our Services</a>
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>About Us</h3>
          <p>ClickNet is an avenue for bloggers and content creators to increase their ad revenue through real human traffic from allover the world.</p>
        </header>

        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <p>
              All members within the ClickNet society work together to ensure their financial success through skilled and rule based exchange of website traffic. <br>
              Follow these steps to start:
          </p>

            <div class="icon-box wow fadeInUp">
              <div class="icon"><i class="fa fa-shopping-bag"></i></div>
              <h4 class="title"><a href="">Create your account </a></h4>
              <p class="description">You need to create your account to access our services</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-photo"></i></div>
              <h4 class="title"><a href="">Get Approved</a></h4>
              <p class="description">After creating your account, pass our simple test and get approved</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-bar-chart"></i></div>
              <h4 class="title"><a href="">Enjoy Service</a></h4>
              <p class="description">Once approved, get to access all the services we offer.</p>
            </div>

          </div>

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
            <img src="{{ asset('homepage/img/about-img.svg') }}" class="img-fluid" alt="">
          </div>
        </div>

        <div class="row about-extra">
          <div class="col-lg-6 wow fadeInUp">
          <iframe width="300" height="285" src="https://www.youtube.com/embed/J6vIV9ycoDc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>           
          </div>
          <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
            <h4>Why you should trust our services.</h4>
            <p>
              As you join the ClickNet Community, you become a valuable asset to the rest of the members. Every member of the Community
              contributes to your website/blog/channel, thus giving you a huge level of traffic and increased revenue.

          </p>
            <p>
              Members work abiding by your rules thus ensuring the safety of your ad account. You should set safe rules for your website as you join us.
          </p>
          </div>
        </div>

        <div class="row about-extra">
          <div class="col-lg-6 wow fadeInUp order-1 order-lg-2">
            <img src="{{ asset('homepage/img/about-extra-2.svg') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
            <h4>What about facebook advertising ?</h4>
            <p>
                We do facebook advertising by placing your ad on our facebook page. We have a huge fanbase page with over 640K+ Followers.
          </p>
            <p>
              Facebook is a good source of traffic and business leads that convert. It is one of the most reccomended way of marketing your services or products.
          </p>
            <p>
                Talk to us if you need facebook promotion, we will be glad to serve you.
            </p>
          </div>
          
        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Services</h3>
          <p>ClickNet provides you with the following services:</p>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box ml-3">
              <div class="icon"><i class="ion-ios-analytics-outline" style="color: #ff689b;"></i></div>
              <h4 class="title"><a >Facebook Advertising</a> <span class="badge badge-success navbar-badge">Active</span></h4>
              <p class="description">We advertise your products/services on our facebook page. Page with 640K+ Follows</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-bookmarks-outline" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a >Ad Revenue Boosting</a> <span class="badge badge-success navbar-badge">Active</span></h4>
              <p class="description">With the Click members coming together, we guarantee you increased revenue from your ads.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-paper-outline" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a >Organic Traffic</a> <span class="badge badge-success navbar-badge">Active</span></h4>
              <p class="description">With the ClickNet service, you are guaranteed unlimited traffic from the Click Community.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-speedometer-outline" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a >Youtube Subscribers</a>  <span class="badge badge-danger navbar-badge">Coming soon !</span></h4>
              <p class="description">Get to engage other youtubers and increase your youtube audience.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-world-outline" style="color: #d6ff22;"></i></div>
              <h4 class="title"><a >Youtube Views</a> <span class="badge badge-danger navbar-badge">Coming soon !</span></h4>
              <p class="description">Receive youtube views from other youtubers, increase your revenue too !</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-clock-outline" style="color: #4680ff;"></i></div>
              <h4 class="title"><a >Instagram Followers</a> <span class="badge badge-danger navbar-badge">Coming soon !</span></h4>
              <p class="description">Increase and boost your instagram followers by engaging other aspiring instagrammers here on ClickNet</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Why choose us?</h3>
          <p>ClickNet is the only place where you wil find these kind of service !.</p>
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-diamond"></i>
              <div class="card-body">
                <h5 class="card-title">Ad Revenue Boost</h5>
                <p class="card-text">With the Click members coming together, we guarantee you increased revenue from your ads.</p>
                <a href="#" class="readmore">Read more </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-language"></i>
              <div class="card-body">
                <h5 class="card-title">Unlimited Organic Traffic</h5>
                <p class="card-text">With the ClickNet service, you are guaranteed unlimited traffic from the Click Community.</p>
                <a href="#" class="readmore">Read more </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-object-group"></i>
              <div class="card-body">
                <h5 class="card-title">Facebook Advertising</h5>
                <p class="card-text">We advertise your products/services on our facebook page. Page with 640K+ Follows </p>
                <a href="#" class="readmore">Read more </a>
              </div>
            </div>
          </div>

        </div>

        <div class="row counters">
  
          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{$countusers}}</span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{$countclicks}}</span>
            <p>Work Submitted</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{$countworkers}}</span>
            <p>Websites Indexed</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{$countcountry}}</span>
            <p>Countries Covered</p>
          </div>
  
        </div>

      </div>
    </section>

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio" class="clearfix">
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Our Portfolio</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Traffic</li>
              <li data-filter=".filter-card">Reports</li>
              <li data-filter=".filter-web">Adsense</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{{ asset('homepage/img/adsev1.JPG') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Ads Report</a></h4>
                <p>Report</p>
                <div>
                  <a href="{{ asset('homepage/img/adsev1.JPG') }}" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <img src="{{ asset('homepage/img/adsev2.JPG') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Adsense Earning</a></h4>
                <p>Adsense Earning</p>
                <div>
                  <a href="{{ asset('homepage/img/adsev2.JPG') }}" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-app" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <img src="{{ asset('homepage/img/portfolio/app2.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Ads Report</a></h4>
                <p>Ads Report</p>
                <div>
                  <a href="{{ asset('homepage/img/app2.jpg') }}" class="link-preview" data-lightbox="portfolio" data-title="App 2" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div> -->

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{{ asset('homepage/img/adsev5.JPG') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Ad Report 2</a></h4>
                <p>Report</p>
                <div>
                  <a href="{{ asset('homepage/img/adsev5.JPG') }}" class="link-preview" data-lightbox="portfolio" data-title="Card 2" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <img src="{{ asset('homepage/img/adsev3.JPG') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Adsense Earning</a></h4>
                <p>Adsense earning</p>
                <div>
                  <a href="{{ asset('homepage/img/adsev3.JPG') }}" class="link-preview" data-lightbox="portfolio" data-title="Web 2" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <img src="{{ asset('homepage/img/report1.JPG') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Traffic report</a></h4>
                <p>Traffic</p>
                <div>
                  <a href="{{ asset('homepage/img/report1.JPG') }}" class="link-preview" data-lightbox="portfolio" data-title="App 3" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{ asset('homepage/img/report2.JPG') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Traffic report 2</a></h4>
                <p>Traffic</p>
                <div>
                  <a href="{{ asset('homepage/img/report2.JPG') }}" class="link-preview" data-lightbox="portfolio" data-title="Card 1" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>
<!-- ll 
          <div class="col-lg-4 col-md-6 portfolio-item filter-card" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <img src="{{ asset('homepage/img/portfolio/card3.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Card 3</a></h4>
                <p>Card</p>
                <div>
                  <a href="{{ asset('homepage/img/portfolio/card3.jpg') }}" class="link-preview" data-lightbox="portfolio" data-title="Card 3" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div> -->

          <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <img src="{{ asset('homepage/img/portfolio/web1.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Web 1</a></h4>
                <p>Web</p>
                <div>
                  <a href="{{ asset('homepage/img/portfolio/web1.jpg') }}" class="link-preview" data-lightbox="portfolio" data-title="Web 1" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div> -->

        </div>

      </div>
    </section><!-- #portfolio -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="testimonials" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-8">

            <div class="owl-carousel testimonials-carousel wow fadeInUp">
    
              <div class="testimonial-item">
                <img src="{{ asset('homepage/img/testimonial-1.jpg') }}" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                Working with ClickNet has been a game-changer for our business. Their ad network services have significantly boosted our online visibility and revenue. The team's dedication and expertise have been exceptional, delivering exceptional results.
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="{{ asset('homepage/img/testimonial-2.jpg') }}" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                    ClickNet has been instrumental in driving targeted traffic to our website. Their ad network solutions are top-notch, and their team is highly professional and responsive. We've seen a notable increase in conversions and couldn't be happier with the results.                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="{{ asset('homepage/img/testimonial-3.jpg') }}" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                Choosing ClickNet as our ad network partner was a smart decision. Their services have exceeded our expectations, providing us with a steady stream of quality leads. Their meticulous approach, combined with their industry knowledge, has made a significant impact on our business growth.                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="{{ asset('homepage/img/testimonial-4.jpg') }}" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
ClickNet's ad network services have transformed our online advertising efforts. Their strategic approach, coupled with their cutting-edge technology, has helped us reach our target audience effectively. We appreciate their commitment to delivering measurable results and their continuous support.                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="{{ asset('homepage/img/testimonial-5.jpg') }}" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
Partnering with ClickNet has been a game-changer for our digital marketing campaigns. Their ad network expertise has allowed us to maximize our reach and optimize our ad spend. The team's professionalism, transparency, and results-driven approach make them a trusted and valued partner.                </p>
              </div>

            </div>

          </div>
        </div>


      </div>
    </section><!-- #testimonials -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header">
          <h3>Team</h3>
          <p>A well skilled dedicated team that is there to help you</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="{{ asset('homepage/img/team-1.jpg') }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="{{ asset('homepage/img/team-2.jpg') }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="{{ asset('homepage/img/team-3.jpg') }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="{{ asset('homepage/img/team-4.jpg') }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="section-bg">

      <div class="container">

        <div class="section-header">
          <h3>Our CLients</h3>
          <p>We have various clients ranging from world class organizations, middle class businesses and start up companies working with us. Join the great ClickNet Community today!</p>
        </div>

        <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ asset('homepage/img/clients/client-1.png') }}" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ asset('homepage/img/clients/client-2.png') }}" class="img-fluid" alt="">
            </div>
          </div>
        
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ asset('homepage/img/clients/client-3.png') }}" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ asset('homepage/img/clients/client-4.png') }}" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ asset('homepage/img/clients/client-5.png') }}" class="img-fluid" alt="">
            </div>
          </div>
        
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ asset('homepage/img/clients/client-6.png') }}" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ asset('homepage/img/clients/client-7.png') }}" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ asset('homepage/img/clients/client-8.png') }}" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>

    </section>

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row wow fadeInUp">

          <div class="col-lg-6">
            <div class="map mb-4 mb-lg-0">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-5 info">
                <i class="ion-ios-location-outline"></i>
                <p>Nairobi, Kenya</p>
              </div>
              <div class="col-md-4 info">
                <i class="ion-ios-email-outline"></i>
                <p>contact@clicknets.org</p>
              </div>
              <div class="col-md-3 info">
                <i class="ion-ios-telephone-outline"></i>
                <p>+254715203024</p>
              </div>
            </div>

            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage">Error </div>
              <form action="{{route('contactform')}}" method="post" role="form" class="contactForm">
              @csrf
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                
                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>



  

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>ClickNet</h3>
            <p>We are proud to partner with you so as to achieve your revenue goals. We are dedicated to providing you with the best services in the Ad Network Industry.</p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
             24Hrs Support <br>
              Nairobi<br>
              Kenya <br>
              <strong>Phone:</strong> +254715203024<br>
              <strong>Email:</strong> contact@clicknets.org<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
                  <p>Join our newsletter to receive all useful updates from ClickNet.We respect your privacy and do not spam.</p>
            <form action="{{route('newsletter')}}" method="post">
            @csrf
              <input type="email" name="email" value="{{ old('email') }}"><input type="submit"  value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>ClickNet</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz
        -->
        Designed by <a href="https://digitalafrica.co.ke/">Digital Africa</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="{{ asset('homepage/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('homepage/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('homepage/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('homepage/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('homepage/lib/mobile-nav/mobile-nav.js') }}"></script>
  <script src="{{ asset('homepage/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('homepage/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('homepage/lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('homepage/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('homepage/lib/isotope/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('homepage/lib/lightbox/js/lightbox.min.js') }}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('homepage/contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('homepage/js/main.js') }}"></script>

</body>
</html>

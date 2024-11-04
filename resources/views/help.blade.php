
@extends('layouts.myapp')

@section('content')

  <link rel="stylesheet" href="{{ asset('/logincode/dist/css/adminlte.min.css') }}">


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h4>Refer to the notes below </h4>
          </div>
          <!-- <div class="col-sm-6 d-none d-sm-block">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Personal Help</li>
            </ol>
          </div> -->
        </div>
      </div>
    </section>

    <section class="content pb-3">
      <div class="container-fluid h-100">
        <div class="card card-row card-secondary">
          <div class="card-header">
            <h3 class="card-title">
              How to take screenshots on PC ?
            </h3>
          </div>
          <div class="card-body">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h5 class="card-title">Follow steps below</h5>
                <div class="card-tools">
                  <a  class="btn btn-tool btn-link">#1</a>
                  
                </div>
              </div>
              <div class="card-body">
                <p>
                  1. Click on windows button to reveal windows menu <br>
                  2. Search Snipping Tool <br>
                  3. Click Enter <br>
                  4. Snipping tool will open <br>
                  5. Open the page you want to screenshot <br>
                  6. Go back to snipping tool <br>
                  7. Click on New on the top left corner <br>
                  8. A pair of sciscors will appear o the screen <br>
                  9. Drag to touch all the required part of the page <br>
                  10. Click Ctr+S on your Keyboard to save <br>
                </p>              
               
              
                

              </div>
            </div>
            
            
            <div class="card card-light card-outline">
              
            </div>
          </div>
        </div>
        <div class="card card-row card-primary">
          <div class="card-header">
            <h3 class="card-title">
              How to visit a website
            </h3>
          </div>
          <div class="card-body">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title">Follow the steps bellow</h5>
                <div class="card-tools">
                  <a class="btn btn-tool btn-link">#2</a>                 
                </div><br>
                <div class="card-body">
                  <p>
                  1. Click Dashborad on the menu <br>
                  2. You will see a list of sites <br>
                  3. Click on visit <br>
                  4. You will be redirected to a view page <br>
                  5. Read the rules of the website owner <br>
                  6. Visit the website <br>
                  7. Screenshot your browser history <br>
                  8. Comeback to the site and submit to <br>the Owner <br>
                  9. The owner receives your work and approves <br>
                  10. All done !             
                  </p>

                </div>  
                <div class="card card-light card-outline">
             
            </div>

              </div>
            </div>
          </div>
        </div>
        <div class="card card-row card-default">
          <div class="card-header bg-info">
            <h3 class="card-title">
             Reporting a user
            </h3>
          </div>
          <div class="card-body">
            <div class="card card-light card-outline">
              <div class="card-header">
                <h5 class="card-title">Report site violation</h5>
                <div class="card-tools">
                  <a class="btn btn-tool btn-link">#3</a>
                 
                </div>
              </div>
              <div class="card-body">
                <p>
                  1. Click on view user work <br>
                  2. Find a report button on the left <br>
                  3. Click report <br>
                  4. Submit evidence of violation <br>
                  5. Admin will respond
                </p>
              </div>
              
              <div class="card-body">  
              <iframe width="300" height="215" src="https://www.youtube.com/embed/eqgemLMFuhY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
                         
            </div>
          </div>
        </div>
        <div class="card card-row card-success">
          <div class="card-header">
            <h3 class="card-title">
              How to return website visits
            </h3>
          </div>
          <div class="card-body">
            <div class="card card-light card-outline">
              <div class="card-header">
                <h5 class="card-title">Follow steps below</h5>
                <div class="card-tools">
                  <a class="btn btn-tool btn-link">#4</a>                 
                </div>
              </div>
              <div class="card-body">            
                              
                <p>
                  1. Click Dashborad on the menu <br>
                  2. You will see a list of sites <br>
                  3. Click on visit <br>
                  4. You will be redirected to a view page <br>
                  5. Read the rules of the website owner <br>
                  6. Visit the website <br>
                  7. Screenshot your browser history <br>
                  8. When submiting, remember to select returning work <br>
                  9. Comeback to the site and submit to <br>the Owner <br>
                  10. The owner receives your work and approves <br>
                  11. All done !             
                  </p>                
              </div>              

              <div class="card-body">  
              <iframe width="300" height="215" src="https://www.youtube.com/embed/J6vIV9ycoDc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


   

@endsection
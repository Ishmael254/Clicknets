
@extends('layouts.myapp')

@section('content')

  <link rel="stylesheet" href="{{ asset('/logincode/dist/css/adminlte.min.css') }}">




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2"> -->
          <!-- <div class="col-sm-6">
            <h1>ClickNet Members Area</h1>
          </div> -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">clickzone</li>
            </ol>
          </div> -->
        <!-- </div>
      </div>
    </section> -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h2 class="card-title" style="color: green;"><strong> ClickZone</strong></h2>    
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="row">
         
          &nbsp; &nbsp; <p class="ml-1">Visit all sites listed here. After you click a site, it will appear automatically after seven days</p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   @if($countmessage >= 1) <p class="text-red blink-soft">You have {{$countmessage}} message(s)</p> <a class="btn  btn-success btn-sm" href="{{route('myreply')}}">Open</a>
              
                <div class="mycontainer">
                   
                    <style>
                     
                        .p {
                          float:right;
                          width: 50%;
                          text-align: center;
                          margin-top: 3rem;
                        }
                        .text-red {
                          color: blue;
                        }

                        .blink-soft {
                          animation: blinker 1.0s linear infinite;
                        }
                        @keyframes blinker {
                          50% {
                            opacity: 0;
                          }
                        }

                    </style>
                </div>
                @endif
         </div>
        </div>
        
         @if($countmee >= 1)
         
         @else
         <center> <div class="card-body">
                  <div class="form-group">
                      
                    <h4 class="mt-1">Your have not added your site to index on ClickNet.Org</h4><br>
                    <center><a href="{{route('addmysite')}}" class="btn btn-success">Add Now to receive visits and clicks</a></center>  <br>
                     <h4 class="mt-1">Need help ? watch video below on how to add your site <br> and how to visit sites</h4><br>
              <iframe width="500" height="115" src="https://www.youtube.com/embed/eqgemLMFuhY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                  </div>

          </div></center>
         @endif
        @if($myclickscount >= 1)
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          Id
                      </th>

                      <th style="width: 10%">
                          Owner Name
                      </th>
                      <th style="width: 10%">
                          Website Name
                      </th>
                      <th style="width: 10%">
                          Date Joined
                      </th>
                      <th style="width: 5%" class="text-center">
                          Status
                      </th>
                      <th style="width: 10%" class="mr-5"> 
                      </th>
                  </tr>
              </thead>
              <tbody> 
              
                              
                          
              @foreach($work as $w)

                  <tr>
                      <td>
                      {{$w->id}}
                      </td>
                      <td>
                          <a>
                              {{$w->Membername}}
                          </a>                        
                         
                      </td>
                  
                      <td>
                      {{$w->Website}}
                      </td>
                      <td class="project_progress">
                          <a href="#" class="btn btn-primary btn-sm">{{ Carbon\Carbon::parse($w->created_at)->format('d-m-Y') }}</a>                     

                      </td>


                      
                      <td class="project-state">
                        @if($w->Status == 1)
                          
                          <span class="badge badge-success">Success</span>
                         @else 
                         <span class="badge badge-danger">Not Viewed</span>
                          @endif
                      </td>      
                      
                      <td class="project-actions text-right">

                          @if(Auth::user()->id == $w->UserId)
                          
                          <a class="btn btn-info btn-sm">
                              <i class="fas fa-folder">
                              </i>
                              Your site
                          </a>
                           @else  <!--{{Crypt::encrypt('id')}} -->
                           @php $UserId= Crypt::encrypt($w->UserId); @endphp

                          <!-- <a class="btn btn-success btn-sm" href="{{ route('view', $w->UserId) }}"> -->
                          <a class="btn btn-success btn-sm" href="{{ route('view', $UserId) }}">
                            
                              <i class="fas fa-eye">
                              </i>
                              Visit
                          </a>
                          @endif
                          <!-- <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Submit
                          </a>
                          <a class="btn btn-danger btn-sm" >
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a> -->
                      </td>
                  </tr>
                  @endforeach
              
                  
              </tbody>

              
          </table>
          <br>
          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1317234510818453"
     crossorigin="anonymous"></script>
<!-- disp2 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1317234510818453"
     data-ad-slot="9505722290"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
          


      <center class="mb-4 mt-3">{{$work->links()}}</center>              

          <style>
            .w-5{
              display: none;
            }
          </style>

        </div>
        @else
                  <center>
                      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1317234510818453"
     crossorigin="anonymous"></script>
<!-- disp2 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1317234510818453"
     data-ad-slot="9505722290"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                      
                        <h5 class="mt-5 ml-3" style="background-image:url('/storage/emoji/smilemoji.png'); height: 390px; background-repeat: no-repeat;   background-position: center;">Nothing here yet !, come back later</h5></center>
                   <!-- <img src="/storage/emoji/smilemojix.png" alt=""> -->
                   @endif
                   <br>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
   
</div>


@endsection
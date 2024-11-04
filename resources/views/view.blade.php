
@extends('layouts.myapp')

@section('content')

  <link rel="stylesheet" href="{{ asset('/logincode/dist/css/adminlte.min.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

         

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
    </section>


    

  <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    @foreach($work as $work)
    <h3 class="card-title">Your recent work with {{$work->Membername}} </h3>
    @endforeach
    @include('inc.messages') 
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 1%">
                    #
                </th>
                <th style="width: 7%">
                    Visitor Name
                </th>
                
                <th style="width: 10%">
                    Date Visited
                </th>

                <th style="width: 10%">
                    Next Visit Date
                </th>
                <th style="width: 3%" class="text-center">
                    Status
                </th>
                <th style="width: 3%" class="text-center">
                    Returned 
                </th>
                <th style="width: 2%" class="text-center">
                    Image 1 
                </th>
                <th style="width: 2%" class="text-center">
                    Image 2 
                </th>
                
                <th style="width: 15%">
                </th>
            </tr>
        </thead>
        
          @if($countmee2 >= 1)

        
        <tbody>
        @foreach($clicks as $click)
        <tr>
                <td>
                {{$click->id}}
                </td>
                <td>
                 
                    {{$click->ClickerName}}
                                   
                </td>
            
                <td class="project_progress">
                    <a class="btn btn-primary btn-sm">      
                    {{ Carbon\Carbon::parse($click->created_at)->format('d-m-Y') }}
                    </a>  
                </td>

                <td class="project_progress">
                    <a class="btn btn-warning btn-sm">      
                    {{ Carbon\Carbon::parse($click->Next_visit)->format('d-m-Y') }}
                    </a>  
                </td>
               
                <td class="project-state">
                        @if($click->Status == 1)
                          
                          <span class="badge badge-success">Success</span>
                         @else 
                         <span class="badge badge-danger">Not Approved</span>
                          @endif
                  </td>  
                      
                   <td class="project-state">
                        @if($click->Returned == 1)
                          
                          <span class="badge badge-success">Success</span>
                          @elseif($click->Returned == 0)
                         <span class="badge badge-danger">Not Returned</span>
                         @elseif($click->Returned == 2)
                         <span class="badge badge-info">Returning work</span>

                          @endif
                     </td> 

                     <td class="project-state">
                     <img data-enlargeable style="cursor: zoom-in" style="width:50px; height:50px; border-radius: 50px;" src="/public/public/image/{{$click->Image1}}" class="img-fluid" alt={{$click->Image1}}>

                     </td> 

                     <td class="project-state">
                     <img data-enlargeable style="cursor: zoom-in" style="width:50px; height:50px; border-radius: 50px;" src="/public/public/image/{{$click->Image2}}" class="img-fluid" alt={{$click->Image2}}>

                     </td> 
                     
                  @if($click->Returned == 0)

                  <td class="project-state">                      
                      
                     
                          @if($remainingtime <= -1)
                          <a class="btn btn-danger btn-sm " href="#">
                                 <i class="fas fa-clock mr-2 ">
                                   </i>
                                 Late {{$remainingtime}} Hours
                        </a>
                                      
                                    
                                      @else
                                      <a class="btn btn-info btn-sm " href="#">
                                          <i class="fas fa-clock mr-2">
                                          </i>
                                          {{$remainingtime}} Hours
                                    </a>
                                      @endif
                                  </a>
                          
                        
                      </td>
                      <td class="project-state">
                      <a href="#" class="btn btn-danger btn-sm">Return</a>
                     </td> 
                      @endif

                <td class="project-actions text-right mr-5">

                        
                            @if(!Auth::guest())
                                @if(Auth::user()->id == $click->OwnerId)

                               
                                @if($click->Status == false)
                               

                                <a class="btn btn-success btn-sm  mr-3" href="{{ route('approvework', $click->id) }}">
                                    <i class="fas fa-check">
                                    </i>                                   
                                    Approve 
                                </a>

                                <!-- <a class="btn btn-danger btn-sm" >
                                    <i class="fas fa-trash">
                                    </i>
                                    Report
                                </a> -->

                                @else

                               

                                <a class="btn btn-info btn-sm  mr-3" >
                                    <i class="fas fa-check">
                                    </i>                                   
                                    Approved
                                </a>

                                <!-- <a class="btn btn-info btn-sm" >
                                    <i class="fas fa-trash">
                                    </i>
                                    Report
                                </a> -->

                                @endif




                                
                                                
                                @endif   
                            @endif
                   
                </td>
            </tr>
           
        @endforeach
         
        </tbody>
        
         @else
         <center> <div class="card-body">
                  <div class="form-group">
                      
                    <h4 class="mt-1">Loks like user has not added their site yet ! Come back here later</h4><br><br>
                    <center><a href="{{route('home')}}" class="btn btn-success">Visit Others</a></center>  
                  </div>
        
          </div></center>
         @endif
    </table>
    

    <center class="mb-4 mt-3">{{$clicks->links()}}</center>              

<style>
  .w-5{
    display: none;
  }
</style>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
<!-- /.content -->

  
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
              <div class="card-header">

                 
              <div class="row">
                <h5 class="m-0">Rules to follow</h5> <p class="ml-3 " onselectstart="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" >Website : {{$work->Website}}</p>
                
                </div>
              </div>
           
                <p class="card-text"><br>
                  {{$work->Rules}}
                </p>

                <!-- <a href="{{route('application')}}" class="btn btn-success">Click here to Apply</a>
                <a href="#" class="card-link">#Required</a> -->
              </div>
            </div>
                  
        <!-- report user -->
        <div class="row ml-5">
        <center><a href="{{route('home')}}" class="btn btn-success mt-5 mr-6 ml-3">Back</a></center>
        @php $UserId= Crypt::encrypt($work->UserId); @endphp


        <center><a href="{{route('reportuser', $UserId)}}" class="btn btn-danger mt-5 ml-3">Report {{$work->Membername}}</a></center>
        </div>
        <!-- end report user -->

            

            <div class="card card-outline">
              
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Submit work here </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if($countclicks >= 1)

              {!! Form::open(['action' => 'App\Http\Controllers\HomeController@submitworkreturnagain', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
              @csrf
              <br>
              
              <input type="hidden" value="{{$work->id}}" name="workingid">
              
             
              
              <input type="hidden" value="{{$click->id}}" name="valueid">
        
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Are you returning work or First Visitor ?</label>
                                    <select name="optiontype" id="optiontype" required class="form-control select2bs4">
                                        <option></option>
                                        <option value="1">First Visit</option>
                                        <option value="2">Returning Work</option>
                                    </select>                   
                </div>
                  

                  <div class="form-group">
                    <label for="exampleInputEmail1">Did you do {{$work->PageViews}} pageviews ?</label>
                    <select class="form-control select2bs4" required name="views" style="width: 100%;">
                    <option selected="selected"></option>
                    <option  value="Yes">Yes</option>
                    <option value="No">No</option>
                    
                  </select>
                    <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Did you give {{$work->Adclicks}} high cpc ads ?</label>
                    <select class="form-control select2bs4" name="ads"  style="width: 100%;">
                    <option selected="selected"></option>
                    <option value="Yes" >Yes</option>
                    <option value="No">No</option>
                    
                  </select>
                    <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
                  </div>



                  <div class="form-group">
                  <input type="hidden" name="ownerid" value="{{ $work->UserId}}">

                    <label for="exampleInputFile">Upload screenshot as evidence of work done</label>
                    <div class="input-group mt-3">

                    Image 1  <input type="file" id="file-input" class="ml-3" onchange="loadPreview(this)" name="image1"   multiple/><br>
                    </div>
                    <div class="input-group mt-3">
                    Image 2  <input type="file" id="file-input" class="ml-3" onchange="loadPreview(this)" name="image2"   multiple/><br>
                    </div>
                    <div class="input-group mt-3">
                    Image 3  <input type="file" id="file-input" class="ml-3" onchange="loadPreview(this)" name="image3"   multiple/><br>
                    
                    </div>
                  </div><br>
                  <center>
                  <button type="submit" class="btn btn-success btn-lg btn-block text-center">Submit</button>
                  </center>
                </div>

                {!! Form::close() !!}
                <!-- /.card-body -->
                @else
                {!! Form::open(['action' => 'App\Http\Controllers\HomeController@submitwork', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
              @csrf
              <br>
             
              <input type="hidden" value="{{$work->id}}" name="workingid">

              <input type="hidden" name="ownerid" value="{{ $work->UserId}}">



              <div class="card-body">

                  <div class="form-group">

                  <input type="hidden" value="1" name="worktype"></input>
                    <label for="exampleInputEmail1">Did you do {{$work->PageViews}} pageviews ?</label>
                    <select class="form-control select2bs4" required name="views" style="width: 100%;">
                    <option selected="selected"></option>
                    <option  value="Yes">Yes</option>
                    <option value="No">No</option>
                    
                  </select>
                    <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Did you give {{$work->Adclicks}} high cpc ads ?</label>
                    <select class="form-control select2bs4" name="ads"  style="width: 100%;">
                    <option selected="selected"></option>
                    <option value="Yes" >Yes</option>
                    <option value="No">No</option>
                    
                  </select>
                    <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
                  </div>



                  <div class="form-group">

                    <label for="exampleInputFile">Upload screenshot as evidence of work done</label>
                    <div class="input-group mt-3">

                    Image 1  <input type="file" id="file-input" class="ml-3" onchange="loadPreview(this)" name="image1"   multiple/><br>
                    </div>
                    <div class="input-group mt-3">
                    Image 2  <input type="file" id="file-input" class="ml-3" onchange="loadPreview(this)" name="image2"   multiple/><br>
                    </div>
                    <div class="input-group mt-3">
                    Image 3  <input type="file" id="file-input" class="ml-3" onchange="loadPreview(this)" name="image3"   multiple/><br>
                    
                    </div>
                  </div><br>
                  <center>
                  <button type="submit" class="btn btn-success btn-lg btn-block text-center">Submit</button>
                  </center>
                </div>

                {!! Form::close() !!}

                @endif
            </div>

      
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
      
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->








</div>



<script>


$('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
  var src = $(this).attr('src');
  var modal;

  function removeModal() {
    modal.remove();
    $('body').off('keyup.modal-close');
  }
  modal = $('<div>').css({
    background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
    backgroundSize: 'contain',
    width: '100%',
    height: '100%',
    position: 'fixed',
    zIndex: '10000',
    top: '0',
    left: '0',
    cursor: 'zoom-out'
  }).click(function() {
    removeModal();
  }).appendTo('body');
  //handling ESC
  $('body').on('keyup.modal-close', function(e) {
    if (e.key === 'Escape') {
      removeModal();
    }
  });
});

</script>
@endsection
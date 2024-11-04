
@extends('layouts.myapp')

@section('content')

  <link rel="stylesheet" href="{{ asset('/logincode/dist/css/adminlte.min.css') }}">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">These page displays all pending visits. Members are waiting for your work !.</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>

        @if($count >= 1)
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 17%">
                          Visitor Name
                      </th>
                      <th style="width: 15%">
                          Owner Name
                      </th>
                      <th style="width: 15%">
                          Date Visited
                      </th>
                      <th style="width: 8%" class="text-center">
                         Return Status
                      </th>

                      

                      
                      <th style="width: 20%">
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
                      {{$w->ClickerName}}
                      </td>
                  
                      <td>
                      {{$w->OwnerName}}
                      </td>
                      
                      <td class="project_progress">
                          <a href="#" class="btn btn-primary btn-sm">{{ Carbon\Carbon::parse($w->created_at)->format('d-m-Y') }}</a>                     

                      </td>
                      
                      <td class="project-state">
                      
                         <span class="badge badge-danger">Not Returned</span>

                          
                      </td>        
                      @php $ClickerId= Crypt::encrypt($w->ClickerId); @endphp

                      <td class="project-state">
                        <a href="{{route('view', $ClickerId)}}" class="badge badge-success">Return Now</a>
                      </td>
                   
                  </tr>
                  @endforeach

                  @else
                  <center>  <h5 class="mt-5 ml-3" style="background-image:url('/storage/emoji/smilemoji.png'); height: 390px; background-repeat: no-repeat;   background-position: center;">Nothing here yet !, come back later</h5></center>
                   <!-- <img src="/storage/emoji/smilemojix.png" alt=""> -->
                   @endif
                   <br>
              </tbody>              
          </table>
          <br>
          <center class="mb-4 mt-3">{{$work->links()}}</center>   

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
   


@endsection
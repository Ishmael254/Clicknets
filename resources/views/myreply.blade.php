
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
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 5%">
                        Subject
                      </th>
                     
                      <th style="width: 9%">
                         In response to
                      </th>
                       <th style="width: 15%">
                          Message
                      </th>
                     
                      <th style="width: 10%" class="mr-3"> 
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach($data as $w)
                  <tr>
                      <td>
                      {{$w->id}}
                      </td>                                    
                      
                    <td>
                      {{$w->Subject}}
                      </td>
                      <td>
                      {{$w->In_reply_to}}
                      </td> 
                      <td>
                      {{$w->Message}}
                      </td> 
                                       
                                             
                      <td class="project-actions text-right">

                     
                          <a class="btn btn-success btn-sm" href="{{route('markmessage', $w->id)}}">
                              <i class="fas fa-check">
                              </i>
                              Mark as read
                          </a>
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
          
          <center class="mb-4 mt-3">{{$data->links()}}</center>   



          <style>
            .w-5{
              display: none;
            }
          </style>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
        
        
       
   
</div>


@endsection
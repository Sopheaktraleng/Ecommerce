@extends("admin.layouts.admin")
@section("content")
<div class="main-panel">
  <div class="container-fluid p-0 ">
    <h1 class="h3 mb-3 float-start">Slideshow</h1>
    <a href="{{route('form')}}" class="btn btn-primary float-end">Add Slideshow</a>
    <div style="clear:both"></div>
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
      </button>
      </div>
@endif
    <table class="table">
      <tr>
        <th>No</th>
        <th>Image</th>
        <th>Title</th>
        <th>Subtitle</th>
        <th>Text</th>
        <th>Link</th>
        <th>Action</th>
      </tr>
      <?php $i=1 ?>
      @foreach($slideshows as $slideshow)
      <tr>
        <td><?=$i++?></td>
        <td><img src="#"></td>
        <td>{{$slideshow['title']}}</td>
        <td>{{$slideshow['subtitle']}}</td>
        <td>{{$slideshow['text']}}</td>
        <td>{{$slideshow['link']}}</td>
        <td>
          <a href="{{route('enabledisable', ['id'=>$slideshow['ssid'],'action'=>$slideshow['enable']])}}">  
            <i class="align-middle" data-feather="{{$slideshow['enable']==1 ? 'eye':'eye-off'}}"></i>
          </a>
          <a href="{{route('moveupdown', ['id'=>$slideshow['ssid'],'action'=>'1'])}}">  
            <i class="align-middle" data-feather="arrow-up"></i>
          </a>
          <a href="{{route('moveupdown', ['id'=>$slideshow['ssid'],'action'=>'0'])}}">  
            <i class="align-middle" data-feather="arrow-down"></i>
          </a>
          <a href="#" data-toggle="modal" data-target="#deleteModal{{$slideshow['ssid']}}">>  
            <i class="align-middle" data-feather="trash"></i>
          </a>
          <a href="#">  
            <i class="align-middle" data-feather="edit"></i>
          </a>
        </td>
      </tr>
      <!-- Modal -->
<div class="modal fade" id="deleteModal{{$slideshow['ssid']}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this slideshow?
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-secondary" data-dismiss="modal">No</a>
        <a href="{{ route('delete', ['id' => $slideshow['ssid']])}}" type="button" class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>
<!--End Modal-->
      @endforeach
    </table>
    <div class="d flex">
      {!! $slideshows->links('pagination::bootstrap-5' ) !!}
    </div>
</div>
@endsection
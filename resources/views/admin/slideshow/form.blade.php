@extends("admin.layouts.admin")
@section("content")
<div class="main-panel">
  <div class="container-fluid p-0 ">
    <h1 class="h3 mb-3 float-start">Slideshow Form</h1>
    <form action="{{route('add')}}" method="post" enctype="multipart/form-data">
      @csrf <!-- {{csrf_field()}}-->
    <div class="form-group">
    <label for="txttitle">Title</label>
    <input type="text" class="form-control" id="txttitle" name="txttitle" >
    </div>
    <div class="form-group">
    <label for="txtsubtitle">Subtitle</label>
    <input type="text" class="form-control" id="txtsubtitle" name="txtsubtitle" >
  </div>
  <div class="form-group">
    <label for="tatext">Text</label>
    <textarea class="form-control" id="tatext" name="tatext" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="txtlink">Link</label>
    <input type="text" class="form-control" id="txtlink" name="txtlink" >
  </div>
  <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" id="chkenable" name="chkenable" checked>
  <label class="form-check-label" for="chkenable">Enable</label>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="fileimg" name="fileimg">
    <label class="custom-file-label" for="fileimg">Choose slideshow image</label>
  </div>
</div>
<input type="submit" class="btn btn-primary" value="Add Slideshow" />
  <a href="/admins/slideshow" class="btn btn-secondary">Cancel</a>
  </form>
    </div>
</div>
@endsection
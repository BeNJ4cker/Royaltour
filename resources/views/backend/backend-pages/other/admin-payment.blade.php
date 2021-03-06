@extends('backend.backend-layouts.admin-master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h1>แก้ไขหน้า ชำระเงิน</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <form action="/admin-save-payment-page" method="post">
        <div>
          @if($content == null)
          <textarea class="mcetext" rows="20" name="content"></textarea>
          @else
          <textarea class="mcetext" rows="20" name="content">{{$content->content}}</textarea>
          @endif
        </div>
        @csrf
        <br>
        <button class="btn btn-success form-control" type="submit" name="button">บันทึกเนื้อหา</button>
      </form>
    </div>
  </div>
</div>
@endsection
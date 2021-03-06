@extends('layouts.master')
@section('title')
Royaltour | ติดต่อเรา
@endsection
@section('meta')
Royaltour | ติดต่อเรา
@endsection
@section('content')
<style>
  .mapouter {
    position: relative;
    text-align: right;
    height: 100%;
    width: 100%;
  }

  .gmap_canvas {
    overflow: hidden;
    background: none !important;
    height: 100%;
    width: 100%;
  }
</style>
<div class="contactus">
  <div class="banner">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
          <div class="titleBanner">
            <h1>Royal Tour And Travel</h1>
            <p>- ติดต่อเรา -</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container listStaff mt-4">
    <div class="row">
      @foreach($branch as $show_branch)
      <div class="col-12">
        <h3 class="title"><img src='/assets/img/contactus/icn-phone.png' class='icon-title'>ติดต่อฝ่ายขายรอยัลทัวร์ ({{$show_branch->branch_name}})</h3>
      </div>
      <div class="col-12 mb-4">
        <div class="staffTemp">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col" class='text-center'>รายชื่อ</th>
                  <th scope="col" class='text-center'>เบอร์ติดต่อ</th>
                  <th scope="col" class='text-center'>Line ID</th>
                </tr>
              </thead>
              <tbody>
                @foreach($show_branch->subcon as $show_con)
                <tr>
                  <td class='text-center'>{{$show_con->staff_name}}</th>
                  <td class='text-center'>{{$show_con->staff_tel}}</td>
                  <td class='text-center'><a href="http://line.me/ti/p/@royaltour/{{$show_con->staff_line}}" target="_blank" rel="noopener noreferrer">{{$show_con->staff_line}}</a> </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <div class="mt-5">
    <div class="mapouter">
      <div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=royaltour&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
    </div>
    <div class="container mt-5">
      <div class="row mt-4">
        <div class="col-12">
          <h3 class="title"><img src='/assets/img/contactus/icn-phone.png' class='icon-title'>Send Message</h3>
        </div>
        <div class="col-12">
          <div class="contactForm">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success" role="alert">
              {{session('success')}}
            </div>
            @endif
            <form class="row" action="/contactus-process" method="post">
              <div class="col-md-4 mb-3 mb-md-0">
                <input class="form-control" type="text" name="contact_name" value="" placeholder="ชื่อ-นามสกุล *">
              </div>
              <div class="col-md-4 mb-3 mb-md-0">
                <input class=" form-control" type="email" name="contact_email" value="" placeholder="อีเมลล์ *">
              </div>
              <div class="col-md-4">
                <input class="form-control " type="text" name="contact_tel" value="" placeholder="โทรศัพท์ *">
              </div>
              <div class="col-md-12 mt-3">
                <textarea class="form-control " name="contact_info" rows="8" cols="80" placeholder="รายละเอียด"></textarea>
              </div>
              <div class="col-md-12 mt-3">
                @csrf
                <button class="btn btn-success  form-control" type="submit" name="button">ส่ง</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>


  @endsection
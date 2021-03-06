@extends('backend.backend-layouts.admin-master')
@section('content-header')
<h3>เพิ่มวันเดินทาง <i class="fas fa-map-marked-alt"></i></h3>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Column 3 -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <form class="admin-form" action="/admin/admin-add-tour-step-2/{{$tour_id}}" method="post" enctype="multipart/form-data">
                <!-- Add Day Function -->

                <hr />
                <div class="input-group col-xs-12 col-sm-12 col-md-12 col-lg-12 admin-input">
                    <label>วันเดินทาง (1)</label>
                    <input class="form-control" type="date" name="tour_start_date[]" placeholder="วันเดินทาง">
                </div>
                <div class="input-group col-xs-12 col-sm-12 col-md-12 col-lg-12 admin-input">
                    <label>วันกลับ (1)</label>
                    <input class="form-control" type="date" name="tour_end_date[]" placeholder="วันกลับ">
                </div>
                <div class="input-group col-xs-12 col-sm-12 col-md-12 col-lg-12 admin-input">
                    <label>ราคา (1)</label>
                    <input class="form-control" type="number" name="tour_price[]" placeholder="ราคา">
                </div>
                <div id="divAdditionalTourDates">

                </div>

                <hr />
                <a class="btn btn-block btn-info" id="btnAddTourDate" href="#">เพิ่มวันเดินทางอื่น</a>
                <hr />
                <!-- End Add Day Function -->
                @csrf
                <button class="btn btn-primary form-control" type="submit" name="button">ต่อไป</button>
            </form>
        </div>
        <!-- End Column 3 -->

    </div>
</div>

<script>
   tdIndex = 2;
   $("#btnAddTourDate").click(function(e) {
      e.preventDefault();
      $("#divAdditionalTourDates").append("<span class=\"additionalTourDateItemGrp\"></div><hr /><div class=\"input-group col-xs-12 col-sm-12 col-md-12 col-lg-12 admin-input\"> \
        <label>วันเดินทาง (" + tdIndex + ")</label> \
        <input class=\"form-control\" type=\"date\" name=\"tour_start_date[]\" placeholder=\"วันเดินทาง\"> \
        </div> \<div class=\"input-group col-xs-12 col-sm-12 col-md-12 col-lg-12 admin-input\"> \
        <label>วันกลับ (" + tdIndex + ")</label> \
        <input class=\"form-control\" type=\"date\" name=\"tour_end_date[]\" placeholder=\"วันกลับ\"> \
        </div> \
        <div class=\"input-group col-xs-12 col-sm-12 col-md-12 col-lg-12 admin-input\"> \
        <label>ราคา (" + tdIndex + ")</label> \
        <input class=\"form-control\" type=\"number\" name=\"tour_price[]\" placeholder=\"ราคา\"> \
        </div><a class=\"btn btn-sm btn-danger btnDeleteThisDateGroup\" href=\"#\">ลบวันเดินทาง/วันกลับชุดนี้ (" + tdIndex + ")</a></span>");
      tdIndex++;
   });
   $("#divAdditionalTourDates").on('click', '.btnDeleteThisDateGroup', function(e) {
      e.preventDefault();
      $(this).closest("span").remove();
   });
</script>

@endsection
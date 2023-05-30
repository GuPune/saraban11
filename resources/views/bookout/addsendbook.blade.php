@extends('layouts.menu.app')
@section('content')

<!-- query Dpname in Departments table by Department in user table -->
<?php $shortname = \App\CoreFunction\Helper::Fun(Auth::user()->Department ?? '0');?> <!-- {{$shortname}} -->

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-2"><br>
      <!-- เริ่ม -->

        <h4><i class="bi bi-pencil-square"></i> ส่งหนังสือ</h4>
        <hr><br>
<!-- ธุรการกรอก -->
            <div class="card">
            <div class="card-header">

            <i class="bi bi-person-fill"></i> ข้อมูลรายละเอียดผู้บันทึก
            </div>
            <div class="card-body" style="margin: 20px;">
<form action="{{url('/addsendbook/add')}}" method="post" enctype="multipart/form-data">
@csrf       
<div class="mb-3 row">
    <div class="col-sm-2 col-form-label">ชื่อ-นามสกุล</div>
    <div class="col-sm-9">
    <input class="form-control" name="Oname" type="text"  value="{{Auth::user()->name}} {{Auth::user()->Lastname}}" disabled>
    </div>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">หน่วยงาน</div>
    <div class="col-sm-9">
    <input class="form-control" name="Oagency" type="text"  value="{{Auth::user()->agency->agency_name}}" disabled>
    </div>
    </div>


    @if(Auth::user()->Department==null)
    <input class="form-control"  name="Odepartment" type="hidden">
    @else
    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">ฝ่าย</div>
    <div class="col-sm-9">
    <input class="form-control"  name="Odepartment" type="text"  value="{{$shortname}}" disabled>
    </div>
    </div>
    @endif
    
    @if(Auth::user()->Branch==null)
    <input class="form-control"  name="Obranch" type="hidden">
    @else
    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">สาขา</div>
    <div class="col-sm-9">
    <input class="form-control"  name="Obranch" type="text"  value="{{Auth::user()->branch->branche_name}}" disabled>
    </div>
    </div>
    @endif
    
            </div>
            </div>

<!-- ชั้นหนังสือ -->
    <br>
    <div class="card">
    <div class="card-header">
    <i class="bi bi-journal-text"></i>  ข้อมูลหนังสือ
    </div>
    <div class="card-body" style="margin: 20px">

   
    <div class="mb-3 row">
      <div class="col-sm-2 col-form-label">ถึงหน่วยงาน</div>
        <div class="col-sm-9">
            <input class="form-control" name="Oag_receive" type="text" placeholder="กรุณากรอกหน่วยงานผู้รับ" required>
        </div>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">ชื่อ-นามสกุล ผู้รับ</div>
    <div class="col-sm-9">
    <input class="form-control" name="Oname_receive" type="text" placeholder="กรุณากรอกชื่อ" required>
    </div>
    </div>

    <!-- <div class="mb-3 row">
    <div  class="col-sm-2 col-form-label">หมายเลขติดต่อ</div>
    <div class="col-sm-9">
    <input class="form-control"  value="-" type="text"  >
    </div>
    </div> -->

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">วันที่ออกหนังสือ</div>
    <div class="col-sm-9">
    <input class="form-control" type="date"  value="{{$date}}" disabled>
    <input class="form-control"  name="Odate" type="hidden" value="{{$date}}" >
    </div>    
    </div>

    <div class="mb-3 row">
    <div  class="col-sm-2 col-form-label">เลขที่หนังสือ</div>
    <div class="col-sm-9">
    <input class="form-control" type="text" value="{{$fdepartment}}/{{$dnumber}}/{{$cnumber}}/{{$year}}"disabled>
   <input class="form-control"  name="Onumber"  type="hidden"  value="{{$fdepartment}}/{{$dnumber}}/{{$cnumber}}/{{$year}}">
</div>
    </div>

    <div class="mb-3 row">
    <div  class="col-sm-2 col-form-label">เรื่อง</div>
    <div class="col-sm-9">
    <input class="form-control" type="text" value="{{$story}}" disabled>
    </div>
    </div>

    <input class="form-control" name="formid" type="hidden"  value="{{$id}}">

    <div class="mb-2 row">
    <div class="col-sm-2 col-form-label">หนังสือตอบกลับ</div>
    <div class="col-sm-9">
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="Ostatus" id="inlineRadio2" value="ต้องการหนังสือตอบกลับ" required>
    <label class="form-check-label" for="inlineRadio1"> ต้องการหนังสือตอบกลับ </label>
    </div>

    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="Ostatus" id="inlineRadio2" value="ไม่ต้องการหนังสือตอบกลับ" required>
    <label class="form-check-label" for="inlineRadio1"> ไม่ต้องการหนังสือตอบกลับ </label>
    </div>

    </div>
    </div> 
            </div>
            </div>

<br>

    <!-- <div class="card">
    <div class="card-header">
    <i class="bi bi-journal-text"></i> บันทึกการจัดส่งไปรษณีย์
    </div>
    <div class="card-body" style="margin: 20px">

<div class="mb-3 row">
    <div class="col-sm-2 col-form-label">วันที่ฝากส่ง :</div>
    <div class="col-sm-9">
    <input class="form-control" name="trdate" type="date" value="<?php echo date("Y-m-d"); ?>" required>
    </div>
    </div>



    <input class="form-control" name="trbearer" type="hidden" placeholder="กรุณากรอกเรื่อง" value="{{$type}}">

    <input class="form-control"  name="trnumber"  type="hidden" placeholder="กรุณากรอกเรื่อง" value="{{$fdepartment}}/{{$dnumber}}/{{$cnumber}}/{{$year}}">

    <div class="mb-3 row">
        <div class="col-sm-2 col-form-label">ผู้ฝากส่งหนังสือ :</div>
            <div class="col-sm-9">
                <select class="form-control" name="trdepositor" id="trdepositor" require="" >
                <option selected disabled value="">กรุณาเลือกผู้ฝากส่ง</option>

                </select>
            </div>
            <button type="button" class="btn btn-light" style ="border-radius: 100px; padding: .25rem 0.8rem" data-bs-toggle="modal" data-bs-target="#adddepositor"><i class="bi bi-plus-circle" style="font-size:20px;"></i></button>
    </div>
    
    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">ประเภทการส่ง :</div>
    <div class="col-sm-9">
    <select class="form-control" name="trtaye" aria-label="Default select example" required="">
    <option selected disabled value="">กรุณาเลือกประเภทการส่ง</option>
   @foreach($transport_type as $row)
    <option value="{{$row->transport_name}}">{{$row->transport_name}}</option>
   @endforeach
    </select>
    </div>
    </div>

</div>
</div> -->

<!-- บันทึก -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-success" type="submit">บันทึก</button>
  <!-- <a href="{{route('bookoutuser')}}" class="btn btn-secondary" type="button">ยกเลิก</a> -->
</div>
<!-- /บันทึก -->
</form>

                            <!-- Modal เพิ่มหนังสือจากในselect-->
                            <div class="modal fade" id="adddepositor" tabindex="-1" aria-labelledby="adddepositorLabel" aria-hidden="true">                            
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5" id="byLabel">บันทึกข้อมูลผู้ฝากส่ง</h4>
                                    <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                </div>
                                <div class="modal-body">
                                <div class="mb-3 row">
                                    <div class="col-sm-4 col-form-label">ผู้ฝากส่งหนังสือ</div>
                                        <div class="col-sm-8">
                                        <input class="form-control" name="depositor_name" id="depositor_name" type="text" placeholder="กรุณากรอกผู้ฝากส่ง" required>
                                        </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                    <button type="button" class="btn btn-success btn-save-depositor">บันทึกข้อมูล</button>
                                </div>
                                </div>
                            </div>
                            </div><br>
    <!-- /เพิ่มเรื่องในselectmodal -->

<!-- จบ -->
</div>
</div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- <script>
    jQuery(document).ready(function(){
    jQuery('#agency').change(function(){
       let cid=jQuery(this).val();
       jQuery.ajax({
        url:'/bookout/getbranch',
        type:'post',
        data:'cid='+cid+'&_token={{csrf_token()}}',
        success:function(result){
            jQuery('#branch').html(result)
        }
       })
    });

    jQuery('#branch').change(function(){
       let sid=jQuery(this).val();
       jQuery.ajax({
        url:'/bookout/getdepartment',
        type:'post',
        data:'sid='+sid+'&_token={{csrf_token()}}',
        success:function(result){
            jQuery('#department').html(result)
        }
       })
    });
    })
</script> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
        $.ajax({
                    dataType: 'json',
                    type:'GET',
                    url: '/transport/depositor',
                    success: function(datas){

$.each(datas, function(i, item) {
  $('#trdepositor').append($('<option>', {value:item.depositor_name, text:item.depositor_name}));
});
                    }
                })
    });
    $('body').on('click', '.btn-save-depositor', function () {
        var depositor_name = $('#depositor_name').val();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var token = '{{ csrf_token() }}';
        $.ajax({
                    dataType: 'json',
                    type:'POST',
                    data:{depositor_name:depositor_name,'_token': token},
                    url: '/transport/depositor/save',
                    success: function(datas){
                        var depositor_name = $('#depositor_name').val('');
                        newselect();
                    }
                })
        $('#adddepositor').modal('hide');
    });

function newselect(){
        $("#trdepositor").empty();
        $.ajax({
                    dataType: 'json',
                    type:'GET',
                    url: '/transport/depositor',
                    success: function(datas){

$('#trdepositor').append($('<option selected disabled>กรุณาเลือกผู้ฝากส่ง</option>'));
$.each(datas, function(i, item) {
  $('#trdepositor').append($('<option>', {value:item.depositor_name, text:item.depositor_name}));
});
                    }
                })
    }
</script>

@endsection 
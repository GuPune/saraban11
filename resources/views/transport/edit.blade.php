@extends('layouts.menu.app')
@section('content')


<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-2"><br>
      <!-- เริ่ม -->


    <h4><i class="bi bi-pencil-square"></i> แก้ไขส่งหนังสือ</h4><hr><br>
<!-- ธุรการกรอก -->
<div class="card">
    <div class="card-header">
   
            <i class="bi bi-person-fill"></i> ข้อมูลรายละเอียดผู้บันทึก
    </div>
        <div class="card-body" style="margin: 20px;">
            <div class="mb-3 row">
                <div class="col-sm-2 col-form-label">ชื่อ-นามสกุล</div>
                <div class="col-sm-9">
                <input class="form-control" type="text"  value="{{Auth::user()->name}} {{Auth::user()->Lastname}}" disabled>
                </div>
                </div>

                <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">หน่วยงาน</div>
    <div class="col-sm-9">
    <input class="form-control" type="text"  value="{{Auth::user()->agency->agency_name}}" disabled>
    </div>
    </div>


    <!-- query Dpname in Departments table by Department in user table -->
    <?php $shortname = \App\CoreFunction\Helper::Fun(Auth::user()->Department ?? '0');?> <!-- {{$shortname}} -->


    @if(Auth::user()->Department==null)
    <input class="form-control" type="hidden">
    @else
    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">ฝ่าย</div>
    <div class="col-sm-9">
    <input class="form-control" type="text"  value="{{$shortname}}" disabled>
    </div>
    </div>
    @endif
    
    @if(Auth::user()->Branch==null)
    <input class="form-control"   type="hidden">
    @else
    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">สาขา</div>
    <div class="col-sm-9">
    <input class="form-control"  type="text"  value="{{Auth::user()->branch->branche_name}}" disabled>
    </div>
    </div>
    @endif
    
    </div>
    </div>

</div>
</div>


<br>
 <form action="{{url('/transport/update/'.$transport->id)}}" method="post" enctype="multipart/form-data">
@csrf 
        <div class="card">
        <div class="card-header">
        <i class="bi bi-journal-text"></i> แก้ไขบันทึกการขนส่ง
        </div>
        <div class="card-body" style="margin: 20px">

        <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">วันที่ฝากส่ง :</div>
    <div class="col-sm-9">
    <input class="form-control" name="trdate" type="date" value="{{$transport->trdate}}" required>
    </div>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">เรื่อง :</div>
    <div class="col-sm-9">
    <input class="form-control"  name="trbearer"  type="text" value="{{$transport->trbearer}}" required>
    </div>
    </div>
    

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">เลขที่หนังสือ :</div>
    <div class="col-sm-9">
    <input class="form-control"  name="trnumber"  type="text" value="{{$transport->trnumber}}" required>
    </div>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">หน่วยงานผู้รับ :</div>
    <div class="col-sm-9">
    <input class="form-control" name="tag_receive" type="text" value="{{$transport->tag_receive}}" required>
    </div>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">ชื่อผู้รับ :</div>
    <div class="col-sm-9">
    <input class="form-control"  name="tname_receive"  type="text" value="{{$transport->tname_receive}}" required>
    </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2 col-form-label">ที่อยู่ผู้รับ :</div>
        <div class="col-sm-9">
            <input class="form-control"  name="taddr_receive"  type="text" value="{{$transport->taddr_receive}}" required>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2 col-form-label">ผู้ฝากส่งหนังสือ :</div>
        <div class="col-sm-9">
            <input class="form-control"  name="trdelivery"  type="text" value="{{$transport->trdelivery ?? ''}}"  required>
        </div>
    </div>


        <div class="mb-3 row">
        <div class="col-sm-2 col-form-label">ผู้นำส่งหนังสือ :</div>
            <div class="col-sm-9">
                <select class="form-control" name="trdepositor" id="trdepositor" >
                <option selected  value="{{$transport->trdepositor}}" >{{$transport->trdepositor}}</option>

                </select>
            </div>
            <button type="button" class="btn btn-light" style ="border-radius: 100px; padding: .25rem 0.8rem" data-bs-toggle="modal" data-bs-target="#adddepositor"><i class="bi bi-plus-circle" style="font-size:20px;"></i></button>
        </div>

        <div class="mb-3 row">
        <div class="col-sm-2 col-form-label">ประเภทการส่ง :</div>
        <div class="col-sm-9">
        <select class="form-control" name="trtaye" aria-label="Default select example" >
        <option selected="" value="{{$transport->trtaye}}" >{{$transport->transport_type->transport_name}}</option>
        @foreach($transport_types as $rowtype)
        <option value="{{ $rowtype->transport_name}}">{{ $rowtype->transport_name}}</option>
         @endforeach
         </select>       
        </div>
        </div>

        </div>
        </div>

    <!-- บันทึก -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-success" type="submit" style="margin-right:10px">บันทึก</button>
        @if(Auth::user()->role==0)
        <a href="{{route('transportuser')}}"class="btn btn-secondary" type="button">ยกเลิก</a>
        @elseif(Auth::user()->role==1)
        <a href="{{route('transportstaff')}}"class="btn btn-secondary" type="button">ยกเลิก</a>
        @elseif(Auth::user()->role==2)
        <a href="{{route('transportadmin')}}"class="btn btn-secondary" type="button">ยกเลิก</a>
        @endif    
        </div>
        <!-- /บันทึก -->
        </form>
                           <!-- Modal เพิ่มผู้ฝากส่งในselect-->
                           <div class="modal fade" id="adddepositor" tabindex="-1" aria-labelledby="adddepositorLabel" aria-hidden="true">                            
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5" id="byLabel">บันทึกข้อมูลผู้นำส่ง</h4>
                                    <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                </div>
                                <div class="modal-body">
                                <div class="mb-3 row">
                                    <div class="col-sm-4 col-form-label">ผู้นำส่งหนังสือ</div>
                                        <div class="col-sm-8">
                                        <input class="form-control" name="depositor_name" id="depositor_name" type="text" placeholder="กรุณากรอกผู้นำส่ง" required>
                                        </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                    <button type="button" class="btn btn-success btn-save-depositor">บันทึกข้อมูล</button>
                                </div>
                                </div>
                            </div>
                            </div>

                        <br>
                            <!-- /เพิ่มเรื่องในselectmodal -->
        
<!-- จบ -->
</div>
</div>
</div>

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


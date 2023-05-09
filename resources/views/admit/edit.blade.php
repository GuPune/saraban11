@extends('layouts.menu.app')
@section('content')

<!-- query Dpname in Departments table by Department in user table -->
<?php $shortname = \App\CoreFunction\Helper::Fun(Auth::user()->Department ?? '0');?> <!-- {{$shortname}} -->

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid py-2">
                 <br><h4><i class="bi bi-pencil-square"></i> แก้ไขลงทะเบียนรับหนังสือ</h4> <hr><br>

            <!-- ธุรการกรอก -->
                <!-- card -->
                    <div class="card">
                        <!-- card-header -->
                        <div class="card-header">
                            <i class="bi bi-person-fill"></i> ข้อมูลรายละเอียดผู้บันทึก
                        </div>
                        <!-- /card-header -->

                            
                            <!-- card-body -->
                                <div class="card-body" style="margin: 20px;">

                                    <div class="mb-3 row">
                                        <div class="col-sm-2 col-form-label">ชื่อ-นามสกุล : </div>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="Ename" class="form-control" value="{{$admit->Ename}}"  disabled aria-label="First name" name="Ename"   >
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-2 col-form-label" >หน่วยงาน : </div>
                                            <div class="col-sm-9">
                                                <select class="form-control"  value="{{$admit->Eagency}}"  name="Eagency"  disabled>
                                                    <option selected>{{Auth::user()->agency->agency_name}}</option>
                                                </select>
                                            </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-2 col-form-label">ฝ่าย/สาขา : </div>
                                            <div class="col-sm-9">
                                                <select class="form-control"  value="{{$admit->Edepartmentbranch}}" name="Edepartmentbranch"   disabled>
                                                    <option selected>{{$shortname}}/{{Auth::user()->branch->branche_name}}</option>
                                                </select>
                                            </div>
                                    </div>


                        </div>
                        </div>
                      <!-- /card -->
                        <br>

    @if($admit->Status->Sname=='รอดำเนินการ')         
                               
                        <form action="{{url('/admit/edit/'.$admit->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- ข้อมูลหนังสือ -->
                        <!-- card -->
                        <div class="card">
                            <div class="card-header">
                                <i class="bi bi-journal-text"></i>  ข้อมูลหนังสือ
                            </div>
                            <!-- card-body -->
                            <div class="card-body" style="margin: 20px">

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">หน่วยงาน ผู้รับ</div>
                                <div class="col-sm-9">
                                <select class="form-control" name="Eagency_receive" id="agency"  required>
                                <!-- <option selected="" disabled>กรุณาเลือกหน่วยงาน</option> -->
                                <option selected  value="{{$admit->Eagency_receive}}" >{{$admit->agency->agency_name}}</option>
                                @foreach($agency as $rowabs)
                                <option value="{{ $rowabs->agency_id}}">{{ $rowabs->agency_name}}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">สาขางาน ผู้รับ</div>
                                <div class="col-sm-9">
                                <select class="form-control" name="Ebranch_receive" id="branch"  required>
                                <option value="{{$admit->Ebranch_receive}}">{{$admit->branch->branche_name}}</option>
                                </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">ฝ่าย ผู้รับ</div>
                                <div class="col-sm-9">
                                <select class="form-control input-lg" name="Edepartment_receive" id="department"  required>
                                <option value="{{$admit->Edepartment_receive}}">{{$admit->department->Dpmname}}</option>
                                </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">ชื่อ-นามสกุลผู้รับ :</div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="ชื่อ" value="{{$admit->Ename_receive}}"  name="Ename_receive" required>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">วันที่รับ :</div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date" value="{{$admit->Edate_receive}}" name="Edate_receive" required>
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">วันที่ส่งออก :</div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date"  name="Edate_out"  value="{{$admit->Edate_out}}" required>
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">เรื่อง :</div>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="Esubject" id="Esubject"  >
                                    <option selected  value="{{$admit->Esubject}}">{{$admit->Esubject}}</option>
                                   
                                    </select>
                                    </div>
                                    <button type="button" class="btn btn-light" style ="border-radius: 100px; padding: .25rem 0.8rem" data-bs-toggle="modal" data-bs-target="#story"><i class="bi bi-plus-circle" style="font-size:20px;"></i></button>
                            </div>


                            <div class="mb-3 row">
                             <div class="col-sm-2 col-form-label">หนังสือจากหน่วยงาน :</div>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="Ebookeagency" id="Ebookeagency" >
                                    <option selected  value="{{$admit->Ebookeagency}}">{{$admit->Ebookeagency}}</option>

                                    </select>
                                    </div>
                                    <button type="button" class="btn btn-light" style ="border-radius: 100px; padding: .25rem 0.8rem" data-bs-toggle="modal" data-bs-target="#by"><i class="bi bi-plus-circle" style="font-size:20px;"></i></button>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">เลขที่รับหนังสือ :</div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="กรุณากรอกเลขหนังสือ"value="{{$admit->Ebook_receipt}}" aria-label="default input example"  name="Ebook_receipt"  required>
                                    </div>
                            </div>
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                        <div class="col-sm-9">
                                            <input class="form-control" type="hidden" type="text" placeholder="สถานะ" aria-label="default input example"  name="Estatus" value="1" >
                                        </div>
                                </div>
                            <!-- /card-body -->
                            </div>
                        <!-- /card -->
                        </div>
                        <br>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-success" type="submit" style="margin-right:10px" data-bs-toggle="modal" data-bs-target="#confirm">บันทึก</button>
                                @if(Auth::user()->role==0)
                                <a href="{{route('admituser')}}" class="btn btn-secondary" type="button">ยกเลิก</a>
                                @elseif(Auth::user()->role==1)
                                <a href="{{route('admitstaff')}}" class="btn btn-secondary" type="button">ยกเลิก</a>
                                @elseif(Auth::user()->role==2)
                                <a href="{{route('admitadmin')}}" class="btn btn-secondary" type="button">ยกเลิก</a>
                                @endif      
                            </div>
                        </form>
            
                      <!-- Modal เพิ่มเรื่องในselect-->
                      <div class="modal fade" id="story" tabindex="-1" aria-labelledby="storyLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title fs-5" id="storyLabel">บันทึกข้อมูลเรื่อง</h4>
                                        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                    </div>


                                    <div class="modal-body">
                                    <div class="mb-3 row">
                                    <div class="col-sm-2 col-form-label">เรื่อง </div>
                                        <div class="col-sm-10">
                                     <input class="form-control" name="amstory_name" id="amstory_name" type="text" placeholder="กรุณากรอกเรื่อง" required>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                        <button type="button" class="btn btn-success btn-save">บันทึกข้อมูล</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /เพิ่มเรื่องในselectmodal -->

                            <!-- Modal เพิ่มหนังสือจากในselect-->
                            <div class="modal fade" id="by" tabindex="-1" aria-labelledby="byLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5" id="byLabel">บันทึกหนังสือจากหน่วยงาน</h4>
                                    <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                </div>

                                <div class="modal-body">
                                <div class="mb-3 row">
                                    <div class="col-sm-4 col-form-label">หนังสือจากหน่วยงาน</div>
                                        <div class="col-sm-8">
                                     <input class="form-control" name="amagency_name" id="amagency_name" type="text" placeholder="กรุณากรอกหน่วยงาน" required>
                                        </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                    <button type="button" class="btn btn-success btn-save-amagency">บันทึกข้อมูล</button>
                                </div>
                                </div>
                            </div>
                            </div>

                        <br>
                            <!-- /เพิ่มเรื่องในselectmodal -->


    @elseif($admit->Status->Sname=='ไม่ตอบรับ')

    <form action="{{url('/admit/edit/'.$admit->id)}}" method="post" enctype="multipart/form-data">
    @csrf
                       <!-- ข้อมูลหนังสือ -->
                        <!-- card -->
                        <div class="card">
                            <div class="card-header">
                                <i class="bi bi-journal-text"></i>  ข้อมูลหนังสือ
                            </div>
                            <!-- card-body -->
                            <div class="card-body" style="margin: 20px">

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">หน่วยงาน ผู้รับ</div>
                                <div class="col-sm-9">
                                <select class="form-control" name="Eagency_receive" id="agency"  required="">
                                <option selected="" value="" >กรุณาเลือกหน่วยงาน</option>
                                @foreach($agency as $rowabs)
                                <option value="{{ $rowabs->agency_id}}">{{ $rowabs->agency_name}}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">สาขางาน ผู้รับ</div>
                                <div class="col-sm-9">
                                <select class="form-control" name="Ebranch_receive" id="branch"  required="">
                                <option value="">กรุณาเลือกสาขา</option>
                                </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">ฝ่าย ผู้รับ</div>
                                <div class="col-sm-9">
                                <select class="form-control input-lg" name="Edepartment_receive" id="department"  required="">
                                <option value="">กรุณาเลือกฝ่าย</option>
                                </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">ชื่อ-นามสกุลผู้รับ :</div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="ชื่อ"  name="Ename_receive" required>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">วันที่รับ :</div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date" value="<?php echo date("Y-m-d") ?>" name="Edate_receive" required>
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">วันที่ส่งออก :</div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date"  name="Edate_out" required>
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">เรื่อง :</div>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="Esubject" id="Esubject"  required="">
                                    <option selected  disabled value="">กรุณาเลือกเรื่อง</option>
                                   
                                    </select>
                                    </div>
                                    <button type="button" class="btn btn-light" style ="border-radius: 100px; padding: .25rem 0.8rem" data-bs-toggle="modal" data-bs-target="#story"><i class="bi bi-plus-circle" style="font-size:20px;"></i></button>
                            </div>


                            <div class="mb-3 row">
                             <div class="col-sm-2 col-form-label">หนังสือจากหน่วยงาน :</div>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="Ebookeagency" id="Ebookeagency" required="">
                                    <option selected  disabled value="">กรุณาเลือกหน่วยงาน</option>

                                    </select>
                                    </div>
                                    <button type="button" class="btn btn-light" style ="border-radius: 100px; padding: .25rem 0.8rem" data-bs-toggle="modal" data-bs-target="#by"><i class="bi bi-plus-circle" style="font-size:20px;"></i></button>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">เลขที่รับหนังสือ :</div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="กรุณากรอกเลขหนังสือ" aria-label="default input example"  name="Ebook_receipt"  required>
                                    </div>
                            </div>
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                        <div class="col-sm-9">
                                            <input class="form-control" type="hidden" type="text" placeholder="สถานะ" aria-label="default input example"  name="Estatus" value="1" >
                                        </div>
                                </div>
                            <!-- /card-body -->
                            </div>
                        <!-- /card -->
                        </div>
                        <br>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-success" type="submit" style="margin-right:10px" data-bs-toggle="modal" data-bs-target="#confirm">บันทึก</button>
                                <a href="{{route('admitstaff')}}" class="btn btn-secondary" type="button">ยกเลิก</a>
                            </div>
                        </form>
            
                                    <!-- Modal เพิ่มเรื่องในselect-->
                                    <div class="modal fade" id="story" tabindex="-1" aria-labelledby="storyLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title fs-5" id="storyLabel">บันทึกข้อมูลเรื่อง</h4>
                                        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                    </div>
                                    <div class="modal-body">
                                    <div class="mb-3 row">
                                    <div class="col-sm-2 col-form-label">เรื่อง </div>
                                        <div class="col-sm-10">
                                     <input class="form-control" name="amstory_name" id="amstory_name" type="text" placeholder="กรุณากรอกเรื่อง" required>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                        <button type="button" class="btn btn-success btn-save">บันทึกข้อมูล</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /เพิ่มเรื่องในselectmodal -->

                            <!-- Modal เพิ่มหนังสือจากในselect-->
                            <div class="modal fade" id="by" tabindex="-1" aria-labelledby="byLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5" id="byLabel">บันทึกหนังสือจากหน่วยงาน</h4>
                                    <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                </div>
                                <div class="modal-body">
                                <div class="mb-3 row">
                                    <div class="col-sm-4 col-form-label">หนังสือจากหน่วยงาน</div>
                                        <div class="col-sm-8">
                                     <input class="form-control" name="amagency_name" id="amagency_name" type="text" placeholder="กรุณากรอกหน่วยงาน" required>
                                        </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                    <button type="button" class="btn btn-success btn-save-amagency">บันทึกข้อมูล</button>
                                </div>
                                </div>
                            </div>
                            </div>

                        <br>
                            <!-- /เพิ่มเรื่องในselectmodal -->

    @endif    

<!-- end -->
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    jQuery(document).ready(function(){
    jQuery('#agency').change(function(){
       let cid=jQuery(this).val();
       jQuery.ajax({
        url:'/admit/getbranch',
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
        url:'/admit/getdepartment',
        type:'post',
        data:'sid='+sid+'&_token={{csrf_token()}}',
        success:function(result){
            jQuery('#department').html(result)
        }
       })
    });
    })
$(document).ready(function(){
        $.ajax({
                    dataType: 'json',
                    type:'GET',
                    url: '/admit/story',
                    success: function(datas){

$.each(datas, function(i, item) {
  $('#Esubject').append($('<option>', {value:item.amstory_name, text:item.amstory_name}));
});

                    }
                })
                $.ajax({
                    dataType: 'json',
                    type:'GET',
                    url: '/admit/admitagency',
                    success: function(data){
$.each(data, function(x, itemx) {
  $('#Ebookeagency').append($('<option>', {value:itemx.amagency_name, text:itemx.amagency_name}));
});

                    }
                })
    });
    $('body').on('click', '.btn-save-amagency', function () {
        var amagency_name = $('#amagency_name').val();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var token = '{{ csrf_token() }}';
        $.ajax({
                    dataType: 'json',
                    type:'POST',
                    data:{amagency_name:amagency_name,'_token': token},
                    url: '/admit/admitagency/save',
                    success: function(datas){
                        var amagency_name = $('#amagency_name').val('');
                        newselectEbookeagency();

                    }
                })
                $('#by').modal('hide');
    })
    $('body').on('click', '.btn-save', function () {
        var amstory_name = $('#amstory_name').val();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var token = '{{ csrf_token() }}';
        $.ajax({
                    dataType: 'json',
                    type:'POST',
                    data:{amstory_name:amstory_name,'_token': token},
                    url: '/admit/story/save',
                    success: function(datas){
                        var amstory_name = $('#amstory_name').val('');
                        newselect();
                    }
                })
        $('#story').modal('hide');
    });

function newselect(){
        $("#Esubject").empty();
        $.ajax({
                    dataType: 'json',
                    type:'GET',
                    url: '/admit/story',
                    success: function(datas){

$('#Esubject').append($('<option selected disabled>กรุณาเลือกเรื่อง</option>'));
$.each(datas, function(i, item) {
  $('#Esubject').append($('<option>', {value:item.amstory_name, text:item.amstory_name}));
});
                    }
                })
    }
function newselectEbookeagency(){
$("#Ebookeagency").empty();

$.ajax({
            dataType: 'json',
            type:'GET',
            url: '/admit/admitagency',
            success: function(datas){
$('#Ebookeagency').append($('<option selected disabled required>กรุณาเลือกเรื่อง</option>'));
$.each(datas, function(i, item) {
$('#Ebookeagency').append($('<option>', {value:item.amagency_name, text:item.amagency_name}));
});
            }
        })

}

</script>
@endsection

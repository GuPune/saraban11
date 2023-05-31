@extends('layouts.menu.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<style>
    .selected {
        background-color: #696969  ;
        color : #fff;
    }
</style>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-2"><br>
      <!-- เริ่ม -->
      <!-- ธุรการกรอก -->
      <div class="card">
            <div class="card-header">

            <i class="bi bi-person-fill"></i> ข้อมูลรายละเอียดผู้บันทึก
            </div>
            <div class="card-body" style="margin: 20px;">
<form action="{{url('/storetransport')}}" method="post" enctype="multipart/form-data">
@csrf       
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
    <input class="form-control" type="text"  value="{{$shortname ?? 'Unknown Dpname'}}" disabled>
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
<!-- รายละเอียด -->
      <div class="card">
    <div class="card-header">
    <i class="bi bi-journal-text"></i> บันทึกการขนส่ง
    </div>
    <div class="card-body" style="margin: 20px">

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">วันที่ฝากส่ง :</div>
    <div class="col-sm-9">
    <input class="form-control" name="trdate" type="date" value="<?php echo date("Y-m-d"); ?>" required>
    </div>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">เลขที่หนังสือ :</div>
    <div class="col-sm-9">
    <input id="idb" class="form-control"  name="trnumber"  type="text" placeholder="กรุณากรอกเลขที่หนังสือ" required>
    </div>
    <button type="button" class="btn btn-light" style ="border-radius: 100px; padding: .25rem 0.8rem" data-bs-toggle="modal" data-bs-target="#adddeBno"><i class="bi bi-plus-circle" style="font-size:20px;"></i></button>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">เรื่อง :</div>
    <div class="col-sm-9">
    <input id="title" class="form-control" name="trbearer" type="text" placeholder="กรุณากรอกเรื่อง" required>
    </div>
    </div>

    

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">หน่วยงานผู้รับ :</div>
    <div class="col-sm-9">
    <input class="form-control" name="tag_receive" type="text" placeholder="กรุณากรอกหน่วยงานผู้รับ" required>
    </div>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">ชื่อผู้รับ :</div>
    <div class="col-sm-9">
    <input class="form-control"  name="tname_receive"  type="text" placeholder="กรุณากรอกชื่อผู้รับ" required>
    </div>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">ที่อยู่ผู้รับ :</div>
    <div class="col-sm-9">
    <input class="form-control"  name="taddr_receive"  type="text" placeholder="กรุณากรอกที่อยู่ผู้รับ" required>
    </div>
    </div>

    
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
</div>

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


      <!-- Modal popup ค้นหาหนังสือส่งออก-->
  <div class="modal fade" id="adddeBno" tabindex="-1" aria-labelledby="adddepositorLabel" aria-hidden="true">                            
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5" id="byLabel">เพิ่มหนังสือส่งออก</h4>
                                    <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                </div>
                                <div class="modal-body" style="background-color: #e0e0e0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">หนังสือส่งออก</h3>

                                            <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input id="searchInput" type="text" name="table_search" class="form-control float-right" placeholder="ค้นหา">

                                                <div class="input-group-append">
                                                <button type="submit" id="button-addon2" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <div style="height:300px;overflow-y:auto;"> 
                                            <table id="myTable" class="table text-nowrap" >
                                            <thead style="font-size:12px;position: sticky;">
                                                <tr>
                                                <th>เลขที่หนังสือ</th>
                                                <th>เรื่อง</th>
                                                <th>วันที่ออกหนังสือ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($bookoutrow as $row)
                                            <tr>
                                                <!-- เลขที่หนังสือ -->
                                                <td>{{$row->Onumber}}</td>

                                                <!-- เรื่อง -->
                                                <td>
                                                    <?php 
                                                    if(strlen($row->form->story) > 30){
                                                    echo trim(mb_substr($row->form->story, 0, 30).'...');
                                                    }
                                                    elseif(strlen($row->form->story) <= 30){
                                                        echo trim(mb_substr($row->form->story, 0, 30));
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <!-- วันที่ออกหนังสือ -->
                                                <td>
                                                    <?php
                                                    $myDate= $row->form->date;
                                                    $myYear = date('Y', strtotime($myDate));
                                                    $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                                    $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                                    $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                    echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                    ?>
                                                </td>
                                            </tr>                      
                                            </tbody>
                                            @endforeach
                                        </table>
                                            
                                        </div>
                                        </div>
                                        <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                        <!-- <input type="" id="selectedData" style="width:100%"> -->
                                    </div>
                                    </div>
                                </div>
   
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                    <!-- <button type="button" class="btn btn-success btn-save-depositor">เพิ่มหนังสือ</button> -->
                                    <button id="okButton" type="button" class="btn btn-success ">เพิ่มหนังสือ</button>
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

<script>
$(document).ready(function()
{
    $.ajax(
    {
        dataType: 'json',
        type:'GET',
        url: '/transport/depositor',
        success: function(datas)
        {
            $.each(datas, function(i, item) 
            {
                    $('#trdepositor').append($('<option>', {value:item.depositor_name, text:item.depositor_name}));
            });
        }
    })
});

$('body').on('click', '.btn-save-depositor', function () 
{
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

function newselect()
{
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
};

$(document).ready(function() 
{
    $('#myTable tbody tr').click(function() {
        // Deselect all other rows
        $('#myTable tbody tr').removeClass('selected');

        // Select the clicked row
        $(this).addClass('selected');
    });

    $('#searchInput').on('keyup', function() {
        var searchValue = $(this).val().toLowerCase();
        $('#myTable tbody tr').each(function() {
            var rowText = $(this).text().toLowerCase();
            $(this).toggle(rowText.indexOf(searchValue) > -1);
        });
    });

    $('#okButton').click(function() {
        // Get the selected row
        var selectedRow = $('#myTable tbody tr.selected');
        
        if (selectedRow.length > 0) {
            // Retrieve the data of the selected row
            var userId = selectedRow.find('td:nth-child(1)').text().trim();
            var name = selectedRow.find('td:nth-child(2)').text().trim();
            var email = selectedRow.find('td:nth-child(3)').text().trim();

            // Set the selected row's data in the input field
            //$('#selectedData').val('ID: ' + userId + ', Title: ' + name + ', Date: ' + email);
            $('#title').val(name);
            $('#idb').val(userId);


            // Perform any additional actions with the selected data here
            // ...

            // Reset the selection
            selectedRow.removeClass('selected');
            $('#adddeBno').modal('hide');
        }
    });
});
</script>



@endsection 
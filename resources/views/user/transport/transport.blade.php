@extends('layouts.menu.app')
@section('content')

<style>
.btn-1{
    color:#fff;
		background-color:#fc973f;
			}
.btn-1:hover,.btn-1:focus,.btn-1.focus{
		color:#fff;
		background:#ff8000;
		}
 #titleicon1{
    color:#ff8000;
    }


#titleicon2{
    color:#22bf28;
    }

    .box1{
    background-color:#5A5E63;
}
.btn-2{
    color:#fff;
		background-color:#8C93FD;
			}
.btn-2:hover,.btn-2:focus,.btn-2.focus{
		color:#fff;
		background:#6F78FA;
		}

.btn-3{
     color:#fff;
	 	background-color:#F44C61;
			}
.btn-3:hover,.btn-3:focus,.btn-3.focus{
		color:#fff;
		background:#F4354D;
		}
        .page-item.active .page-link {
    margin: 2px;
    border-radius: 50px;
    z-index: 5;
    width:40px;
    color: #fff;
    text-align: center;
    background-color: #fc973f; 
    border-color: #fc973f; 
}
.page-item .page-link {
    border-radius: 50px;
    margin: 0.5px;
    width:35px;
    color: #fff;
    text-align: center;
    color: gray;
    border:none;
}
     



</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header"> 
                    <div class="d-flex">
                    <div class="p-2 flex-grow-1">
                        รายงานการขนส่ง
                    </div>
                    <!-- แก้ไขรายละเอียด -->
                    @foreach($setallow as $export)
                    @if($export->id==27&&$export->userstatus==1)
                    <div class="p-2">
                    <a href="{{url('/transport/export')}}" target="_blank" type="button" class="btn btn-outline-secondary">ออกรายงาน</a>
                    </div>
                    @else

                    @endif
                    @endforeach  
                </div>
                </div>
                    <div class="card-body">
                    <form action="/transport/user" method="GET">          
                       <div class="mb-3 row">
                         <div class="container input-group" style="width: 30rem;">
                               คำค้นหา  &nbsp;
                            <input type="search" name="search" placeholder="Search" aria-label="Search" class="form-control">
                               &nbsp;<button class="btn btn-1" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                               &nbsp;<button type="reset" class="btn btn-3"><i class="fa fa-times"></i></button>
                         </div>
                        </div>
                        <div class=" container input-group mb-3" style="width: 18rem;">
                            วันที่ &nbsp;<input class="form-control form-control-sm" type="date" id="searchdate" style="width: 100px" name="searchdate" >&nbsp; 
                            <input class="form-control form-control-sm" type="date" id="searchend" style="width: 100px" name="searchend" >
                            </div>
                            <p class="text-center text-gray" style="font-size:10px;margin-left:20px;">ค้นหาเลขหนังสือ/หน่วยงานผู้รับ</p> 
            </form><br>
            <div id="search_list"></div>
                <div class="tab-pane fade show active" id="custom-tabs-five-normal" role="tabpanel" aria-labelledby="custom-tabs-five-normal-tab">
                @if($transportcount <= 0)
                            <div class="alert alert-danger text-center" role="alert">
                            <i class="bi bi-exclamation-triangle-fill"></i> ไม่มีข้อมูลในตาราง ณ ขณะนี้
                            </div>
                @else 
                <table class="table table-bordered table-sm" >
                                <thead class="box1 text-white text-center">
                                    <tr>
                                        <td>ลำดับ</td>
                                        <td>เลขที่หนังสือ</td>
                                        <td>ผู้ฝากส่ง</td>
                                        <td>หน่วยงานผู้รับ</td>
                                        <td>ประเภทการส่ง</td>
                                        <td>เลขขนส่ง</td>
                                        <td>วันที่ส่ง</td>        
                                        <td>ผู้ส่ง</td>  
                                         <!-- แก้ไขรายละเอียด -->
                                        @foreach($setallow as $editdetail)
                                        @if($editdetail->id==24&&$editdetail->userstatus==1)
                                        <td>แก้ไขรายละเอียด</td> 
                                        @else

                                        @endif
                                        @endforeach  
                                        
                                         <!-- เพิ่มข้อมูลแก้ไข -->
                                         @foreach($setallow as $addtransport)
                                        @if($addtransport->id==25&&$addtransport->userstatus==1)
                                        <td>เพิ่มการขนส่ง</td>
                                            @else

                                        @endif
                                        @endforeach

                                          <!-- แก้ไขขนส่ง-->
                                          @foreach($setallow as $edittransport)
                                        @if($edittransport->id==26&&$edittransport->userstatus==1)
                                        <td>แก้ไขขนส่ง</td>
                                            @else

                                        @endif
                                        @endforeach
                                        <td>รายละเอียด</td>
                                        </tr>
                                    @php($i=1)
                                </thead>
                                <tbody>
                                @foreach($transport as $row)
                                <tr>
                                        <td >{{$transport->firstItem()+$loop->index}}</td>
                                        <td>{{$row->trnumber}}</td>
                                        <td>{{$row->trdepositor}}</td>
                                        <td>{{$row->tag_receive}}</td>                                        <td>{{$row->trtaye}}</td>
                                        <td>{{$row->ttransport}}</td>    
                                        @if($row->trdatesent==null)
                                        <td></td>
                                        @else
                                        <td>
                                        <?php
                                        $myDate= $row->trdatesent;
                                        $myYear = date('Y', strtotime($myDate));
                                        $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                        $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                        ?> </td>
                                        @endif
                                        <td>{{$row->trdelivery}}</td>
                                        
                                    <!-- แก้ไขรายละเอียด -->
                                        @foreach($setallow as $editdetail)  
                                        @if($editdetail->id==24&&$editdetail->userstatus==1&&$row->trsid==3)
                                        <td></td>
                                        @elseif($editdetail->id==24&&$editdetail->userstatus==1&&$row->trsid==1)
                                         <td class="text-center"><a href="{{url('/transport/edit/'.$row->id)}}" type="button" class="btn btn-warning" style ="border-radius: 20px; padding: .25rem 1rem" ><i class="bi bi-pencil-square text-white" style="font-size:20px;"></i></a></td>
                                        
                                        @endif
                                       @endforeach


                                        <!-- เพิ่มข้อมูลแก้ไข -->  
                                        @foreach($setallow as $addtransport)
                                        @if($addtransport->id==25&&$addtransport->userstatus==1)
                                        <td class="text-center"><button type="button" class="btn btn-info" style ="border-radius: 20px; padding: .25rem 1rem" data-bs-toggle="modal" data-bs-target="#addModal{{$row->id}}"><i class="bi bi-plus-square" style="font-size:20px;"></i></button></td>
                                            @else

                                        @endif
                                        @endforeach 
                                        <div class="modal fade" id="addModal{{$row->id}}" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title fs-5" id="addModalLabel">บันทึกรายงานการส่งออก <?php echo $row->trnumber ?></h4>
                                                    <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                </div>
                                <form action="{{url('/transport/add/'.$row->id)}}" method="post" enctype="multipart/form-data">
                                @csrf 
                                            <div class="modal-body">
                                                <div class="mb-3 row">           
                                                    <div class="col-sm-3 col-form-label">ผู้นำส่ง</div>
                                                        <div class="col-sm-9">
                                                        <select class="form-control" name="trdelivery" required="">
                                                        <option selected value="" disabled>กรุณาเลือกผู้นำส่ง</option>
                                                        @foreach($depositor as $rowde)
                                                        <option value="{{$rowde->depositor_name}}">{{$rowde->depositor_name}}</option>
                                                        @endforeach
                                                        </select>
                                                        </div>
                                                    </div>         
                                                <div class="mb-3 row">
                                                    <div class="col-sm-3 col-form-label">ผู้ให้บริการ</div>
                                                        <div class="col-sm-9">
                                                        <select class="form-control" name="trservice" required="">
                                                        <option selected value="" disabled>กรุณาเลือกประเภทการส่ง</option>
                                                        @foreach($service as $rowse)
                                                        <option value="{{$rowse->service_name}}">{{$rowse->service_name}}</option>
                                                        @endforeach
                                                        </select>
                                                </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                    <div class="col-sm-3 col-form-label">วันที่ส่ง</div>
                                                        <div class="col-sm-9">
                                                        <input class="form-control" name="trdatesent"  type="date" value="<?php echo date("Y-m-d"); ?>" required aria-label="default input example">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                    <div class="col-sm-3 col-form-label">เลขขนส่ง</div>
                                                        <div class="col-sm-9">
                                                        <input class="form-control" name="ttransport" type="text" placeholder="กรุณากรอกเลขขนส่ง" required>
                                                        </div>
                                                    </div>     
                                                    
                                        </div>       
                                        <input class="form-control" value="3" name="trsid" type="hidden">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                        <button class="btn btn-success" type="submit">บันทึก</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                        </div>
                                    </form>
                                <!-- /เพิ่มข้อมูลแก้ไข -->

                                       <!-- แก้ไข -->
                                       @foreach($setallow as $edittransport)
                                        @if($edittransport->id==26&&$edittransport->userstatus==1)
                                        <td class="text-center"><button type="button" class="btn btn-success" style ="border-radius: 20px; padding: .25rem 1rem" data-bs-toggle="modal" data-bs-target="#editModal{{$row->id}}"><i class="bi bi-pencil-square text-white" style="font-size:20px;"></i></button></td>
                                          
                                        @else
                                       
                                        @endif
                                      @endforeach 
                                        <div class="modal fade" id="editModal{{$row->id}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title fs-5" id="editModalLabel">แก้ไขรายงานการส่งออก <?php echo $row->trnumber ?></h4>
                                                    <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                </div>
                                    <form action="{{url('/transport/add/'.$row->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf 
                                            <div class="modal-body">
                                                <div class="mb-3 row">           
                                                    <div class="col-sm-3 col-form-label">ผู้นำส่ง</div>
                                                        <div class="col-sm-9">
                                                        <select class="form-control" name="trdelivery" aria-label="Default select example" required>
                                                        <option selected="" value="{{ $row->trdelivery}}">{{ $row->trdelivery}}</option>
                                                        @foreach($depositor as $rowdeedit)
                                                        <option value="{{$rowdeedit->depositor_name}}">{{$rowdeedit->depositor_name}}</option>
                                                        @endforeach
                                                        </select>
                                                        </div>
                                                    </div>       

                                                <div class="mb-3 row">
                                                    <div class="col-sm-3 col-form-label">ผู้ให้บริการ</div>
                                                        <div class="col-sm-9">

                                                        <select class="form-control" name="trservice" aria-label="Default select example" required>
                                                        <option selected="" value="{{ $row->trservice}}">{{ $row->trservice}}</option>
                                                        @foreach($service as $rowseedit)
                                                        <option value="{{$rowseedit->service_name}}">{{$rowseedit->service_name}}</option>
                                                        @endforeach
                                                        </select>
                                                </div>

                                                    </div>
                                                    <div class="mb-3 row">
                                                    <div class="col-sm-3 col-form-label">วันที่ส่ง</div>
                                                        <div class="col-sm-9">
                                                        <input class="form-control" name="trdatesent"  type="date" value="<?php echo $row->trdatesent ?>" required aria-label="default input example">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                    <div class="col-sm-3 col-form-label">เลขขนส่ง</div>
                                                        <div class="col-sm-9">
                                                        <input class="form-control" value="<?php echo $row->ttransport ?>" name="ttransport" type="text" placeholder="กรุณากรอกเลขขนส่ง" aria-label="default input example" required>
                                                        </div>
                                                    </div>    

                                        </div>      
                                        <input class="form-control" value="3" name="trsid" type="hidden">

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                        <button class="btn btn-success" type="submit">บันทึก</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                        <!-- </div> -->
                                    </form>
                                 <!-- /แก้ไข -->
                                 
                                        <!-- รายละเอียด -->
                                         <td class="text-center"><button type="button" class="btn btn-dark" style ="border-radius: 20px; padding: .25rem 1rem" data-bs-toggle="modal" data-bs-target="#exampleModal{{$row->id}}"><i class="bi bi-eye" style="font-size:20px;"></i></button></td>
                                        <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                        <div class="modal-header" >
                                                        <h4 class="modal-title fs-5 " id="staticBackdropLabel">รายละเอียดการส่งออก</h4>
                                                        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                        </div>
                                                        <div class="modal-body">                          
                                                            
                                                        <div class="icon text-center" style="margin-right:10px"><font></font>
                                                    <i class="bi bi-envelope-paper text-gray" style="font-size:60px;"></i></div> <br>

                                                        <div class="d-flex justify-content-center text-dark">
                                                        <div class="col-4">เลขที่หนังสือออก : </div>
                                                        <div class="col-7" style="margin-left:50px">{{$row->trnumber}}</div>
                                                        </div>

                                                        

                                                       <div class="d-flex justify-content-center text-dark">
                                                        <div class="col-4">วันที่ฝากส่ง : </div>
                                                        <div class="col-7" style="margin-left:50px">
                                                        <?php
                                                        $myDate= $row->trdate;
                                                        $myYear = date('Y', strtotime($myDate));
                                                        $myYearBuddhist = $myYear+543 ;
                                                        $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                        ?> 
                                                       </div>
                                                        </div>      

                                                        <div class="d-flex justify-content-center text-dark">
                                                        <div class="col-4">ผู้ส่งหนังสือ : </div>
                                                        <div class="col-7" style="margin-left:50px">{{$row->trsender}}</div>
                                                        </div>   

                                                        <div class="d-flex justify-content-center text-dark">
                                                        <div class="col-4">หน่วยงานผู้รับ : </div>
                                                        <div class="col-7" style="margin-left:50px">{{$row->tag_receive}}</div>
                                                        </div>

                                                        <div class="d-flex justify-content-center text-dark">
                                                        <div class="col-4">ผู้รับ : </div>
                                                        <div class="col-7" style="margin-left:50px">{{$row->tname_receive}}</div>
                                                        </div> 
                                                        
                                                        <div class="d-flex justify-content-center text-dark">
                                                        <div class="col-4">ผู้ฝากส่งหนังสือ : </div>
                                                        <div class="col-7" style="margin-left:50px">{{$row->trdepositor}}</div>
                                                        </div>

                                                        <div class="d-flex justify-content-center text-dark">
                                                        <div class="col-4">ประเภทการส่ง : </div>
                                                        <div class="col-7" style="margin-left:50px">{{$row->trtaye}}</div>
                                                        </div>

                                                        <div class="d-flex justify-content-center text-dark">
                                                        <div class="col-4">ผู้นำส่งหนังสือ : </div>
                                                        <div class="col-7" style="margin-left:50px">{{$row->trdelivery}}</div>
                                                        </div>
                                                        <div class="d-flex justify-content-center text-dark">
                                                        <div class="col-4">ผู้ให้บริการขนส่ง : </div>
                                                        <div class="col-7" style="margin-left:50px">{{$row->trservice}}</div>
                                                        </div>

                                                        <div class="d-flex justify-content-center text-dark">
                                                        <div class="col-4">วันที่ส่ง : </div>
                                                        <div class="col-7" style="margin-left:50px">
                                                        @if($row->trdatesent==null)

                                                        @else
                                                        <?php
                                                        $myDate= $row->trdatesent;
                                                        $myYear = date('Y', strtotime($myDate));
                                                        $myYearBuddhist = $myYear+543 ;
                                                        $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                        ?> 
                                                        @endif
                                                       </div>
                                                        </div>

                                                        <div class="d-flex justify-content-center text-dark">
                                                        <div class="col-4">เลขไปรษณีย์ : </div>
                                                        <div class="col-7" style="margin-left:50px">{{$row->ttransport}}</div>
                                                        </div>
                                                        
                                                        <div class="d-flex justify-content-center text-dark">
                                                        <div class="col-4">สถานะ : </div>
                                                        <div class="col-7" style="margin-left:50px">{{$row->Status->Sname}}</div>
                                                        </div>
                                                    <!-- /justify-content-around -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>                                                        </div>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- /รายละเอียด -->
                                    </tr>                         
                                </tbody>
                                @endforeach
                            </table><br>
                    <div class="d-flex justify-content-center" >
                    {{$transport->links() }} 
                    </div>
                            @endif
                          </div>
                    </div>
                </div>

                        <br>
                    </div>
<!-- จบ -->
        </div>
    </div>
</div>
<script type="text/javascript">
  var url = document.location.toString();
  if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
  } 

  $('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
    if(e.target.hash == "#activity"){
      $('.nano').nanoScroller();
    }
  })
</script>
@endsection
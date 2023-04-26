@extends('layouts.menu.app')
@section('content')

<style>
    /* body {
    background: rgb(99, 39, 120)
} */

.form-control:focus {
    box-shadow: none;
    border-color: #fc973f;
}

.profile-button {
    color: white;
    background: #FF833C;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    color: white;
    background: #FE6B00;
}

.profile-button:focus {
    color: white;
    background: #FE6B00;
    box-shadow: none
}

.profile-button:active {
    color: white;
    background: #FE6B00;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #FF833C;
    color: #fff;
    cursor: pointer;
}
.img3{
        background-position: center;
        background-size: cover;  
        border-radius: 50%;
        width: 200px;
        height: 200px;
      }
.img2{
        background-position: center;
        background-size: cover;  
        border-radius: 50%;
        width: 160px;
        height: 160px;
      }
</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid py-4">
            <!-- เริ่ม -->

                <div class=" ">
                <div class="container rounded bg-white card-outline card-orange mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <span>
                            @if($user->Image==null)
                            <i class="bi bi-person-circle" style="font-size:100px;margin-left:10px"></i>
                            @else
                            <img  style='background-image:url(/files/file//<?php echo $user->Image ?>);' class='img3'  class="img-thumbnail">
                            @endif                  
                             <!-- <img class="rounded-circle mt-5" width="150px" src="/files/file/{{ Auth::user()->Image }}"> -->
                             <a  href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal{{Auth::user()->id}}">
                             <i class="bi bi-pencil-square" style="margin-left:110px;font-size:20px;"></a></i></span>
                                <span class="font-weight-bold">{{Auth::user()->name}} {{Auth::user()->Lastname}}</span><span class="text-black-50">{{Auth::user()->email}}</span><span> </span>

                        </div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">แก้ไขโปรไฟล์</h4> 
                                </div>

                <div class="modal fade" id="exampleModal{{Auth::user()->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="{{url('/profileupdate/image/'.Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title fs-5" id="addModalLabel">แก้ไขโปรไฟล์</h3>
                            <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:20px'></i>
                        </div>
                       <div class="modal-body">
                            <div class="d-flex flex-column align-items-center text-center ">
                            @if($user->Image==null)
                            <i class="bi bi-person-circle" style="font-size:120px;"></i>
                            @else
                            <img  style='background-image:url(/files/file//<?php echo $user->Image ?>);' class='img2'  class="img-thumbnail">
                            @endif
                            <span> </span></div>
                            <br>
                            <div class="mb-2 row">
                            <div class="col-sm-3 col-form-label">รูปภาพ</div>
                                <div class="col-sm-9">
                                    <input type="file"  name="Image" placeholder="Image" value="{{Auth::user()->Image}}">
                                     @error('Image')
                                     <div class="my-2">
                                         <span class="text-danger">{{$message}}</span>
                                     </div>
                                     @enderror
                                    </div>

                                <br>
                                <input type="hidden" name="Image" value="{{Auth::user()->Image}}">
                            </div>
                        </div>
                            <div class="modal-footer">
                                <div class = "form-group"><input type="submit" name="File" class = "btn btn-success" value="บันทึก"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>

                
<form action="{{url('/profile/updateprofile/'.Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                                <div class="row mt-2">
                                    <div class="col-md-4"><label class="labels">คำนำหน้า</label>
                                    <select class="form-control" name="Prefix" value="{{Auth::user()->Prefix}} "  required>
                                        <option value="{{$user->Prefix}}">{{$user->Prefix}}</option>
                                        @foreach($prefix as $row)
                                                    <option value="{{ $row->Prename}}">{{$row->Prename}}</option>
                                                @endforeach

                                    </select>
                                    </div>
                                    <div class="col-md-4"><label class="labels">ชื่อ</label>
                                    <input type="text" class="form-control"  name="name" value="{{Auth::user()->name}} "></div>
                                   
                                    <div class="col-md-4"><label class="labels">นามสกุล</label>
                                    <input type="text" class="form-control" name="Lastname" value="{{Auth::user()->Lastname}} "  ></div>
                                
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control"  name="Tel" value="{{Auth::user()->Tel}} "></div>
                                   
                                    <div class="col-md-12"><label class="labels">ที่อยู่</label>
                                    <input type="text" class="form-control"  name="address"value="{{Auth::user()->address}} "></div>
                                    
                                    <div class="col-md-12"><label class="labels">อีเมล</label>
                                    <input type="text" class="form-control"  name="email" value="{{Auth::user()->email}} "></div>
                                </div>

                                <div class="mt-5 text-center"><button class="btn profile-button" type="submit">บันทึกข้อมูล</button>
                                <a href="{{ route('profile') }}" class="btn btn-secondary" type="button">ย้อนกลับ</a></div>
                            </div>
                        </div>
                        
                        @if(Auth::user()->role==2)
                        <div class="col-md-4">
                            <div class="p-3 py-5">
                              <div class="d-flex justify-content-between align-items-center experience"><span> Edit</span>  <a href="{{url('/changepassword/'.Auth::user()->id)}}" class="btn-light"> <span class="border px-3 p-1 add-experience" type="button"><i class="fa fa-plus" ></i>&nbsp;แก้ไขรหัสผ่าน</button></span></a></div><br>
                                <div class="col-md-12"><label class="labels">หน่วยงาน</label>
                                <select class="form-control" name="Agency"  id="agency" required>
                                            <option selected="" value="{{$user->Agency}}">{{$user->agency->agency_name}}</option>
                                                @foreach($agency as $row)
                                                    <option value="{{$row->agency_id}}">{{ $row->agency_name}}</option>
                                                @endforeach
                                        </select>
                                
                                <div class="col-md-12"><label class="labels">สาขา</label>
                                <select class="form-control" name="Branch"  id="branch" required>
                                            <option value="{{$user->Branch}}">{{$user->branch->branche_name}}</option>
                                               
                                        </select>
                                </div>

                                <div class="col-md-12"><label class="labels">แผนก</label>
                                <select class="form-control" name="Department" id="department"  required>
                                            <option value="{{$user->Department}}" >{{$user->department->Dpmname}}</option>
                                               
                                        </select>
                                </div>
                            @else
                            <div class="col-md-4">
                            <div class="p-3 py-5">
                              <div class="d-flex justify-content-between align-items-center experience"><span> Edit</span>  <a href="{{url('/changepassword/'.Auth::user()->id)}}" class="btn-light"> <span class="border px-3 p-1 add-experience" type="button"><i class="fa fa-plus" ></i>&nbsp;แก้ไขรหัสผ่าน</button></span></a></div><br>
                                <div class="col-md-12"><label class="labels">หน่วยงาน</label>
                                <input type="text" class="form-control"  value="{{$user->agency->agency_name}}" disabled>
                                <input type="hidden" class="form-control" name="Agency" value="{{$user->Agency}}" >
                                </div>
                                
                                @if($user->Branch==null)

                                @else
                                <div class="col-md-12"><label class="labels">สาขา</label>
                                <input type="text" class="form-control"  value="{{$user->branch->branche_name}}" disabled>
                                @endif
                                <input type="hidden" class="form-control" name="Branch" value="{{$user->Branch}}" >
                                </div>

                                
                                @if($user->Department==null)

                                @else
                                <div class="col-md-12"><label class="labels">แผนก</label>
                                <input type="text" class="form-control"  value="{{$user->department->Dpmname}}" disabled>
                                @endif
                                <input type="hidden" class="form-control" name="Department" value="{{$user->Department}}" >
                                </div>
                                @endif

                                @if(Auth::user()->role==2)
                                <br><div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"  name="role" value="0" id="inlineRadio2"  {{ ($user->role=="0")? "checked" : "" }} >
                                    <label class="form-check-label" for="inlineRadio1"> ผู้ใช้งาน </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" value="1"  id="inlineRadio2"  {{ ($user->role=="1")? "checked" : "" }} >
                                    <label class="form-check-label" for="inlineRadio1"> ธุรการ </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" value="2"  id="inlineRadio2"  {{ ($user->role=="2")? "checked" : "" }} >
                                    <label class="form-check-label" for="inlineRadio1"> แอดมิน </label>
                                    </div>
                                </div>
                                @else

                                @endif
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
                </div>
            </form>

            <!-- จบ -->
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    jQuery(document).ready(function(){
    jQuery('#agency').change(function(){
       let cid=jQuery(this).val();
       jQuery.ajax({
        url:'/profile/getbranch',
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
        url:'/profile/getdepartment',
        type:'post',
        data:'sid='+sid+'&_token={{csrf_token()}}',
        success:function(result){
            jQuery('#department').html(result)
        }
       })
    });
    })
 </script>
@endsection


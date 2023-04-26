@extends('layouts.menu.app')
@section('content')
<style>
    /* body {
    background: rgb(99, 39, 120)
} */

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {

    background:  #BA68C8;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background:  #682773;
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
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
    background: #682773;
    color: #fff;
    cursor: pointer;
}
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid py-4">
            <!-- เริ่ม -->
            <form action="{{route('addclaimuser')}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- <div class="card card-outline card-orange "> -->
                <div class=" ">
                <div class="container rounded bg-white card-outline card-purple mt-5 mb-5">
                    <div class="row">
                    <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <span><i class="bi bi-person-circle" style="font-size:120px;margin-left:10px"></i></span>
                        </div>
                        </div>

                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">เพิ่มข้อมูลผู้ใช้</h4>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4"><label class="labels">คำนำหน้า</label>
                                    <select class="form-control" name="Prefix"   aria-label="Default select example"  required="">
                                        <option class="text-secondary" value="">คำนำหน้า </option>
                                            @foreach($prefix as $row)
                                                <option value="{{$row->Prename}}">{{ $row->Prename}}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                    <div class="col-md-4"><label class="labels">ชื่อ</label><input type="text" id="name"class="form-control" placeholder="ชื่อ" name="name" required></div>
                                    <div class="col-md-4"><label class="labels">นามสกุล</label><input type="text" id="Lastname" class="form-control" name="Lastname"  placeholder="นามสกุล" required></div>
                                </div>
                                <div class="row mt-3">

                                    <div class="col-md-12"><label class="labels">ที่อยู่</label><input type="text" id="address"class="form-control" placeholder="กรุณากรอกที่อยู่" name="address"></div>

                                    <div class="col-md-12"><label class="labels">หน่วยงาน</label>
                                        <select class="form-control" name="Agency"  id="agency" required="">
                                            <option selected="" value="" disabled>กรุณาเลือกหน่วยงาน</option>
                                                @foreach($agency as $row)
                                                    <option value="{{$row->agency_id}}">{{ $row->agency_name}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12"><label class="labels">สาขา</label>
                                        <select class="form-control" name="Branch"  id="branch" required>
                                            <option value="">กรุณาเลือกสาขา</option>
                                             
                                        </select>
                                    </div>
                                    <div class="col-md-12"><label class="labels">แผนก</label>
                                        <select class="form-control" name="Department" id="department" required>
                                            <option value="" >กรุณาเลือกแผนก</option>
                                             
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">บันทึกข้อมูล</button>
                                <a href="{{ route('claim') }}" class="btn btn-secondary" type="button">ย้อนกลับ</a></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="p-3 py-5">

                              <div class="col-md-12"><label class="labels">เบอร์โทรศัพท์</label>
                              <input type="text" id="Tel" class="form-control" placeholder="กรุณากรอกเบอร์โทรศัพท์" name="Tel" ></div>
                              <div class="col-md-12"><label class="labels">อีเมล</label>
                              <input type="text" id="email" class="form-control" placeholder="กรุณากรอกอีเมล" name="email" required>
                                @error('email')
                                    <small class="text-danger text-center">{{$message}}</small>
                                @enderror
                              </div>
                              <div class="col-md-12"><label class="labels">รหัสผ่าน</label>
                              <input type="password" id="password" class="form-control" placeholder="กรุณากรอกรหัสผ่าน" name="password" required autocomplete="new-password"   ></div>
                              <div class="col-md-12"><label class="labels">รหัสผ่านใหม่</label>
                              <input type="password" id="password_confirmation" class="form-control" placeholder="ยืนยันรหัสผ่าน" name="password_confirmation" required autocomplete="new-password" ></div>
                             
                              <br><div class="mb-2 row">
                                <div class="col-sm-9">
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"  name="role" value="0" id="inlineRadio2" required>
                                    <label class="form-check-label" for="inlineRadio1"> ผู้ใช้ </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" value="1"  id="inlineRadio2" required>
                                    <label class="form-check-label" for="inlineRadio1"> เจ้าหน้าที่ </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" value="2"  id="inlineRadio2" required>
                                    <label class="form-check-label" for="inlineRadio1"> แอดมิน </label>
                                    </div>
                                </div>
                                </div>


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
        url:'/claim/getbranch',
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
        url:'/claim/getdepartment',
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


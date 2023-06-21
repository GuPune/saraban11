@extends('layouts.menu.app')
@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<style>
  .font1{
    font-family: 'Sarabun', sans-serif;
  }
    .box {
        width: 30px;
        height: 30px;
        border: solid 1px #ff0000;
    }
    .card {
        /* margin: 2.5cm; */
        margin: 30mm 45mm 30mm 45mm;
        size: 21cm 29.7cm landscape;
    }
    #box1 {
        float: left;
        width: auto;
        height: 100px;
        /* display: block;  */
        /* display: inline-block; */
      }

      body{
        font-size: 15px;
      }
.text-details {
  word-wrap: break-word;
  text-align: justify;
  text-justify: distribute;
  text-indent:50px;
}

</style>

<!-- 
  layout หน้า  PDF preview ก่อนบันทึก
 -->


<!-- query Dpname in Departments table by Department in user table -->
<?php
$bName = \App\CoreFunction\Helper::Bran($form->formbranch ?? '21')['bName'];
$bAddrA = \App\CoreFunction\Helper::Bran($form->formbranch ?? '21')['bAddr'];
$bAddr = explode('Tel:', $bAddrA);
?>


<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-4">
        <!-- start -->

        <!-- card -->       
     <div class="font1">
      <div class="card" >
          <div class="card-header" style="padding: 2cm 2cm 2cm 3cm">
             <!-- ความจริงกว้างสูง 268x152 -->
             <!-- head-form -->
             
             @if($form->type=='โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์')  
             <div class="" style="text-align:center; margin-top: 20px">
              <img src="{{ asset('dist/img/logoIDD.png') }}"  height="50" style="margin-right:30px;margin-top:15px">
              <img src="{{ asset('dist/img/logoiddrives.png') }}" height="100" style="margin-right:15px;">
              <img src="{{ asset('dist/img/logopro.png') }}"height="80">
            </div><br>
             <div class="" >

             <!-- ดึงข้อมูลสาขาและที่อยู่จาก Database  -->
             
             <h5 style="text-align:center;font-weight:bold;margin-bottom:0;font-size:20pt">โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์ สาขา{{$bName}} 
                <span style="font-size:13pt;font-weight:400;font-weight:bold;">เลขที่ผู้เสียภาษี 0405536000531</span></h5>
             <p style="font-size:16pt;text-align:center; margin:unset;">ที่อยู่: {{$bAddr[0]}} <br>Tel: {{$bAddr[1] ?? ''}}</p>
             <p style="font-size:12pt;text-align:center; margin:unset;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด </p>
             <div class="" style="font-size:12pt; text-align:center">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000 Tel : 043-228 899  Email : idofficer@iddrives.co.th
             <br></div>
            </div>
             <hr noshade="noshade" size="2"><br>
           
             @elseif($form->type=='บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')
             <div class=""  style="text-align: center;">
             <img src="{{ asset('dist/img/logoiddrives.png') }}" height="100">
             <div class="flex-fill" style="font-size:14pt; margin-top: 10px">
             <h5 style="font-size:16pt;font-weight:bold;"> บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่) </h5>
             200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น เลขที่ผู้เสียภาษี 0405536000531 <br>
             Tel : 043-228 899 www.iddrives.co.th Email : idofficer@iddrives.co.th </div>
            </div>
            <hr noshade="noshade" size="2" style="margin-top:10px"><br>
            
            @elseif($form->type=='สถานตรวจสภาพรถศูนย์ตรอ.ไอดี')
            <div class="" style="text-align:center;">
             <img src="{{ asset('dist/img/logoINS.png') }}" height="80">
             <img style="margin-left:20px" src="{{ asset('dist/img/logoins.png') }}" height="80">
             </div><br>
             <div class="" >

             <!-- ดึงข้อมูลสาขาและที่อยู่จาก Database  -->   
             <h5 style="font-size:20pt;text-align:center;font-weight:bold;margin-bottom:0">สถานตรวจสภาพรถ ศูนย์ตรอ.ไอดี สาขา{{$bName}}
                <span style="font-size:14pt;">เลขที่ผู้เสียภาษี 0405536000531</span></h5>
             <p style="font-size:14pt;text-align:center; margin:unset;">ที่อยู่: {{$bAddr[0]}} <br>Tel: {{$bAddr[1] ?? ''}}</p>
             <p style="font-size:12pt;text-align:center; margin:unset;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด</p>
             <div class="" style="font-size:12pt; text-align:center">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000 Tel : 043-228 899  Email : idofficer@iddrives.co.th
             <br></div>
            </div>
             
             <hr noshade="noshade" size="2"><br>
                      
             @elseif($form->type=='ศูนย์ฝึกอบรม')
             <div class="" style="text-align:center; ">
              <img src="{{ asset('dist/img/logoIDD.png') }}"  height="50" style="margin-right:30px;margin-top:15px">
              <img src="{{ asset('dist/img/logoiddrives.png') }}" height="100" style="margin-right:25px;">&nbsp;&nbsp;
              <img src="{{ asset('dist/img/logotz2.png') }}"height="80">
            </div>
            <br>
            <div class="" >
              <h5 style="font-size:20pt;text-align:center;font-weight:bold;margin-bottom:0">ศูนย์ฝึกอบรมเทรนนิ่งเซนเตอร์  <span style="font-size:14pt;">เลขที่ผู้เสียภาษี 0405536000531</span></h5>
              <p style="font-size:14pt;text-align:center; margin:unset;">ที่อยู่: 58/1 ม. 9 ถ.มิตรภาพ ต.ทับกวาง อ.แก่งคอย จ.สระบุรี 18260 <br> Email: id.trainingcenter@iddrives.co.th
                      Tel :082-7513888  www.trainingzenter.com</p>
              <p style="font-size:12pt;text-align:center; margin:unset;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด</p>
              <div class="" style="font-size:12pt; text-align:center">
                ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000 Tel : 043-228 899 Email : idofficer@iddrives.co.th           
                <br>
              </div>
            </div>
             
             <hr noshade="noshade" size="2"><br>
             @endif
              <!-- /head-form -->

           <!-- bodyform -->
            <div class="card-body" style="padding: 1cm 0 0 0;">
            <form action="{{url('/addsendbook')}}" method="post" enctype="multipart/form-data">
             @csrf  
            <div class="d-flex " style="margin-top: -40px">
              เลขที่หนังสือ&nbsp;{{$form->fdepartment}}/{{$form->dnumber}}/{{$form->cnumber}}/{{$form->year}} 
            </div><br><br>
            

            <div class="d-flex " style="width:fit-content; position:relative; left:63.5%;">
            วันที่&nbsp;
            <?php
            $myDate= $form->date;
            $myYear = date('Y', strtotime($myDate));
            $myYearBuddhist = $myYear + 543;
            $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
            $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
            echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
            ?>     
            </div><br><br>

            <div class="d-flex justify-content-start">
            <b>เรื่อง</b>&nbsp;&nbsp;{{$form->story}}  
            </div>

            <div class="d-flex justify-content-start"style="margin-top:5px;">
            <b>เรียน</b>&nbsp;&nbsp;{{$form->learn}}
            </div>

            @if($form->quote==null)

            @else
            <div class="d-flex justify-content-start"style="margin-top:5px;">
              <b>อ้างถึง</b>&nbsp;&nbsp;{{$form->quote}}
            </div>
            @endif

            @if($form->enclosure==null)
            <br>
            @else
            <div class="d-flex" style="margin-right:10px;margin-top:5px;">
            <div class="flex-shrink-0">
            สิ่งที่ส่งมาด้วย&nbsp;&nbsp;
            </div>
            <div class="flex-grow-1 ms-3">
            <?php echo $form->enclosure ?>
            <input type="hidden" value="{{$form->enclosure}}" class="form-control" style="width: 150px" name="enclosure">  
            </div>
            </div>
            @endif <br>
            
            <div class="d-flex flex-column text-details" style="margin-left: 40px;margin-right: 40px;">
            <?php echo $form->details ?></p>
            </div><br><br><br>
            
            <div style="width:fit-content; position:relative; left:62.5%">
            <div  style="text-align:center"><!-- <div class="d-flex justify-content-center"> -->
            {{$form->ctphone}}
            </div>
            <br>
            <div style="text-align:center">
            .......................................................
            </div>

            <div style="text-align:center; line-height: 30px">
            ( {{$form->ctname}} )
            </div>
            <div style="text-align:center">{{$form->ctemail}}</div>
            </div>
            
            <br><br><br><br><br>

            <div class=" footer">

            <!-- ติดต่อประสานงาน -->
            <!-- <div style=" overflow: auto; width: 350px; height:auto;" style="margin: 10px"><br>
            <div class="d-flex justify-content-start"  style="margin-left: 20px;font-size:16px;">
            ติดต่อประสานงาน
            </div>
            <div class="d-flex justify-content-start" style="margin-left: 20px;font-size:16px;">
            ชื่อ&nbsp;{{$form->ctname}} 
            </div>
            <div class="d-flex justify-content-start" style="margin-left: 20px;font-size:16px;">
            เบอร์โทรศัพท์&nbsp;{{$form->ctphone}}  
            </div>
            <div class="d-flex justify-content-start"style="margin-left: 20px;font-size:16px;">
            E-mail &nbsp;{{$form->ctemail}} 
            </div><br>
            </div><br><br> -->

            <!-- <div class="d-flex justify-content-end" style="font-size:15px;">
            FD-HO/HR-013/1 :00: 19-09-2563
            </div> -->

            <div class="d-flex justify-content-center">
            <div>
            <div class="d-flex justify-content-end" style="margin-bottom:10px">
              @if($form->type=='โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์')
                FD-IDD-SCL-012:00: 20-05-2566
              @elseif($form->type=='บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')
                FD-HO-015 :00: 20-05-2566
              @elseif($form->type=='สถานตรวจสภาพรถศูนย์ตรอ.ไอดี')
                FD-INS-005 :00: 20-5-2566
              @elseif($form->type=='ศูนย์ฝึกอบรม')
                FD-IDD-TZ-013 :00: 20-05-2566
              @endif
            </div>
            <div style="border: 2px solid #000000; overflow: auto; width: auto; height: auto; text-align: center;">
            <img src="{{ asset('dist/img/logo1.png') }}" width="81px">
            <img src="{{ asset('dist/img/logo2.png') }}" width="81px">
            <img src="{{ asset('dist/img/logo3.png') }}" width="81px">
            <img src="{{ asset('dist/img/logo4.png') }}" width="81px">
            <img src="{{ asset('dist/img/logo5.png') }}" width="70px">
            <img src="{{ asset('dist/img/logo6.png') }}" width="252px">
            <img src="{{ asset('dist/img/logo7.png') }}" width="81px">
            </div>
            </div>
            </div>

            </div>
            <!-- /headform -->
        </div>
        <!--  /bodyform -->
      </div>
      <!-- /card -->
    </div>
    <!-- /font1 -->
    </div>   
    <div class="d-flex justify-content-end">
  <input type="hidden" value="{{$form->type}}" class="form-control" placeholder="กรุณากรอกการอ้างถึง" style="width: 300px" name="type">
   </div><br>


<!-- Download and cancel button -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <!-- <button class="btn btn-primary" type="button" style="margin-right:10px" href="{{url('/pdf/form/pdf/'.$form->id)}}" >ดาวน์โหลด</button> -->
 
 <a href="{{ URL::previous() }}" class="btn btn-secondary" type="button" style="margin-right:10px">ยกเลิก</a>
 <a href="{{url('/pdf/form/pdf/'.$form->id)}}" class="btn btn-primary" type="button">ดาวน์โหลด</a>
 
</div>
<!-- /save cancel -->


<!-- จบ -->
      </div>
    </div>
</div>
@endsection

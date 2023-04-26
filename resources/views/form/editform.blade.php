@extends('layouts.menu.app')
@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">

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
      

</style>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-4">
        <!-- start -->

        <!-- card -->       
     <div class="font1">
      <div class="card" >
          <div class="card-header">
             @if($form->type=='โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์')   
             <div class="d-flex justify-content-center">
             <img src="{{ asset('dist/img/logoIDD.png') }}" width="148" height="75"> 
             </div><br>
             <div class="d-flex justify-content-start" style="margin-left: 40px">
             <h5>โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์</h5>&nbsp;
             บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด เลขที่ผู้เสียภาษี 0405536000531
            </div>
             <div class="d-flex justify-content-start">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น Tel : 043-228 899 www.iddrices.co.th Email : idofficer@iddrives.co.th
             <br></div><hr noshade="noshade" size="2"><br>
           
             @elseif($form->type=='บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')
             <div class="d-flex">
             <img src="{{ asset('dist/img/logoiddrives.png') }}"  height="150">
             <div class="p-2 py-5 flex-fill">
             <h5> บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่) </h5>
             200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น เลขที่ผู้เสียภาษี 0405536000531 <br>
             Tel : 043-228 899 www.iddrices.co.th Email : idofficer@iddrives.co.</div>
            </div>
            <hr noshade="noshade" size="2" style="margin-top:-10px">
            
            @elseif($form->type=='สถานตรวจสภาพรถ ศูนย์ตรอ.ไอดี')
            <div class="d-flex justify-content-center">
             <img src="{{ asset('dist/img/logoINS.png') }}" width="158">
             </div><br>
            <div class="d-flex justify-content-start" style="margin-left: 40px">
             <h5>สถานตรวจสภาพรถ ศูนย์ตรอ.ไอดี</h5>&nbsp;
             บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด เลขที่ผู้เสียภาษี 0405536000531
            </div>
             <div class="d-flex justify-content-start">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น Tel : 043-228 899 www.iddrices.co.th Email : idofficer@iddrives.co.th
             <br></div><hr noshade="noshade" size="2"><br>
                      
             @elseif($form->type=='ศูนย์ฝึกอบรม')
             <div class="d-flex justify-content-center">
              <img src="{{ asset('dist/img/logoIDD.png') }}"  height="50" style="margin-right:30px;margin-top:15px">
             <img src="{{ asset('dist/img/logoiddrives.png') }}" height="100" style="margin-right:25px;">&nbsp;&nbsp;
             <img src="{{ asset('dist/img/logoTZ2.png') }}"height="80">
             </div><br>
             <div class="d-flex justify-content-start" style="margin-left: 40px;font-size:16px">
             <h5>ศูนย์ฝึกอบรมเทรนนิ่งเซนเตอร์</h5>&nbsp;
             บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด เลขที่ผู้เสียภาษี 0405536000531
            </div>
             <div class="d-flex justify-content-start" style="font-size:16px">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัด Tel : 043-228 899   www.iddrices.co.th  Email : idofficer@iddrives.co.th           
             <br></div><hr noshade="noshade" size="2"><br>
             @endif
              <!-- /head-form -->

            <form action="{{url('/form/pdf/'.$form->id)}}" method="post" enctype="multipart/form-data">
            @csrf   

           <!-- bodyform -->
            <div class="card-body" style="margin: 20px">
            <div class="d-flex justify-content-end">
            เลขที่หนังสือ&nbsp;{{$form->fdepartment}}/{{$form->dnumber}}/{{$form->cnumber}}/{{$form->year}} 
            </div><br><br>
            
            <div class="d-flex justify-content-center">
            วันที่&nbsp;<?php
             $myDate= $form->date;
             $myYear = date('Y', strtotime($myDate));
             $myYearBuddhist = $myYear+543;
             $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
             $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
             echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
             ?>
            </div><br><br>
            <!-- <input type="date" class="form-control" value="{{$form->date}}" style="width: 800px" name="date"> -->
            <input type="hidden" class="form-control" value="{{$form->date}}" style="width: 800px" name="date" required>

            
            <div class="d-flex justify-content-start">
            เรื่อง&nbsp;&nbsp;
            <input type="text" class="form-control" value="{{$form->story}}" placeholder="กรุณากรอกเรื่อง" style="width: 800px" name="story" required>
            </div>

            <div class="d-flex justify-content-start"style="margin-top:5px;">
            เรียน&nbsp;&nbsp;
            <input type="text" class="form-control" value="{{$form->learn}}" placeholder="กรุณากรอกเรียนถึง" style="width: 800px" name="learn" required>
            </div>

            
            <div class="d-flex justify-content-start"style="margin-top:5px;">
            อ้างถึง&nbsp;&nbsp;
            <input type="text" class="form-control" value="{{$form->quote}}" placeholder="กรุณากรอกอ้างถึง" style="width: 300px" name="quote">
            </div>

            <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
            <div class="d-flex" style="margin-right:10px;margin-top:5px;">
            <div class="flex-shrink-0">
            สิ่งที่ส่งมาด้วย&nbsp;&nbsp;
            </div>
            <!-- <div class="flex-grow-1 ms-3" > -->
            <textarea id="txtMessage" name="enclosure"><?php echo $form->enclosure; ?> </textarea>
            <!-- </div> -->
            </div><br><br>

            <!-- <div class="d-flex flex-column" > -->
            <textarea  id="txtMessage1" name="details"> <?= $form->details; ?></textarea>
            <!-- </div> -->
            
               <!-- teaxareasize -->
            <!-- สิ่งที่ส่งมาด้วย -->
            <script>CKEDITOR.replace( 'txtMessage',{
                        height : 150,
                        width : 630
                        } )
            // รายละเอียด
                        CKEDITOR.replace( 'txtMessage1',{
                        height : 150,
                        width : 830
                        } );
                        //]]>
                        </script>
                        <script type="text/javascript">
                        //<![CDATA[</script>
              <!-- /textarea -->
            </div><br><br>
            <div class="d-flex justify-content-center">
            ขอแสดงความนับถือ
            </div>

            <div class="d-flex justify-content-center">
            .......................................................
            </div>

            <div class="d-flex justify-content-center">
            (.........................................................)
            </div><br><br><br>

            <div class=" footer">
            <!-- <div style="border: 2px solid #ff0000; overflow: auto; width: 350px; height:auto;" style="margin: 20px"><br> -->
            <div style="border: 2px solid #000000; overflow: auto; width: 350px; height:auto;" style="margin: 10px"><br>
            <div class="d-flex justify-content-start"  style="margin-left: 20px;font-size:16px;">
            สอบถามได้ที่
            </div>
            <div class="d-flex justify-content-start" style="margin-left: 20px;font-size:16px;">
            ชื่อ&nbsp;<input type="text" class="form-control" value="{{$form->ctname}}" style="width: 200px" name="ctname" placeholder="กรุณากรอกชื่อ" required>
            </div>
            <div class="d-flex justify-content-start" style="margin-left: 20px;font-size:16px;">
            เบอร์โทรศัพท์&nbsp;<input type="text" class="form-control" value="{{$form->ctphone}}" style="width: 200px" name="ctphone" placeholder="กรุณากรอกเบอร์โทรศัพท์" required>
            </div>
            <div class="d-flex justify-content-start"style="margin-left: 20px;font-size:16px;">
            E-mail &nbsp;<input type="text" class="form-control" value="{{$form->ctemail}}" style="width: 200px" name="ctemail" placeholder="กรุณากรอกอีเมล" required>
            </div><br>
            </div><br><br>

            
            <div class="d-flex justify-content-end" style="font-size:15px;margin-right:150px">
            FD-HO/HR-013/1 :00: 19-09-2563
            </div>

            <div class="d-flex justify-content-center">
            <div style="border: 2px solid #000000; overflow: auto; width: auto; height: auto; text-align: center;">
            <!-- <div style="border: 2px solid #e46c0a; overflow: auto; width: auto; height: auto; text-align: center;"> -->
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
            <!-- /headform -->
        </div>
        <!--  /bodyform -->
      </div>
      <!-- /card -->
    </div>
    <!-- /font1 -->
    </div>   
<!-- save cancel -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-primary" type="submit" style="margin-right:10px">บันทึก</button>
  @if(Auth::user()->role==0)
  <a href="{{route('bookoutuser')}}"class="btn btn-secondary" type="button">ยกเลิก</a>
  @elseif(Auth::user()->role==1)
  <a href="{{route('bookoutstaff')}}"class="btn btn-secondary" type="button">ยกเลิก</a>
  @elseif(Auth::user()->role==2)
  <a href="{{route('bookoutadmin')}}"class="btn btn-secondary" type="button">ยกเลิก</a>
  @endif
</div>
<!-- /save cancel -->
</form>
<!-- จบ -->
      </div>
    </div>
</div>
@endsection

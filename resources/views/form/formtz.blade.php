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
      size: 21cm 29.7cm landscape;
        margin: 30mm 45mm 30mm 45mm;
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

          <!-- Header -->
            <div class="" style="text-align:center; margin-top: 20px">
              <img src="{{ asset('dist/img/logoIDD.png') }}"  height="50" style="margin-right:30px;margin-top:15px">
              <img src="{{ asset('dist/img/logoiddrives.png') }}" height="100" style="margin-right:25px;">&nbsp;&nbsp;
              <img src="{{ asset('dist/img/logotz2.png') }}"height="80">
            </div>
            <br>
            <div class="" >
              <h5 style="font-size:20px;text-align:center;font-weight:bold;margin-bottom:0">ศูนย์ฝึกอบรมเทรนนิ่งเซนเตอร์  <span style="font-size:14pt;">เลขที่ผู้เสียภาษี 0405536000531</span></h5>
              <p style="font-size:14px;text-align:center; margin:unset;">ที่อยู่: 58/1 ม. 9 ถ.มิตรภาพ ต.ทับกวาง อ.แก่งคอย จ.สระบุรี 18260 Email: id.trainingcenter@iddrives.co.th
                      Tel :082-7513888  www.trainingzenter.com</p>
              <p style="font-size:12px;text-align:center; margin:unset;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด</p>
              <div class="" style="font-size:12px; text-align:center">
                ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000 Tel : 043-228 899 Email : idofficer@iddrives.co.th           
                <br>
              </div>
            </div>
            
             


             <hr noshade="noshade" size="2">

             <!-- bodyform -->
            <div class="card-body" style="margin: 20px" >
            <div class="d-flex ">
            <form action="{{url('/form/add')}}" method="post" enctype="multipart/form-data">
            @csrf 
            เลขที่หนังสือ&nbsp;
            TZ/@if($tz==null){{ __('001') }}@elseif($tz<=8)00{{$tz+1}}@elseif($tz>=9)0{{$tz+1}}@elseif($tz>=99){{$tz+1}}@endif/@if($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}           
            <!-- <input type="hidden" class="form-control" placeholder="เลขที่หนังสือ" style="width: 300px"> -->
            </div>

            <div class="d-flex justify-content-end">
                            <input type="hidden" value="TZ" class="form-control" style="width: 60px" name="fdepartment">
                            @if($tz==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($tz<=8)
                            <input type="hidden" value=<?php echo '00'.$tz+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($tz>=9)
                            <input type="hidden" value=<?php echo '0'.$tz+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($tz>=99)
                            <input type="hidden" value=<?php echo $tz+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @endif
                            @if($total==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total<=8)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">
            </div><br><br>

            <div class="d-flex " style="width:fit-content; position:relative; left:62.5%;">
            วันที่&nbsp;
            <input type="date" class="form-control"  style="width: 300px" value="<?php echo date("Y-m-d"); ?>" name="date" required>
            </div><br><br><br><br>

            <div class="d-flex justify-content-start">
            เรื่อง&nbsp;&nbsp;
            <input type="text" class="form-control" placeholder="กรุณากรอกเรื่อง" style="width: 500px" name="story" required>
            </div>

            <div class="d-flex justify-content-start">
            เรียน&nbsp;&nbsp;
            <input type="text" class="form-control" placeholder="กรุณากรอกเรียน" style="width: 500px" name="learn" required>
            </div>

            <div class="d-flex justify-content-start">
            อ้างถึง&nbsp;&nbsp;
            <input type="text" class="form-control" placeholder="กรุณากรอกการอ้างถึง" style="width: 500px" name="quote">
            </div>

            <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
            <div class="d-flex justify-content-start">
            สิ่งที่ส่งมาด้วย&nbsp;&nbsp;
            <textarea id="txtMessage" name="enclosure"></textarea>
            </div><br><br><br>

            <div class="d-flex justify-content-start" style="margin-left: 40px">
            <textarea  id="txtMessage1" name="details"></textarea>

            <!-- teaxareasize -->
            <!-- สิ่งที่ส่งมาด้วย -->
                        <script>CKEDITOR.replace( 'txtMessage',{
                        height : 100,
                        width : 700
                        } )
            // รายละเอียด
                        CKEDITOR.replace( 'txtMessage1',{
                        height : 100,
                        width : 950
                        } );
                        //]]>
                        </script>
                        <script type="text/javascript">
                        //<![CDATA[</script>
              <!-- /textarea -->
            </div><br><br><br>
            
            <div style="width:fit-content; position:relative; left:62.5%">
            <div  style="text-align:center"><!-- <div class="d-flex justify-content-center"> -->
            ขอแสดงความนับถือ
            </div>
            <br>
            <div style="text-align:center">
            .......................................................
            </div>

            <div style="text-align:center; line-height: 30px">
            (.........................................................)
            </div>
            </div>
            
            <br><br><br><br><br>

            <!-- <div style="border: 2px solid #ff0000; overflow: auto; width: 350px; height:auto;" style="margin: 20px"><br> -->
            <div style="border: 2px solid #000000; overflow: auto; width: 350px; height:auto;" style="margin: 20px"><br>
            <div class="d-flex justify-content-start"  style="margin-left: 20px">
            ติดต่อประสานงาน
            </div>
            <div class="d-flex justify-content-start" style="margin-left: 20px">
            ชื่อ&nbsp;<input type="text" class="form-control" placeholder="กรุณากรอกชื่อ" style="width: 200px" name="ctname" required>
            </div>
            <div class="d-flex justify-content-start" style="margin-left: 20px">
            เบอร์โทรศัพท์&nbsp;<input type="text" class="form-control" placeholder="กรุณากรอกเบอร์โทร" style="width: 200px" name="ctphone" required>
            </div>
            <div class="d-flex justify-content-start"style="margin-left: 20px">
            E-mail &nbsp;<input type="text" class="form-control" placeholder="กรุณากรอกอีเมล" style="width: 200px" name="ctemail" required>
            </div><br>
            </div><br><br>

            <!-- <div class="d-flex justify-content-end">
            FD-HO/HR-013/1 :00: 19-09-2563
            </div> -->

            <div class="d-flex justify-content-center">
            <div>
            <div class="d-flex justify-content-end" style="margin-bottom:10px">
                FD-IDD-TZ-013 :00: 20-05-2566  <!-- FD-HO/HR-013/1 :00: 19-09-2563 -->
            </div>
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
  
            <!-- /headform  -->
        </div>
        <!-- /bodyform -->
      </div>
      <!-- /card -->
    </div>
    <!-- /font1 -->
 </div>
 <input type="hidden" value="ศูนย์ฝึกอบรม" class="form-control" placeholder="กรุณากรอกการอ้างถึง" style="width: 300px" name="type">
    <!-- save cancel -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-primary" type="submit" style="margin-right:10px" >บันทึก</button>
  <a href="{{ route('form') }}" class="btn btn-secondary" type="button">ยกเลิก</a>
</div>
<!-- /save cancel -->

<!-- end -->
      </div>
    </div>
</div>



@endsection
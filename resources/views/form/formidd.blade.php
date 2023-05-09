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
</style>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-4">
        <!-- start -->

        <!-- card -->       
     <div class="font1">
      <div class="card" >
          <div class="card-header">
          <div class="d-flex justify-content-center">
             <img src="{{ asset('dist/img/logoIDD.png') }}" height="80">
             </div><br>
             <div class="d-flex justify-content-start" style="margin-left: 40px">
             <h5>โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์</h5>&nbsp;
             บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด เลขที่ผู้เสียภาษี 0405536000531
            </div>
             <div class="d-flex justify-content-start" style="font-size:15px">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น Tel : 043-228 899 www.iddrives.co.th Email : idofficer@iddrives.co.th
             <br></div><hr noshade="noshade" size="2"><br>
              <!-- /head-form -->

           <!-- bodyform -->
            <div class="card-body" style="margin: 20px">
            <form action="{{url('/form/add')}}" method="post" enctype="multipart/form-data">

            <!-- <form action="{{url('/addsendbook')}}" method="post" enctype="multipart/form-data"> -->
            @csrf      
            <div class="d-flex justify-content-end" style="margin-top: -40px">
            เลขที่หนังสือ&nbsp; 
            IDD/@if($idd==null){{ __('001') }}@elseif($idd<=8)00{{$idd+1}}@elseif($idd>=9)0{{$idd+1}}@elseif($idd>=99){{$idd+1}}@endif/@if($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}
            </div>

            <div class="d-flex justify-content-end">
            <input type="hidden" value="IDD" class="form-control" style="width: 60px" name="fdepartment">
                            @if($idd==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($idd<=8)
                            <input type="hidden" value=<?php echo '00'.$idd+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($idd>=9)
                            <input type="hidden" value=<?php echo '0'.$idd+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($idd>=99)
                            <input type="hidden" value=<?php echo $idd+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @endif
                            @if($total==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total<=9)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">
            </div><br><br>
            


            <div class="d-flex justify-content-center">
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
                        width : 650
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
            
            <div class="d-flex justify-content-center">
            ขอแสดงความนับถือ
            </div>

            <div class="d-flex justify-content-center">
            .......................................................
            </div>

            <div class="d-flex justify-content-center">
            (.........................................................)
            </div><br><br><br><br><br>

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

            <div class="d-flex justify-content-end">
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

          
            <!-- /headform -->
        </div>
        <!--  /bodyform -->
      </div>
      <!-- /card -->
    </div>
    <!-- /font1 -->
    </div>   
    <div class="d-flex justify-content-end">
  <input type="hidden" value="โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์" class="form-control" placeholder="กรุณากรอกการอ้างถึง" style="width: 300px" name="type">
   </div><br>
<!-- save cancel -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<button class="btn btn-primary" type="submit" style="margin-right:10px" >บันทึก</button>
  <a href="{{ route('form') }}" class="btn btn-secondary" type="button">ยกเลิก</a>
</div>
<!-- /save cancel -->

<!-- จบ -->
      </div>
    </div>
</div>
@endsection
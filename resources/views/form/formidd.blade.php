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
    .dropdown {
      display: none;
      height: 90px;
      overflow-y: scroll;

    }
    .dropdown.show{
      display: block;
    }
</style>

<!-- 
  layout หน้า  PDF สร้างเอกสารของ โรงเรียนสอนขับรถไอดี
 -->


<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-4">
        <!-- start -->

        <!-- card -->       
     <div class="font1">
      <div class="card" >
          <div class="card-header" style="padding:2cm 2cm 2cm 3cm">
          <!-- <div class="d-flex " style="width: fit-content">
             <img src="{{ asset('dist/img/logoIDD.png') }}" height="80">
             
             <div>
             <div class="d-flex justify-content-start" style="">
             <h5>โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์</h5>&nbsp;
             <br>
             <p>บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด เลขที่ผู้เสียภาษี 0405536000531</p>
            </div>
             <div class="d-flex justify-content-start" style="font-size:15px">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น Tel : 043-228 899 www.iddrives.co.th Email : idofficer@iddrives.co.th
             <br></div>
              </div>
              </div> -->
              <div class="" style="text-align:center;">
              <img src="{{ asset('dist/img/logoIDD.png') }}"  height="50" style="margin-right:30px;margin-top:15px">
              <img src="{{ asset('dist/img/logoiddrives.png') }}" height="100" style="margin-right:15px;">
              <img src="{{ asset('dist/img/logopro.png') }}"height="80">
            </div><br>
             <div class="" >
            
             <!-- ดึงข้อมูลสาขาและที่อยู่จาก Database  -->
             <?php $braname = \App\CoreFunction\Helper::Bran(Auth::user()->Branch ?? '21')['bName'];
                    $bAddrA = \App\CoreFunction\Helper::Bran(Auth::user()->Branch ?? '21')['bAddr'];
                    $bAddr = explode('Tel:', $bAddrA);
                    ?>
                    

             <h5 style="text-align:center;font-weight:bold;margin-bottom:0;font-size:20px">โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์ สาขา{{$braname}} 
                <span style="font-size:13px;font-weight:400">เลขที่ผู้เสียภาษี 0405536000531</span></h5>
             <p style="font-size:16px;text-align:center; margin:unset;">ที่อยู่: {{$bAddr[0]}} <br>Tel: {{$bAddr[1]  ?? ''}}</p>
             <p style="font-size:12px;text-align:center; margin:unset;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด </p>
             <div class="" style="font-size:12px; text-align:center">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000 Tel : 043-228 899  Email : idofficer@iddrives.co.th
             <br></div>
            </div>


             <hr noshade="noshade" size="2"><br>
              <!-- /head-form -->

           <!-- bodyform -->
            <div class="card-body" style="padding: unset; margin:1cm 0 0 0;">
            <form action="{{url('/form/add')}}" method="post" enctype="multipart/form-data">

            <!-- <form action="{{url('/addsendbook')}}" method="post" enctype="multipart/form-data"> -->
            @csrf      
            <div class="d-flex " style="margin-top: -40px">
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
            
            <div style="width:fit-content; position:relative; left:62.5%">
            <div  style="text-align:center"><!-- <div class="d-flex justify-content-center"> -->
              ขอแสดงความนับถือ
            </div>
            <br>
            <div style="text-align:center">
            <img id="selected-image" src="">
            <input id="signName" type="text" style="display:none" name="ctphone">
            <p>.......................................................</p>
            </div>

            <div style="text-align:center;display:flex; line-height: 30px">
              <p style="float:inline-start">(</p>
              <p style="width: 100%;">
                <input id="textf" type="text" class="form-control" placeholder="กรุณากรอกชื่อ" autocomplete="off" name="ctname" required>
                
              </p>
              <p style="float:inline-end">)</p>
            </div>
            <div class="dropdown drowdown-menu" id="dmanager">
                    <a class="dropdown-item" onclick="clearSign()"> Not sign </a>
                  @foreach ($nameManager as $name)
                    <a class="dropdown-item" value="{{ trim($name[1]) }}" positionSelected="{{ $name[2] }}" nameSelected="{{ $name[0] }}" onclick="selectOption(this)"> {{ $name[0] }} </a>
                  @endforeach
                </div>
            <div >
              <input id="position" type="text" class="form-control" placeholder="กรุณากรอกตำแหน่ง" style="width: 350px" name="ctemail" required>
            </div>
            </div>
            </div>
            
            <br><br><br><br><br>
            <!-- Contact Us -->
            <!-- <div style="border: 2px solid #ff0000; overflow: auto; width: 350px; height:auto;" style="margin: 20px"><br> -->
            <!-- <div style=" overflow: auto; width: 350px; height:auto;" style="margin: 20px"><br>
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
            </div><br> -->
            </div><br><br>

            <!-- <div class="d-flex justify-content-end">
            FD-HO/HR-013/1 :00: 19-09-2563
            </div> -->

            <div class="d-flex justify-content-center">
            <div>
            <div class="d-flex justify-content-end" style="margin-bottom:10px">
              FD-IDD-SCL-012:00: 20-05-2566  <!-- FD-HO/HR-013/1 :00: 19-09-2563 -->
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
<script> 
  var textF = document.getElementById("textf");
  var storSign = document.getElementById("signName");
  var textPo = document.getElementById("position");
  var dropd = document.getElementById("dmanager");

  function selectOption (option) {
    
    var imageName = option.getAttribute("value");
    var imagePath = "{{ asset('dist/img/sign') }}/" + imageName + ".png";
    var selectedImage = document.getElementById("selected-image");
        selectedImage.src = imagePath;
    
    textF.value = option.getAttribute("nameSelected");
    textPo.value = option.getAttribute("positionSelected");
    storSign.value = imageName;
    dropd.classList.remove("show");

    // Check if the text field value is empty or doesn't match a specific condition
    if (textFieldValue === "" || textFieldValue !== "specificCondition") {
      selectedImage.style.display = "none"; // Hide the image
    } else {
      selectedImage.src = imagePath; // Show the image
      selectedImage.style.display = "block"; // Make sure the image is visible
    }
  }

  function clearSign(){
    var selectedImage = document.getElementById("selected-image");
        selectedImage.src = "";
  }

  textF.addEventListener("click", function(event) {
    dropd.classList.add("show");
    event.stopPropagation();
  });

  document.addEventListener("click", function(){
    dropd.classList.remove("show");
  });
  
  var input = document.getElementById('textf');
  var dropdown = document.getElementById('dmanager');
  var options = dropdown.getElementsByTagName('a');
  
  input.addEventListener('input', function() {
    var searchTerm = input.value.toUpperCase();
    dropd.classList.add("show");
    for (var i = 0; i < options.length; i++) {
      var option = options[i];
      var text = option.innerText.toUpperCase();
      
      if (text.indexOf(searchTerm) > -1) {
        option.style.display = '';
      } else {
        option.style.display = 'none';
      }
    }
  });
</script>
@endsection
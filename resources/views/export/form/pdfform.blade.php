<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" href="{{ asset('dist/img/logo.png') }}"  />
    <title>ระบบสารบรรณ</title>
<!-- icon -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<style>
  .font1{
    font-family: 'Sarabun', sans-serif;
  }
    .box {
        width: 30px;
        height: 30px;
        border: solid 1px #ff0000;
        font-size: 18px;
    }
    .card {
        /* margin: 2.5cm; */
        margin: 2.5cm;
        size: 21cm 29.7cm landscape;
    }
    @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }
      body {
        font-family: "THSarabunNew";
        font-size: 18px;
      }
      .box2 {
        float: left;
        width: 110px;
        height: 100px;
        margin-right: 1px;
      }
      .box4 {
        float: right;
        width: 110px;
        height: 100px;
        margin-right: 1px;
      }
      .box1 {
        display: flex;
        float: left;
        overflow: auto; 
        clear:left;
       
      }
      .box3 {
        float: left;
        clear:left;
      }
      body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;

        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: fit-content;
        }
p {
  height:auto;
}

.text-details {
  overflow-wrap: break-word;
  word-wrap: break-word;

}

</style>



<!-- 
 ------------------------ layout เอกสาร pdf ที่ดาวน์โหลด -----------------------------
 -->




<!-- ดึงข้อมูล branche name และ address จากตาราง Branche  ด้วย brsnche id ของผู้บันทึก จากตาราง form -->
<?php
$bName = \App\CoreFunction\Helper::Bran($form->formbranch ?? '21')['bName'];

$bAddrA = \App\CoreFunction\Helper::Bran($form->formbranch ?? '21')['bAddr'];
$bAddr = explode('Tel:', $bAddrA);
?>


<body style="line-height:12px;padding:0 1cm 0 2cm">
  <div class="content" style="">
    <!-- header เอกสาร โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์ -->
    @if($form->type=='โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์')  
    <div class=""  style="text-align: center;">
      <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logoIDD.png'))) }}" style="margin-right:15px;"  height="35"/>
      <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logoiddrives.png'))) }}" style="margin-right:15px;"  height="70"/>
      <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logopro.png'))) }}" style=""  height="53"/>
    </div>
    <div class="" style="margin-top:-15px">
      <h5 style="font-weight:bold;font-size:18pt">โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์ สาขา{{$bName}} 
        <span style="font-size:13pt;">เลขที่ผู้เสียภาษี 0405536000531</span></h5>
      <p style="font-size:14pt; margin-top:-10px;margin-bottom:0; height:auto;">ที่อยู่: {{$bAddr[0]}} <br>Tel: {{$bAddr[1] ?? ''}}</p>
      <p style="font-size:12pt; margin :unset;height:auto;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด </p>
      <div class="" style="font-size:12pt;">
        ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000 Tel : 043-228 899  Email : idofficer@iddrives.co.th<br>
      </div>
            
    </div>
    
    <div style="border: 0.5px solid #B4B4B4;margin-top:10px;"></div>           
    <!-- header เอกสาร บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่) -->
      @elseif($form->type=='บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')
             
            <div class="d-flex justify-content-start">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logoiddrives.png'))) }}" style="margin-right:10px;float: left;" width="80px"/>
            <div class="" style="margin-top: 15px; line-height:7px;">
              <p style="font-size:16pt;font-weight: bold">บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่)</p>
              <p style="font-size:14pt;margin: -5px 0 10px 0">200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น เลขที่ผู้เสียภาษี 0405536000531</p>
              <p style="font-size:14pt;">Tel : 043-228 899 www.iddrives.co.th Email : idofficer@iddrives.co.th </p>
            </div>
            </div>
            <div style="border: 0.5px solid #B4B4B4;"></div>            

             <!-- header เอกสาร สถานตรวจสภาพรถศูนย์ตรอ.ไอดี) -->
            @elseif($form->type=='สถานตรวจสภาพรถศูนย์ตรอ.ไอดี')
            <div class="text-center">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logoINS.png'))) }}" style="margin-right:15px" width="80"/>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logoins.png'))) }}" style="" width="80"/>
             </div>

              <div class="" style="margin-top:-20px">
             <h5 style="font-size:20pt;font-weight:bold;margin-bottom:0">สถานตรวจสภาพรถ ศูนย์ตรอ.ไอดี สาขา{{$bName}}
                <span style="font-size:14pt;">เลขที่ผู้เสียภาษี 0405536000531</span></h5>
             <p style="font-size:16pt; margin-bottom:0; height:auto;">ที่อยู่: {{$bAddr[0]}} <br>Tel: {{$bAddr[1] ?? ''}}</p>
             <p style="font-size:12pt; margin :unset;height:auto;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด</p>
             <div class="" style="font-size:12pt;">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000 Tel : 043-228 899  Email : idofficer@iddrives.co.th
             <br></div>
            </div>
            <div style="border: 0.5px solid #B4B4B4;margin-top:10px;"></div>

            <!-- header เอกสาร TZ -->
             @elseif($form->type=='ศูนย์ฝึกอบรม')
             <div class="text-center">
             <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logoIDD.png'))) }}" style="margin-right:15px;"  height="35"/>
             <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logoiddrives.png'))) }}" style="margin-right:15px;"  height="70"/>
             <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logotz2.png'))) }}" style=""  height="53"/>
             </div>
             <div class="" style=" margin-top:-10px">
              <h5 style="font-size:20pt;font-weight:bold;margin-bottom:0">ศูนย์ฝึกอบรมเทรนนิ่งเซนเตอร์  <span style="font-size:14pt;">เลขที่ผู้เสียภาษี 0405536000531</span></h5>
              <p style="font-size:16pt; margin-bottom:0; height:auto;">ที่อยู่: 58/1 ม.9 ถ.มิตรภาพ ต.ทับกวาง อ.แก่งคอย จ.สระบุรี 18260 <br> Email: id.trainingcenter@iddrives.co.th 
                    Tel :082-7513888  www.trainingzenter.com</p>
              <p style="font-size:12pt; margin :unset;height:auto;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด</p>
              <div class="" style="font-size:12pt;">
                ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000 Tel : 043-228 899 Email : idofficer@iddrives.co.th           
                <br>
              </div>
            </div>
            <div style="border: 0.5px solid #B4B4B4;margin-top:10px;"></div>
             @endif
             
           

      <div style="padding: 1cm 0 0 0">
             <div class="" style="font-size:18px;">
            เลขที่หนังสือ&nbsp;{{$form->fdepartment}}/{{$form->dnumber}}/{{$form->cnumber}}/{{$form->year}} 
            </div><br>

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

            <div style="font-size:18px;">
              <div class="fw-bold me-2" style="float: left;">
                <p>เรื่อง</p>
              </div>
              <div >
                <p class="mb-0">{{$form->story}}<br></p>
              </div>
            </div>
            <br>
            <div style="font-size:18px;">
              <div class="fw-bold me-2" style="float: left;">
                <p>เรียน</p>
              </div>
              <div>
                <p class="mb-0">{{$form->learn}} </p>
              </div>     
            </div>
            <br>

            @if($form->quote==null)
            @else
            <div style="font-size:18px;">
              <div class="fw-bold me-2" style="float: left;">
                <p>อ้างถึง</p>
              </div>
              <div>
                <p class="mb-0">{{$form->quote}}</p>
              </div>
            </div>
            <br>
             @endif
            @if($form->enclosure==null)

            

            @else
            <div >
              <div>
                <b >สิ่งที่ส่งมาด้วย</b>
              </div>
              <div class="text-details" style="margin-top:-20px;margin-left:80px;line-height: 16px;">
                <?php 
                  $enc = $form->enclosure;
                  $enctext = str_replace(' ', '&nbsp;', $enc)
                ?>
                <p class="mb-0"> {!! $enctext !!}</p>
              </div>
            </div>
            <br>
            @endif



            <!-- <?php 
                $parameter = $form->details;
                $thaitext = str_replace(' ', '&nbsp;', $parameter);
            ?> -->
            <!-- <?php 
                $parameter = $form->details;
                $thaitext = preg_replace('/^(.*)$/m', '<span style="display:inline-block; text-indent: 2.5em;">$1</span>', $parameter);
            ?> -->
            <?php
              // Your PHP logic here...
              $parameter = $form->details;
              $parameter = str_replace('thead', 'thead style="border-bottom:1px solid"', $parameter);
              // Process each paragraph individually and add the custom text indent
              $indentation = str_repeat('&nbsp;', 10); // You can change the number to adjust the indent level.
              $thaitext = preg_replace('/<p>(.*?)<\/p>/', '<p>' . $indentation . '$1</p>', $parameter);

            ?>

            <div style="line-height: 16px; overflow-wrap: break-word; word-wrap: break-word;">
                <div>
                    {!! $thaitext !!}
                </div>
            </div>





            </div>

            <div class="text-center" style="font-size:18px;width:100%; position:relative; padding-left:20%;margin-top:10px;"  >
            ขอแสดงความนับถือ <br>
            @if (!empty($form->sign) && strlen($form->sign) > 1 && file_exists(public_path('dist/img/sign/' . $form->sign . '.png')))
              <br>
              <img style="width:80px" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/sign/' . $form->sign . '.png'))) }}" />
            @else
              <br>
            @endif
            <p style="">.......................................................</p>
            <p style="line-height:1px">( {{$form->sName}} )</p>
            <p style="text-align:center; line-height:1px">{{$form->sPosition}}</p>
            </div> 
            
            <br>
            <br>
            <div class="footer" style="display: inline-block;width:100%">

            <div class="text-center" style="font-size:18px;">
            <div style="width:80%">
            <div style="margin-bottom:10px;position: absolute;top: -30px; left: 400px;">
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
            <div style="border: 1px solid #000000; overflow: auto; width: 600px; height: auto; text-align: center; " >
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logo1.png'))) }}" width="33px" style="margin-top: 5px"/>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logo2.png'))) }}" width="33px" style="margin-top: 5px"/>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logo3.png'))) }}" width="33px" style="margin-top: 9px"/>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logo4.png'))) }}" width="33px" style="margin-top: 5px"/>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logo5.png'))) }}" width="28px" style="margin-top: 8px"/>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logo6.png'))) }}" width="162px" style="margin-top: 13px"/>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logo7.png'))) }}" width="38px" style="margin-top: 5px"/>
            </div>
            
            </div>
            </div>
            </div>
<!-- จบ -->
</body>
</html>

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
    #box1 {
        float: left;
        width: auto;
        height: 100px;
        /* display: block;  */
        /* display: inline-block; */
      }

      body{
        font-size: 18px;
      }
    .text-details {
      word-wrap: break-word;
      line-height: 30px;
      text-align: justify;
    }

@page {
      margin: 0px;

      size: "A4"; /* Define the paper size, you can use 'A4', 'letter', etc. */
  }
  @page:first {
      margin-top: 0cm;
  }
  @media print {
      .downloadbtn, footer, .font1, .content-wrapper {
          visibility: hidden;
      }
      .card {
          position: absolute;
          top: 0%;
          left: 0%;
          width: 100%;
          visibility: visible;
      }
  }
.downloadbtn {
  position: absolute;
  right: 10%;
  top: 10%;
}
.card {
  min-height: 350mm;
}
.footer {
  bottom: 2cm;
  width: 80%;
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
      <div class="container-fluid py-4">
        <!-- start -->

        <!-- card -->
     <div class="font1">
      <div class="card" style="padding:2cm 2cm 2cm 3cm; width:300mm;">
          <div class="card-header" style="border: 0px;">
             <!-- ความจริงกว้างสูง 268x152 -->
             <!-- head-form -->

             @if($form->type=='โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์')
             <div class="" style="text-align:center;">
              <img src="{{ asset('dist/img/logoIDD.png') }}"  height="50" style="margin-right:30px;margin-top:15px">
              <img src="{{ asset('dist/img/logoiddrives.png') }}" height="80" style="margin-right:15px;">
              <img src="{{ asset('dist/img/logopro.png') }}"height="80">
            </div><br>
             <div class="" >

             <h5 style="font-weight:bold;margin-bottom:0;font-size:20px">โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์ สาขา{{$bName}}
                <span style="font-size:13pt;font-weight:400;font-weight:bold;">เลขที่ผู้เสียภาษี 0405536000531</span></h5>
             <p style="font-size:18px; margin:unset;">ที่อยู่: {{$bAddr[0]}} <br>Tel: {{$bAddr[1] ?? '' ?? ''}}</p>
             <p style="font-size:16px; margin:unset;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด </p>
             <div class="" style="font-size:16px; ">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000 Tel : 043-228 899  Email : idofficer@iddrives.co.th
             <br></div>
            </div>
             <hr noshade="noshade" size="2"><br>

             @elseif($form->type=='บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')
             <div class="d-flex">
             <img src="{{ asset('dist/img/logoiddrives.png') }}" height="100" style="margin-right:20px">
             <div class="flex-fill" style="font-size:14pt; margin-top: 10px">
             <h5 style="font-size:16pt;font-weight:bold;"> บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่) </h5>
             200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น เลขที่ผู้เสียภาษี 0405536000531 <br>
             Tel : 043-228 899 www.iddrives.co.th Email : idofficer@iddrives.co.th </div>
            </div>
            <hr noshade="noshade" size="2" style="margin-top: 20px"><br>

            @elseif($form->type=='สถานตรวจสภาพรถศูนย์ตรอ.ไอดี')
            <div class="" style="text-align:center;">
             <img src="{{ asset('dist/img/logoiddrives.png') }}" height="80">
             <img style="margin-left:20px" src="{{ asset('dist/img/logoins.png') }}" height="80">
             </div><br>
             <div class="" >

             <h5 style="font-size:20px;font-weight:bold;margin-bottom:0">สถานตรวจสภาพรถ ศูนย์ตรอ.ไอดี สาขา{{$bName}}
                <span style="font-size:13pt;">เลขที่ผู้เสียภาษี 0405536000531</span></h5>
             <p style="font-size:18px; margin:unset;">ที่อยู่: {{$bAddr[0]}} <br>Tel: {{$bAddr[1] ?? ''}}</p>
             <p style="font-size:16px; margin:unset;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด</p>
             <div class="" style="font-size:16px;">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000 Tel : 043-228 899  Email : idofficer@iddrives.co.th
             <br></div>
            </div>

             <hr noshade="noshade" size="2"><br>

            @elseif($form->type=='ศูนย์ฝึกอบรม')
                <div class="" style="text-align:center;">
                    <img src="{{ asset('dist/img/logoIDD.png') }}"  height="50" style="margin-right:30px;margin-top:15px">
                    <img src="{{ asset('dist/img/logoiddrives.png') }}" height="80" style="margin-right:25px;">&nbsp;&nbsp;
                    <img src="{{ asset('dist/img/logotz2.png') }}"height="80">
                </div>
                <br>
                <div class="" >
                    <h5 style="font-size:20px;font-weight:bold;margin-bottom:0">ศูนย์ฝึกอบรมเทรนนิ่งเซนเตอร์  <span style="font-size:13pt;">เลขที่ผู้เสียภาษี 0405536000531</span></h5>
                    <p style="font-size:18px; margin:unset;">ที่อยู่: 58/1 ม.9 ถ.มิตรภาพ ต.ทับกวาง อ.แก่งคอย จ.สระบุรี 18260 <br> Email: id.trainingcenter@iddrives.co.th
                        Tel :082-7513888  www.trainingzenter.com</p>
                    <p style="font-size:16px; margin:unset;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด</p>
                    <div class="" style="font-size:16px;">
                        ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000 Tel : 043-228 899 Email : idofficer@iddrives.co.th
                        <br>
                    </div>
                </div>

                <hr noshade="noshade" size="2"><br>

            @elseif($form->type=='โรงเรียนไอดีสอนทักษะอาชีพ')
                <div class="d-flex justify-content-center" style="text-align:center; ">
                    <img src="{{ asset('dist/img/logoschool.png') }}" height="80">
                    <div class="align-self-center mx-3">
                        <h5 style="font-size:20px;font-weight:bold;margin-bottom:0">โรงเรียน ไอดีสอนทักษะอาชีพ</h5>
                        <h5 style="font-size:20px;font-weight:bold;margin-bottom:0">ID Vocational Skill Training School</h5>
                    </div>
                    &nbsp;&nbsp;
                    <img src="{{ asset('dist/img/logoiddrives.png') }}"height="80">
                </div>
                <div class="mt-2">
                    <p style="font-size:16px; margin:unset;">ที่อยู่: 150/11-12 ม.7 ถ.มิตรภาพ ต.ในเมือง อ.เมือง
                        จ.ขอนแก่น 40000
                        <br>Tel:094-2637979 Email:IDSS@iddrives.co.th www.idsschool.com Line:@099kcyha เลขที่ผู้เสียภาษี 0405536000531
                    </p>
                    <p style="font-size:12px; margin:unset;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000</p>
                    <div class="" style="font-size:12px;">
                         Tel: 043-228 899 Email : idofficer@iddrives.co.th
                        <br>
                    </div>
                </div>

                <hr noshade="noshade" size="2"><br>
            @endif
          </div>
              <!-- /head-form -->


            <div class="card-body" style="padding: 1cm 0 0 1cm;">
              <div class="d-flex " style="margin-top: -50px">
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
                </div><br>

                <div class="d-flex justify-content-start">
                  <b>เรื่อง</b>&nbsp;&nbsp;{{$form->story}}
                </div>

                <div class="d-flex justify-content-start"style="margin-top:15px;">
                  <b>เรียน</b>&nbsp;&nbsp;{{$form->learn}}
                </div>

                @if($form->quote==null)

                @else
                  <div class="d-flex justify-content-start"style="margin-top:15px;">
                    <p class="text-nowrap" style="margin-right: 10px"><b>อ้างถึง</b></p>
                    <p>{{$form->quote}}</p>
                  </div>
                @endif

                @if($form->enclosure==null)
                  <br>
                @else
                  <div class="d-flex" style="margin-right:10px;margin-top:10px;">
                    <div class="flex-shrink-0">
                      <b>สิ่งที่ส่งมาด้วย</b>&nbsp;&nbsp;
                    </div>
                    <div class="flex-grow-1 ms-3" style="text-align: justify;">
                      <?php echo $form->enclosure ?>
                      <input type="hidden" value="{{$form->enclosure}}" class="form-control" style="width: 150px" name="enclosure">
                    </div>
                  </div>
                @endif <br>

                <div class="d-flex flex-column text-details" style="margin-left: 0px;margin-right: 0px;">
                    <p><?php echo $form->details ?></p>
                </div><br>

                @if($form->type=='โรงเรียนไอดีสอนทักษะอาชีพ')
                    <div class="d-flex justify-content-around ">
                        <div style="width:fit-content; position:relative;">
                            <div style="text-align:center; font-weight: bold">
                                <!-- <div class="d-flex justify-content-center"> -->
                                ติดต่อ นายยุทธศักดิ์ อริยะชัยประดิษฐ์
                            </div>
                            <br>
                            <div style="text-align:center">
                                ผู้จัดการ โรงเรียน ไอดีสอนทักษะอาชีพ
                            </div>
                        </div>
                        <div style="width:fit-content; position:relative;">
                            <div  style="text-align:center"><!-- <div class="d-flex justify-content-center"> -->
                                ขอแสดงความนับถือ
                            </div>
                            <br>
                            <div style="text-align:center;">
                                @if ($form->sign && file_exists(public_path('dist/img/sign/' . $form->sign . '.png')))
                                    <img style="width:100px" src="{{ asset('dist/img/sign/' . $form->sign . '.png') }}">
                                @else
                                    <br>
                                @endif
                            </div>
                            <div style="text-align:center;">
                            .......................................................
                            </div>

                            <div style="text-align:center; line-height: 30px">
                                ({{$form->sName}})
                            </div>
                            <div style="text-align:center;">{{$form->sPosition}}</div>
                        </div>
                    </div>
                @else
                    <div style="width:fit-content; position:relative; left:54%">
                        <div  style="text-align:center"><!-- <div class="d-flex justify-content-center"> -->
                            ขอแสดงความนับถือ
                        </div>
                        <br>
                        <div style="text-align:center;">
                            @if ($form->sign && file_exists(public_path('dist/img/sign/' . $form->sign . '.png')))
                                <img style="width:100px" src="{{ asset('dist/img/sign/' . $form->sign . '.png') }}">
                            @else
                                <br>
                            @endif
                        </div>
                        <div style="text-align:center;">
                            .......................................................
                        </div>
                        <div style="text-align:center; line-height: 30px">
                            ({{$form->sName}})
                        </div>
                        <div style="text-align:center;">{{$form->sPosition}}</div>
                    </div>
                @endif

                <div class=" footer" style="margin-top: 20px;">
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
                        @elseif($form->type=='โรงเรียนไอดีสอนทักษะอาชีพ')
                            FD-HO/HR-013/1 :00: 19-09-2563
                        @endif
                      </div>
                      <div style="border: 2px solid #000000; overflow: auto; width: 200mm; height: auto; text-align: center; margin-left: 80px;">
                        <img src="{{ asset('dist/img/logo1.png') }}" width="40px">
                        <img src="{{ asset('dist/img/logo2.png') }}" width="40px">
                        <img src="{{ asset('dist/img/logo3.png') }}" width="40px">
                        <img src="{{ asset('dist/img/logo4.png') }}" width="40px">
                        <img src="{{ asset('dist/img/logo5.png') }}" width="40px">
                        <img src="{{ asset('dist/img/logo6.png') }}" width="180px">
                        <img src="{{ asset('dist/img/logo7.png') }}" width="40px">
                      </div>
                    </div>
                  </div>


            </div> <!-- end card body -->

            <!-- /headform -->
        </div>
        <!--  /bodyform -->
      </div>
      <!-- /card -->
    </div>
    <!-- /font1 -->
    </div>
    <button class="btn btn-success ms-2 downloadbtn" onclick="printDiv()">
      Print
  </button>
<!-- save cancel -->
<script>
  function printDiv() {
      window.print();
  }
</script>

<!-- จบ -->
      </div>
    </div>
</div>


@endsection

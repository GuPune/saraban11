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
          <div class="d-flex justify-content-center">
          
             </div><br>
             <!-- ความจริงกว้างสูง 268x152 -->
             <!-- head-form -->
             @if($type=='โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์')  
             <div class="d-flex justify-content-center"> 
            <img src="{{ asset('dist/img/logoIDD.png') }}" height="80"> 
            </div><br>
             <div class="d-flex justify-content-start" style="margin-left: 40px">
             <h5>โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์</h5>&nbsp;
             บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด เลขที่ผู้เสียภาษี 0405536000531
            </div>
             <div class="d-flex justify-content-start">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น Tel : 043-228 899 www.iddrives.co.th Email : idofficer@iddrives.co.th
             <br></div><hr noshade="noshade" size="2"><br>
           
             @elseif($type=='บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')
             <div class="d-flex">
             <img src="{{ asset('dist/img/logoiddrives.png') }}" height="150">
             <div class="p-2 py-5 flex-fill">
             <h5> บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่) </h5>
             200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น เลขที่ผู้เสียภาษี 0405536000531 <br>
             Tel : 043-228 899 www.iddrives.co.th Email : idofficer@iddrives.co. </div>
            </div>
            <hr noshade="noshade" size="2" style="margin-top:-10px"><br>
            
            @elseif($type=='สถานตรวจสภาพรถศูนย์ตรอ.ไอดี')
            <div class="d-flex justify-content-center">
             <img src="{{ asset('dist/img/logoINS.png') }}" width="158">
             </div><br>
            <div class="d-flex justify-content-start" style="margin-left: 40px">
             <h5>สถานตรวจสภาพรถ ศูนย์ตรอ.ไอดี</h5>&nbsp;
             บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด เลขที่ผู้เสียภาษี 0405536000531
            </div>
             <div class="d-flex justify-content-start">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น Tel : 043-228 899 www.iddrives.co.th Email : idofficer@iddrives.co.th
             <br></div><hr noshade="noshade" size="2"><br>
                      
             @elseif($type=='ศูนย์ฝึกอบรม')
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
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัด Tel : 043-228 899   www.iddrives.co.th  Email : idofficer@iddrives.co.th           
             <br></div><hr noshade="noshade" size="2"><br>
             @endif
              <!-- /head-form -->

           <!-- bodyform -->
            <div class="card-body" style="margin: 20px">
            <form action="{{url('/addsendbook')}}" method="post" enctype="multipart/form-data">
             @csrf  
             <div class="d-flex justify-content-end" style="margin-top: -40px">
            @if($type=='โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์')
            เลขที่หนังสือ&nbsp; 
            IDD/@if($idd==null){{ __('001') }}@elseif($idd<=8)00{{$idd+1}}@elseif($idd>=9)0{{$idd+1}}@elseif($idd>=99){{$idd+1}}@endif/@if($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}

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
                            @elseif($total<=8)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">

            @elseif($type=='บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')

            เลขที่หนังสือ&nbsp; @if(Auth::user()->department->Dpmname=='ไอที')
                              ITI/@if($iti==null){{ __('001') }}@elseif($iti<=8)00{{$iti+1}}@elseif($iti>=9)0{{$iti+1}}@elseif($iti>=99){{$iti+1}}@endif/@if($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->department->Dpmname=='บัญชี')
                              ACC/@if($acc==null){{ __('001') }}@elseif($acc<=8)00{{$acc+1}}@elseif($acc>=9)0{{$acc+1}}@elseif($acc>=99){{$acc+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->department->Dpmname=='จัดซื้อ')
                              PUR/@if($pur==null){{ __('001') }}@elseif($pur<=8)00{{$pur+1}}@elseif($pur>=9)0{{$pur+1}}@elseif($pur>=99){{$pur+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->department->Dpmname=='บุคคล')
                              HR/@if($hr==null){{ __('001') }}@elseif($hr<=8)00{{$hr+1}}@elseif($hr>=9)0{{$hr+1}}@elseif($hr>=99){{$hr+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->department->Dpmname=='ธุรการ')
                              AD/@if($ad==null){{ __('001') }}@elseif($ad<=8)00{{$ad+1}}@elseif($ad>=9)0{{$ad+1}}@elseif($ad>=99){{$ad+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}
                              
                              @elseif(Auth::user()->department->Dpmname=='การเงิน')
                              FIN/@if($fin==null){{ __('001') }}@elseif($fin<=8)00{{$fin+1}}@elseif($fin>=9)0{{$fin+1}}@elseif($fin>=99){{$fin+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}
                              
                              @elseif(Auth::user()->department->Dpmname=='มาร์เก็ตติ้ง')
                              MKT/@if($mkt==null){{ __('001') }}@elseif($mkt<=8)00{{$mkt+1}}@elseif($mkt>=9)0{{$mkt+1}}@elseif($mkt>=99){{$mkt+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}
                              
                              @elseif(Auth::user()->department->Dpmname=='บริหารงานพัฒนาผลิตภัณฑ์')
                              ITD/@if($itd==null){{ __('001') }}@elseif($itd<=8)00{{$itd+1}}@elseif($itd>=9)0{{$itd+1}}@elseif($itd>=99){{$itd+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}
                              
                              @elseif(Auth::user()->department->Dpmname=='เซลล์')
                              SALE/@if($sale==null){{ __('001') }}@elseif($sale<=8)00{{$sale+1}}@elseif($sale>=9)0{{$sale+1}}@elseif($sale>=99){{$sale+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->department->Dpmname=='กฎหมาย')
                              LEG/@if($leg==null){{ __('001') }}@elseif($leg<=8)00{{$leg+1}}@elseif($leg>=9)0{{$leg+1}}@elseif($leg>=99){{$leg+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->department->Dpmname=='ส่วนงานเลขานุการ')
                              CS/@if($cs==null){{ __('001') }}@elseif($cs<=8)00{{$cs+1}}@elseif($cs>=9)0{{$cs+1}}@elseif($cs>=99){{$cs+1}}@endif/@if($total==null){{ __('001') }} @elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->department->Dpmname=='ส่วนงานบริหารงานคุณภาพ')
                              ISO/@if($iso==null){{ __('001') }}@elseif($iso<=8)00{{$iso+1}}@elseif($iso>=9)0{{$iso+1}}@elseif($iso>=99){{$iso+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->department->Dpmname=='บริหารงานโครงการ')
                              PM/@if($pm==null){{ __('001') }}@elseif($pm<=8)00{{$pm+1}}@elseif($pm>=9)0{{$pm+1}}@elseif($pm>=99){{$pm+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}

                              @endif

                              @if(Auth::user()->department->Dpmname=='ไอที')
                              <input type="hidden" value="ITI" class="form-control" style="width: 60px" name="fdepartment">
                            @if($iti==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($iti<=8)
                            <input type="hidden" value=<?php echo '00'.$iti+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($iti>=9)
                            <input type="hidden" value=<?php echo '0'.$iti+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($iti>=99)
                            <input type="hidden" value=<?php echo $iti+1;?> class="form-control" style="width: 60px" name="dnumber">
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


                            @elseif(Auth::user()->department->Dpmname=='บัญชี')
                              <input type="hidden" value="ACC" class="form-control" style="width: 60px" name="fdepartment">
                            @if($acc==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($acc<=8)
                            <input type="hidden" value=<?php echo '00'.$acc+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($acc>=9)
                            <input type="hidden" value=<?php echo '0'.$acc+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($acc>=99)
                            <input type="hidden" value=<?php echo $acc+1;?> class="form-control" style="width: 60px" name="dnumber">
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


                            @elseif(Auth::user()->department->Dpmname=='จัดซื้อ')
                            <input type="hidden" value="PUR" class="form-control" style="width: 60px" name="fdepartment">
                            @if($pur==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($pur<=8)
                            <input type="hidden" value=<?php echo '00'.$pur+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($pur>=9)
                            <input type="hidden" value=<?php echo '0'.$pur+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($pur>=99)
                            <input type="hidden" value=<?php echo $pur+1;?> class="form-control" style="width: 60px" name="dnumber">
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

                            @elseif(Auth::user()->department->Dpmname=='บุคคล')
                            <input type="hidden" value="HR" class="form-control" style="width: 60px" name="fdepartment">
                            @if($hr==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($hr<=8)
                            <input type="hidden" value=<?php echo '00'.$hr+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($hr>=9)
                            <input type="hidden" value=<?php echo '0'.$hr+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($hr>=99)
                            <input type="hidden" value=<?php echo $hr+1;?> class="form-control" style="width: 60px" name="dnumber">
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


                            @elseif(Auth::user()->department->Dpmname=='ธุรการ')
                            <input type="hidden" value="AD" class="form-control" style="width: 60px" name="fdepartment">
                            @if($ad==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($ad<=8)
                            <input type="hidden" value=<?php echo '00'.$ad+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($ad>=9)
                            <input type="hidden" value=<?php echo '0'.$ad+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($ad>=99)
                            <input type="hidden" value=<?php echo $ad+1;?> class="form-control" style="width: 60px" name="dnumber">
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
                            

                            @elseif(Auth::user()->department->Dpmname=='การเงิน')
                            <input type="hidden" value="FIN" class="form-control" style="width: 60px" name="fdepartment">
                            @if($fin==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($fin<=8)
                            <input type="hidden" value=<?php echo '00'.$fin+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($fin>=9)
                            <input type="hidden" value=<?php echo '0'.$fin+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($fin>=99)
                            <input type="hidden" value=<?php echo $fin+1;?> class="form-control" style="width: 60px" name="dnumber">
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
                            

                            @elseif(Auth::user()->department->Dpmname=='มาร์เก็ตติ้ง')
                            <input type="hidden" value="MKT" class="form-control" style="width: 60px" name="fdepartment">
                            @if($mkt==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($mkt<=8)
                            <input type="hidden" value=<?php echo '00'.$mkt+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($mkt>=9)
                            <input type="hidden" value=<?php echo '0'.$mkt+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($mkt>=99)
                            <input type="hidden" value=<?php echo $mkt+1;?> class="form-control" style="width: 60px" name="dnumber">
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

                            @elseif(Auth::user()->department->Dpmname=='บริหารงานพัฒนาผลิตภัณฑ์')
                            <input type="hidden" value="ITD" class="form-control" style="width: 60px" name="fdepartment">
                            @if($itd==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($itd<=8)
                            <input type="hidden" value=<?php echo '00'.$itd+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($itd>=9)
                            <input type="hidden" value=<?php echo '0'.$itd+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($itd>=99)
                            <input type="hidden" value=<?php echo $itd+1;?> class="form-control" style="width: 60px" name="dnumber">
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


                            @elseif(Auth::user()->department->Dpmname=='เซลล์')
                            <input type="hidden" value="SALE" class="form-control" style="width: 70px" name="fdepartment">
                            @if($sale==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($sale<=8)
                            <input type="hidden" value=<?php echo '00'.$sale+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($sale>=9)
                            <input type="hidden" value=<?php echo '0'.$sale+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($sale>=99)
                            <input type="hidden" value=<?php echo $sale+1;?> class="form-control" style="width: 60px" name="dnumber">
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
                          

                            @elseif(Auth::user()->department->Dpmname=='กฎหมาย')
                            <input type="hidden" value="LEG" class="form-control" style="width: 60px" name="fdepartment">
                            @if($leg==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($leg<=8)
                            <input type="hidden" value=<?php echo '00'.$leg+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($leg>=9)
                            <input type="hidden" value=<?php echo '0'.$leg+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($leg>=99)
                            <input type="hidden" value=<?php echo $leg+1;?> class="form-control" style="width: 60px" name="dnumber">
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
                          

                            @elseif(Auth::user()->department->Dpmname=='ส่วนงานเลขานุการ')
                            <input type="hidden" value="CS" class="form-control" style="width: 60px" name="fdepartment">
                            @if($cs==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($cs<=8)
                            <input type="hidden" value=<?php echo '00'.$cs+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($cs>=9)
                            <input type="hidden" value=<?php echo '0'.$cs+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($cs>=99)
                            <input type="hidden" value=<?php echo $cs+1;?> class="form-control" style="width: 60px" name="dnumber">
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


                            @elseif(Auth::user()->department->Dpmname=='ส่วนงานบริหารงานคุณภาพ')
                            <input type="hidden" value="ISO" class="form-control" style="width: 60px" name="fdepartment">
                            @if($iso==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($iso<=8)
                            <input type="hidden" value=<?php echo '00'.$iso+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($iso>=9)
                            <input type="hidden" value=<?php echo '0'.$iso+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($iso>=99)
                            <input type="hidden" value=<?php echo $iso+1;?> class="form-control" style="width: 60px" name="dnumber">
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
                          

                            @elseif(Auth::user()->department->Dpmname=='บริหารงานโครงการ')
                            <input type="hidden" value="PM" class="form-control" style="width: 60px" name="fdepartment">
                            @if($pm==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($pm<=8)
                            <input type="hidden" value=<?php echo '00'.$pm+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($pm>=9)
                            <input type="hidden" value=<?php echo '0'.$pm+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($pm>=99)
                            <input type="hidden" value=<?php echo $pm+1;?> class="form-control" style="width: 60px" name="dnumber">
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
                            @endif
            
                            @elseif($type=='สถานตรวจสภาพรถศูนย์ตรอ.ไอดี')
                            เลขที่หนังสือ&nbsp; 
                            
                           INS/@if($ins==null){{ __('001') }}@elseif($ins<=8)00{{$ins+1}}@elseif($ins>=9)0{{$ins+1}}@elseif($ins>=99){{$ins+1}}@endif/@if($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}
                           <input type="hidden" value="INS" class="form-control" style="width: 60px" name="fdepartment">
                            @if($ins==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($ins<=8)
                            <input type="hidden" value=<?php echo '00'.$ins+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($ins>=9)
                            <input type="hidden" value=<?php echo '0'.$ins+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($ins>=99)
                            <input type="hidden" value=<?php echo $ins+1;?> class="form-control" style="width: 60px" name="dnumber">
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
                            
                            
                            @elseif($type=='ศูนย์ฝึกอบรม')
                            เลขที่หนังสือ&nbsp;
                             TZ/@if($tz==null){{ __('001') }}@elseif($tz<=8)00{{$tz+1}}@elseif($tz>=9)0{{$tz+1}}@elseif($tz>=99){{$tz+1}}@endif/@if($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total>=99){{$total+1}}@endif/{{$year}}           
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
                             @endif
                            </div><br><br>
            

            <div class="d-flex justify-content-center">
            วันที่&nbsp;
            <?php
            $myDate= $date;
            $myYear = date('Y', strtotime($myDate));
            $myYearBuddhist = $myYear + 543;
            $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
            $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
            echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
            ?>            
            <input type="hidden" value="{{$date}}" class="form-control" style="width: 150px" name="date">  

            </div><br><br>

            <div class="d-flex justify-content-start">
            เรื่อง&nbsp;&nbsp;
            {{$story}}
            <input type="hidden" value="{{$story}}" class="form-control" style="width: 150px" name="story">  
            </div>

            <div class="d-flex justify-content-start"style="margin-top:5px;">
            เรียน&nbsp;&nbsp;
            {{$learn}}
            <input type="hidden" value="{{$learn}}" class="form-control" style="width: 150px" name="learn">  
            </div>

            @if($quote==null)

            @else
            <div class="d-flex justify-content-start"style="margin-top:5px;">
            อ้างถึง&nbsp;&nbsp;
            {{$quote}}
            <input type="hidden" value="{{$quote}}" class="form-control" style="width: 150px" name="quote">  
            </div>
            @endif

            @if($enclosure==null)
            <br>
            @else
            <div class="d-flex" style="margin-right:10px;margin-top:5px;">
            <div class="flex-shrink-0">
            สิ่งที่ส่งมาด้วย&nbsp;&nbsp;
            </div>
            <div class="flex-grow-1 ms-3">
            <?php echo $enclosure; ?> 
            <input type="hidden" value="{{$enclosure}}" class="form-control" style="width: 150px" name="enclosure">  
            </div>
            </div>
            @endif <br>
            
            <div class="d-flex flex-column" style="margin-left: 40px">
            <?= $details; ?> 
            <input type="hidden" value="{{$details}}" class="form-control" style="width: 150px" name="details">  
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

            <div class=" footer">
            <div style="border: 2px solid #000000; overflow: auto; width: 350px; height:auto;" style="margin: 10px"><br>
            <div class="d-flex justify-content-start"  style="margin-left: 20px;font-size:16px;">
            สอบถามได้ที่
            </div>
            <div class="d-flex justify-content-start" style="margin-left: 20px;font-size:16px;">
            ชื่อ&nbsp;{{$ctname}}
            <input type="hidden" value="{{$ctname}}" class="form-control" style="width: 150px" name="ctname">  
            </div>
            <div class="d-flex justify-content-start" style="margin-left: 20px;font-size:16px;">
            เบอร์โทรศัพท์&nbsp;{{$ctphone}}
            <input type="hidden" value="{{$ctphone}}" class="form-control" style="width: 150px" name="ctphone">  
            </div>
            <div class="d-flex justify-content-start"style="margin-left: 20px;font-size:16px;">
            E-mail &nbsp;{{$ctemail}}
            <input type="hidden" value="{{$ctemail}}" class="form-control" style="width: 150px" name="ctemail">  
            </div><br>
            </div><br><br>

            <div class="d-flex justify-content-end" style="font-size:15px;">
            FD-HO/HR-013/1 :00: 19-09-2563
            </div>

            <div class="d-flex justify-content-center">
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
            <!-- /headform -->
        </div>
        <!--  /bodyform -->
      </div>
      <!-- /card -->
    </div>
    <!-- /font1 -->
    </div>   
    <div class="d-flex justify-content-end">
  <input type="hidden" value="{{$type}}" class="form-control" placeholder="กรุณากรอกการอ้างถึง" style="width: 300px" name="type">
   </div><br>
<!-- save cancel -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-primary" type="button" style="margin-right:10px" data-bs-toggle="modal" data-bs-target="#confirm">บันทึก</button>
 @if($type=='โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์') 
 <a href="{{ route('formIDD') }}" class="btn btn-secondary" type="button">ยกเลิก</a>
 @elseif($type=='บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')
 <a href="{{ route('formiddrives') }}" class="btn btn-secondary" type="button">ยกเลิก</a>
 @elseif($type=='สถานตรวจสภาพรถศูนย์ตรอ.ไอดี')
 <a href="{{ route('formINS') }}" class="btn btn-secondary" type="button">ยกเลิก</a>
 @elseif($type=='ศูนย์ฝึกอบรม')
 <a href="{{ route('formTZ') }}" class="btn btn-secondary" type="button">ยกเลิก</a>
 @endif
</div>
<!-- /save cancel -->

<!-- Modal -->
<div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ยืนยันการบันทึก</h1>
        <!--  <i class="fa fa-times-circle fa-2x" style="color:white" data-bs-dismiss="modal" aria-label="Close" type="button"></i> -->
        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
      </div>
      <div class="modal-body">
       <h5 style="margin-top:5px"> ต้องการยืนยันการบันทึก </h5>
     <div class="text-red">   * หมายเหตุ ถ้ากดบันทึกแล้วไม่สามารถแก้ไขเลขจดหมายได้ * </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
        <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
      </div>
    </div>
  </div>
</form>
</div>
<!-- endmodal -->

<!-- จบ -->
      </div>
    </div>
</div>
@endsection

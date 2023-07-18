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
  layout หน้า  PDF สร้างเอกสารของ สำนักงานใหญ่
 -->

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-4">
      <!-- เริ่ม -->
  
      <!-- card -->
      <div class="font1">
        <div class="card" >
          <!-- headform -->
          <div class="card-header" style="padding:2cm 2cm 2cm 3cm">
            <div class="d-flex">
             <img style="" src="{{ asset('dist/img/logoiddrives.png') }}" height="100">
             <!-- ความจริงกว้างสูง 186x186 -->
             <div class="p-2 flex-fill" style="font-size:14px;margin-top:5px">
             <h5 style="font-weight:bold; font-size:16px"> บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่) </h5>
             200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000 เลขที่ผู้เสียภาษี 0405536000531 <br>
             Tel : 043-228 899 www.iddrives.co.th Email : idofficer@iddrives.co.th <br></div>
            </div>
            <hr noshade="noshade" size="2" style="margin-top:10px">
           
            <!-- bodyform -->
            <div class="card-body" style="margin-top:30px;padding:unset" >
            <form action="{{url('/form/add')}}" method="post" enctype="multipart/form-data">
                                @csrf      
            <!-- <div class="d-flex justify-content-end"> -->
            <div class="d-flex ">

            <!-- query Dpname in Departments table by Department in user table -->
            <?php $shortname = \App\CoreFunction\Helper::Fun(Auth::user()->Department ?? '0');?> <!-- {{$shortname}} -->

            เลขที่หนังสือ&nbsp; @if($shortname == 'ไอที')
                              ITI/@if($iti==null){{ __('001') }}@elseif($iti<=8)00{{$iti+1}}@elseif($iti>=9)0{{$iti+1}}@elseif($iti>=99){{$iti+1}}@endif/@if($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total=99){{$total+1}}@endif/{{$year}}

                              @elseif($shortname == 'บัญชี')
                              ACC/@if($acc==null){{ __('001') }}@elseif($acc<=8)00{{$acc+1}}@elseif($acc>=9)0{{$acc+1}}@elseif($acc>=99){{$acc+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total=99){{$total+1}}@endif/{{$year}}

                              @elseif($shortname == 'จัดซื้อ')
                              PUR/@if($pur==null){{ __('001') }}@elseif($pur<=8)00{{$pur+1}}@elseif($pur>=9)0{{$pur+1}}@elseif($pur>=99){{$pur+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total=99){{$total+1}}@endif/{{$year}}

                              @elseif($shortname=='บุคคล')
                              HR/@if($hr==null){{ __('001') }}@elseif($hr<=8)00{{$hr+1}}@elseif($hr>=9)0{{$hr+1}}@elseif($hr>=99){{$hr+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total=99){{$total+1}}@endif/{{$year}}

                              @elseif($shortname =='ธุรการ')
                              AD/@if($ad==null){{ __('001') }}@elseif($ad<=8)00{{$ad+1}}@elseif($ad>=9)0{{$ad+1}}@elseif($ad>=99){{$ad+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total=99){{$total+1}}@endif/{{$year}}
                              
                              @elseif($shortname =='การเงิน')
                              FIN/@if($fin==null){{ __('001') }}@elseif($fin<=8)00{{$fin+1}}@elseif($fin>=9)0{{$fin+1}}@elseif($fin>=99){{$fin+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total=99){{$total+1}}@endif/{{$year}}
                              
                              @elseif($shortname =='การตลาด')
                              MKT/@if($mkt==null){{ __('001') }}@elseif($mkt<=8)00{{$mkt+1}}@elseif($mkt>=9)0{{$mkt+1}}@elseif($mkt>=99){{$mkt+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total=99){{$total+1}}@endif/{{$year}}
                              
                              @elseif($shortname=='บริหารงานพัฒนาผลิตภัณฑ์')
                              ITD/@if($itd==null){{ __('001') }}@elseif($itd<=8)00{{$itd+1}}@elseif($itd>=9)0{{$itd+1}}@elseif($itd>=99){{$itd+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total=99){{$total+1}}@endif/{{$year}}
                              
                              @elseif($shortname=='เซลล์')
                              SALE/@if($sale==null){{ __('001') }}@elseif($sale<=8)00{{$sale+1}}@elseif($sale>=9)0{{$sale+1}}@elseif($sale>=99){{$sale+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total=99){{$total+1}}@endif/{{$year}}

                              @elseif($shortname =='กฎหมาย')
                              LEG/@if($leg==null){{ __('001') }}@elseif($leg<=8)00{{$leg+1}}@elseif($leg>=9)0{{$leg+1}}@elseif($leg>=99){{$leg+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total=99){{$total+1}}@endif/{{$year}}

                              @elseif($shortname =='ส่วนงานเลขานุการ')
                              CS/@if($cs==null){{ __('001') }}@elseif($cs<=8)00{{$cs+1}}@elseif($cs>=9)0{{$cs+1}}@elseif($cs>=99){{$cs+1}}@endif/@if($total==null){{ __('001') }} @elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total=99){{$total+1}}@endif/{{$year}}

                              @elseif($shortname =='ส่วนงานบริหารงานคุณภาพ')
                              ISO/@if($iso==null){{ __('001') }}@elseif($iso<=8)00{{$iso+1}}@elseif($iso>=9)0{{$iso+1}}@elseif($iso>=99){{$iso+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total=99){{$total+1}}@endif/{{$year}}

                              @elseif($shortname =='บริหารงานโครงการ')
                              PM/@if($pm==null){{ __('001') }}@elseif($pm<=8)00{{$pm+1}}@elseif($pm>=9)0{{$pm+1}}@elseif($pm>=99){{$pm+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total=99){{$total+1}}@endif/{{$year}}
                              
                              @elseif($shortname =='คลังสินค้า')
                              IDS/@if($ids==null){{ __('001') }}@elseif($ids<=8)00{{$ids+1}}@elseif($ids>=9)0{{$ids+1}}@elseif($ids>=99){{$ids+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total=99){{$total+1}}@endif/{{$year}}

                              @elseif($shortname =='พัฒนาผลิตภัณฑ์')
                              IDC/@if($idc==null){{ __('001') }}@elseif($idc<=8)00{{$idc+1}}@elseif($idc>=9)0{{$idc+1}}@elseif($idc>=99){{$idc+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total>=9)0{{$total+1}}@elseif($total=99){{$total+1}}@endif/{{$year}}

                              @endif

            </div>

            <div class="d-flex justify-content-end">
            @if($shortname == 'ไอที')
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


                            @elseif($shortname=='บัญชี')
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


                            @elseif($shortname=='จัดซื้อ')
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

                            @elseif($shortname=='บุคคล')
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


                            @elseif($shortname=='ธุรการ')
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
                            

                            @elseif($shortname=='การเงิน')
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
                            

                            @elseif($shortname=='มาร์เก็ตติ้ง')
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

                            @elseif($shortname=='บริหารงานพัฒนาผลิตภัณฑ์')
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


                            @elseif($shortname=='เซลล์')
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
                          

                            @elseif($shortname=='กฎหมาย')
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
                          

                            @elseif($shortname=='ส่วนงานเลขานุการ')
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


                            @elseif($shortname=='ส่วนงานบริหารงานคุณภาพ')
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
                          

                            @elseif($shortname=='พัฒนาผลิตภัณฑ์')
                            <input type="hidden" value="IDC" class="form-control" style="width: 60px" name="fdepartment">
                            @if($idc==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($idc<=8)
                            <input type="hidden" value=<?php echo '00'.$idc+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($idc>=9)
                            <input type="hidden" value=<?php echo '0'.$idc+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($idc>=99)
                            <input type="hidden" value=<?php echo $idc+1;?> class="form-control" style="width: 60px" name="dnumber">
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



                            @elseif($shortname=='คลังสินค้า')
                            <input type="hidden" value="IDS" class="form-control" style="width: 60px" name="fdepartment">
                            @if($ids==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($ids<=8)
                            <input type="hidden" value=<?php echo '00'.$ids+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($ids>=9)
                            <input type="hidden" value=<?php echo '0'.$ids+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($ids>=99)
                            <input type="hidden" value=<?php echo $ids+1;?> class="form-control" style="width: 60px" name="dnumber">
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
                          

                            @elseif($shortname=='บริหารงานโครงการ')
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
            </div><br><br>
            


            <div class="d-flex " style="width:fit-content; position:relative; left:62.5%;"><!-- <div class="d-flex justify-content-center"> -->
            วันที่&nbsp;
            <input type="date" class="form-control"  style="width: 300px" value="<?php echo date("Y-m-d"); ?>" name="date">
            </div><br><br><br><br>

            <div class="d-flex justify-content-start">
            เรื่อง&nbsp;&nbsp;
            <input type="text" class="form-control" placeholder="กรุณากรอกเรื่อง" style="width: 500px" name="story" required>
            </div><br>

            <div class="d-flex justify-content-start">
            เรียน&nbsp;&nbsp;
            <input type="text" class="form-control" placeholder="กรุณากรอกเรียน" style="width: 500px" name="learn" required>
            </div><br>

            <div class="d-flex justify-content-start">
            อ้างถึง&nbsp;&nbsp;
            <input type="text" class="form-control" placeholder="กรุณากรอกการอ้างถึง" style="width: 500px" name="quote">
            </div><br>

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
            <img style="width:100px" id="selected-image" src="">
            <input id="signName" type="text" style="display:none" name="sign">
            <p>.......................................................</p>
            </div>

            <div style="text-align:center;display:flex; line-height: 30px">
              <p style="float:inline-start">(</p>
              <p style="width: 100%;">
                <input id="textf" type="text" class="form-control" placeholder="กรุณากรอกชื่อ" autocomplete="off" name="sName" required>
                
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
              <input id="position" type="text" class="form-control" placeholder="กรุณากรอกตำแหน่ง" style="width: 350px" name="sPosition" required>
            </div>
          
            </div>
            </div>
            <br><br><br><br><br>
            <!-- Contact Us -->
            <!-- <div style="border: 2px solid #ff0000; overflow: auto; width: 350px; height:auto;" style="margin: 20px"><br> -->
            <!-- <div style="overflow: auto; width: 350px; height:auto;" style="margin: 20px"><br>
            <div class="d-flex justify-content-start"  style="margin-left: 20px">
            ติดต่อประสานงาน
            </div>
            <div class="d-flex justify-content-start" style="margin-left: 20px">
            ชื่อ&nbsp;<input type="text" class="form-control" placeholder="กรุณากรอกชื่อ" style="width: 200px" name="sName" required>
            </div>
            <div class="d-flex justify-content-start" style="margin-left: 20px">
            เบอร์โทรศัพท์&nbsp;<input type="text" class="form-control" placeholder="กรุณากรอกเบอร์โทร" style="width: 200px" name="sign" required>
            </div>
            <div class="d-flex justify-content-start"style="margin-left: 20px">
            E-mail &nbsp;<input type="text" class="form-control" placeholder="กรุณากรอกอีเมล" style="width: 200px" name="sPosition" required>
            </div><br> </div>-->
            
            <br><br>

            <!-- <div class="d-flex justify-content-end">
            FD-HO/HR-013/1 :00: 19-09-2563
            </div> -->

            <div class="d-flex justify-content-center">
            <div style="width:80%">
            <div class="d-flex justify-content-end" style="margin-bottom:10px">
            FD-HO-015 :00: 20-05-2566    <!-- FD-HO/HR-013/1 :00: 19-09-2563 -->
            </div>
            <div style="border: 2px solid #000000; overflow: auto; width: auto; height: auto; text-align: center;width:100%">
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
<input type="hidden" value="บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)" class="form-control" placeholder="กรุณากรอกการอ้างถึง" style="width: 300px" name="type">
   </div><br>
<!-- save cancel -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-primary" type="submit" style="margin-right:10px">บันทึก</button>
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
    // Create a new Image object
    var imageLoader = new Image();

    // Add an event listener to handle image loading
    imageLoader.onload = function() {
      // If the image is successfully loaded, set the src of the selectedImage element
      selectedImage.src = imagePath;
    };
    imageLoader.onerror = function() {
      // If there's an error loading the image, you can handle it here (optional)
      selectedImage.src = "";
      // You can set a default image in case the image is not found:
      // selectedImage.src = "path/to/default-image.png";
    };

    // Start loading the image
    imageLoader.src = imagePath;
    
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
    var storSign = document.getElementById("signName");
      storSign.value = "";
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

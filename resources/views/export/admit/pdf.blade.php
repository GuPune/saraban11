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
      table {
            border-collapse: collapse;
        }
        /* tr:nth-of-type(odd) {
            background: #eee;
        } */

        th {
            background: #5A5E63;
            color: white;
            font-weight: bold;
            font-size: 18px;
            padding: 5px;
            border: 1px solid #ccc;
            text-align:center;
        }

        td {
            padding-left: 3px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }
        .txet-center {
            text-align:center;
        }
        footer {
        position: fixed;
        color: #000;
        left: 0;
        bottom: 0;
        width: 100%;
        text-align: center;
        font-size:14px;
        line-height:0px;
        }

</style>
<body  style="border:2px solid #787878;padding: 20px ;margin:-10px; padding-bottom:0px" >   


    <div class="header" style="padding-bottom:20px;margin-bottom:30px ;border-bottom:2px solid #787878">
                <div style="float: left; margin-right:10px">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logoiddrives.png'))) }}" height="100">
                </div>
                <div class="" style="font-size:16pt;line-height: 0.8;">
                <h5 style="font-size:20pt;font-weight:bold;margin:0"> บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่) </h5>
                200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น เลขที่ผู้เสียภาษี 0405536000531 <br>
                Tel : 043-228 899 www.iddrives.co.th Email : idofficer@iddrives.co. 
                </div>

    </div>

  <p  style="font-size:26px" class="txet-center"> <b > รายงานทะเบียนหนังสือรับเข้า </b></p> 
  <table class="table">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>เลขที่หนังสือ</th>
                                        <th>วันที่รับ</th>
                                        <th>หน่วยงาน</th><!-- <td>จดหมายจาก</td> -->
                                        <th>เรื่อง</th>
                                        <th>เลขรับหนังสือ</th>
                                        <th>ผู้รับหนังสือฝ่าย/สาขา</th>
                                        <th>ชื่อผู้ลงรับ</th>
                                        <th>วันที่ลงรับ</th>
                                        <th>เวลาลงรับ</th>    
                                        </tr>
                                    @php($i=1)
                                </thead>
                                <tbody>
                                @foreach($admit as $row)
                                <tr>
                                        <td >{{$i++}}</td>
                                        <td >{{$row->Ebooknumber}}</td>
                                        <td><?php
                                           $myDate= $row->Edate_receive;
                                           $myYear = date('Y', strtotime($myDate));
                                           $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                           $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                           $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                           echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                        ?></td>
                                        <td>{{$row->Ebookeagency}}</td>
                                        <td>{{$row->Esubject}}</td>
                                        <td>{{$row->Ebook_receipt}}</td>
                                        @if($row->branch->branche_name=='-')
                                        <td>{{$row->agency->agency_name}}</td>                                                            
                                        @elseif($row->Department->Dpmname=='-')
                                        <td>{{$row->agency->agency_name}}/{{$row->branch->branche_name}}</td>
                                        @else
                                        <td>{{$row->Department->Dpmname}}/{{$row->branch->branche_name}}</td>                                                            
                                        @endif                                   
                                        <td>{{$row->Enamereply}}</td>
                                        <td><?php
                                            $myDate= $row->Edate_out;
                                            $myYear = date('Y', strtotime($myDate));
                                            $myYearBuddhist = mb_strimwidth($myYear , -2, 2);
                                            $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                            $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                            echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                            ?></td>
                                            <td>{{$row->Etimereply}}</td>                                                         
                                             </tr>                    
                                </tbody>
                                @endforeach
                            </table><br>

<!-- จบ -->

<!-- Footer -->
    <?php
        date_default_timezone_set('Asia/Bangkok');
        $currentDateTime = date("j/n/Y H:i:s");
    ?>
    <footer>
        <p >Printed By : ............, Printed On: ระบบสารบรรณ <?php echo $currentDateTime; ?>, เลขที่ 123456789</p>
    </footer>

</body>
</html>

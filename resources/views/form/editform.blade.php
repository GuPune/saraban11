@extends('layouts.menu.app')
@section('content')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">

    <style>
        .font1 {
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

        body {
            font-size: 15px;
        }

        .dropdown {
            display: none;
            height: 90px;
            overflow-y: scroll;

        }

        .dropdown.show {
            display: block;
        }
    </style>

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
                    <div class="card">
                        <div class="card-header" style="padding: 2cm 2cm 2cm 3cm;">
                            @if ($form->type == 'โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์')
                                <div class="" style="text-align:center;">
                                    <img src="{{ asset('dist/img/logoIDD.png') }}" height="50"
                                        style="margin-right:30px;margin-top:15px">
                                    <img src="{{ asset('dist/img/logoiddrives.png') }}" height="100"
                                        style="margin-right:15px;">
                                    {{-- <img src="{{ asset('dist/img/logopro.png') }}"height="80"> --}}
                                </div><br>
                                <div class="">
                                    <h5 style="font-weight:bold;margin-bottom:0;font-size:20pt">โรงเรียนสอนขับรถไอดี
                                        ไดร์ฟเวอร์ สาขา{{ $bName }}
                                        <span style="font-size:13pt;font-weight:400;font-weight:bold;">เลขที่ผู้เสียภาษี
                                            0405536000531</span>
                                    </h5>
                                    <p style="font-size:16pt; margin:unset;">ที่อยู่: {{ $bAddr[0] }} <br>Tel:
                                        {{ $bAddr[1] ?? '' }}</p>
                                    <p style="font-size:12pt; margin:unset;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด </p>
                                    <div class="" style="font-size:12pt">
                                        ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000
                                        Tel : 043-228 899 Email : idofficer@iddrives.co.th
                                        <br>
                                    </div>
                                </div>
                                <hr noshade="noshade" size="2"><br>
                            @elseif($form->type == 'บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')
                                <div class="d-flex">
                                    <img src="{{ asset('dist/img/logoiddrives.png') }}" style="margin-right:10px"
                                        height="100">
                                    <div class="flex-fill" style="margin-top: 10px;">
                                        <h5><b> บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่)</b> </h5>
                                        200/222 หมู่2 ถนนชัยพฤกษ์ ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น
                                        เลขที่ผู้เสียภาษี 0405536000531 <br>
                                        Tel : 043-228 899 www.iddrives.co.th Email : idofficer@iddrives.co.th
                                    </div>
                                </div>
                                <hr noshade="noshade" size="2" style="margin-top:10px">
                            @elseif($form->type == 'สถานตรวจสภาพรถศูนย์ตรอ.ไอดี')
                                <div class="" style="text-align:center;">
                                    <img src="{{ asset('dist/img/logoiddrives.png') }}" height="80">
                                    <img style="margin-left:20px" src="{{ asset('dist/img/logoins.png') }}" height="80">
                                </div><br>
                                <div class="">

                                    <!-- ดึงข้อมูลสาขาและที่อยู่จาก Database  -->
                                    <h5 style="font-size:20pt;font-weight:bold;margin-bottom:0">สถานตรวจสภาพรถ ศูนย์ตรอ.ไอดี
                                        สาขา{{ $bName }}
                                        <span style="font-size:14pt;">เลขที่ผู้เสียภาษี 0405536000531</span>
                                    </h5>
                                    <p style="font-size:14pt; margin:unset;">ที่อยู่: {{ $bAddr[0] }} <br>Tel:
                                        {{ $bAddr[1] ?? '' }}</p>
                                    <p style="font-size:12pt; margin:unset;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด</p>
                                    <div class="" style="font-size:12pt;">
                                        ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000
                                        Tel : 043-228 899 Email : idofficer@iddrives.co.th
                                        <br>
                                    </div>
                                </div>
                                <hr noshade="noshade" size="2"><br>
                            @elseif($form->type == 'ศูนย์ฝึกอบรม')
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('dist/img/logoIDD.png') }}" height="50"
                                        style="margin-right:30px;margin-top:15px">
                                    <img src="{{ asset('dist/img/logoiddrives.png') }}" height="100"
                                        style="margin-right:25px;">&nbsp;&nbsp;
                                    <img src="{{ asset('dist/img/logotz2.png') }}"height="80">
                                </div>
                                <br>
                                <div class="">
                                    <h5 style="font-size:20pt;font-weight:bold;margin-bottom:0">ศูนย์ฝึกอบรมเทรนนิ่งเซนเตอร์
                                        <span style="font-size:14pt;">เลขที่ผู้เสียภาษี 0405536000531</span></h5>
                                    <p style="font-size:14pt;margin:unset;">ที่อยู่: 58/1 ม.9 ถ.มิตรภาพ ต.ทับกวาง อ.แก่งคอย
                                        จ.สระบุรี 18260 <br> Email: id.trainingcenter@iddrives.co.th
                                        Tel :082-7513888 www.trainingzenter.com</p>
                                    <p style="font-size:12pt;margin:unset;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด</p>
                                    <div class="" style="font-size:12pt; ">
                                        ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000
                                        Tel : 043-228 899 Email : idofficer@iddrives.co.th
                                        <br>
                                    </div>
                                </div>
                                <hr noshade="noshade" size="2"><br>
                            @elseif($form->type == 'โรงเรียนไอดีสอนทักษะอาชีพ')
                                <div class="d-flex justify-content-center" style="text-align:center; ">
                                    <img src="{{ asset('dist/img/logoschool.jpg') }}" height="80">
                                    <div class="align-self-center mx-3">
                                        <h5 style="font-size:20px;font-weight:bold;margin-bottom:0">โรงเรียน
                                            ไอดีสอนทักษะอาชีพ</h5>
                                        <h5 style="font-size:20px;font-weight:bold;margin-bottom:0">ID Vocational Skill
                                            Training School</h5>
                                    </div>
                                    &nbsp;&nbsp;
                                    <img src="{{ asset('dist/img/logoiddrives.png') }}"height="80">
                                </div>
                                <br>
                                <div class="">
                                    <p style="font-size:16px; margin:unset;">ที่อยู่: 150/11-12 ม.7 ถ.มิตรภาพ ต.ในเมือง
                                        อ.เมือง
                                        จ.ขอนแก่น 40000
                                        <br>Tel:094-2637979 Email:IDSS@iddrives.co.th www.idsschool.com Line:@099kcyha
                                        เลขที่ผู้เสียภาษี 0405536000531
                                    </p>
                                    <p style="font-size:12px; margin:unset;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด ที่อยู่
                                        200/222 หมู่2 ถนนชัยพฤกษ์ ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000</p>
                                    <div class="" style="font-size:12px;">
                                        Tel: 043-228 899 Email : idofficer@iddrives.co.th
                                        <br>
                                    </div>
                                </div>
                                <hr noshade="noshade" size="2"><br>
                            @endif
                            <!-- /head-form -->

                            <form action="{{ url('/form/pdf/' . $form->id) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <!-- bodyform -->
                                <div class="card-body" style="padding: 1cm 0 0 0;">
                                    <div class="d-flex ">
                                        เลขที่หนังสือ&nbsp;{{ $form->fdepartment }}/{{ $form->dnumber }}/{{ $form->cnumber }}/{{ $form->year }}
                                    </div><br><br>

                                    <div class="d-flex " style="width:fit-content; position:relative; left:62.5%;">
                                        วันที่&nbsp;<?php
                                        $myDate = $form->date;
                                        $myYear = date('Y', strtotime($myDate));
                                        $myYearBuddhist = $myYear + 543;
                                        $thaimonth = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
                                        $myMonth = $thaimonth[date(' m ', strtotime($myDate)) - 1];
                                        echo date("d $myMonth ", strtotime($myDate)) . $myYearBuddhist;
                                        ?>
                                    </div><br><br>
                                    <!-- <input type="date" class="form-control" value="{{ $form->date }}" style="width: 800px" name="date"> -->
                                    <input type="hidden" class="form-control" value="{{ $form->date }}"
                                        style="width: 800px" name="date" required>


                                    <div class="d-flex justify-content-start">
                                        เรื่อง&nbsp;&nbsp;
                                        <input type="text" class="form-control" value="{{ $form->story }}"
                                            placeholder="กรุณากรอกเรื่อง" style="width: 800px" name="story" required>
                                    </div><br>

                                    <div class="d-flex justify-content-start"style="margin-top:5px;">
                                        เรียน&nbsp;&nbsp;
                                        <input type="text" class="form-control" value="{{ $form->learn }}"
                                            placeholder="กรุณากรอกเรียนถึง" style="width: 800px" name="learn" required>
                                    </div><br>

                                    <div class="d-flex justify-content-start"style="margin-top:5px;">
                                        สำเนาถึง&nbsp;&nbsp;
                                        <input type="text" class="form-control" value="{{ $form->copy_to }}"
                                            placeholder="กรุณากรอกสำเนาถึง" style="width: 800px" name="copy_to">
                                    </div><br>


                                    <div class="d-flex justify-content-start"style="margin-top:5px;">
                                        อ้างถึง&nbsp;&nbsp;
                                        <input type="text" class="form-control" value="{{ $form->quote }}"
                                            placeholder="กรุณากรอกอ้างถึง" style="width: 300px" name="quote">
                                    </div><br>

                                    <div class="d-flex" style="margin-right:10px;margin-top:5px;">
                                        <div class="flex-shrink-0">
                                            สิ่งที่ส่งมาด้วย&nbsp;&nbsp;
                                        </div>
                                        <!-- <div class="flex-grow-1 ms-3" > -->
                                        <textarea id="txtMessage" name="enclosure"><?php echo $form->enclosure; ?> </textarea>
                                        <!-- </div> -->
                                    </div><br><br>

                                    <!-- <div class="d-flex flex-column" > -->
                                    <textarea id="txtMessage1" name="details"> <?= $form->details ?></textarea>
                                    <!-- </div> -->

                                </div><br><br>

                                <div style="width:fit-content; position:relative; left:62.5%">
                                    {{-- <div style="text-align:center"><!-- <div class="d-flex justify-content-center"> -->
                                        ขอแสดงความนับถือ
                                    </div> --}}
                                    <div style="text-align:center;display:flex; line-height: 30px">
                                        <input id="regard" type="text" class="form-control" value="{{ $form->regard }}"
                                                placeholder="กรุณากรอกแสดงความนับถือ" autocomplete="off" name="regard"
                                                required>
                                    </div>
                                    <br>
                                    <div style="text-align:center">
                                        <img style="width:100px" id="selected-image"
                                            src="{{ asset('dist/img/sign/' . $form->sign . '.png') }}">
                                        <input id="signName" type="text" style="display:none"
                                            value="{{ $form->sign }}" name="sign">
                                        <p>.......................................................</p>
                                    </div>

                                    <div style="text-align:center;display:flex; line-height: 30px">
                                        <p style="float:inline-start">(</p>
                                        <p style="width: 100%;">
                                            <input id="textf" type="text" class="form-control"
                                                placeholder="กรุณากรอกชื่อ" value="{{ $form->sName }}"
                                                autocomplete="off" name="sName" required>

                                        </p>
                                        <p style="float:inline-end">)</p>
                                    </div>
                                    <div class="dropdown drowdown-menu" id="dmanager">
                                        <a class="dropdown-item" onclick="clearSign()"> Not sign </a>
                                        @foreach ($nameManager as $name)
                                            <a class="dropdown-item" value="{{ trim($name[1]) }}"
                                                positionSelected="{{ $name[2] }}"
                                                nameSelected="{{ $name[0] }}" onclick="selectOption(this)">
                                                {{ $name[0] }} </a>
                                        @endforeach
                                    </div>
                                    <div>
                                        <input id="position" type="text" class="form-control"
                                            value="{{ $form->sPosition }}" placeholder="กรุณากรอกตำแหน่ง"
                                            style="width: 350px" name="sPosition" required>
                                    </div>
                                </div>
                        </div>

                        <br><br><br>

                        <div class=" footer">

                            <!-- Contact Us -->
                            <!-- <div style="border: 2px solid #ff0000; overflow: auto; width: 350px; height:auto;" style="margin: 20px"><br> -->
                            <!-- <div style="border: 2px solid #000000; overflow: auto; width: 350px; height:auto;" style="margin: 10px"><br>
                <div class="d-flex justify-content-start"  style="margin-left: 20px;font-size:16px;">
                ติดต่อประสานงาน
                </div>
                <div class="d-flex justify-content-start" style="margin-left: 20px;font-size:16px;">
                ชื่อ&nbsp;<input type="text" class="form-control" value="{{ $form->sName }}" style="width: 200px" name="sName" placeholder="กรุณากรอกชื่อ" required>
                </div>
                <div class="d-flex justify-content-start" style="margin-left: 20px;font-size:16px;">
                เบอร์โทรศัพท์&nbsp;<input type="text" class="form-control" value="{{ $form->sign }}" style="width: 200px" name="sign" placeholder="กรุณากรอกเบอร์โทรศัพท์" required>
                </div>
                <div class="d-flex justify-content-start"style="margin-left: 20px;font-size:16px;">
                E-mail &nbsp;<input type="text" class="form-control" value="{{ $form->sPosition }}" style="width: 200px" name="sPosition" placeholder="กรุณากรอกอีเมล" required>
                </div><br>
                </div><br><br> -->


                            <!-- <div class="d-flex justify-content-end" style="font-size:15px;margin-right:150px">
                FD-HO/HR-013/1 :00: 19-09-2563
                </div> -->

                            <div class="d-flex justify-content-center">
                                <div style="width:80%">
                                    <div class="d-flex justify-content-end" style="margin-bottom:10px">
                                        FD-IDD-SCL-012:00: 20-05-2566 <!-- FD-HO/HR-013/1 :00: 19-09-2563 -->
                                    </div>
                                    <div
                                        style="border: 2px solid #000000; overflow: auto; width: auto; height: auto; text-align: center;">
                                        <!-- <div style="border: 2px solid #e46c0a; overflow: auto; width: auto; height: auto; text-align: center;"> -->
                                        <img src="{{ asset('dist/img/logo1.png') }}" width="51px">
                                        <img src="{{ asset('dist/img/logo2.png') }}" width="51px">
                                        <img src="{{ asset('dist/img/logo3.png') }}" width="51px">
                                        <img src="{{ asset('dist/img/logo4.png') }}" width="51px">
                                        <img src="{{ asset('dist/img/logo5.png') }}" width="50px">
                                        {{-- <img src="{{ asset('dist/img/logo6.png') }}" width="252px"> --}}
                                        <img src="{{ asset('dist/img/logo7.png') }}" width="121px">
                                        <img src="{{ asset('dist/img/logo8.jpg') }}" width="100px">
                                        <img src="{{ asset('dist/img/logo9.png') }}" width="81px">
                                        <img src="{{ asset('dist/img/logo10.png') }}" width="50px">
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
        <!-- save cancel -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary" type="submit" style="margin-right:10px">บันทึก</button>
            @if (Auth::user()->role == 0)
                <a href="{{ route('bookoutuser') }}"class="btn btn-secondary" type="button">ยกเลิก</a>
            @elseif(Auth::user()->role == 1)
                <a href="{{ route('bookoutstaff') }}"class="btn btn-secondary" type="button">ยกเลิก</a>
            @elseif(Auth::user()->role == 2)
                <a href="{{ route('bookoutadmin') }}"class="btn btn-secondary" type="button">ยกเลิก</a>
            @endif
        </div>
        <!-- /save cancel -->
        </form>
        <!-- จบ -->
    </div>
    </div>
    </div>



    <script>
        var textF = document.getElementById("textf");
        var storSign = document.getElementById("signName");
        var textPo = document.getElementById("position");
        var dropd = document.getElementById("dmanager");

        function selectOption(option) {

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

        function clearSign() {
            var selectedImage = document.getElementById("selected-image");
            var storSign = document.getElementById("signName");
            storSign.value = "";
            selectedImage.src = "";
        }

        textF.addEventListener("click", function(event) {
            dropd.classList.add("show");
            event.stopPropagation();
        });

        document.addEventListener("click", function() {
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

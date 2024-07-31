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
            size: 21cm 29.7cm landscape;
            margin: 30mm 45mm 30mm 45mm;
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

    <!--
          layout หน้า  PDF สร้างเอกสารของ IDSS
         -->

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid py-4">
                <!-- start -->

                <!-- card -->
                <div class="font1">
                    <div class="card">
                        <div class="card-header" style="padding:2cm 2cm 2cm 3cm">

                            <!-- Header -->
                            <div class="d-flex justify-content-center" style="text-align:center; ">
                                <img src="{{ asset('dist/img/logoschool.png') }}" height="80">
                                <div class="align-self-center mx-3">
                                    <h5 style="font-size:20px;font-weight:bold;margin-bottom:0">โรงเรียน ไอดีสอนทักษะอาชีพ</h5>
                                    <h5 style="font-size:20px;font-weight:bold;margin-bottom:0">ID Vocational Skill Training School</h5>
                                </div>
                                &nbsp;&nbsp;
                                <img src="{{ asset('dist/img/logoiddrives.png') }}"height="80">
                            </div>
                            <br>
                            <div class="">
                                <p style="font-size:16px; margin:unset;">ที่อยู่: 150/11-12 ม.7 ถ.มิตรภาพ ต.ในเมือง อ.เมือง
                                    จ.ขอนแก่น 40000
                                    <br> Email:IDSS@iddrives.co.th www.idsschool.com Line:@099kcyha เลขที่ผู้เสียภาษี 0405536000531
                                </p>
                                <p style="font-size:14px; margin:unset;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด</p>
                                <div class="" style="font-size:14px;">
                                    ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000 Tel
                                    : 043-228 899 Email : idofficer@iddrives.co.th
                                    <br>
                                </div>
                            </div>




                            <hr noshade="noshade" size="2">

                            <!-- bodyform -->
                            <div class="card-body" style="margin: 1cm 0 0 0; padding: unset;">
                                <div class="d-flex ">
                                    <form action="{{ url('/form/add') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        เลขที่หนังสือ&nbsp;
                                        IDSS/@if ($inas == null)
                                            {{ __('001') }}
                                        @elseif($inas <= 8)
                                            00{{ $inas + 1 }}
                                        @elseif($inas >= 9)
                                            0{{ $inas + 1 }}
                                        @elseif($inas >= 99)
                                            {{ $inas + 1 }}
                                            @endif/@if ($total <= 8)
                                                00{{ $total + 1 }}
                                            @elseif($total >= 9)
                                                0{{ $total + 1 }}
                                            @elseif($total >= 99)
                                                {{ $total + 1 }}
                                            @endif/{{ $year }}
                                            <!-- <input type="hidden" class="form-control" placeholder="เลขที่หนังสือ" style="width: 300px"> -->
                                </div>

                                <div class="d-flex justify-content-end">
                                    <input type="hidden" value="IDSS" class="form-control" style="width: 60px"
                                        name="fdepartment">
                                    @if ($inas == null)
                                        <input type="hidden" value="001" class="form-control" style="width: 60px"
                                            name="dnumber">
                                    @elseif($inas <= 8)
                                        <input type="hidden" value=<?php echo '00' . $inas + 1; ?> class="form-control"
                                            style="width: 60px" name="dnumber">
                                    @elseif($inas >= 9)
                                        <input type="hidden" value=<?php echo '0' . $inas + 1; ?> class="form-control"
                                            style="width: 60px" name="dnumber">
                                    @elseif($inas >= 99)
                                        <input type="hidden" value=<?php echo $inas + 1; ?> class="form-control"
                                            style="width: 60px" name="dnumber">
                                    @endif
                                    @if ($total == null)
                                        <input type="hidden" value="001" class="form-control" style="width: 60px"
                                            name="cnumber">
                                    @elseif($total <= 8)
                                        <input type="hidden" value=<?php echo '00' . $total + 1; ?> class="form-control"
                                            style="width: 60px" name="cnumber">
                                    @elseif($total >= 9)
                                        <input type="hidden" value=<?php echo '0' . $total + 1; ?> class="form-control"
                                            style="width: 60px" name="cnumber">
                                    @elseif($total >= 99)
                                        <input type="hidden" value=<?php echo $total + 1; ?> class="form-control"
                                            style="width: 60px" name="cnumber">
                                    @endif
                                    <input type="hidden" value=<?php echo $year; ?> class="form-control" style="width: 50px"
                                        name="year">
                                </div><br><br>

                                <div class="d-flex " style="width:fit-content; position:relative; left:62.5%;">
                                    วันที่&nbsp;
                                    <input type="date" class="form-control" style="width: 300px"
                                        value="<?php echo date('Y-m-d'); ?>" name="date" required>
                                </div><br><br><br><br>

                                <div class="d-flex justify-content-start">
                                    เรื่อง&nbsp;&nbsp;
                                    <input type="text" class="form-control" placeholder="กรุณากรอกเรื่อง"
                                        style="width: 500px" name="story" required>
                                </div><br>

                                <div class="d-flex justify-content-start">
                                    เรียน&nbsp;&nbsp;
                                    <input type="text" class="form-control" placeholder="กรุณากรอกเรียน"
                                        style="width: 500px" name="learn" required>
                                </div><br>

                                <div class="d-flex justify-content-start">
                                    อ้างถึง&nbsp;&nbsp;
                                    <input type="text" class="form-control" placeholder="กรุณากรอกการอ้างถึง"
                                        style="width: 500px" name="quote">
                                </div><br>

                                <div class="d-flex justify-content-start">
                                    สิ่งที่ส่งมาด้วย&nbsp;&nbsp;
                                    <textarea id="txtMessage" name="enclosure"></textarea>
                                </div><br><br><br>

                                <div class="d-flex justify-content-start">
                                    <textarea id="txtMessage1" name="details"></textarea>

                                </div><br><br><br>

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
                                        <div style="text-align:center">
                                            <!-- <div class="d-flex justify-content-center"> -->
                                            ขอแสดงความนับถือ
                                        </div>
                                        <div style="text-align:center">
                                            <img style="width:100px" id="selected-image" src="">
                                            <input id="signName" type="text" style="display:none" name="ctphone">
                                            <p>.......................................................</p>
                                        </div>

                                        <div style="text-align:center;display:flex; line-height: 30px">
                                            <p style="float:inline-start">(</p>
                                            <p style="width: 100%;">
                                                <input id="textf" type="text" class="form-control"
                                                    placeholder="กรุณากรอกชื่อ" autocomplete="off" name="sName"
                                                    required>

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
                                                placeholder="กรุณากรอกตำแหน่ง" style="width: 350px" name="sPosition"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br><br><br><br><br>
                            <div class="d-flex justify-content-center">
                                <div style="width:80%">
                                    <div class="d-flex justify-content-end" style="margin-bottom:10px">
                                        FD-HO/HR-013/1 :00: 19-09-2563 <!-- FD-HO/HR-013/1 :00: 19-09-2563 -->
                                    </div>
                                    <div
                                        style="border: 2px solid #000000; overflow: auto; width: auto; height: auto; text-align: center;">
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
            <input type="hidden" value="โรงเรียนไอดีสอนทักษะอาชีพ" class="form-control" placeholder="กรุณากรอกการอ้างถึง"
                style="width: 300px" name="type">
            <!-- save cancel -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" type="submit" style="margin-right:10px">บันทึก</button>
                <a href="{{ route('form') }}" class="btn btn-secondary" type="button">ยกเลิก</a>
            </div>
            <!-- /save cancel -->
            </form>
            <!-- end -->
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

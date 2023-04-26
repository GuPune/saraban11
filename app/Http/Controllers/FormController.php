<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use App\Models\Form;
use App\Models\branch;
use Illuminate\support\Facades\DB; 
use App\Models\transport_type;
use App\Models\agency;
use Illuminate\Support\Facades\Auth;
use App\Models\depositor;
use App\Models\Bookout;
use App\Models\agency_branch_department;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Dompdf\Options;
use Dompdf\Dompdf;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Imports\UsersImport;
use Doctrine\Inflector\Rules\Word;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;




class FormController extends Controller
{
    public function form()
    {
        return view('form.form');
    }

    public function formiddrives()
    {
        $user = User::all();
        $form = Form::all();
        // $ad = Form::where('	fdepartment','AD'&&'','')->count();//เงื่อนไขแบบสองข้อ
        $ad = Form::where('fdepartment','AD')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//ธุรการ
        $pur = Form::where('fdepartment','PUR')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//จัดซื้อ
        $fin = Form::where('fdepartment','FIN')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//การเงิน
        $acc = Form::where('fdepartment','AC')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//บัญชี
        $hr = Form::where('fdepartment','HR')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//บุคคล
        $iti = Form::where('fdepartment','ITI')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//ไอที
        $mkt = Form::where('fdepartment','MKT')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//มาร์เก็ตติ้ง
        $itd = Form::where('fdepartment','ITD')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//บริหารงานพัฒนาผลิตภัณฑ์
        $sale = Form::where('fdepartment','SALE')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//เซลล์
        $leg = Form::where('fdepartment','LEG')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//กฎหมาย
        $cs = Form::where('fdepartment','CS')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//ส่วนงานเลขานุการ
        $iso = Form::where('fdepartment','ISO')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//ส่วนงานบริหารงานคุณภาพ
        $pm = Form::where('fdepartment','PM')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//บริหารงานโครงการ
        // $total = Form::where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();
        $total = Form::count();
        $data10 = date("y-m-d");
        $ec1 = explode("-", $data10);
        $years = $ec1[0];
        $year =mb_strimwidth($years+543 , -2, 2);
        return view('form.formiddrives',compact('user','ad','pur','fin','acc','hr','iti','mkt','itd','total','year','sale','leg','cs','iso','pm','form'));
    }

    public function formIDD()
    {
        $user = User::all();
        $form = Form::all();
        // $ad = Form::where('	fdepartment','AD'&&'','')->count();//เงื่อนไขแบบสองข้อ

        $idd = Form::where('formagency','LIKE',Auth::user()->Agency)
        ->where('formbranch','LIKE',Auth::user()->Branch)
        ->where('formdepartment','LIKE',Auth::user()->Department)->where('type','โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์')->count();
        $total = Form::count();
        $data10 = date("y-m-d");
        $ec1 = explode("-", $data10);
        $years = $ec1[0];
        $year =mb_strimwidth($years+543 , -2, 2);
        return view('form.formidd',compact('user','form','total','year','idd'));
        // return view('form.formidd',compact('user','form','ad','pur','fin','acc','hr','iti','mkt','itd','total','year','sale','leg','cs','iso','pm'));
    }

    public function formINS()
    {
        $user = User::all();
        $form = Form::all();
        // $ad = Form::where('	fdepartment','AD'&&'','')->count();//เงื่อนไขแบบสองข้อ

        $ins = Form::where('formagency','LIKE',Auth::user()->Agency)
        ->where('formbranch','LIKE',Auth::user()->Branch)
        ->where('formdepartment','LIKE',Auth::user()->Department)->where('type','สถานตรวจสภาพรถศูนย์ตรอ.ไอดี')->count();
        $total = Form::count();
        $data10 = date("y-m-d");
        $ec1 = explode("-", $data10);
        $years = $ec1[0];
        $year =mb_strimwidth($years+543 , -2, 2);
        return view('form.formins',compact('user','form','ins','total','year'));
        // return view('form.formins',compact('user','form','ad','pur','fin','acc','hr','iti','mkt','itd','total','year','sale','leg','cs','iso','pm'));
    }

    public function formTZ()
    {
        $user = User::all();
        $form = Form::all();
        // $ad = Form::where('	fdepartment','AD'&&'','')->count();//เงื่อนไขแบบสองข้อ

        $tz = Form::where('formagency','LIKE',Auth::user()->Agency)
        ->where('formbranch','LIKE',Auth::user()->Branch)
        ->where('formdepartment','LIKE',Auth::user()->Department)->where('type','ศูนย์ฝึกอบรม')->count();//ธุรการ
        $total = Form::count();
        $data10 = date("y-m-d");
        $ec1 = explode("-", $data10);
        $years = $ec1[0];
        $year =mb_strimwidth($years+543 , -2, 2);
        return view('form.formtz',compact('user','form','tz','total','year'));
        // return view('form.formtz',compact('user','form','ad','pur','fin','acc','hr','iti','mkt','itd','total','year','sale','leg','cs','iso','pm'));
    }

public function preview()
    {
        $user = User::all();
        $form = Form::all();
        $data10 = date("y-m-d");
        $ec1 = explode("-", $data10);
        $years = $ec1[0];
        $year =mb_strimwidth($years+543 , -2, 2);
        return view('form.preview',compact('user','year','form'));
        // return view('form.preview',compact('user','ad','pur','fin','acc','hr','iti','mkt','itd','total','year','sale','leg','cs','iso','pm','form'));
    }

public function viewpdfform(Request $request,$id)
    {
        $user = User::all();
        $form = Form::find($id);
        return view('form.editform',compact('user','form'));
    }

public function pdfform(Request $request,$id)
    {
        $role=Auth::user()->role;
        $user = User::all();
        // $form = Form::find($id);
        $form = Form::find($id)->update([
            'date'=>$request->date,
            'story'=>$request->story,
            'learn'=>$request->learn,
            'quote'=>$request->quote,
            'enclosure'=>$request->enclosure,
            'details'=>$request->details,
            'ctname'=>$request->ctname,
            'ctphone'=>$request->ctphone,
            'ctemail'=>$request->ctemail
            // ,'Odate'=>$request->date
        ]);
        // return view('user.bookout.pdfform',compact('user','form'));
        if($role=='0'){
            return redirect()->route('bookoutuser')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
    
            }
            elseif($role=='1'){
            return redirect()->route('bookoutstaff')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
    
            }
            elseif($role=='2'){
            return redirect()->route('bookoutadmin')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
            }
            return redirect()->back()->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
        // return redirect()->route('bookoutuser')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
    }

//addsenbook
public function add(Request $request)
    {

        // dd($request->story);
        $forms1 = new Form;
        $forms = new Form;
        $forms->user_id = Auth::user()->id;
        
        if($request->type=='โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์'){
            $fdepartment = $request->fdepartment;
            $dnumber = Form::where('formagency','LIKE',Auth::user()->Agency)
            ->where('formbranch','LIKE',Auth::user()->Branch)
            ->where('formdepartment','LIKE',Auth::user()->Department)->where('type','โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์')->count()+1;
            $cnumber = Form::count()+1;
            $forms->fdepartment = $fdepartment;
            // แยกแผนก
            if($dnumber<=9){
                $forms->dnumber = '00'.$dnumber;
            }
            elseif($dnumber>=9){
                $forms->dnumber = '0'.$dnumber;
            }
            elseif($dnumber>=99){
                $forms->dnumber = $dnumber;
            }
            // ทั้งหมด
            if($cnumber<=9){
                $forms->cnumber = '00'.$cnumber;
            }
            elseif($cnumber>=9){
                $forms->cnumber = '0'.$cnumber;
            }
            elseif($cnumber>=99){
                $forms->cnumber = $cnumber;
            }
        }
        elseif($request->type=='บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)'){
            $fdepartment = $request->fdepartment;
            $dnumber = Form::where('formagency','LIKE',Auth::user()->Agency)
            ->where('formbranch','LIKE',Auth::user()->Branch)
            ->where('formdepartment','LIKE',Auth::user()->Department)->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count()+1;
            $cnumber = Form::count()+1;
            $forms->fdepartment = $fdepartment;
            // แยกแผนก
            if($dnumber<=9){
                $forms->dnumber = '00'.$dnumber;
            }
            elseif($dnumber>=9){
                $forms->dnumber = '0'.$dnumber;
            }
            elseif($dnumber>=99){
                $forms->dnumber = $dnumber;
            }
            // ทั้งหมด
            if($cnumber<=9){
                $forms->cnumber = '00'.$cnumber;
            }
            elseif($cnumber>9){
                $forms->cnumber = '0'.$cnumber;
            }
            elseif($cnumber>=99){
                $forms->cnumber = $cnumber;
            }
        }
        elseif($request->type=='สถานตรวจสภาพรถศูนย์ตรอ.ไอดี'){
            $fdepartment = $request->fdepartment;
            $dnumber = Form::where('formagency','LIKE',Auth::user()->Agency)
            ->where('formbranch','LIKE',Auth::user()->Branch)
            ->where('formdepartment','LIKE',Auth::user()->Department)->where('type','สถานตรวจสภาพรถศูนย์ตรอ.ไอดี')->count()+1;
            $cnumber = Form::count()+1;
            $forms->fdepartment = $fdepartment;
             // แยกแผนก
             if($dnumber<=9){
                $forms->dnumber = '00'.$dnumber;
            }
            elseif($dnumber>=9){
                $forms->dnumber = '0'.$dnumber;
            }
            elseif($dnumber>=99){
                $forms->dnumber = $dnumber;
            }
            // ทั้งหมด
            if($cnumber<=9){
                $forms->cnumber = '00'.$cnumber;
            }
            elseif($cnumber>=9){
                $forms->cnumber = '0'.$cnumber;
            }
            elseif($cnumber>=99){
                $forms->cnumber = $cnumber;
            }
        }
        elseif($request->type=='ศูนย์ฝึกอบรม'){
            $fdepartment = $request->fdepartment;
            $dnumber = Form::where('formagency','LIKE',Auth::user()->Agency)
            ->where('formbranch','LIKE',Auth::user()->Branch)
            ->where('formdepartment','LIKE',Auth::user()->Department)->where('type','ศูนย์ฝึกอบรม')->count()+1;
            $cnumber = Form::count()+1;
            $forms->fdepartment = $fdepartment;
             // แยกแผนก
             if($dnumber<=9){
                $forms->dnumber = '00'.$dnumber;
            }
            elseif($dnumber>=9){
                $forms->dnumber = '0'.$dnumber;
            }
            elseif($dnumber>=99){
                $forms->dnumber = $dnumber;
            }
            // ทั้งหมด
            if($cnumber<=9){
                $forms->cnumber = '00'.$cnumber;
            }
            elseif($cnumber>=9){
                $forms->cnumber = '0'.$cnumber;
            }
            elseif($cnumber>=99){
                $forms->cnumber = $cnumber;
            }
        }
        // $forms->fdepartment = $request->fdepartment;
        // $forms->dnumber = $request->dnumber;
        // $forms->cnumber = $request->cnumber;
        $forms->year = $request->year;
        $forms->date = $request->date;
        $forms->story = $request->story;
        $forms->learn = $request->learn;
        $forms->quote = $request->quote;
        $forms->enclosure = $request->enclosure;
        $forms->details = $request->details;
        $forms->ctname = $request->ctname;
        $forms->ctphone = $request->ctphone;
        $forms->ctemail = $request->ctemail;
        $forms->type = $request->type;
        $forms->formagency = Auth::user()->Agency;
        $forms->formbranch = Auth::user()->Branch;
        $forms->formdepartment = Auth::user()->Department;
        $forms ->save();
        $data = [
        'id' => $forms->id,
        'user_id' => Auth::user()->id,
        'fdepartment' => $request->fdepartment,
        'dnumber' => $forms->dnumber,
        'cnumber' => $forms->cnumber,
        'year' => $request->year,
        'date' => $request->date,
        'story' => $request->story,
        'learn' => $request->learn,
        'quote' => $request->quote,
        'enclosure' => $request->enclosure,
        'details' => $request->details,
        'ctname' => $request->ctname,
        'ctphone' => $request->ctphone,
        'ctemail' => $request->ctemaily,
        'type' => $request->type
        ];
        $transport_type = transport_type::all();
        $department = Department::all();
        $agency = agency::all();
        $abd=  agency_branch_department::all();
        $branch= branch::all();
        $depositor = depositor::all();
        // dd($data);
        return view('bookout.addsendbook',compact('forms','transport_type','department','agency','abd','branch','depositor'))->with($data,'abd',$abd,$agency,'agency');
   
    }
    
    //form/add
public function store(Request $request)
    {
        $data = [
            // 'id' => $forms->id,
            'user_id' => Auth::user()->id,
            // 'fdepartment' => $request->fdepartment,
            // 'dnumber' => $request->dnumber,
            // 'cnumber' => $request->cnumber,
            // 'year' => $request->year,
            'date' => $request->date,
            'story' => $request->story,
            'learn' => $request->learn,
            'quote' => $request->quote,
            'enclosure' => $request->enclosure,
            'details' => $request->details,
            'ctname' => $request->ctname,
            'ctphone' => $request->ctphone,
            'ctemail' => $request->ctemail,
            'type' => $request->type
            ];
            
        $transport_type = transport_type::all();
        $department = Department::all();
        $agency = agency::all();
        $abd=  agency_branch_department::all();
        $branch= branch::all();
        $depositor = depositor::all();

        $total = Form::count();
        $data10 = date("y-m-d");
        $ec1 = explode("-", $data10);
        $years = $ec1[0];
        $form = Form::all();
        $year =mb_strimwidth($years+543 , -2, 2);
        if($request->type=='โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์'){
            $idd = Form::where('formagency','LIKE',Auth::user()->Agency)
            ->where('formbranch','LIKE',Auth::user()->Branch)
            ->where('formdepartment','LIKE',Auth::user()->Department)->where('type','โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์')->count();
            return view('form.preview',compact('transport_type','department','agency','abd','branch','depositor','year','form','idd','total','year'))->with($data,'abd',$abd,$agency,'agency');

        }
        elseif($request->type=='บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)'){
            $ad = Form::where('fdepartment','AD')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//ธุรการ
            $pur = Form::where('fdepartment','PUR')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//จัดซื้อ
            $fin = Form::where('fdepartment','FIN')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//การเงิน
            $acc = Form::where('fdepartment','AC')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//บัญชี
            $hr = Form::where('fdepartment','HR')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//บุคคล
            $iti = Form::where('fdepartment','ITI')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//ไอที
            $mkt = Form::where('fdepartment','MKT')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//มาร์เก็ตติ้ง
            $itd = Form::where('fdepartment','ITD')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//บริหารงานพัฒนาผลิตภัณฑ์
            $sale = Form::where('fdepartment','SALE')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//เซลล์
            $leg = Form::where('fdepartment','LEG')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//กฎหมาย
            $cs = Form::where('fdepartment','CS')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//ส่วนงานเลขานุการ
            $iso = Form::where('fdepartment','ISO')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//ส่วนงานบริหารงานคุณภาพ
            $pm = Form::where('fdepartment','PM')->where('type','บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')->count();//บริหารงานโครงการ
            return view('form.preview',compact('transport_type','department','agency','abd','branch','depositor','year','form','total','year','ad','pur','fin','acc','hr','iti','mkt','itd','sale','leg','cs','iso','pm'))->with($data,'abd',$abd,$agency,'agency');

        }
        elseif($request->type=='สถานตรวจสภาพรถศูนย์ตรอ.ไอดี'){
            $ins = Form::where('formagency','LIKE',Auth::user()->Agency)
            ->where('formbranch','LIKE',Auth::user()->Branch)
            ->where('formdepartment','LIKE',Auth::user()->Department)->where('type','สถานตรวจสภาพรถศูนย์ตรอ.ไอดี')->count();
            return view('form.preview',compact('transport_type','department','agency','abd','branch','depositor','year','form','ins','total','year'))->with($data,'abd',$abd,$agency,'agency');

        }
        elseif($request->type=='ศูนย์ฝึกอบรม'){
            $tz = Form::where('type','ศูนย์ฝึกอบรม')->count();
            return view('form.preview',compact('transport_type','department','agency','abd','branch','depositor','year','form','tz','total','year'))->with($data,'abd',$abd,$agency,'agency');

        }
               // return view('form.preview',compact('transport_type','department','agency','abd','branch','depositor'))->with($data,'abd',$abd,$agency,'agency');
        // return view('user.bookout.addsendbook',compact('forms','transport_type','department','agency','abd','branch','depositor'))->with($data,'abd',$abd,$agency,'agency');
   
}

public function exportpdfform(Request $request,$id)
 {
    $form = Form::find($id);
    $pdf = PDF::loadView('export.form.pdfform', compact('form'));
    $pdf->getDomPDF()->setHttpContext(
        stream_context_create([
            'ssl' => [
                'allow_self_signed'=> TRUE,
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
            ]
        ])
    );
    $fileName = $form->story;
    return $pdf->download($fileName . '.pdf');
 }

public function getbranch(Request $request)
    {
       
     $cid=$request->post('cid'); 
     if($cid=='1'){
        $branch= branch::where('agency',1)->get();
        $html='<option value="" >กรุณาเลือกสาขา</option>';
        foreach($branch as $branchs){
        $html.='<option value="'.$branchs->branche_id.'">'.$branchs->branche_name.'</option>';
        echo $html;
        }} //สำนักงานใหญ่
    elseif($cid=='4'){
        $branch= branch::where('agency',4)->get();
        $html='<option value="">กรุณาเลือกสาขา</option>';
        foreach($branch as $branchs){
        $html.='<option value="'.$branchs->branche_id.'">'.$branchs->branche_name.'</option>';
        echo $html;
        }}//ศูนย์อบรม
     else{
     $branch= branch::where('agency',$cid)->get();
     $html='<option value="">กรุณาเลือกสาขา</option>';
     foreach($branch as $list){
     $html.='<option value="'.$list->branche_id.'">'.$list->branche_name.'</option>';
     }
     echo  $html;
}}
   
public function getdepartment(Request $request)
    {
     $sid=$request->post('sid');
     if($sid=='12'){
        $department= Department::where('branch',0)->get();
        $html='<option value="">กรุณาเลือกฝ่าย</option>';
        foreach($department as $list){
        $html.='<option value="'.$list->Dpmid.'">'.$list->Dpmname.'</option>';
        }
        echo  $html;
        }

     else{
     $department= Department::where('branch',$sid)->get();
     $html='<option value="">กรุณาเลือกฝ่าย</option>';
     foreach($department as $list){
     $html.='<option value="'.$list->Dpmid.'">'.$list->Dpmname.'</option>';
     }
     echo  $html;
}}

public function word($id)
{
    $formiddrives = Form::findOrFail($id);
    // iddrives
    if($formiddrives->type=='บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)'){
    $templateProcessor = new TemplateProcessor('word-template/formiddrives.docx');
    }
    //idd
    elseif($formiddrives->type=='โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์'){
    $templateProcessor = new TemplateProcessor('word-template/formidd.docx');
    }
    //ins
    elseif($formiddrives->type=='สถานตรวจสภาพรถศูนย์ตรอ.ไอดี'){
    $templateProcessor = new TemplateProcessor('word-template/formins.docx');
    }
    //tz
    elseif($formiddrives->type=='ศูนย์ฝึกอบรม'){
    $templateProcessor = new TemplateProcessor('word-template/formtz.docx');
    };
    $templateProcessor->setValue('id', $formiddrives->id);
    $templateProcessor->setValue('fdepartment', $formiddrives->fdepartment);
    $templateProcessor->setValue('dnumber', $formiddrives->dnumber);
    $templateProcessor->setValue('cnumber', $formiddrives->cnumber);
    $templateProcessor->setValue('year', $formiddrives->year);
    $myDate= $formiddrives->date;
    $myYear = date('Y', strtotime($myDate));
    $myYearBuddhist = $myYear+543;
    $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
    $date = date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
    $templateProcessor->setValue('date', $date);
    $templateProcessor->setValue('story', $formiddrives->story);
    $templateProcessor->setValue('learn', $formiddrives->learn);
    $templateProcessor->setValue('quote', $formiddrives->quote);
    $templateProcessor->setValue('enclosure', $formiddrives->enclosure);
    $templateProcessor->setValue('details', $formiddrives->details);
    $templateProcessor->setValue('ctname', $formiddrives->ctname);
    $templateProcessor->setValue('ctphone', $formiddrives->ctphone);
    $templateProcessor->setValue('cnumber', $formiddrives->cnumber);
    $templateProcessor->setValue('ctemail', $formiddrives->ctemail);
    $fileName = $formiddrives->story;
    $templateProcessor->saveAs($fileName . '.docx');
    return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
}

public function index(){
        // $departments = Department::all();
        // // $forms = Form::all();
        // $user = User::all();
        // $staff = User::where('department','เจ้าหน้าที่')->count();
        // $nakbin = User::where('department','นักบิน')->count();
        // $pgm = User::where('department','pgm')->count();
        // $admin = User::where('department','แอดมิน')->count();
        // $total = User::all()->count();
        // $data10 = date("y-m-d");
        // $ec1 = explode("-", $data10);
        // $years = $ec1[0];
        // $year =mb_strimwidth($years+543 , -2, 2);
        // return view('admin.contact.index',compact('user','staff','nakbin','pgm','admin','total','year'));
    }  
}

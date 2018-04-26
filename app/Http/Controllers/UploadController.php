<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Storage;
use App\Upload;
use Illuminate\Contracts\Auth\Guard;

class UploadController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        $day = '1';
        $year = '2016';
    	return view('record.upload',compact('day','year'));
    }

    public function upload(Request $request)
    {       
           $this->validate(Request(),[
            'date' => 'required|unique:uploads',
            'filename' => 'required|unique:uploads',
            ]);
        
           $bb = $request->filename->Extension();
           
           switch ($bb) {
                
                case 'docx':
                $docx = $request->date.".docx";
                $b = new Upload;
                $b->user_id=\Auth::user()->id;
                $b->date=$request->date;
                $b->filename=$docx;
                $b->save();
                $request->filename->storeAs('public', $docx);

                 Session()->flash('success', 'FILE WAS UPLOADED AND STORED SUCCESSFULLY');
                  return redirect('upload');
                 break;

                case 'docm':
                $docx = $request->date.".docm";
                $b = new Upload;
                $b->user_id=\Auth::user()->id;
                $b->date=$request->date;
                $b->filename=$docx;
                $b->save();
                $request->filename->storeAs('public', $docx);

                 Session()->flash('success', 'FILE WAS UPLOADED AND STORED SUCCESSFULLY');
                  return redirect('upload');
                 break;

                case 'dotx':
                $docx = $request->date.".dotx";
                $b = new Upload;
                $b->user_id=\Auth::user()->id;
                $b->date=$request->date;
                $b->filename=$docx;
                $b->save();
                $request->filename->storeAs('public', $docx);

                 Session()->flash('success', 'FILE WAS UPLOADED AND STORED SUCCESSFULLY');
                  return redirect('upload');
                 break;

                
                 case 'doc':
                $docx = $request->date.".doc";
                $b = new Upload;
                $b->user_id=\Auth::user()->id;
                $b->date=$request->date;
                $b->filename=$docx;
                $b->save();
                $request->filename->storeAs('public', $docx);

                 Session()->flash('success', 'FILE WAS UPLOADED AND STORED SUCCESSFULLY');
                  return redirect('upload');
                 break;

                 case 'pdf':
                $pdf = $request->date.".pdf";
                $b = new Upload;
                $b->user_id=\Auth::user()->id;
                $b->date=$request->date;
                $b->filename=$pdf;
                $b->save();
                $request->filename->storeAs('public', $pdf);

                 Session()->flash('success', 'FILE WAS UPLOADED AND STORED SUCCESSFULLY');
                  return redirect('upload');
                 break;
                
                case 'xlsx':
                $pdf = $request->date.".xlsx";
                $b = new Upload;
                $b->user_id=\Auth::user()->id;
                $b->date=$request->date;
                $b->filename=$pdf;
                $b->save();
                $request->filename->storeAs('public', $pdf);

                 Session()->flash('success', 'FILE WAS UPLOADED AND STORED SUCCESSFULLY');
                  return redirect('upload');
                 break;
            
             
                default:
                    Session()->flash('error', 'ONLY PDF, AND EXCEL FILES ARE ALLOWED FOR UPLOAD!');
                    return redirect('upload');
                    break;
            } 

//            $request->file->storeAs('public', $file);
     

    }



}
   
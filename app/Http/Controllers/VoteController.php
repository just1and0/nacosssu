<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\Candidate;
use App\Admin;

class VoteController extends Controller
{
    //
    public function check(Request $request){
       
        $a = Vote::where([
                ['code','=',$request->code],
                ['isused', '=', 0]

        ])->get();

        $id = Vote::where('code', $request->code)->get();
        // $code = $request->code;
        if(!$a->isEmpty()){
            return view('rules',compact('id'));
        }else{
            return redirect('/404');
        }
     }

     
     public function f($code){
        $id = Candidate::where('post', 'f')->get();
        $p = "DIRECTOR OF FINANCE";
        $c = "f";
        $next = "vp";
        return view('voting', compact('id','p','c','next','code'));
     }
      

     
     public function others( $code, $next ){

        switch($next){
            case 'vp':
                    $id = Candidate::where('post', 'vp')->get();
                    $p = "VICE PRESIDENT";
                    $c = "vp";
                    $next = "p";
                    return view('voting', compact('id','p','c','next','code'));
            break;


            case 'p':
            $id = Candidate::where('post', 'p')->get();
            $p = " PRESIDENT";
            $c = "p";
            $next = "done";
            return view('voting', compact('id','p','c','next','code'));
            break;

            case 'done':

            $id= Vote::where('code', $code)->update([
                'isused'=> 1
            ]);
            return "<h1>THANKS FOR VOTING!</h1><BR /> <BR /> 
            <h1>GO TO RESULT PAGE TO KEEP UP TILL END OF VOTE! AND WINNERS</h1>
            ";
            break;



            default:
            return redirect('/404');
            break;


        }


    }







    public function voting($post,Candidate $ucid,$next, $code ){
                
                //        vote for the person
                    switch($post){ 
                        case 'f':
                //  return $code;
                        $a = Vote::where([
                            ['code','=',$code],
                            ['f', '=', 0]
                        ])->get();
                            // return $a;   
                        if(!$a->isEmpty()){
                                $id= Vote::where('code', $code)->update([
                                    'f'=> 1
                                ]);
                                $new = $ucid->vote+1;
                                $d= Candidate::find($ucid->id);
                                    // return $d;
                                    $d->vote=$new;
                                    $d->save();  
                                    return redirect('/'.$code.'/'.$next);      

                        }else{
                            return redirect('/404');      
                        }
                        break;




                        case 'vp':
                        //  return $code;
                        $a = Vote::where([
                            ['code','=',$code],
                            ['vp', '=', 0]
                        ])->get();
                            // return $a;   
                        if(!$a->isEmpty()){
                                $id= Vote::where('code', $code)->update([
                                    'vp'=> 1
                                ]);
                                $new = $ucid->vote+1;
                                $d= Candidate::find($ucid->id);
                                    // return $d;
                                    $d->vote=$new;
                                    $d->save();  
                                    return redirect('/'.$code.'/'.$next);      

                        }else{
                            return redirect('/404');      
                        }
                        break;



                        case 'p':
                        //  return $code;
                        $a = Vote::where([
                            ['code','=',$code],
                            ['p', '=', 0]
                        ])->get();
                            // return $a;   
                        if(!$a->isEmpty()){
                                $id= Vote::where('code', $code)->update([
                                    'p'=> 1
                                ]);
                                $new = $ucid->vote+1;
                                $d= Candidate::find($ucid->id);
                                    // return $d;
                                    $d->vote=$new;
                                    $d->save();  
                                    return redirect('/'.$code.'/'.$next);      

                        }else{
                            return redirect('/404');      
                        }
                        break;



                        default:
                        return redirect('/404');
                        break;
                    }

    }


    public function admin(){
        $all = Candidate::all();
        $pin = "";
        // return $all;
        return view('admin', compact('all','pin'));

    }


    public function sties($id){
        $id= Admin::where('id', '1')->update([
            'smode'=> $id
        ]);
        // return 'done';
        return redirect('/');
    }

    public function pin(){
        $all = Candidate::all();
           
        function random_string($length) {
            $key = '';
            $keys = array_merge(range(0, 9), range('a', 'z'));
        
            for ($i = 0; $i < $length; $i++) {
                $key .= $keys[array_rand($keys)];
            }
        
            return $key;
        }
    
        $pin = random_string(4);

        $n = new Vote;
        $n->code=$pin;
        $n->save();
        return view('admin', compact('all','pin'));

    }

    public function result(){
        $p = Candidate::where('post','=','p')->get();
        $vp = Candidate::where('post','=','vp')->get();
        $f = Candidate::where('post','=','f')->get();
      
      
        return view('result', compact('p','vp','f'));

    }


}

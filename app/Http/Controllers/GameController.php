<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\findnumber;
use Illuminate\Support\Facades\Route;


class GameController extends Controller
{
    // private $mesages=[];
    // // // private $randomson;

    // public function seti($mesages){
    //     $this->mesages = $mesages;
    // }

    // public function geti(){
    //     return $this->mesages;
    // }

    public function index(){
        return view('mainmenu');
        // return ["status"=>"1"];
    }
    public function startgame(Request $request){

        // if($request->_token!="asdasdassdwfwegas"){
        //     return ["status"=>"-1","comment"=>"you are not authenticated"];
        // }
        
        $random=rand(1,1000);
        $number=new findnumber;
        $number->numbertofind=$random;
  
        $number->save(); 
        $xodlar=0;
        // return $request->level;
        if($request->level==3){
            $xodlar=8;
        }elseif($request->level==2){
            $xodlar=11;
        }elseif($request->level==1){
            $xodlar=14;
        }
        
        // return view('gamespace')->with('id',$number->id)->with('xodlar',$xodlar)->with('level',$request->level)->with('i', 0);
        return ["gameid"=>"$number->id",'xodlar'=>"$xodlar","level"=>"$request->level","i"=>"0"];
        
        // $son=$request->tanlanganson;
        // if(isset($son)){
        //     if($number->try1==0){
        //         $i=1;
        //         $number->try1=$son;
        //         if($random==$son){
        //             $number->win=true;
        //         }
        //     }
        //     else{
        //         if($number->try2==0){
        //             $i=2;
        //             $number->try2=$son;
        //             if($random==$son){
        //                 $number->win=true;
        //             }
        //         }
        //         else{
        //             if($number->try3==0){
        //                 $i=3;
        //                 $number->try3=$son;
        //                 if($random==$son){
        //                     $number->win=true;
        //                 }
        //             }
        //             else{
        //                 if($number->try4==0){
        //                     $i=4;
        //                     $number->try4=$son;
        //                     if($random==$son){
        //                         $number->win=true;
        //                     }
        //                 }
        //                 else{
        //                     if($number->try5==0){
        //                         $i=5;
        //                         $number->try5=$son;
        //                         if($random==$son){
        //                             $number->win=true;
        //                         }
        //                     }
        //                     else{
        //                         if($number->try6==0){
        //                             $i=6;
        //                             $number->try6=$son;
        //                             if($random==$son){
        //                                 $number->win=true;
        //                             }

        //                         }
        //                         else{
                                    
                                    
                    
        //                         }
                
        //                     }
            
        //                 }
        
        //             }
    
        //         }

        //     }
        // };

    }

    public function checkNumber(Request $request){
        $son = $request->tanlanganson;
        // static $mesages=array();
        // static $a=0;

        $session = findnumber::find($request->id);


        // if($session->win==1){
        //     return ["status"=>"1","message"=>"won"];
        // }elseif($session->win==2){
        //     return ["status"=>"1","message"=>"lost"];
        // }

        $xodlar=0;
        if($request->level==3){
            $xodlar=8;
        }elseif($request->level==2){
            $xodlar=11;
        }elseif($request->level==1){
            $xodlar=14;
        }

        if(is_numeric($son) && $son > 0 && $son < 1001){
            
            $message = "";

            if(abs($son - $session->numbertofind) >= 300){
                $message1 = array("muzlab yotipti","-20 gradus","Juda ozoqda");
                // $mesages[]=$message;
                $xabar=rand(0,count($message1)-1);
                $message=$message1[$xabar];
                // $a++;
            }elseif(abs($son - $session->numbertofind) < 300 &&  abs($son - $session->numbertofind) >= 100){
                $message2 = array("sovuq","0 gradus","Uzoqda");
                // $mesages[]=$message;
                $xabar=rand(0,count($message2)-1);
                $message=$message2[$xabar];
            }elseif(abs($son - $session->numbertofind) < 100 &&  abs($son - $session->numbertofind) >= 50){
                $message3 = array("iliq" ,"20 gradus","o'rata masofada" );
                // $mesages[]=$message;
                $xabar=rand(0,count($message3)-1);
                $message=$message3[$xabar];
            }elseif(abs($son - $session->numbertofind) < 50  &&  abs($son - $session->numbertofind) >= 20){
                $message4 = array("isidi","40 gradus","Yaqin masofa");
                // $mesages[]=$message;
                $xabar=rand(0,count($message4)-1);
                $message=$message4[$xabar];
            }elseif(abs($son - $session->numbertofind) < 20  &&  abs($son - $session->numbertofind) >= 5){
                $message5= array("qaynavotti","80 gradus","Juda yaqin");
                // $mesages[]=$message;
                $xabar=rand(0,count($message5)-1);
                $message=$message5[$xabar];
            }elseif(abs($son - $session->numbertofind) < 5   &&  abs($son - $session->numbertofind) >= 1){
                $message6 = array("qo'l kuydi","95 gradus","Judayam yaqinnnnnn!!!");
                // $mesages[]=$message;
                $xabar=rand(0,count($message6)-1);
                $message=$message6[$xabar];
            }elseif($son == $session->numbertofind){
                $session->win=1;
                $message = "ie yutib qoydi";
                // stop
                $session->save();
                // return view('/mainmenu')->with('message', 'won');
 
                return ["status"=>"1","message"=>"won"];
            }
            // print_r($mesages);
            $taqqoslash="";
            if($son > $session->numbertofind){
                $taqqoslash="Tasodifiy son Pastda";
            }
            else{
                $taqqoslash="Tasodifiy son Tepada";
            }
           
            
            // echo $a;
            $history="";
            if($session->tries==0){
                $session->try1 = $son;
                $history = "Try1 : $session->try1";
            }elseif($session->tries==1){
                $session->try2 = $son;
                $history = "Try1 : $session->try1"."<br>Try2 : $session->try2";
            }elseif($session->tries==2){
                $session->try3 = $son;
                $history = "Try1 : $session->try1"."<br>Try2 : $session->try2"."<br>Try3:$session->try3";
            }elseif($session->tries==3){
                $session->try4 = $son;
                $history = "Try1 : $session->try1"."<br>Try2 : $session->try2"."<br>Try3:$session->try3"."<br>Try4:$session->try4";
            }elseif($session->tries==4){
                $session->try5 = $son;
                $history = "Try1 : $session->try1"."<br>Try2 : $session->try2"."<br>Try3:$session->try3"."<br>Try4:$session->try4"."<br>Try5:$session->tr5";
            }elseif($session->tries==5){
                $session->try6 = $son;
                $history = "Try1 : $session->try1"."<br>Try2 : $session->try2"."<br>Try3:$session->try3"."<br>Try4:$session->try4"."<br>Try5:$session->tr5"."<br>Try6:$session->try6";
            }elseif($session->tries==6){
                $session->try7 = $son;
                $history = "Try1 : $session->try1"."<br>Try2 : $session->try2"."<br>Try3:$session->try3"."<br>Try4:$session->try4"."<br>Try5:$session->tr5"."<br>Try6:$session->try6"."<br>Try6:$session->try7";
            }elseif($session->tries==7){
                $session->try8 = $son;
                $history = "Try1 : $session->try1"."<br>Try2 : $session->try2"."<br>Try3:$session->try3"."<br>Try4:$session->try4"."<br>Try5:$session->tr5"."<br>Try6:$session->try6"."<br>Try6:$session->try7"."<br>Try6:$session->try8";
            }elseif($session->tries==8){
                if($request->level=="hard"){
                    return view('/mainmenu')->with('message', 'Siz yutqazdingiz!!!'); 
                }
                $session->try9 = $son;
                $history = "Try1 : $session->try1"."<br>Try2 : $session->try2"."<br>Try3:$session->try3"."<br>Try4:$session->try4"."<br>Try5:$session->tr5"."<br>Try6:$session->try6"."<br>Try6:$session->try7"."<br>Try6:$session->try8"."<br>Try6:$session->try9";
            }elseif($session->tries==9){
                $session->try10 = $son;
                $history = "Try1 : $session->try1"."<br>Try2 : $session->try2"."<br>Try3:$session->try3"."<br>Try4:$session->try4"."<br>Try5:$session->tr5"."<br>Try6:$session->try6"."<br>Try6:$session->try7"."<br>Try6:$session->try8"."<br>Try6:$session->try9"."<br>Try6:$session->try10";
            }elseif($session->tries==10){
                $session->try11= $son;
                $history = "Try1 : $session->try1"."<br>Try2 : $session->try2"."<br>Try3:$session->try3"."<br>Try4:$session->try4"."<br>Try5:$session->tr5"."<br>Try6:$session->try6"."<br>Try6:$session->try7"."<br>Try6:$session->try8"."<br>Try6:$session->try9"."<br>Try6:$session->try10"."<br>Try6:$session->try11";
            }elseif($session->tries==11){
                if($request->level=="medium"){
                    return view('/mainmenu')->with('message', 'Siz yutqazdingiz!!!'); 
                }
                $session->try12 = $son;
                $history = "Try1 : $session->try1"."<br>Try2 : $session->try2"."<br>Try3:$session->try3"."<br>Try4:$session->try4"."<br>Try5:$session->tr5"."<br>Try6:$session->try6"."<br>Try6:$session->try7"."<br>Try6:$session->try8"."<br>Try6:$session->try9"."<br>Try6:$session->try10"."<br>Try6:$session->try11"."<br>Try6:$session->try12";
            }elseif($session->tries==12){
                $session->try13 = $son;
                $history = "Try1 : $session->try1"."<br>Try2 : $session->try2"."<br>Try3:$session->try3"."<br>Try4:$session->try4"."<br>Try5:$session->tr5"."<br>Try6:$session->try6"."<br>Try6:$session->try7"."<br>Try6:$session->try8"."<br>Try6:$session->try9"."<br>Try6:$session->try10"."<br>Try6:$session->try11"."<br>Try6:$session->try12"."<br>Try6:$session->try13";
            }elseif($session->tries==13){
                $session->try14 = $son;
                $history = "Try1 : $session->try1"."<br>Try2 : $session->try2"."<br>Try3:$session->try3"."<br>Try4:$session->try4"."<br>Try5:$session->tr5"."<br>Try6:$session->try6"."<br>Try6:$session->try7"."<br>Try6:$session->try8"."<br>Try6:$session->try9"."<br>Try6:$session->try10"."<br>Try6:$session->try11"."<br>Try6:$session->try12"."<br>Try6:$session->try13"."<br>Try6:$session->try14";
           
                $session->tries += 1;
                if($son == $session->numbertofind){
                    $session->win=1;
                    // stop
                    $session->save();
                    // return view('/mainmenu')->with('message', 'Tabriklaymiz yutdingiz!!!');
                    return ["status"=>"1","message"=>"won"];
                }else{
                    //yutqizdi // stop
                    $session->win=2;
                    // return view('/mainmenu')->with('message', 'Siz yutqazdingiz!!!');
                    // $session->save();
                    return ["status"=>"1","message"=>"lost"];
                }
            }
           

            $session->tries += 1;
            $session->save();
            
            // return view('gamespace')->with('son', $son)->with('i', $session->tries)->with('id', $request->id)->with('message',$message)->with('history',$history)->with("taqoslash",$taqqoslash)->with('xodlar',$xodlar)->with('level',$request->level);
            return ["status"=>"1", "son"=>"$son", "triesnum"=>"$session->tries", "id"=>"$request->id", "message"=>"$message","history"=>"$history",'level'=>$request->level,"message"=>$message,"taoslash"=>$taqqoslash];
        }

        // return view('gamespace')->with('message', 'tanlangan son notogri')->with('id', $request->id)->with('son', $son)->with('xodlar',$xodlar)->with('level',$request->level);
        return ["status"=>"1", "message" => "tanlangan son notogri", "id"=>"$request->id","son"=>"$son"];
    }

}

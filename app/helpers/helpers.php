<?php 
    use App\Models\Answers;

    if(!function_exists('has_done_test')){
        function has_done_test($application_code){
            $fetch_answers = Answers::where('application_code',$application_code)->get();
            if(count($fetch_answers) > 0 ) {
                return true;
            }else{
                return false;
            }
        }
    }

    if (! function_exists('niceday')) {
        function niceday($d)
        {
            $sp = str_replace(' ', '', $d);
            $date = date_create($sp);
            return date_format($date, "F jS Y, h:i a");
        }
    }

    if (! function_exists('niceday1')) {
        function niceday1($d)
        {
            $sp = str_replace(' ', '', $d);
            $date = date_create($sp);
            return date_format($date, "F jS Y");
        }
    }
?>
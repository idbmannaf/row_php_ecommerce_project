<?php
class Format{
    public function formatDate($date){
        return date('F j,Y,g:ia',strtotime($date));
    }

    public function textShorten($text, $limit=400){
        $text = substr($text,0,$limit);
        $text = $text."....";
        return $text;
    }
    public function validation($data){
        $data= trim($data);
        // $data= stripcslashes($data);
        // $data= htmlspecialchars($data);
        $data= preg_replace('/[^A-Za-z0-9\-]/', ' ', $data);
        return($data);
    }
    public function title(){
        $path = $_SERVER["SCRIPT_FILENAME"]; // Fetch full url/path
        // return $path;
        $title = basename($path,'.php'); // .php baad diye sudhu fulder ba title name nibe
        if($title== 'index'){
            $title= 'home';
        }elseif($title == 'contact'){
            $title = 'contact';
        }
        $title= ucfirst($title);
        return $title;
    }
}
?>
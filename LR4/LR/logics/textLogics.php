<?php
    
    $text = $_POST["text"];
    //$text = "не так - это пишется   а так --или не так   а так а если -- так но не так...";
    //5           5  6  13  17
    //&ndash; -      &mdash; --
    function replacementTireAndDobleSpace($mainText){
        $mainText = str_replace(" -- ","&nbsp;&mdash; ",$mainText);
        $mainText = str_replace(" - "," &ndash; ",$mainText);
        return $mainText;
    }

    //$text = replacementTireAndDobleSpace($text);

    //6
    // &#8230; ...    ,a    ,no
    function replacementEllipsisAndANo($mainText){
        $mainText = preg_replace('/\s*а\s+/',", а ",$mainText);
        $mainText = preg_replace('/\s*но\s+/',", но ",$mainText);
        $mainText = preg_replace('/\.\.\./',"&#8230;",$mainText);
        return $mainText;
    }
   // $text = replacementEllipsisAndANo($text);

    //13
    
    function addSrcOnImg($mainText){
        $count = 1;
        $mainText = preg_replace_callback('/<img/',
        function($match) use (&$count) {
            $str = "<img id='".$count."' ";
            $count++;
            return $str;
        }
        ,$mainText);
        $mainText = preg_replace('/\s?<script[^>]*?>.*?<\/script>\s?/si'," ",$mainText);
        $dom = new DOMDocument();
        @ $dom->loadHTML($mainText);
        $ArrImg = $dom->getElementsByTagName('img');
        $outStr = "";
        $i = 1;
        foreach($ArrImg as $elem){
            $test = $elem->getAttribute('alt');
            if($test == ""){
                $outStr.=  '<a href="#'.$i.'"> Картинка номер '.$i.' "без описания"</p>';
            }else{
                $outStr.=  '<a href="#'.$i.'"> Картинка номер '.$i.' "'.$test.'"</p>';
            }
            $i++;
        }
    
        return $outStr.$mainText;
    }

    //17 '/(\b\S+\b)(?=.*\1)/ui'

    function highlightRepeatedWords($mainText){

    //  $mainText = preg_replace('/(\b[а-я]+\b)(?=.*\1)/ui',"-",$mainText);
        
        $textArr = preg_match_all('/(\b\w+\b)/ui',$mainText, $matches);
        $matches[0] = array_unique($matches[0]);
        foreach($matches[0] as $elem){
            $count = 0;
            $mainText= preg_replace_callback("/(\b".$elem."\b)(?!=<\/r>)/ui", function($item) use(&$count){
                $count++;
                if($count > 1){
                    return "<r class='yellowBackground'>".$item[0]."</r>";
                }else{
                    return $item[0];
                }
            },$mainText);
        }

        return $mainText;
    }
   
    $text = highlightRepeatedWords($text);
    $text = replacementTireAndDobleSpace($text);
    $text = replacementEllipsisAndANo($text);
    
    $text = addSrcOnImg($text);
    echo json_encode($text);
 
?>

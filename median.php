<?php

    trim(fscanf(STDIN, "%d", $number_of_entries));
    
    $data = array();
        
    for ( $i = 0; $i < $number_of_entries; $i++) {
        fscanf(STDIN, "%s %d\n", $action_type, $entry_value);

        if($action_type == "a"){
            $data[] = $entry_value;
            calculateMedian($data);
        }else{
            if (in_array($entry_value, $data)){
                $found = false;
                for ($j = 0; $j < count($data); $j++){
                    
                    if((!$found)&&($entry_value == $data[$j])){
                        unset($data[$j]);
                        $found = true;
                    }
                    
                }
                if($found)
                    calculateMedian($data);
                else
                    echo "Wrong!\n";
            }else
                echo "Wrong!\n";
        }
        
    }

function calculateMedian($data){
    sort($data);
    
    if(count($data) == 1){
        echo $data[0]."\n";
    }else if(count($data) == 2){
        echo ((intval($data[0]) + intval($data[1]))/2)."\n";
    }else{

        if(count($data) % 2 == 1){
            echo $data[(intval(count($data)) / 2)]."\n";
        }else{
            $val1 = $data[(intval(count($data)) / 2)];
            $val2 = $data[(intval(count($data)) / 2) - 1];
            
            echo ((intval($val1) + intval($val2))/2)."\n";
        }
        
    }
    
}
    
?>
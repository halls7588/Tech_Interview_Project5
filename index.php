<?php
function chickenAndSteak($num1, $num2){
    $ignore = func_get_args();                      //Get all parameters but ignore the first two
    array_shift($ignore);
    array_shift($ignore);
    
    $maskArr = [];                      
    $valArr = [];
    foreach($ignore as $item){
        if(is_array($item)){                        //Get masking values for new client
            $maskArr[] = $item[0];
            $valArr[] = $item[1];
        }
    }
    
    for($i = 1; $i < 121; $i++){                    //Get List of new client mask values
        
        $jump = '';                                 //variable to store new client mask data 
        
        for($j = 0; $j < count($maskArr); $j++){    // Find all matching mask data
            if(!($i % $maskArr[$j])){
                $jump = $jump.$valArr[$j]." ";
            }
        }
        
        if($jump){                                  
            print($jump."\n");                      //if mask data was found, print it and move on 
            continue;
        }
            
        if(!($i % 2) && !in_array($i, $ignore)){    //if $i is divisible by 2 && not in the $ignore array
            if(!($i % $num1) && !($i % $num2)){     //if $i is a multiple of num1 and num2
                print("ChiCken and SteAk\n");
            }
            else if(!($i % $num1)){                 //if $i is a multiple of only num1
                print("ChiCken\n");
            }
            else if(!($i % $num2)){                 //if $i is a multiple of only num2
                print("SteAk\n");
            }
            else {
                print($i."\n");                     //Just print $i
            }
        }
        else {
            print($i."\n");                         //Just print $i
        }
    }
}
print("New Client Results\n---------------------\n");
chickenAndSteak(4, 7, 5, 1, 5 ,42, array(3,"fish"), array(7,"Tacos"));
print("\n\nOld Client Results\n----------------\n");
chickenAndSteak(4, 7, 5, 1, 5 ,42);
?>



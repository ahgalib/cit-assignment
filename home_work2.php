<?php
$letter = "W"; 
switch($letter){
    case "A":
    case "a":
    case "E":
    case "e":
    case "I":
    case "i":
    case "O":
    case "o":
    case "U":
    case "u":
    echo $letter." is a Vowel"."<br><br>";
    break;  
    
    default:
    echo $letter." is a consonant"."<br><br>";
}
?>

<?php
$marks = 151;

if($marks <= 100){
    if($marks >=80 && $marks <=100){
        echo "you got ".$marks." and your grade is A+";
    }
    else if($marks >=70 && $marks <=79){
        echo "you got ".$marks." and your grade is A";
    }
    else if($marks >=60 && $marks <=69){
        echo "you got ".$marks." and your grade is A-";
    }
    else if($marks >=50 && $marks <=59){
        echo "you got ".$marks." and your grade is B";
    }
    else if($marks >=40 && $marks <=49){
        echo "you got ".$marks." and your grade is C";
    }
    else if($marks >=33 && $marks <=39){
        echo "you got ".$marks." and your grade is D";
    }
    else{
        echo "you got ".$marks." and your grade is F";
    }
}else{
    echo "exam hoise 100 er moddhe r tumi paico ".$marks." fajlami koro";
}
?>
<?php
// Camel Case = myFunction(){

// }
// Lower Case = my_function(){

// }
// Pascal Case = MyFunction(){

// }

function simpleFunction(String $nama){
    echo "Hello $nama <br>";
}


simpleFunction('Eka');
// simpleFunction('Rafly');
// simpleFunction('Deta');


function penjumlahan($a=5, $b=3){
    return $a + $b;
}

// $num = 12;

// echo penjumlahan(3, $num);



// function tambahLima(int ...$b){
//     return array_reduce($b, function($a, $c){return $a+$c;});
// }
// $number = 20;

// // tambahLima($number);
//  echo tambahLima(2, 4, 7);

?>
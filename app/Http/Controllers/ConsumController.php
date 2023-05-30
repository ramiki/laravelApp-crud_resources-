<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ConsumController extends Controller
{

  public function get()
  {
    // http clien allowing you to quickly make outgoing HTTP requests to communicate with other web applications (see docs)
    // laravel methodes : facade http and guzzle option

    $response =  Http::get('http://127.0.0.1:8080/my/laravelApp-crud_resources-/public/api/forms/');
    $jsonData = $response->json();
    return $jsonData;

    // external : curl methode 

    // $curl = curl_init();
    // curl_setopt_array($curl, array(
    //// CURLOPT_URL => 'http://127.0.0.1:8080/api/forms',
    //   CURLOPT_URL => 'http://127.0.0.1/my/laravelApp-crud_resources-/public/api/forms?page=2',
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_CUSTOMREQUEST => 'GET',
    // ));
    // $response = curl_exec($curl);
    // curl_close($curl);
    // $resp = json_decode($response);
    // return $resp;
  }


  public function creat()
  {
    // laravel methode : facade http and guzzle option

    $response = Http::post('http://127.0.0.1/my/laravelApp-crud_resources-/public/api/forms', [
      "name"=> "jhony",
      "email"=> "jtest@junior",
      "age"=> "24",
      "note"=> "18",
  ]);

  return  json_decode($response);

// or more deeper :

// $data = [
//   'name' => 'John Doe',
//   'email' => 'john.doe@example.com',
//   'age' => 30,
//   'note' => 'This is a test note',
// ];

// $response = Http::post('http://127.0.0.1/my/laravelApp-crud_resources-/public/api/forms', $data);

// if ($response->status() == 200) {
//   // Data was sent successfully
//   return response()->json(['message' => 'Data sent successfully']);
// } else {
//   // There was an error sending the data
//   return response()->json(['message' => 'Error sending data'], $response->status());
// }

  }
}


      // *************  curl ex : ****************

// ** get all

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'http://127.0.0.1:8000/api/forms',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_CUSTOMREQUEST => 'GET',
// ));

// $response = curl_exec($curl);

// curl_close($curl);

// return $response;



// ** get one by id , one concept for : add / update /delete .....

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'http://127.0.0.1:8000/api/forms/14',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'GET',
// //  CURLOPT_POSTFIELDS =>'{
// //  "name": "jack",
// //  "email": "mush@jackarjack",
// //  "age": "28",
// // "note": "19"
// //}',
//   CURLOPT_HTTPHEADER => array(
//     'Content-Type: application/json',
//     'Cache-Control: no-cache',
//     'Accept: */*',
//     'Accept-Encoding: gzip,deflate',
//     'Connection: keep-alive'
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);

// echo $response;


      //******************************************** */   
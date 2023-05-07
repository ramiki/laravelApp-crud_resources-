<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;


class ConsumControlle extends Controller
{

  public function get()
  {

    // laravel methode : facade http and guzzle option

    $response =  Http::get('http://127.0.0.1/my/laravelApp-crud_resources-/public/api/forms/21');
    $jsonData = $response->json();
    return $jsonData;


    // external : curl methode 

    // $curl = curl_init();
    // curl_setopt_array($curl, array(
    //   // CURLOPT_URL => 'http://127.0.0.1:8080/api/forms',
    //   CURLOPT_URL => 'http://127.0.0.1/my/laravelApp-crud_resources-/public/api/forms?page=2',
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_CUSTOMREQUEST => 'GET',
    // ));
    // $response = curl_exec($curl);
    // curl_close($curl);
    // $re = json_decode($response);
    // return $re;

  }


  public function creat()
  {

    // laravel methode : facade http and guzzle option

    $response = Http::post('http://127.0.0.1/my/laravelApp-crud_resources-/public/api/forms', [
      "name"=> "cons2",
        "email"=> "cons",
        "age"=> "cons",
        "note"=> "cons",
  ]);

  return  json_decode($response);

// or 

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



      // *************  out of box ex ****************


// get all

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'http://127.0.0.1:8000/api/forms',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_CUSTOMREQUEST => 'GET',
// ));

// $response = curl_exec($curl);

// curl_close($curl);

// return $response;


          //**************************************************** */   


// get one by id , one concept for : add / update /delete .....


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
// //  "name": "uuupppppppuuuu",
// //  "email": "fdgfdgfd",
// //  "age": "fdgfdgfd",
// // "note": "fdgfdgfd"
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

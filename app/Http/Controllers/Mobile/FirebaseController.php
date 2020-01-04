<?php

namespace App\Http\Controllers\Mobile;

use App\Loker;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class FirebaseController extends Controller
{
    public function tes(){
      $factory = (new Factory)
          ->withServiceAccount('../blk-indramayu-firebase-adminsdk-440mz-4541ed6401.json')
          ->withDatabaseUri('https://blk-indramayu.firebaseio.com');

      $messaging = $factory->createMessaging();

      $topic = 'a-topic';
      $title = "titel";
      $body = "body";
      $data = [
        'key' => 'value'
      ];

      $message = CloudMessage::withTarget('topic', $topic)
          ->withNotification(Notification::create($title, $body)) // optional
          ->withData($data) // optional
      ;

      // $message = CloudMessage::fromArray([
      //     'topic' => $topic,
      //     'notification' => [$message], // optional
      //     'data' => $data, // optional
      // ]);

      $messaging->send($message);

    }

    public function tes2(){
      $factory = (new Factory)
          ->withServiceAccount('../blk-indramayu-firebase-adminsdk-440mz-4541ed6401.json')
          ->withDatabaseUri('https://blk-indramayu.firebaseio.com');

      $messaging = $factory->createMessaging();

      $token = 'c-MAW1kAGrk:APA91bFHPc-UjSHJQoUK40WvEpp_0faDioNkRmDmbDU4nQPMyVxUxY29jsXuhKh71o53NPQ8RHflQC1kjj22i9OgwUyaYbWDf4nYS7EDyULAxb1rJB2fbvv1AmqaZ1hdcdBJqUC6RLCh';

      $message = CloudMessage::withTarget('token', $token)
          ->withNotification(Notification::create('Title', 'Body'))
          ->withData([
            'key' => 'value',
          ]);

      $messaging->send($message);

    }

    public function tesLokerNotif(){
      $factory = (new Factory)
          ->withServiceAccount('../blk-indramayu-firebase-adminsdk-440mz-4541ed6401.json')
          ->withDatabaseUri('https://blk-indramayu.firebaseio.com');

      $messaging = $factory->createMessaging();

        $minat = 1;
        $judul = "Lowongan Pekerjaan PT. Sinar Jaya Abadi";
        $isi   = "Telah dibuka loker A....";

        $loker = array(
            'judul' => $judul,
            'isi' => $isi,
            'foto' => 'contohloker.jpg',
            'kategori_minat' => $minat
        );

        $create = Loker::create($loker);

        if($create){

          $member = DB::table('minat_member')
                    ->select('kd_pengguna')
                    ->where('kd_minat', $minat)
                    ->get();

          if($member){
              $token = array();

              foreach ($member as $key) {
                $data = DB::table('member')
                         ->select('token')
                         ->whereNotNull('token')
                         ->where('kd_pengguna', $key->kd_pengguna)
                         ->get();

                foreach ($data as $value) {
                    $token[] = $value;
                }

              }

              $messages = array();
              $header = "Rekomendasi Loker!";

              foreach ($token as $value) {
                $message = CloudMessage::withTarget('token', $value->token)
                    ->withNotification(Notification::create($header, $judul))
                    ->withData([
                      'jenis' => '2',
                    ]);
                $messages[] = $message;
              }

              $messaging->sendAll($messages);

          }

          return response()->json([
            'status_code' => 0,
            'message' => ['Loker Berhasil']
          ], 200);
        }else{
          return response()->json([
            'status_code' => 2,
            'message' => ['Loker Gagal']
          ], 200);
        }
    }

    public function tesMinat(){
      $minat = 1;

      $member = DB::table('minat_member')
                ->select('kd_pengguna')
                ->where('kd_minat', $minat)
                ->get();

      if($member){
          $token = array();

          foreach ($member as $key) {
            $data = DB::table('member')
                     ->select('token')
                     ->whereNotNull('token')
                     ->where('kd_pengguna', $key->kd_pengguna)
                     ->get();

            foreach ($data as $value) {
                $token[] = $value;
            }

          }

          return json_encode($token);
      }

    }
}

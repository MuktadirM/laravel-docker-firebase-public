<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Factory;

class AboutController extends Controller
{
    public function index()
    {
        $factory = (new Factory)->withServiceAccount(base_path('firebase_credentials.json'));
        $firestore = $factory->createFirestore();

       //  $firestore = new FirestoreClient();
        // $collectionReference = $firestore->collection('users');
        $userSnapShots = $firestore->database()->collection('users')->documents();
        $users = $userSnapShots->rows();
        $collections = [];
        foreach ($users as $user) {
            $userModel = new UserModel($user->data());
            $collections[] = $userModel;
        }
        dd($users,$collections[0]->insert());
        return view('index');
    }
}

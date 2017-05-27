<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class TokenController extends Controller
{
  private $client;

  /**
   * TokenController constructor.
   */
  public function __construct()
  {
    $this->client = DB::table('oauth_clients')->where('id', 2)->first();
  }

  /**
   * @param Request $request
   * @return \Illuminate\Http\Response
   */
  protected function authenticate(Request $request)
  {
    $request->request->add([
        'username' => $request->username,
        'password' => $request->password,
        'grant_type' => 'password',
        'client_id' => $this->client->id,
        'client_secret' => $this->client->secret,
        'scope' => '*'
    ]);

    $proxy = Request::create(
        'oauth/token',
        'POST'
    );

    return Route::dispatch($proxy);
  }

  protected function refreshToken(Request $request)
  {
    $request->request->add([
        'grant_type' => 'refresh_token',
        'refresh_token' => $request->refresh_token,
        'client_id' => $this->client->id,
        'client_secret' => $this->client->secret,
    ]);

    $proxy = Request::create(
        'oauth/token',
        'POST'
    );

    return Route::dispatch($proxy);
  }
}

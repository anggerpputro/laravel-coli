<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Akun;

class HaloController extends Controller {

  /**
   * GET ALL AKUN
  **/
  public function index() {
    return Akun::all();
  }

  /**
   * CREATE AKUN
  **/
  public function create() {
    $request = request();

    $akun = Akun::create([
      'username' => $request->username,
      'nama' => $request->nama,
      'nomorhp' => $request->nomorhp,
      'alamat' => $request->alamat,
      'jenis_kelamin' => $request->jenis_kelamin,
      'email' => $request->email,
      'umur' => $request->umur,
      'nomorsepatu' => 123,
      'nomorsepatu1' => 123,
      'nomorsepatu2' => 123,
      'nomorsepatu3' => 123,
    ]);

    return [
      'saved' => $akun,
    ];
  }

  /**
   * GET AKUN BY ID
  **/
  public function show($id) {
    return Akun::findOrFail($id);
  }

  /**
   * GET AKUN BY USERNAME
  **/
  public function showByUsername($username) {
    $akun = Akun::username($username)->firstOrFail();

    // if(empty($akun)) {
    //   return response()->json('kosong', 404);
    // }

    return $akun;
  }
}

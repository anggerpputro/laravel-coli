<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
    $akun = Akun::find($id);

    if(empty($akun)) {
      return response()->json('data kosong!', 404);
    }

    return $akun;
  }

  /**
   * GET AKUN BY USERNAME
  **/
  public function showByUsername($username) {
    $akun = Akun::username($username)->first();

    if(empty($akun)) {
      return response()->json('data kosong!', 404);
    }

    return $akun;
  }

  /**
   * UPDATE AKUN BY ID
  **/
  public function update($id) {
    // get request user
    $request = request();

    $validator = Validator::make($request->all(), [
        'username' => 'required',
        'nama' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }

    // get data
    $akun = Akun::find($id);
    // $akun_data = (object)$akun->toArray();

    if(empty($akun)) {
      return response()->json('data kosong!', 404);
    }

    // update data
    // $akun->fill([
    //   'username'      => $request->has('username')      ? $request->username      : $akun->username,
    //   'nama'          => $request->has('nama')          ? $request->nama          : $akun->nama,
    //   'nomorhp'       => $request->has('nomorhp')       ? $request->nomorhp       : $akun->nomorhp,
    //   'alamat'        => $request->has('alamat')        ? $request->alamat        : $akun->alamat,
    //   'jenis_kelamin' => $request->has('jenis_kelamin') ? $request->jenis_kelamin : $akun->jenis_kelamin,
    //   'email'         => $request->has('email')         ? $request->email         : $akun->email,
    //   'umur'          => $request->has('umur')          ? $request->umur          : $akun->umur,
    // ]);

    $akun->fill($request->all());
    $akun->save();

    return [
      'saved' => $akun,
    ];
  }

  /**
   * DELETE AKUN BY ID
  **/
  public function delete($id) {
    // get data
    $akun = Akun::find($id);

    $akun_data = $akun->toArray();

    if(empty($akun)) {
      return response()->json('data kosong!', 404);
    }

    $deleted = $akun->delete();

    return [
      'deleted' => $akun_data,
    ];
  }

}

<?php
namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
use Gemboot\Controllers\CoreRestController as GembootController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Akun;
use App\Services\HaloService;

class HaloController extends GembootController {

  public function __construct(Akun $model, HaloService $service) {
    parent::__construct($model, $service);
  }

  /**
   * GET ALL AKUN
  **/
  public function index() {
    return $this->responseSuccessOrException(function() {
      return $this->service->listAll();
    });
  }

  /**
   * CREATE AKUN
  **/
  public function create() {
    return $this->responseSuccessOrException(function() {
      return $this->service->store(request()->all());
    });
  }

  /**
   * GET AKUN BY ID
  **/
  public function show($id) {
    return $this->responseSuccessOrException(function() use ($id) {
      return $this->service->findOrFail($id);
    });
  }

  /**
   * GET AKUN BY USERNAME
  **/
  public function showByUsername($username) {
    return $this->responseSuccessOrException(function() use ($username) {
      return $this->service->showByUsername($username);
    });
  }

  /**
   * UPDATE AKUN BY ID
  **/
  public function update($id) {
    return $this->responseSuccessOrException(function() use ($id) {
      return $this->service->update(request()->all(), $id);
    });
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

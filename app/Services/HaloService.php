<?php
namespace App\Services;

use Gemboot\Services\CoreService as GembootService;
use App\Models\Akun;

class HaloService extends GembootService {

  public function __construct(Akun $model) {
    parent::__construct($model);
  }

  public function showByUsername($username) {
    $model = $this->model->username($username);
    return $this->firstOrFail($model);
  }

}

<?php

namespace App\Http\Traits;

trait ApiResponse {
    private $success = 'success';
	private $err = 'error';
	private $expired = 'expired';
	private $validationError = 'invalid';

	private function withInfo($data, $code = 200)
	{
		return response()->json([
			'status' => $this->success,
			'data'   => $data
		], $code);
	}

	private function withMessage($status = true, $message, $code = 200)
	{
		if($code == 409) {
			$status = $this->validationError;
		} else if($status) {
			$status = $this->success;
		} else if(!$status) {
			$status = $this->err;
		}

		return response()->json([
			'status' => $status,
			'message'  => $message,
		], $code);
	}

	private function unauthorized()
	{
		return response()->json([
			'status' => $this->err,
			'error'  => 'Unauthorized'
		], 401);
	}

	private function notFound()
	{
		return response()->json([
			'status' => $this->err,
			'error'  => 'Not Found'
		], 404);
	}

	private function error()
	{
		return response()->json([
			'status' => $this->err,
			'error'  => 'Internal Server Error'
		], 500);
	}
}

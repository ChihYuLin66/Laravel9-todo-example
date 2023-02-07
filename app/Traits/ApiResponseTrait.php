<?php

namespace App\Traits;

/**
 * for api reponse use
 */
trait ApiResponseTrait
{
	// 成功回傳
	private function successResponse($data, $message = 'success')
	{
		return response()
            ->json([
                'status'   => true,
			    'message'  => $message,
			    'data'	   => $data,
		    ], 200);
	}

	// 失敗回傳(含 errorcode)
	private function errorResponse($data, $message = 'fail')
	{
		return response()
            ->json([
                'status'   => false,
			    'message'  => $message,
			    'data'	   => $data,
		    ], 200);
	}

	// /**
    //  * ajax 用
    //  */
    // public function responseJson($data = null, $status = true, $message = null, $http_code = 200)
	// {
	// 	if (empty($message)) {
	// 		$message = config('http_codes.default_messages')[$http_code] ?: '';
	// 	}

    //     return response()
    //         ->json([
    //             'status'   => $status,
	// 		    'message'  => $message,
	// 		    'data'	   => $data,
	// 	    ], $http_code);
	// }
}

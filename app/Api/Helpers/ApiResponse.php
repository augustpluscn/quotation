<?php
namespace App\Api\Helpers;

use Response;
use Symfony\Component\HttpFoundation\Response as FoundationResponse;

trait ApiResponse
{
    /**
     * @var int
     */
    protected $statusCode = FoundationResponse::HTTP_OK;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode, $httpCode = null)
    {
        $httpCode = $httpCode ?? $statusCode;
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @param $data
     * @param array $header
     * @return mixed
     */
    public function respond($data, $header = [])
    {

        return Response::json($data, 200, $header);
    }

    /**
     * @param $status
     * @param array $data
     * @param null $code
     * @return mixed
     */
    public function status($msg, array $data = null, $code = null)
    {

        if ($code) {
            $this->setStatusCode($code);
        }
        $arr = [
            'code' => $this->statusCode,
            'msg' => $msg,
        ];
        if ($data) {
            $data = array_merge($arr, $data);
        } else {
            $data = $arr;
        }

        return $this->respond($data);

    }

    /**
     * @param $data
     * @param string $status
     * @return mixed
     */
    public function success($data, $msg = "成功")
    {
        return $this->status($msg, compact('data'));
    }

    /**
     * @param $message
     * @param int $code
     * @param string $status
     * @return mixed
     */
    /*
     * 格式
     * data:
     *  code:422
     *  message:xxx
     *  status:'error'
     */
    public function failed($msg = '失败', $data = null, $code = FoundationResponse::HTTP_BAD_REQUEST)
    {

        return $this->setStatusCode($code)->status($msg, $data);
    }

    /**
     * @param $message
     * @param string $status
     * @return mixed
     */
    public function message($msg)
    {

        return $this->status($msg);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function internalError($message = "Internal Error!")
    {

        return $this->failed($message, FoundationResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function created($message = "created")
    {
        return $this->setStatusCode(FoundationResponse::HTTP_CREATED)
            ->message($message);

    }

    /**
     * @param string $message
     * @return mixed
     */
    public function notFond($message = 'Not Fond!')
    {
        return $this->failed($message, Foundationresponse::HTTP_NOT_FOUND);
    }
}

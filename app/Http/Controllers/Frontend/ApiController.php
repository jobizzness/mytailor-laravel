<?php


namespace MyTailor\Http\Controllers\Frontend;


use Illuminate\Support\Facades\Response;
use MyTailor\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected $statusCode = 200;


    public function __construct()
    {
        $this->middleware('cors');

    }
    /**
     * @param string $message
     * @return mixed
     */
    public function NotFound($message = 'Resource Not Found')
    {

       return $this->setStatusCode(404)->respondWithError($message);

    }

    /**
     * @param mixed $statusCode
     * @return ApiController
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message
            ]
        ]);
    }
}
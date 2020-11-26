<?php
namespace App\Filey;

use Illuminate\Foundation\Console\IlluminateCaster;
use Illuminate\Http\Response as IlluminateResponse;
use Response;


class ApiController extends Controller
{
    protected $statusCode = 200;

    Public function respondNotFound($message = 'Not Found !')//Not Found
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    Public function respondWithError($message)
    {
        return $this->respond([
            'status' => $this->getStatusCode(),
            'message' => $message,
        ]);
    }

    Public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    Public function getStatusCode()
    {
        return $this->statusCode;
    }

    Public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    Public function respondMissingHeaders($message = 'Missing Headers !')//Not Found
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    Public function respondInternalError($message = 'Internal Server Error !')//Server Error
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    Public function respondValidationError($message = 'Please enter all required fields')//Validation Error
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_BAD_REQUEST)->respondWithError($message);
    }

    Public function respondAuthError($message = 'Unauthorized')//Validation Error
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    Public function respondCreated($message = 'Added Successfully')//Created Successfully
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_OK)->respondWithError($message);
    }

    Public function respondDeleted($message = 'Item Deleted Successfully')//Deleted Successfully
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_OK)->respondWithError($message);
    }

    Public function respondExist($message = 'Item Already Exist')//Duplicates
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_BAD_REQUEST)->respondWithError($message);
    }

}
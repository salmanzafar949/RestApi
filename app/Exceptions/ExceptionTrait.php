<?php
/**
 * Created by Salman Zafar.
 * User: salman
 * Date: 4/25/18
 * Time: 2:37 AM
 */

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

trait ExceptionTrait {

    public  function apiException($request, $exception)
    {
        if($this->IsModel($exception))
        {
            return $this->ModelResponse();
        }

        if ($this->IsBound($exception))
        {
            return $this->BoundResponse();
        }

        if ($this->IsRoute($exception))
        {
            return $this->RouteResponse();
        }

        if ($this->IsHttp($exception))
        {
            return $this->HttpResponse();
        }

        return parent::render($request, $exception);

    }

    protected function IsModel($exception)
    {
        return $exception instanceof ModelNotFoundException;
    }

    protected function IsBound($exception)
    {
        return $exception instanceof OutOfBoundsException;
    }

    protected function IsRoute($exception)
    {
        return $exception instanceof RouteNotFoundException;
    }

    protected function IsHttp($exception)
    {
        return $exception instanceof NotFoundHttpException;
    }

    protected function ModelResponse()
    {
        return response()->json([
            'error' => 'Modal Not Found'
        ],Response::HTTP_NOT_FOUND);
    }

    protected function HttpResponse()
    {
        return response()->json([
            'error' => 'Url Not Found'
        ],Response::HTTP_NOT_FOUND);
    }

    protected function BoundResponse()
    {
        return response()->json([
            'error' => 'Undefined Index'
        ],Response::HTTP_NOT_FOUND);
    }

    protected function RouteResponse()
    {
        return response()->json([
            'error' => 'Route Not Found'
        ],Response::HTTP_NOT_FOUND);
    }
}
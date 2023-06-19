<?php

namespace App\Filters;

use App\Models\UserModel;
use App\Response\BaseResponse;
use App\Utils\JWT;
use CodeIgniter\Config\Services;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\Message;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Auth implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $headers = new Message();
        $response = Services::response();
        $customResponse = new BaseResponse();
        $user = new UserModel();

        $response->setJSON($customResponse->responseGeneric('Não Autorizado'));
        $response->setStatusCode(403);

        $headers = $headers->headers();

        $token = $headers['Authorization']->getValue();
        $token = substr($token, 7);
        
        $email = $headers['Email']->getValue();
        $company = $headers['Company-Code']->getValue();

        $validToken = !(JWT::valideToken($token, getenv('secret_key')));


        try {
            $decodeToken = JWT::decode($token, getenv('secret_key'));
            $validUser = $user->getUser($email)['email'] != $decodeToken['email'];
            $validCompany = $request->uri->getSegment(2) != $company || $request->uri->getSegment(2) != $decodeToken['companyId'];
        } catch(Exception $e) {
            return $response;
        }

        return $validToken || $validUser || $validCompany ? $response : null;
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}

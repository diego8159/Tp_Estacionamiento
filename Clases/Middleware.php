<?php
include_once "autentificadorJWT.php";
Class Middleware{

public function __invoke($request, $response, $next)
{
        
        $headersArray = $request->getHeader('Authorization');
        
        if(empty($headersArray[0])){
                echo "token vacio";
        }else{
           $token = $headersArray[0];
        }
        $esValida= autentificadorJWT::VerificarToken($token);  
        if(is_object($esValida)){
                $response = $next($request, $response); 
        }else{
                 $response = "Token no valido";    
        }       
       
  return $response;
}
}
?>
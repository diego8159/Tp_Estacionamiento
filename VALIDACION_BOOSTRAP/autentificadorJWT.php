<?php
use Firebase\JWT\JWT;
class autentificadorJWT
{
    private static $claveSecreta = "clavesecreta";
    private static $encriptado = array('HS256');

    public static function CrearToken($datos){
        $time = time();
        $payload = array(
            "iss" => "http://localhost/TPProgramcion-laboratorioIII2017/verificarusuario/", // el emisor del token
            // "aud" => "benu",
            'iat' => $time,
            'exp' => $time + (60*60), // 1hs
            'data' => $datos,
            'app' => "apirestjwt"
        );
        return JWT::encode($payload,self::$claveSecreta);
    }
    
    public static function VerificarToken($token){
        try{
              $decodificado = JWT::decode($token,self::$claveSecreta,self::$encriptado); 
        }catch(\Firebase\JWT\ExpiredException $e){
            print "Error!: " . $e->getMessage();
            die();
        }
        catch (\Firebase\JWT\SignatureInvalidException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
        catch (\Firebase\JWT\UnexpectedValueException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
        catch (\Firebase\JWT\InvalidArgumentException $e) { 
            print "Error!: " . $e->getMessage();
            die();
        }
         catch (\Firebase\JWT\BeforeValidException $e) { 
            print "Error!: " . $e->getMessage();
            die();
        }
         catch (\Firebase\JWT\DomainException $e) { 
            print "Error!: " . $e->getMessage();
            die();
        }
        
     return $decodificado;
    }
}
?>
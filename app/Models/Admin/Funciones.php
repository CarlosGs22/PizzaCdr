<?php

namespace App\Models\Admin;

class Funciones
{

    public function _CodigoFunciones($codigo, $arreglo)
    {
        $respuesta = null;
        try {
            if ($codigo == '1') {
                $respuesta = array('0' => "Registro guardado exitosamente", '1' => "success");
            } else if (!empty($codigo)) {
                if ($codigo['code'] == '1062') {
                    $respuesta = array('0' => "Error registro duplicado", '1' => "error");
                } else if ($codigo['code'] !== null && $codigo['code'] === '23000') {
                    $respuesta = array('0' => "Error registro duplicado", '1' => "error");
                } else {
                    $respuesta = array('0' => "Ocurrió un error interno " . str_replace("'", "", $codigo['message']), '1' => "error");
                }
            } else {
                $errorRes = null;
                foreach ((array) $arreglo as $field => $error) {
                    $errorRes .= $error;
                    break;
                }
                if ($errorRes == null) {
                    $respuesta = array('0' => "Ocurrió un error al guardar", '1' => "error");
                } else {
                    $respuesta = array('0' => str_replace("'", "", $errorRes), '1' => "error");
                }
            }
        } catch (\Exception  $e) {
            $respuesta = array('0' => "Ocurrió un error interno" . str_replace("'", "", $e->getMessage()), '1' => "error");
        }
        return $respuesta;
    }

    public function _GuardarImagen($file, $ruta, $arreglo, $campobd)
    {
        $nombreImg = null;
        if ($img = $file) {
            if ($img->isValid() && !$img->hasMoved()) {
                $nombreImg = $img->getName();
                $resImg = $img->move($ruta, $nombreImg);
                return array_merge($arreglo, array("imagen" => $nombreImg));;
            }
        }
        return $arreglo;
    }

    public function array_push_assoc($array, $key, $value)
    {
        $array[$key] = $value;
        return $array;
    }

    public function _sendMail($to, $subject, $message,$title)
    {

        $email = \Config\Services::email();

        $email->setTo('carlosgs.trejo@gmail.com');
        $email->setFrom($to, $title);

        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) {
            return true;
        } else {
            $data = $email->printDebugger(['headers']);
            return $data;
        }
    }

    function cleanInput($input) {
 
        $search = array(
          '@<script[^>]*?>.*?</script>@si',   // Elimina javascript
          '@<[\/\!]*?[^<>]*?>@si',            // Elimina las etiquetas HTML
          '@<style[^>]*?>.*?</style>@siU',    // Elimina las etiquetas de estilo
          '@<![\s\S]*?--[ \t\n\r]*>@'         // Elimina los comentarios multi-línea
        );
       
          $output = preg_replace($search, '', $input);
          return $output;
        }
       
      function sanitize($input) {
          if (is_array($input)) {
              foreach($input as $var=>$val) {
                  $output[$var] = sanitize($val);
              }
          }
          else {
              if (get_magic_quotes_gpc()) {
                  $input = stripslashes($input);
              }
              $input  = cleanInput($input);
              $output = mysql_real_escape_string($input);
          }
          return $output;
      }

      public function cleanSanitize($value)
      {
        $step1 = sanitize($value);
        $step2 = strip_tags($step1); // Strip tags
        $step3 = htmlspecialchars($step2); // Change tag characters to HTML entities
        return $step3;
      }


}

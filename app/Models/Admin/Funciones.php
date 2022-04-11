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

        $arrayType = array("image/jpg","image/jpeg", "image/png","image/JPG", "image/PNG","image/JPEG");

        if (!in_array($file->getClientMimeType(), $arrayType)) {
            return $arreglo;
        } else {
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
    }

    public function array_push_assoc($array, $key, $value)
    {
        $array[$key] = $value;
        return $array;
    }

    public function _sendMail($to, $subject, $message, $title)
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

    public function cleanSanitize($type, $value)
    {
        $clean = null;
        switch ($type) {
            case 'INT':
                $clean = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
                break;
            case 'STRING':
                $clean = filter_var($value, FILTER_SANITIZE_STRING);
                break;
            case 'EMAIL':
                $clean = filter_var($value, FILTER_SANITIZE_EMAIL);
                break;
            default:
                $clean = $value;
                break;
        }
        $cleanStep2 = htmlentities($clean);

        $cleanStep3 = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $cleanStep2);

        return $cleanStep3;
    }

    function findTextByValueInArray($fooArray, $searchValue, $columFind)
    {
        $value = 0;
        foreach ($fooArray as $bar) {
            if ($bar[$columFind] == $searchValue) {
                $value = 1;
                break;
            }
        }
        return $value;
    }
}

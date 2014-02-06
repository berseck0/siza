<?php
function formateo($dato){
    $dato=utf8_encode(strtoupper($dato));
    $dato = rtrim($dato,' ');
return $dato;
}

function formatup($dato){
    $dato=utf8_encode(strtoupper($dato));
return $dato;
}

function decodificar_utf8($cadena){

    $buscar = array(
        'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ă', 'Ą',
        'Ç', 'Ć', 'Č', 'Œ',
        'Ď', 'Đ',
        'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ă', 'ą',
        'ç', 'ć', 'č', 'œ',
        'ď', 'đ',
        'È', 'É', 'Ê', 'Ë', 'Ę', 'Ě',
        'Ğ',
        'Ì', 'Í', 'Î', 'Ï', 'İ',
        'Ĺ', 'Ľ', 'Ł',
        'è', 'é', 'ê', 'ë', 'ę', 'ě',
        'ğ',
        'ì', 'í', 'î', 'ï', 'ı',
        'ĺ', 'ľ', 'ł',
        'Ñ', 'Ń', 'Ň',
        'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ő',
        'Ŕ', 'Ř',
        'Ś', 'Ş', 'Š',
        'ñ', 'ń', 'ň',
        'ò', 'ó', 'ô', 'ö', 'ø', 'ő',
        'ŕ', 'ř',
        'ś', 'ş', 'š',
        'Ţ', 'Ť',
        'Ù', 'Ú', 'Û', 'Ų', 'Ü', 'Ů', 'Ű',
        'Ý', 'ß',
        'Ź', 'Ż', 'Ž',
        'ţ', 'ť',
        'ù', 'ú', 'û', 'ų', 'ü', 'ů', 'ű',
        'ý', 'ÿ',
        'ź', 'ż', 'ž',
        'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р',
        'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'р',
        'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',
        'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'
        );

    $remplazar = array(
        'A', 'A', 'A', 'A', 'A', 'A', 'AE', 'A', 'A',
        'C', 'C', 'C', 'CE',
        'D', 'D',
        'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'a', 'a',
        'c', 'c', 'c', 'ce',
        'd', 'd',
        'E', 'E', 'E', 'E', 'E', 'E',
        'G',
        'I', 'I', 'I', 'I', 'I',
        'L', 'L', 'L',
        'e', 'e', 'e', 'e', 'e', 'e',
        'g',
        'i', 'i', 'i', 'i', 'i',
        'l', 'l', 'l',
        'N', 'N', 'N',
        'O', 'O', 'O', 'O', 'O', 'O', 'O',
        'R', 'R',
        'S', 'S', 'S',
        'n', 'n', 'n',
        'o', 'o', 'o', 'o', 'o', 'o',
        'r', 'r',
        's', 's', 's',
        'T', 'T',
        'U', 'U', 'U', 'U', 'U', 'U', 'U',
        'Y', 'Y',
        'Z', 'Z', 'Z',
        't', 't',
        'u', 'u', 'u', 'u', 'u', 'u', 'u',
        'y', 'y',
        'z', 'z', 'z',
        'A', 'B', 'B', 'r', 'A', 'E', 'E', 'X', '3', 'N', 'N', 'K', 'N', 'M', 'H', 'O', 'N', 'P',
        'a', 'b', 'b', 'r', 'a', 'e', 'e', 'x', '3', 'n', 'n', 'k', 'n', 'm', 'h', 'o', 'p',
        'C', 'T', 'Y', 'O', 'X', 'U', 'u', 'W', 'W', 'b', 'b', 'b', 'E', 'O', 'R',
        'c', 't', 'y', 'o', 'x', 'u', 'u', 'w', 'w', 'b', 'b', 'b', 'e', 'o', 'r'
        );

    return str_replace($buscar, $remplazar, $cadena);
}
function calcular_edad($fecha){
    $dias = explode("-", $fecha, 3);
    $dias = mktime(0,0,0,$dias[1],$dias[0],$dias[2]);
    $edad = (int)((time()-$dias)/31556926 );
    return $edad;
}
// Formato: dd-mm-yy
//echo calcular_edad("01-10-1989"); // Resultado: 21
function emailfil($emal){
    $email = 'leon@sin castilla.com';

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
             echo 'email '.$email.' correcto';
      }else{
                echo 'email '.$email.' incorrecto';
    }
}

function listar_archivos($carpeta){
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                    echo '<li><a target="_blank" href="'.$carpeta.$archivo.'">'.$archivo.'</a></li>';
                }
            }
            closedir($dir);
        }
    }
    echo listar_archivos('c:\wamp\www\miweb');
}




function carpetavacia($carpeta){
$carpeta = @scandir('documentos');

if (count($carpeta) > 2){
    echo 'NO VACIO';
}else{
    echo 'VACIO';
}
}

function diferenciafecha($fecha1,$fecha2){
	    $fecha1 = new DateTime("2010-07-28 01:15:52");
        $fecha2 = new DateTime("2012-11-30 02:33:45");
        $fecha = $fecha1->diff($fecha2);
printf('%d años, %d meses, %d días, %d horas, %d minutos', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);

}

?>
<?php
/* PHP-Bot created for the SWGROLEPLAY.COM Community
or to use with other SWG servers.

				      /// Aeryna Kun [2021] \\\
*/

include __DIR__.'/vendor/autoload.php';
use Discord\Discord;

$discord = new Discord([
    'token' => '', 	// Put in the middle of the '' your Discord Bot Token got from Discord DEV: https://discord.com/developers/
]);

$discord->on('ready', function ($discord) {
    echo "¡Bot está listo!";


   $discord->on('MESSAGE_CREATE', function ($message, $discord) {
   
           if (strtolower($message->content) == '!ayuda' or strtolower($message->content) == '!comandos') {

            $message->reply("Los Comandos disponibles son:\n
            !server -> Estado Actual del Servidor [Online u Offline].
            !swgroleplay -> Descubir página web de la Comunidad.
            !meditar -> El Santuario de la Fuerza nos dará muy buenos consejos.
            !contacto -> Descubrir la cuenta de Contacto del Equipo SWGROLEPLAY.");

        } // Fin de !ayuda

        if (strtolower($message->content) == '!server' or strtolower($message->content) == '!servidor') {

            $ip = 'Your IP or address'; // Server
            $puerto = '44455'; // Port

            if ($fp=@fsockopen($ip,$puerto,$ERROR_NO,$ERROR_STR,(float)0.5))   
            {   
            fclose($fp); // Online

             $imagen = "https://i.imgur.com/xOw6kxr.jpg";
             $status = "The Server is:   " . $imagen;
             $message->reply($status);

            } else { // Offline

             $imagen = "https://i.imgur.com/H8SaeiW.jpg";
             $status = "The Server is:   " . $imagen;
             $message->reply($status);
            }
        } // Fin de !server


        if (strtolower($message->content) == '!swgroleplay' or strtolower($message->content) == '!swgrp') {
            $message->reply('https://whatever.whatever');
        } // Fin de !swgroleplay

        if (strtolower($message->content) == '!fuerza' or strtolower($message->content) == '!meditar') {

				/// Maybe you need to translate this part  :) 
            $mensajes = array(
                'La paciencia no es un regalo, es una lección que se debe reaprender todos los días.', 
                'Seres luminosos nosotros somos... no esta materia cruda.',
                'Mantén tu concentración aquí y ahora, donde pertenece.',
                'La capacidad de hablar no te hace inteligente.',
                'El que apuesta, a la larga suele perder.',
                'La Fuerza nos rodea, entra en nosotros y une a la galaxia.',
                'Esperar y observar es difícil, pero hay que dominar esas disciplinas.',
                'Hazlo o no lo hagas, pero no lo intentes.',
                'La Fuerza es un poderoso aliado, y un enemigo terrible.',
                'Cometer un error no es un problema. No aprender de él sí que lo es.',
                'Siempre hay más preguntas que respuestas.',
                'Muchas de las verdades a las que uno se aferra dependen en gran medida de nuestro punto de vista.',
                'Con pensar en la Fuerza no se consigue nada. Hay que actuar.',
                'Solo tú conocerás tu propio corazón.',
            );
             
            $todo=(count($mensajes)-1);
            $num=rand(0,$todo);
            $message->reply($mensajes[$num]);
        } // Fin de !fuerza

        if (strtolower($message->content) == '!contacto') {
            $message->reply("Email:   whatever@whatever.whatever");
        } // Fin de !contacto

    });

});
$discord->run();

<?php
/* PHP-Bot 1.04.1
or to use with other SWG servers if you like.

# Changelog
	- Switched to 'init' instead of deprecated 'ready'
	- Added !version command

Aeryna Kun (2025)
*/

include __DIR__.'/vendor/autoload.php';
use Discord\Discord;

define('BOT_VERSION', '1.04.1');

$discord = new Discord([
    'token' => '', 	// Put your Discord Bot Token got from Discord DEV: https://discord.com/developers/
]);

$discord->on('init', function ($discord) {
    echo "¡BOT está listo!\n\n\n\n";
});

$discord->on('MESSAGE_CREATE', function ($message, $discord) {
	$content = strtolower(trim($message->content));
		
	if ($content == '!ayuda' || $content == '!comandos') {
	// Commands
	    $message->reply("Los Comandos disponibles son:\n
		!server -> Estado Actual del Servidor [Online u Offline].
		!comunidad/!guild -> Descubir página web de la Comunidad.
		!fuerza/!meditar -> El Santuario de la Fuerza nos dará muy buenos consejos.
		!contact -> Descubrir la cuenta de Contacto del Equipo SWGROLEPLAY.
		!version -> Mostrar versión de Bot y PHP.");
	} // !ayuda

    $ip = 'Your IP or address'; // Server [Put your localhost if Bot is Host]
	$puerto = '44455'; // Port

	if ($content == '!server') {
		try {
			$fp = @fsockopen($ip, $puerto, $errno, $errstr, 0.5);
			if ($fp === false) throw new Exception("Servidor offline: $errstr ($errno)");
			// Online
			fclose($fp);
			$message->reply("https://i.imgur.com/xOw6kxr.jpg");

		} catch (Exception $e) {
			// Offline
			$message->reply("https://i.imgur.com/H8SaeiW.jpg");
			echo "Error: " . $e->getMessage();
		}
	}

    if ($content == '!guild' || $content == '!comunidad') {
		$message->reply('https://whatever.whatever');
	} // Web or Discord

    if ($content == '!fuerza' || $content == '!meditar') {
		// Maybe you need to translate this part  :) 
		$mensajes = [
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
			'Solo tú conocerás tu propio corazón.'
		];

		$message->reply($mensajes[array_rand($mensajes)]);
    } // !fuerza

    if ($content == '!contact') $message->reply("Email:   whatever@whatever.whatever");

	if ($content == '!version') {
		$php = phpversion();
		$message->reply("Discord Bot v" . BOT_VERSION . " - PHP version $php");
	}

});
$discord->run();

?>


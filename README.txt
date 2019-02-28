
CONTENIDO DEL ARCHIVO
---------------------

 * Bienvenido al Dojo
 * A cerca del Dojo
 * Prerequisitos
 * Configuración Virtual Host
   * Linux
   * Windows
 * Confguracion del proyecto
 

BIENVENIDOS AL DOJO
-------------------

A CERCA DEL DOJO
----------------

PREREQUISITOS
-------------

 * Tener instalado un servidor web php con soporte para pdo-sqlite, php-xml.
 * Tener instalado un IDE (El de tu preferencia).
 * Tener permisos de escritura en el proyecto del dojo
 * Tener instalado phpUnit.
 * Tener instalado composer

CONFIGURACIÓN VIRTUAL HOST
--------------------------

 En la carpeta configs del root del repositiorio se encuentra el archivo
 dojo.dev.co.conf, este archivo se debe copiar en la siguiente ruta 
 /etc/apache2/sites-availables esto para el caso de sistemas operativos linux.
 Para sistemas operativos windows (este ejemplo se hace sobre un ambiente 
 xammp) se debe pegar el archivo httpd-vhosts.conf en el directorio
 /root_xampp/apache/conf/extra y reemplazar el existente o modificarlo.

 Para habilitar el virtual host en linux es necesario ejecutar el comando
 a2ensite dojo.dev.co y reiniciar el servidor.

 Una vez heho esto debemos indicarle al equipo local donde debe resolver el
 dominio creado, esto se realiza en el archivo /etc/hosts (Linux) o 
 C:\windows\System32\drivers\etc\hosts (Windows) y se debe matricular
 el dominio dojo.dev.co apuntando al mismo equipo (127.0.0.1).
 
CONFIGURACIÓN DEL PROYECTO
--------------------------

 Para poder llevar a cabo este dojo es necesario que tengamos configurado el
 proyecto, para esto debemos configurar el drupal y para esto debemos hacer lo
 siguiente:
 
 * Ejecutar el comando composer install
 * Actualizar el phpUnit con el siguiente comando 
   composer run-script drupal-phpunit-upgrade

------------------------------------------------------------------------------

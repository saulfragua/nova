<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MODELO
    |--------------------------------------------------------------------------
    */

    private Usuario $usuarioModel;


    /*
    |--------------------------------------------------------------------------
    | CONSTRUCTOR
    |--------------------------------------------------------------------------
    */

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }


    /*
    |--------------------------------------------------------------------------
    | ALERTA
    |--------------------------------------------------------------------------
    |
    | Centraliza las alertas de SweetAlert2.
    |
    */

    private function alerta(
        string $tipo,
        string $mensaje
    ): void {

        $_SESSION['mensaje'] = $mensaje;
        $_SESSION['tipo_mensaje'] = $tipo;
    }


    /*
    |--------------------------------------------------------------------------
    | REDIRECCIÓN CON ALERTA
    |--------------------------------------------------------------------------
    */

    private function redirigirConAlerta(
        string $url,
        string $tipo,
        string $mensaje
    ): never {

        $this->alerta(
            $tipo,
            $mensaje
        );

        header(
            'Location: ' .
            BASE_URL .
            $url
        );

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(): void
    {
        $usuarios =
            $this->usuarioModel
                ->obtenerTodosConRutas();

        $totalUsuarios =
            $this->usuarioModel
                ->contarTodos();

        $totalAdministradores =
            $this->usuarioModel
                ->contarPorRol('admin');

        $totalCobradores =
            $this->usuarioModel
                ->contarPorRol('cobrador');

        $usuariosConRutas =
            $this->usuarioModel
                ->contarUsuariosConRutas();

        $rutas =
            $this->usuarioModel
                ->obtenerRutasDisponibles();


        $this->view(
            'usuarios/index',
            [
                'usuarios' =>
                    $usuarios,

                'totalUsuarios' =>
                    $totalUsuarios,

                'totalAdministradores' =>
                    $totalAdministradores,

                'totalCobradores' =>
                    $totalCobradores,

                'usuariosConRutas' =>
                    $usuariosConRutas,

                'rutas' =>
                    $rutas
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREAR
    |--------------------------------------------------------------------------
    */

    public function crear(): void
    {
        $this->view(
            'usuarios/crear'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | GUARDAR
    |--------------------------------------------------------------------------
    */

    public function guardar(): void
    {
        /*
         * ------------------------------------------------------
         * VALIDAR MÉTODO
         * ------------------------------------------------------
         */

        if (
            $_SERVER['REQUEST_METHOD'] !== 'POST'
        ) {

            $this->redirigirConAlerta(
                '/usuarios',
                'warning',
                'La solicitud no es válida.'
            );
        }


        /*
         * ------------------------------------------------------
         * RECIBIR DATOS
         * ------------------------------------------------------
         */

        $nombreCompleto =
            trim(
                $_POST['nombre_completo'] ?? ''
            );

        $nombreUsuario =
            strtolower(
                trim(
                    $_POST['nombre_usuario'] ?? ''
                )
            );

        $email =
            strtolower(
                trim(
                    $_POST['email'] ?? ''
                )
            );

        $rol =
            trim(
                $_POST['rol'] ?? ''
            );

        $clave =
            $_POST['clave'] ?? '';

        $confirmarClave =
            $_POST['confirmar_clave'] ?? '';

        $estado =
            isset($_POST['estado'])
                ? 1
                : 0;


        /*
         * ------------------------------------------------------
         * DATOS PARA EL FORMULARIO
         * ------------------------------------------------------
         */

        $datos = [

            'nombre_completo' =>
                $nombreCompleto,

            'nombre_usuario' =>
                $nombreUsuario,

            'email' =>
                $email,

            'rol' =>
                $rol,

            'estado' =>
                $estado
        ];


        $errores = [];


        /*
         * ------------------------------------------------------
         * VALIDAR NOMBRE
         * ------------------------------------------------------
         */

        if ($nombreCompleto === '') {

            $errores[] =
                'El nombre completo es obligatorio.';

        } elseif (
            mb_strlen($nombreCompleto) > 100
        ) {

            $errores[] =
                'El nombre completo no puede superar los 100 caracteres.';
        }


        /*
         * ------------------------------------------------------
         * VALIDAR USUARIO
         * ------------------------------------------------------
         */

        if ($nombreUsuario === '') {

            $errores[] =
                'El nombre de usuario es obligatorio.';

        } elseif (
            mb_strlen($nombreUsuario) > 50
        ) {

            $errores[] =
                'El nombre de usuario no puede superar los 50 caracteres.';

        } elseif (
            !preg_match(
                '/^[a-z0-9._-]+$/',
                $nombreUsuario
            )
        ) {

            $errores[] =
                'El nombre de usuario solo puede contener letras, números, puntos, guiones y guiones bajos.';
        }


        /*
         * ------------------------------------------------------
         * VALIDAR EMAIL
         * ------------------------------------------------------
         */

        if ($email !== '') {

            if (
                !filter_var(
                    $email,
                    FILTER_VALIDATE_EMAIL
                )
            ) {

                $errores[] =
                    'El correo electrónico no es válido.';

            } elseif (
                mb_strlen($email) > 255
            ) {

                $errores[] =
                    'El correo electrónico no puede superar los 255 caracteres.';
            }
        }


        /*
         * ------------------------------------------------------
         * VALIDAR ROL
         * ------------------------------------------------------
         */

        $rolesPermitidos = [
            'admin',
            'cobrador'
        ];

        if (
            !in_array(
                $rol,
                $rolesPermitidos,
                true
            )
        ) {

            $errores[] =
                'Debes seleccionar un rol válido.';
        }


        /*
         * ------------------------------------------------------
         * VALIDAR CONTRASEÑA
         * ------------------------------------------------------
         */

        if ($clave === '') {

            $errores[] =
                'La contraseña es obligatoria.';

        } elseif (
            strlen($clave) < 6
        ) {

            $errores[] =
                'La contraseña debe tener al menos 6 caracteres.';
        }


        if (
            $clave !== $confirmarClave
        ) {

            $errores[] =
                'Las contraseñas no coinciden.';
        }


        /*
         * ------------------------------------------------------
         * USUARIO DUPLICADO
         * ------------------------------------------------------
         */

        if (
            $nombreUsuario !== '' &&
            $this->usuarioModel
                ->existeNombreUsuario(
                    $nombreUsuario
                )
        ) {

            $errores[] =
                'El nombre de usuario ya está registrado.';
        }


        /*
         * ------------------------------------------------------
         * EMAIL DUPLICADO
         * ------------------------------------------------------
         */

        if (
            $email !== '' &&
            $this->usuarioModel
                ->existeCorreo(
                    $email
                )
        ) {

            $errores[] =
                'El correo electrónico ya está registrado.';
        }


        /*
         * ------------------------------------------------------
         * MOSTRAR ERRORES
         * ------------------------------------------------------
         */

        if (!empty($errores)) {

            $this->view(
                'usuarios/crear',
                [
                    'errores' =>
                        $errores,

                    'old' =>
                        $datos
                ]
            );

            return;
        }


        /*
         * ------------------------------------------------------
         * HASH DE CONTRASEÑA
         * ------------------------------------------------------
         */

        $claveEncriptada =
            password_hash(
                $clave,
                PASSWORD_DEFAULT
            );


        /*
         * ------------------------------------------------------
         * CREAR USUARIO
         * ------------------------------------------------------
 */

        $creado =
            $this->usuarioModel
                ->crearUsuario(
                    [
                        'nombre_completo' =>
                            $nombreCompleto,

                        'nombre_usuario' =>
                            $nombreUsuario,

                        'rol' =>
                            $rol,

                        'clave' =>
                            $claveEncriptada,

                        'estado' =>
                            $estado,

                        'email' =>
                            $email !== ''
                                ? $email
                                : null
                    ]
                );


        /*
         * ------------------------------------------------------
         * RESULTADO
         * ------------------------------------------------------
         */

        if ($creado) {

            $this->redirigirConAlerta(
                '/usuarios',
                'success',
                'Usuario creado correctamente.'
            );
        }


        /*
         * ------------------------------------------------------
         * ERROR AL CREAR
         * ------------------------------------------------------
         */

        $errores[] =
            'No fue posible crear el usuario. Inténtalo nuevamente.';


        $this->view(
            'usuarios/crear',
            [
                'errores' =>
                    $errores,

                'old' =>
                    $datos
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | VER
    |--------------------------------------------------------------------------
    */

    public function ver(
        int $idUsuario
    ): void {

        /*
         * ------------------------------------------------------
         * VALIDAR ID
         * ------------------------------------------------------
         */

        if ($idUsuario <= 0) {

            $this->redirigirConAlerta(
                '/usuarios',
                'error',
                'El usuario seleccionado no es válido.'
            );
        }


        /*
         * ------------------------------------------------------
         * BUSCAR USUARIO
         * ------------------------------------------------------
         */

        $usuario =
            $this->usuarioModel
                ->obtenerPorId(
                    $idUsuario
                );


        if (!$usuario) {

            $this->redirigirConAlerta(
                '/usuarios',
                'error',
                'El usuario no existe.'
            );
        }


        /*
         * ------------------------------------------------------
         * RUTAS
         * ------------------------------------------------------
         */

        $rutas =
            $this->usuarioModel
                ->obtenerRutasPorUsuario(
                    $idUsuario
                );


        /*
         * ------------------------------------------------------
         * VISTA
         * ------------------------------------------------------
         */

        $this->view(
            'usuarios/ver',
            [
                'usuario' =>
                    $usuario,

                'rutas' =>
                    $rutas
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EDITAR
    |--------------------------------------------------------------------------
    */

    public function editar(
        int $idUsuario
    ): void {

        /*
         * ------------------------------------------------------
         * VALIDAR ID
         * ------------------------------------------------------
         */

        if ($idUsuario <= 0) {

            $this->redirigirConAlerta(
                '/usuarios',
                'error',
                'El usuario seleccionado no es válido.'
            );
        }


        /*
         * ------------------------------------------------------
         * BUSCAR USUARIO
         * ------------------------------------------------------
         */

        $usuario =
            $this->usuarioModel
                ->obtenerPorId(
                    $idUsuario
                );


        if (!$usuario) {

            $this->redirigirConAlerta(
                '/usuarios',
                'error',
                'El usuario no existe.'
            );
        }


        /*
         * ------------------------------------------------------
         * VISTA
         * ------------------------------------------------------
         */

        $this->view(
            'usuarios/editar',
            [
                'usuario' =>
                    $usuario
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR
    |--------------------------------------------------------------------------
    */

    public function actualizar(): void
    {
        /*
         * ------------------------------------------------------
         * VALIDAR MÉTODO
         * ------------------------------------------------------
         */

        if (
            $_SERVER['REQUEST_METHOD'] !== 'POST'
        ) {

            $this->redirigirConAlerta(
                '/usuarios',
                'warning',
                'La solicitud no es válida.'
            );
        }


        /*
         * ------------------------------------------------------
         * RECIBIR DATOS
         * ------------------------------------------------------
         */

        $idUsuario =
            (int) (
                $_POST['id_usuario'] ?? 0
            );

        $nombreCompleto =
            trim(
                $_POST['nombre_completo'] ?? ''
            );

        $nombreUsuario =
            strtolower(
                trim(
                    $_POST['nombre_usuario'] ?? ''
                )
            );

        $email =
            strtolower(
                trim(
                    $_POST['email'] ?? ''
                )
            );

        $rol =
            trim(
                $_POST['rol'] ?? ''
            );

        $clave =
            $_POST['clave'] ?? '';

        $confirmarClave =
            $_POST['confirmar_clave'] ?? '';

        $estado =
            isset($_POST['estado'])
                ? 1
                : 0;


        /*
         * ------------------------------------------------------
         * BUSCAR USUARIO
         * ------------------------------------------------------
         */

        $usuario =
            $this->usuarioModel
                ->obtenerPorId(
                    $idUsuario
                );


        if (!$usuario) {

            $this->redirigirConAlerta(
                '/usuarios',
                'error',
                'El usuario no existe.'
            );
        }


        /*
         * ------------------------------------------------------
         * DATOS
         * ------------------------------------------------------
         */

        $datos = [

            'id_usuario' =>
                $idUsuario,

            'nombre_completo' =>
                $nombreCompleto,

            'nombre_usuario' =>
                $nombreUsuario,

            'email' =>
                $email,

            'rol' =>
                $rol,

            'estado' =>
                $estado
        ];


        $errores = [];


        /*
         * ------------------------------------------------------
         * VALIDAR NOMBRE
         * ------------------------------------------------------
         */

        if ($nombreCompleto === '') {

            $errores[] =
                'El nombre completo es obligatorio.';

        } elseif (
            mb_strlen($nombreCompleto) > 100
        ) {

            $errores[] =
                'El nombre completo no puede superar los 100 caracteres.';
        }


        /*
         * ------------------------------------------------------
         * VALIDAR USUARIO
         * ------------------------------------------------------
         */

        if ($nombreUsuario === '') {

            $errores[] =
                'El nombre de usuario es obligatorio.';

        } elseif (
            mb_strlen($nombreUsuario) > 50
        ) {

            $errores[] =
                'El nombre de usuario no puede superar los 50 caracteres.';

        } elseif (
            !preg_match(
                '/^[a-z0-9._-]+$/',
                $nombreUsuario
            )
        ) {

            $errores[] =
                'El nombre de usuario solo puede contener letras, números, puntos, guiones y guiones bajos.';
        }


        /*
         * ------------------------------------------------------
         * VALIDAR EMAIL
         * ------------------------------------------------------
         */

        if ($email !== '') {

            if (
                !filter_var(
                    $email,
                    FILTER_VALIDATE_EMAIL
                )
            ) {

                $errores[] =
                    'El correo electrónico no es válido.';

            } elseif (
                mb_strlen($email) > 255
            ) {

                $errores[] =
                    'El correo electrónico no puede superar los 255 caracteres.';
            }
        }


        /*
         * ------------------------------------------------------
         * VALIDAR ROL
         * ------------------------------------------------------
         */

        $rolesPermitidos = [
            'admin',
            'cobrador'
        ];

        if (
            !in_array(
                $rol,
                $rolesPermitidos,
                true
            )
        ) {

            $errores[] =
                'Debes seleccionar un rol válido.';
        }


        /*
         * ------------------------------------------------------
         * VALIDAR CONTRASEÑA
         * ------------------------------------------------------
         */

        if ($clave !== '') {

            if (
                strlen($clave) < 6
            ) {

                $errores[] =
                    'La nueva contraseña debe tener al menos 6 caracteres.';
            }

            if (
                $clave !== $confirmarClave
            ) {

                $errores[] =
                    'Las contraseñas no coinciden.';
            }
        }


        /*
         * ------------------------------------------------------
         * USUARIO DUPLICADO
         * ------------------------------------------------------
         */

        if (
            $nombreUsuario !== '' &&
            $this->usuarioModel
                ->existeNombreUsuarioExcepto(
                    $nombreUsuario,
                    $idUsuario
                )
        ) {

            $errores[] =
                'El nombre de usuario ya está registrado.';
        }


        /*
         * ------------------------------------------------------
         * EMAIL DUPLICADO
         * ------------------------------------------------------
         */

        if (
            $email !== '' &&
            $this->usuarioModel
                ->existeCorreoExcepto(
                    $email,
                    $idUsuario
                )
        ) {

            $errores[] =
                'El correo electrónico ya está registrado.';
        }


        /*
         * ------------------------------------------------------
         * MOSTRAR ERRORES
         * ------------------------------------------------------
         */

        if (!empty($errores)) {

            $this->view(
                'usuarios/editar',
                [
                    'usuario' =>
                        $datos,

                    'errores' =>
                        $errores
                ]
            );

            return;
        }


        /*
         * ------------------------------------------------------
         * PREPARAR CONTRASEÑA
         * ------------------------------------------------------
         */

        $claveHash = null;

        if ($clave !== '') {

            $claveHash =
                password_hash(
                    $clave,
                    PASSWORD_DEFAULT
                );
        }


        /*
         * ------------------------------------------------------
         * ACTUALIZAR
         * ------------------------------------------------------
 */

        $actualizado =
            $this->usuarioModel
                ->actualizarUsuario(
                    [
                        'id_usuario' =>
                            $idUsuario,

                        'nombre_completo' =>
                            $nombreCompleto,

                        'nombre_usuario' =>
                            $nombreUsuario,

                        'email' =>
                            $email !== ''
                                ? $email
                                : null,

                        'rol' =>
                            $rol,

                        'estado' =>
                            $estado,

                        'clave' =>
                            $claveHash
                    ]
                );


        /*
         * ------------------------------------------------------
         * RESULTADO
         * ------------------------------------------------------
         */

        if ($actualizado) {

            $this->redirigirConAlerta(
                '/usuarios/ver/' . $idUsuario,
                'success',
                'Usuario actualizado correctamente.'
            );
        }


        /*
         * ------------------------------------------------------
         * ERROR
         * ------------------------------------------------------
         */

        $errores[] =
            'No fue posible actualizar el usuario. Inténtalo nuevamente.';


        $this->view(
            'usuarios/editar',
            [
                'usuario' =>
                    $datos,

                'errores' =>
                    $errores
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CAMBIAR ESTADO
    |--------------------------------------------------------------------------
    */

    public function cambiarEstado(
        int $idUsuario
    ): void {

        /*
         * ------------------------------------------------------
         * VALIDAR ID
         * ------------------------------------------------------
         */

        if ($idUsuario <= 0) {

            $this->redirigirConAlerta(
                '/usuarios',
                'error',
                'El usuario seleccionado no es válido.'
            );
        }


        /*
         * ------------------------------------------------------
         * BUSCAR USUARIO
         * ------------------------------------------------------
         */

        $usuario =
            $this->usuarioModel
                ->obtenerPorId(
                    $idUsuario
                );


        if (!$usuario) {

            $this->redirigirConAlerta(
                '/usuarios',
                'error',
                'El usuario no existe.'
            );
        }


        /*
         * ------------------------------------------------------
         * NUEVO ESTADO
         * ------------------------------------------------------
         */

        $estadoActual =
            (int) $usuario['estado'];

        $nuevoEstado =
            $estadoActual === 1
                ? 0
                : 1;


        /*
         * ------------------------------------------------------
         * ACTUALIZAR ESTADO
         * ------------------------------------------------------
         */

        $actualizado =
            $this->usuarioModel
                ->cambiarEstado(
                    $idUsuario,
                    $nuevoEstado
                );


        /*
         * ------------------------------------------------------
         * RESULTADO
         * ------------------------------------------------------
 */

        if ($actualizado) {

            $mensaje =
                $nuevoEstado === 1
                    ? 'Usuario activado correctamente.'
                    : 'Usuario inactivado correctamente.';

            $this->redirigirConAlerta(
                '/usuarios/ver/' . $idUsuario,
                'success',
                $mensaje
            );
        }


        $this->redirigirConAlerta(
            '/usuarios/ver/' . $idUsuario,
            'error',
            'No fue posible cambiar el estado del usuario.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ELIMINAR
    |--------------------------------------------------------------------------
    */

    public function eliminar(
        int $idUsuario
    ): void {

        /*
         * ------------------------------------------------------
         * VALIDAR ID
         * ------------------------------------------------------
         */

        if ($idUsuario <= 0) {

            $this->redirigirConAlerta(
                '/usuarios',
                'error',
                'El usuario seleccionado no es válido.'
            );
        }


        /*
         * ------------------------------------------------------
         * BUSCAR USUARIO
         * ------------------------------------------------------
         */

        $usuario =
            $this->usuarioModel
                ->obtenerPorId(
                    $idUsuario
                );


        if (!$usuario) {

            $this->redirigirConAlerta(
                '/usuarios',
                'error',
                'El usuario no existe.'
            );
        }


        /*
         * ------------------------------------------------------
         * VERIFICAR REGISTROS
         * ------------------------------------------------------
         */

        $tieneRegistros =
            $this->usuarioModel
                ->tieneRegistros(
                    $idUsuario
                );


        /*
         * ------------------------------------------------------
         * BLOQUEAR ELIMINACIÓN
         * ------------------------------------------------------
         */

        if ($tieneRegistros) {

            $this->redirigirConAlerta(
                '/usuarios/ver/' . $idUsuario,
                'warning',
                'No se puede eliminar este usuario porque tiene registros asociados. Para conservar el historial, el usuario debe permanecer en el sistema y puede ser inactivado.'
            );
        }


        /*
         * ------------------------------------------------------
         * ELIMINAR
         * ------------------------------------------------------
         */

        $eliminado =
            $this->usuarioModel
                ->eliminarUsuario(
                    $idUsuario
                );


        /*
         * ------------------------------------------------------
         * RESULTADO
         * ------------------------------------------------------
 */

        if ($eliminado) {

            $this->redirigirConAlerta(
                '/usuarios',
                'success',
                'Usuario eliminado correctamente.'
            );
        }


        /*
         * ------------------------------------------------------
         * ERROR
         * ------------------------------------------------------
 */

        $this->redirigirConAlerta(
            '/usuarios',
            'error',
            'No fue posible eliminar el usuario. No se realizaron cambios.'
        );
    }
}

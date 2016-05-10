<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Deposito\ClienteModel; 
use Deposito\ProductoModel;
use Deposito\User;
use Deposito\CreditoModel;

class ExampleTest extends TestCase
{

    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: Prueba unitaria de ingreso a la pagina principal
     *
     * @return void
     */
    public function testInicioExample()
    {
        $this->visit('/inicio')
             ->see('Deposito');
    }

    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 12-04-2016 13:28
     *   Descripción: Prueba unitaria de logueo del sistema
     *
     * @return void
     */
    public function testLoginExample()
    {
        $this->visit('/')
             ->see('Ingrese a tu cuenta')
             ->type('sebastianext@gmail.com','#correo')
             ->type('1234567','#clave')
             ->see('Error')
             ->type('sebastianext@gmail.com','#correo')
             ->type('123456','#clave');
    }

    

    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: Prueba unitaria de registro de cliente
     *
     * @return void
     */
    public function testRegistrarCliente()
    {
        $this->visit('/inicio')
              ->visit('/cliente')
             // ->seePageIs('/cliente');
             // ->click('Crear Cliente');
              ->visit('/cliente/create')
              // ->type('1094941407','cedula')
             // ->type('Johan Sebastian','#nombres')
             // ->type('Quintero Orozco','#apellidos')
             // ->type('Ciudadela el sol','#direccion')
             // ->type('3128049965','#telefono')
             // ->type('sebastianext@gmail.com','#correo');
             ->press('Aceptar');
    //          ->see('Accion Procesada!');        
     }


    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 12-04-2016 13:28
     *   Descripción: Prueba unitaria de actualizacion de cliente
     *
     * @return void
     */
    public function testActualizarCliente()
    {

        $clientes= ClienteModel::All();
        $id=0;
        foreach ($clientes as $cliente) {
            // echo 'hola mundo: '.$cliente->id;
           $id=$cliente->id;
           break;
        }
        $url='/cliente/'.$id.'/edit';
        // echo $url;
        $this->visit($url)
             // ->type('Alejandro prueba','#nombres')
             ->press('Aceptar');
             // ->see('Accion');   
        
    }

    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 10:08
     *   Descripción: Prueba unitaria de registro de cliente
     *
     * @return void
     */
    public function testRegistrarProducto()
    {
        $this->visit('/inicio')
             // ->click('Productos')
             // ->seePageIs('/producto')
             // ->click('Crear Producto')
             // ->seePageIs('/producto/create')
             ->visit('/producto/create')
             // ->type('Bebida','#nombre')
             // ->type('1300','#compra')
             // ->type('1500','#venta')
             // ->type('50','#cantidad')
             // ->type('bebida energizante ','#descripcion')
             ->press('Aceptar');
             // ->see('Accion Procesada!');        
    }

    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 12-04-2016 10:28
     *   Descripción: Prueba unitaria de actualizacion de prducto
     *
     * @return void
     */
    public function testActualizarProducto()
    {

        $productos= ProductoModel::All();
        $id=0;
        foreach ($productos as $producto) {
            // echo 'hola mundo: '.$producto->id;
           $id=$producto->id;
           break;
        }
        $url='/producto/'.$id.'/edit';
         // echo $url;
        $this->visit($url)
             // ->type('Bebida prueba','#nombre')
             ->press('Aceptar');
             // ->see('Accion Procesada!');   
        
    }


    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 10:08
     *   Descripción: Prueba unitaria de registro de entra de productos
     *
     * @return void
     */
    public function testRegistrarEntrada()
    {
        $this->visit('/inventario/create')
             ->press('Aceptar');
             // ->see('Accion Procesada!');        
    }   

    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 10-05-2016 10:32
     *   Descripción: Prueba unitaria de registro de usuario
     *
     * @return void
     */

    public function testRegistrarUsuario()
    {
        $this->visit('/inicio')
             // ->click('Usuarios')
             // ->seePageIs('/usuario')
             ->visit('/usuario')
             // ->click('Crear Usuario')
             // ->seePageIs('/usuario/create')
             ->visit('/usuario/create')
             // ->type('Prueba Usuario','#nombre')
             // ->type('usuario@gmail.com','#correo')
             // ->type('123456','#password')
             ->press('Aceptar');
             // ->see('Accion Procesada!');        
    }

    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 12-04-2016 13:28
     *   Descripción: Prueba unitaria de actualizacion de usuario
     *
     * @return void
     */
    public function testActualizarUsuario()
    {

        $usuarios= User::All();
        $id=0;
        foreach ($usuarios as $usuario) {
            // echo 'hola mundo: '.$usuario->id;
           $id=$usuario->id;
           break;
        }
        $url='/usuario/'.$id.'/edit';
        // echo $url;
        $this->visit($url)
             // ->type('Alejandro prueba','#nombre')
             ->press('Aceptar');
             // ->see('Accion Procesada!');   
        
    }

     /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 10-05-2016 10:32
     *   Descripción: Prueba unitaria de registro de usuario
     *
     * @return void
     */

    public function testRegistrarCredito()
    {
        $this->visit('/inicio')
             // ->click('Creditos')
             ->visit('/credito')
             // ->click('Crear Credito')
             ->visit('/credito/create')
             // ->type('100000','#valor')
             // ->type('30000','#abono')
             // ->type('credito de prueba','#descripcion')
             ->press('Aceptar');
             // ->see('Accion Procesada!');        
    }

     /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 12-04-2016 13:28
     *   Descripción: Prueba unitaria de actualizacion de usuario
     *
     * @return void
     */
    public function testActualizarCredito()
    {

        $usuarios= CreditoModel::All();
        $id=0;
        foreach ($usuarios as $usuario) {
            // echo 'hola mundo: '.$usuario->id;
           $id=$usuario->id;
           break;
        }
        $url='/usuario/'.$id.'/edit';
        // echo $url;
        $this->visit($url)
             // ->type('Alejandro prueba','#nombre')
             ->press('Aceptar');
             // ->see('Accion Procesada!');   
        
    }

}

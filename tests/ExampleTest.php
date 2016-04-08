<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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
        $this->visit('/')
             ->see('Deposito la Quinta');
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
        $this->visit('/')
             ->click('Clientes')
             ->seePageIs('/cliente')
             ->click('Crear Cliente')
             ->seePageIs('/cliente/create')
             ->type('1094941407','#cedula')
             ->type('Johan Sebastian','#nombres')
             ->type('Quintero Orozco','#apellidos')
             ->type('Ciudadela el sol','#direccion')
             ->type('3128049965','#telefono')
             ->type('sebastianext@gmail.com','#correo')
             ->press('Aceptar')
             ->see('Accion Procesada!');        
    }

    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: Prueba unitaria de registro de cliente
     *
     * @return void
     */
    public function testRegistrarProducto()
    {
        $this->visit('/')
             ->click('Clientes')
             ->seePageIs('/cliente')
             ->click('Crear Cliente')
             ->seePageIs('/cliente/create')
             ->type('1094941407','#cedula')
             ->type('Johan Sebastian','#nombres')
             ->type('Quintero Orozco','#apellidos')
             ->type('Ciudadela el sol','#direccion')
             ->type('3128049965','#telefono')
             ->type('sebastianext@gmail.com','#correo')
             ->press('Aceptar')
             ->see('Accion Procesada!');        
    }
}

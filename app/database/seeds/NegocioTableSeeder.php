<?php

class NegocioTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('negocios')->delete();//apaga tudo o que tem dentro por segurança

        Negocio::create(array(
            'nome' => '###',
        ));

        Negocio::create(array(
            'nome' => 'Bazar',
        ));

        Negocio::create(array(
            'nome' => 'Cabeleireiro',
        ));

        Negocio::create(array(
            'nome' => 'Pronto a vestir',
        ));

        Negocio::create(array(
            'nome' => 'Perfumaria',
        ));

        Negocio::create(array(
            'nome' => 'Joalharia',
        ));
    }
}
<?php

use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run() {
        $this->call('EventoTableSeeder');
        $this->call('UsuarioTableSeeder');
        $this->command->info('Seeds Successfull');
    }
}

class EventoTableSeeder extends Seeder  
{
    public function run()
    {
        DB::table('eventos')->delete();

        $dataAtual = date('Y-m-d H:i:s');

        Evento::create([
            'id' => 1,
            'st_nome' => 'Festa do Peao de Boiadeiro',
            'st_descricao' => 'Em sua 65 edicao, a Festa do Peao de Boiadeiro de Barretos acontecera de 18 a 28 de agosto de 2022, no Parque do Peao, em Barretos (SP). O maior evento da America Latina e realizado em uma area de mais de 2 milhoes de metros quadrados com infraestrutura completa para receber todos os atrativos que incluem o mais tradicional e melhor rodeio do pais em diferentes modalidades, quatro palcos com shows musicais, apresentacoes culturais, feira comercial, area de camping e muito mais. Em 2022 e em Barretos que vamos nos encontrar. Te esperamos!',
            'st_image' => '740_x_475_pixels_a5678da5-12c4-4572-8aa9-18cb5d2582d6.jpg',
            'st_categoria' => 'Sertanejo',
            'dt_criacao' => '2021-10-01',
            'dt_evento' => date('Y-m-d H:i:s',strtotime('+5 hour',strtotime($dataAtual))),
            'vl_preco' => 80
        ]);

        Evento::create([
            'id' => 2,
            'st_nome' => 'Camarote Bar Brahma',
            'st_descricao' => 'O Carnaval que vai entrar para historia ja vai comecar! O grande dia de soltar a voz, cair na folia e celebrar a vida do jeito que ela merece esta ai e voce vai poder curtir toda essa energia junto com a gente no lugar mais desejado do Carnaval de Sao Paulo. O Camarote Bar Brahma 2022 sera unico e cheio de surpresas que vao lhe proporcionar a melhor noite da sua vida! Vamos juntos vibrar em uma noite cheia de alegria, para matar a nossa saudade de sambar aqui no nosso cantinho de novo.',
            'st_image' => '740X475_V4_3d09297b-0044-420d-99ff-8a1f6a0b7497.jpg',
            'st_categoria' => 'Carnaval',
            'dt_criacao' => '2021-10-01',
            'dt_evento' => '2021-10-18 18:00:00',
            'vl_preco' => 120
        ]);

        Evento::create([
            'id' => 3,
            'st_nome' => 'Paula Toller',
            'st_descricao' => 'O repertorio contempla toda a sua carreira solo e no Kid Abelha. Como nao poderia ser diferente em um show de uma hit-maker, grandes classicos compoem o set-list, e o espectador podera ouvir, entre outras, ?Como eu quero?, ?Nada Sei?, ?Amanha e 23? e ?Lagrimas e Chuva? interpretadas por Toller com o auxilio luxuoso do lendario produtor Liminha (arranjos e violao), alem dos fabulosos Gustavo Camardella (violao e vocal), Pedro Dias (baixo e vocal), Ge Fonseca (teclados) e Adal Fonseca(bateria).',
            'st_image' => '3d09297b-0044-420d-99ff-8a1f6a0b7498.jpg',
            'st_categoria' => 'Show',
            'dt_criacao' => '2021-10-01',
            'dt_evento' => date('Y-m-d H:i:s',strtotime('+4 hour',strtotime($dataAtual))),
            'vl_preco' => 130
        ]);

        Evento::create([
            'id' => 4,
            'st_nome' => 'Thiago Ventura',
            'st_descricao' => 'Thiago Ventura e comediante e atualmente considerado o melhor do Brasil. Ele conseguiu notoriedade ao integrar o time dos "4 Amigos", ao lado de Afonso Padilha, Dihh Lopes e Marcio Donato. Juntos, eles fazem Stand Up Comedy por diversos locais. Os videos de humor deles no YouTube atingem milhoes de views.',
            'st_image' => '3d09297b-0044-420d-99ff-8a1f6a0b7499.jpg',
            'st_categoria' => 'Comedia',
            'dt_criacao' => '2021-10-01',
            'dt_evento' => '2021-10-18 18:00:00',
            'vl_preco' => 85
        ]);

        Evento::create([
            'id' => 5,
            'st_nome' => 'Vanessa Da Matta',
            'st_descricao' => 'Lorem ipsum dolor sit amet, voluptua iracundia an pri, his utinam principes dignissim ad. Ne nec dolore oblique nusquam, cu luptatum volutpat delicatissimi has.',
            'st_image' => '3d09297b-0044-420d-99ff-8a1f6a0b7418.jpg',
            'st_categoria' => 'MPB',
            'dt_criacao' => '2021-10-01',
            'dt_evento' => '2021-10-18 18:00:00',
            'vl_preco' => 75
        ]);

        Evento::create([
            'id' => 6,
            'st_nome' => 'Cinderella',
            'st_descricao' => 'Quem nunca sonhou com um principe encantado? Esse e um desejo universal e deu origem a uma serie de contos de fadas que se perpetuam de geracao em geracao. Nenhum deles, contudo, e mais famoso do que Cinderella, a gata borralheira que se transforma em princesa por um dia e encontra seu grande amor, gracas ao sapatinho de cristal perdido. ',
            'st_image' => '3d09297b-0044-420d-99ff-8a1f6a0b7417.jpg',
            'st_categoria' => 'Filme',
            'dt_criacao' => '2021-05-01',
            'dt_evento' => '2021-05-18 18:00:00',
            'vl_preco' => 120
        ]);
    }
}

class UsuarioTableSeeder extends Seeder  
{
    public function run()
    {
        DB::table('usuarios')->delete();

        Usuario::create([
            'id' => 1,
            'st_token' => app('hash')->make('348352207'),
            'st_nome' => 'Wilson Oliveira',
            'st_rg' => '348352207',
            'st_senha' => app('hash')->make('123456')
        ]);

        Usuario::create([
            'id' => 2,
            'st_token' => app('hash')->make('228352279'),
            'st_nome' => 'Vitor Matias',
            'st_rg' => '228352279',
            'st_senha' => app('hash')->make('123456')
        ]);

        Usuario::create([
            'id' => 3,
            'st_token' => app('hash')->make('458352208'),
            'st_nome' => 'Nicolas Almeida',
            'st_rg' => '458352208',
            'st_senha' => app('hash')->make('123456')
        ]);
    }
}
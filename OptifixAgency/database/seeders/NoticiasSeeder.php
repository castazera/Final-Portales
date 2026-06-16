<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NoticiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     DB::table('noticias')->insert([
        [
        'id' => 1,
        'titulo' => 'La inteligencia artificial revolucionará la medicina en 2025',
        'resumen' => 'Expertos predicen que la IA permitirá diagnósticos más precisos y tratamientos personalizados en el próximo año.',
        'contenido' => 'La inteligencia artificial está marcando un antes y un después en la historia de la tecnología médica. Herramientas como AlphaFold han permitido avances en biología molecular y el diseño de nuevos fármacos. En 2025, se espera que la IA sea fundamental para diagnósticos médicos y la personalización de tratamientos, siempre con el humano en el centro de la decisión.',
        'autor' => 'Francisco Herrera Triguero',
        'categoria' => 'Salud e IA',
        'estado' => 'publicado',
        'created_at' => now(),
        'updated_at' => now() ],
        [
        'id' => 2,
        'titulo' => 'Meta lanza Llama 3: el modelo de IA que arrasa en benchmarks',
        'resumen' => 'Meta presenta Llama 3, un modelo de IA de código abierto que supera a sus competidores en velocidad y eficiencia.',
        'contenido' => 'Meta ha lanzado Llama 3 en versiones de 8 y 70 mil millones de parámetros, logrando un rendimiento superior a modelos como Gemini y Mistral. Llama 3 es accesible en plataformas como Messenger, WhatsApp e Instagram, y representa un avance clave en la democratización de la IA.',
        'autor' => 'Javier Ruiz',
        'categoria' => 'Tecnología',
        'estado' => 'publicado',
        'created_at' => now(),
        'updated_at' => now() ],
        [
        'id' => 3,
        'titulo' => 'Google Workspace integra IA para crear videos y automatizar tareas',
        'resumen' => 'Google presenta nuevas funciones de IA en Workspace, incluyendo Google Vids y agentes personalizados para empresas.',
        'contenido' => 'Google Workspace incorpora Google Vids, una herramienta que permite crear videos a partir de documentos y diapositivas, además de nuevas funciones de IA para automatizar tareas y mejorar la productividad. Estas innovaciones buscan facilitar la vida laboral y aumentar la eficiencia en empresas de todo el mundo.',
        'autor' => 'Redacción El País',
        'categoria' => 'Automatización',
        'estado' => 'publicado',
        'created_at' => now(),
        'updated_at' => now() ],
        [
        'id' => 4,
        'titulo' => 'Desarrollan técnica para reducir el sesgo social en sistemas de IA',
        'resumen' => 'Investigadores de Oregon State University y Adobe crean FairDeDup, una técnica para entrenar IA de forma más justa.',
        'contenido' => 'FairDeDup es una nueva técnica de deduplicación de datos que permite entrenar sistemas de inteligencia artificial reduciendo los sesgos sociales. El método, presentado en la IEEE/CVF Conference on Computer Vision and Pattern Recognition, busca que la IA sea más justa y representativa, abordando problemas de diversidad y equidad.',
        'autor' => 'Steve Lundeberg',
        'categoria' => 'Ética y Sociedad',
        'estado' => 'publicado',
        'created_at' => now(),
        'updated_at' => now() ],
        [
        'id' => 5,
        'titulo' => 'OpenAI y Jony Ive se unen para crear dispositivos de IA',
        'resumen' => 'OpenAI adquiere la startup io, fundada por el diseñador del iPhone, para desarrollar nuevos productos de inteligencia artificial.',
        'contenido' => 'OpenAI ha comprado la empresa io, fundada por Jony Ive, el legendario diseñador del iPhone, por 6.500 millones de dólares. El objetivo es crear dispositivos innovadores que integren inteligencia artificial en la vida cotidiana, sumándose a la tendencia de grandes tecnológicas como Meta y Google.',
        'autor' => 'Miguel Jiménez',
        'categoria' => 'Innovación',
        'estado' => 'publicado',
        'created_at' => now(),
        'updated_at' => now()
        ]
     ]);
    }
}

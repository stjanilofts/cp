<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory;


function getImages($number) {
    $images = [];

    $dir = scandir(public_path('tmp'));

    $repository = [];

    foreach($dir as $k => $v) {
        if($v != '.' && $v != '..') {
            $arr = explode('.', $v);
            $extension = end($arr);
            $name = $arr[0];

            if(is_numeric($name)) {
                $repository[] = $v;
            }
        }
    }

    for($i = 1; $i < $number; $i++) {
        $repoCount = count($repository);

        $rand = (mt_rand(1, $repoCount) - 1);

        $filename = $repository[$rand];

        $file = public_path('tmp/'.$filename);

        $images[] = [
            'name' => $filename,
            'title' => $filename
        ];
    }

    return $images;
}


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Notendur
        \App\User::create([
            'name' => 'Netvistun',
            'email' => 'vinna@netvistun.is',
            'password' => bcrypt(env('NETVISTUN')),
            'remember_token' => str_random(10),
        ]);



        $vorur = [
            [
                'category_id' => 0,
                'title' => 'Ávaxtasýrupúðar',
                'content' => '',
                'images' => [
                    [
                        'name' => 'fruit-extract-pads-500x5001.png',
                        'title' => 'Ávaxtasýrupúðar',
                    ],
                ],
                'status' => 1,
                'options' => []
            ],
            [
                'category_id' => 0,
                'title' => 'Ferðasett skrúbb og sápa',
                'content' => '',
                'images' => [
                    [
                        'name' => 'body-bar-travel1.png',
                        'title' => 'Ferðasett skrúbb og sápa',
                    ],
                    [
                        'name' => 'small-travel-tube.png',
                        'title' => 'Ferðasett skrúbb og sápa',
                    ],
                ],
                'status' => 1,
                'options' => []
            ],
            [
                'category_id' => 0,
                'title' => 'Gjafasett Dömu',
                'content' => '',
                'images' => [
                    [
                        'name' => 'womens-gift-set.png',
                        'title' => 'Gjafasett Dömu',
                    ],
                ],
                'status' => 1,
                'options' => []
            ],
            [
                'category_id' => 0,
                'title' => 'Gjafasett Herra',
                'content' => '',
                'images' => [
                    [
                        'name' => 'mens-gift-set-500x5001.png',
                        'title' => 'Gjafasett Herra',
                    ],
                ],
                'status' => 1,
                'options' => []
            ],
            [
                'category_id' => 0,
                'title' => 'Húðslípikrem Dömu',
                'content' => '',
                'images' => [
                    [
                        'name' => 'womens-tube.png',
                        'title' => 'Húðslípikrem Dömu',
                    ],
                ],
                'status' => 1,
                'options' => []
            ],
            [
                'category_id' => 0,
                'title' => 'Húðslípikrem Herra',
                'content' => '',
                'images' => [
                    [
                        'name' => 'microdermabrasion-exfo-men-2.png',
                        'title' => 'Húðslípikrem Herra',
                    ],
                ],
                'status' => 1,
                'options' => []
            ],
            [
                'category_id' => 0,
                'title' => 'Húðslípisápa stór Lemongras',
                'content' => '',
                'images' => [
                    [
                        'name' => 'hudslipisapa-stor-lemongras.jpg',
                        'title' => 'Húðslípisápa stór Lemongras',
                    ],
                ],
                'status' => 1,
                'options' => []
            ],
            [
                'category_id' => 0,
                'title' => 'Húðslípisápa stór Lavender',
                'content' => '',
                'images' => [
                    [
                        'name' => 'lavendar-soap.png',
                        'title' => 'Húðslípisápa stór Lavender',
                    ],
                ],
                'status' => 1,
                'options' => []
            ],
            [
                'category_id' => 0,
                'title' => 'Varaskrúbbur og Varalyftir',
                'content' => '',
                'images' => [
                    [
                        'name' => 'lip-exfoliator1.png',
                        'title' => 'Varaskrúbbur og Varalyftir',
                    ],
                    [
                        'name' => 'lip-plumper.png',
                        'title' => 'Varaskrúbbur og Varalyftir',
                    ],
                    [
                        'name' => 'lips-plump-tripple.png',
                        'title' => 'Varaskrúbbur og Varalyftir',
                    ],
                ],
                'status' => 1,
                'options' => []
            ],
        ];



        $faker = Faker\Factory::create();

        function makePage($page = []) {
            $page['slug'] = isset($page['slug']) ? $page['slug'] : str_slug($page['title']);
            $page['images'] = isset($page['images']) ? $page['images'] : [];

            return factory(\App\Page::class)->create($page);
        }

        function makeProduct($page = []) {
            $page['slug'] = isset($page['slug']) ? $page['slug'] : str_slug($page['title']);
            $page['images'] = isset($page['images']) ? $page['images'] : [];

            return factory(\App\Product::class)->create($page);
        }

        function makeCategory($page = []) {
            $page['slug'] = isset($page['slug']) ? $page['slug'] : str_slug($page['title']);
            $page['images'] = isset($page['images']) ? $page['images'] : [];

            return factory(\App\Category::class)->create($page);
        }

        $pages = [
            'Vörur', 'Af hverju húðslípun?', 'Hafa samband'
        ];

        $um_okkur = makePage(['title' => 'Um Crystal Peel', 'slug' => 'um-okkur']);

        makePage(['slug' => 'starfsfolk', 'title' => 'Starfsfólk', 'parent_id' => $um_okkur->id]);
        makePage([
            'slug' => 'stadsetning',
            'title' => 'Staðsetning',
            'parent_id' => $um_okkur->id,
            'content' => '<iframe width="100%" height="400" frameborder="0" src="http://ja.is/kort/embedded/?zoom=10&x=359824&y=406933&layer=map&q=Kleifar%C3%A1s+ehf+heildverslun%2C+%C3%81rm%C3%BAla+22"></iframe>',
        ]);

        foreach($pages as $page) {
            makePage(['title' => $page]);
        }

        $pics = ['slide1.jpg', 'slide2.jpg', 'slide3.jpg', 'slide4.jpg', 'slide5.jpg'];
        $forsidumyndir = makePage(['title' => 'Forsíðumyndir', 'slug' => '_forsidumyndir', 'status' => 0]);
        foreach($pics as $k => $v) {
            makePage(['title' => $v, 'parent_id' => $forsidumyndir->id, 'images' => [['name'=>$v]]]);
        }

        $flokkur1 = makeCategory(['title' => 'Flokkur 1', 'images' => getImages(3)]);
        $flokkur2 = makeCategory(['title' => 'Flokkur 2', 'images' => getImages(3)]);

        foreach($vorur as $vara) {
            makeProduct($vara);
        }

        Model::reguard();
    }
}
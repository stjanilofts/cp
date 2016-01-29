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
                'content' => '<p>Púðarnir frá Crystal Peel eru ríkir af C vítamíni og öðrum andoxunarefnum ásamt ávaxtasýrum.</p>
<p>Inniheldur R-arbutin og hyauluronic acid.</p>
<p>Endurnýja húðina, ver gegn sindurefnum , gefa húðinni ljóma, stinna og slétta og auka frumuendurnýjun.</p>
<p>Frábært að nota með húðslípikreminu dagana sem þú notar það ekki.</p>',
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
                'content' => '
<h3>Húðslípikrem</h3>
<p>Auðveld og fljót leið til að</p>
<ul>
<li>Jafna húðlit og vinna á litamismun</li>
<li>Stinnir og þéttir húð</li>
<li>Eykur Collagen framleiðslu</li>
<li>Minnkar fínar línur og hrukkur</li>
<li>Verndar húðina og kemur í veg fyrir ótímabæra öldrun</li>
<li>Minnkar svitaholur og dregur saman húðina</li></ul>

<p>Gerir allar aðrar vörur sem þú notar eftirá virkari.</p>

<h3>Húðslípisápa fyrir líkamann</h3>
<ul>
<li>Örvar og endurnýjar</li>
<li>Tekur í burtu daufa,þurra húð og gerir hana mýkri og unglegri.</li>
<li>Kemur í veg fyrir inngróin hár og vinnur á cellolite/appelsínuhúð.</li>
<li>Hjálpar til við t.d þurra olnboga og excem</li>
<li>Hjálpar til að jafna húðina</li>
<li>Náttúruleg vegetable soap base with olive oil, shea butter, and aloe gel</li>
</ul>',
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
                'content' => '
<h3>Húðslípikrem</h3>
<p>Auðveld og fljót leið til að</p>
<ul>
<li>Jafna húðlit og vinna á litamismun</li>
<li>Stinnir og þéttir húð</li>
<li>Eykur Collagen framleiðslu</li>
<li>Minnkar fínar línur og hrukkur</li>
<li>Verndar húðina og kemur í veg fyrir ótímabæra öldrun</li>
<li>Minnkar svitaholur og dregur saman húðina</li></ul>

<p>Gerir allar aðrar vörur sem þú notar eftirá virkari.</p>

<h3>Húðslípisápa fyrir líkamann</h3>
<ul>
<li>Örvar og endurnýjar</li>
<li>Tekur í burtu daufa,þurra húð og gerir hana mýkri og unglegri.</li>
<li>Kemur í veg fyrir inngróin hár og vinnur á cellolite/appelsínuhúð.</li>
<li>Hjálpar til við t.d þurra olnboga og excem</li>
<li>Hjálpar til að jafna húðina</li>
<li>Náttúruleg vegetable soap base with olive oil, shea butter, and aloe gel</li>
</ul>',
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
                'content' => '
<h3>Crystal Peel húðslípikrem fyrir herra</h3>
<p><strong>Pre-shave formúla fyrir herra.</strong></p>

<ul>
<li>Virkar sem hreinsir og skrúbb fyrir herrana</li>
<li>Hefur sannað sig í að vinna gegn rakbólum og inngrónum hárum.</li>
<li>Með þessari virku vöru verður raksturinn sem aldrei fyrr</li>
<li>Bætir áferð húðarinnar og gefur hreinleika</li>
<li>Sjáanlegur árangur með fyrstu notkun</li>
</ul>

<p>Þessi virka húðmeðferð er engri lík og áferð húðarinnar verður dásamleg. Mælum með góðu rakakremi eftir meðferðina með ríkum sólarvarnarstuðul þar sem er verið að vinna mikið á yfirborði húðarinnar.</p>

<h3>Crystal Peel Microdermobration soap</h3>
<p><strong>Microdermabrasion exfoliating soap for the body.</strong></p>

<ul>
<li>Örvar og endurnýjar</li>
<li>Tekur í burtu daufa,þurra húð og gefur mýkri og unglegri húð.</li>
<li>Kemur í veg fyrir inngróin hár og vinnur á cellolite/appelsínuhúð.</li>
<li>Hjálpar til við t.d þurra olnboga og excem</li>
<li>Hjálpar til að jafna húðina</li>
<li>Náttúruleg vegetable soap base with olive oil, shea butter, and aloe gel</li>
<li>Virk innihaldsefni : magnesium oxide crystals and sterile, medical-grade corundum crystals</li>
</ul>

<p>Húðslípisápan er byltingarkennd skrúbbmeðferð fyrir líkamann.</p>
<p>Sápa til að nota í sturtu eða baði.</p>
<p>Inniheldur korundum og magnesium kristalla úr dauðahafinu.</p>
<p>Nuddað inn í húðina með hringlaga hreyfingum. Leggið áherslu á erfið svæði.</p>
<p>Vinnur vel á appelsínuhúð/cellolite, stinnir og styrkir og endurnýjar húðina strax í fyrstu meðferð.</p>
<p>Inngróin hár og húð með mikla örvefssmyndun - virkar vel það.</p>
<p>Virknin er æðisleg af þessari vöru og hefur hún reynst einnig vel fyrir psoriasis, þurra olnboga, fætur ásamt því að vera besta undirstöðumeðferðin fyrir brúnkukrem eða slíkar vörur/meðferðir,</p>
<p>Húðslípisápan er til í lavender og lemongrass.</p>
',
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
                'content' => 
'
Auðveld og fljót leið til að
<ul>
<li>Jafna húðlit og vinna á litamismun</li>
<li>Stinnir og þéttir húð</li>
<li>Eykur Collagen framleiðslu</li>
<li>Minnkar fínar línur og hrukkur</li>
<li>Verndar húðina og kemur í veg fyrir ótímabæra öldrun</li>
<li>Minnkar svitaholur og dregur saman húðina</li>
</ul>

<p>Gerir allar aðrar vörur sem þú notar eftirá virkari.</p>

<p>Húðslípikremið frá Crystal Peel er unnið úr vandaðri formúlu í vörum sem eru nauðsynlegar fyrir grunn allrar húðumhirðu.<br>
Þær eru ætlaðar sem virk meðferð til heimanotkunnar og eru fyrsta skrefið að betri húð.<br>
Húðslípikremið er hægt að nota fyrir allar húðgerðir því að þú stjórnar hversu mikið þú nuddar inn i húðina.<br>
Húðslípikremið ber sjánlegan árangur strax, jafna og sléttir húðina, minnkar fínar línur, eykur ljóma í húðinni og vinnur vel á ýmsum húðvandamálum s.s örvefur, bólur, opnar húðholur ásamt því að vinna á litablettum i húð t.d eftir sól.<br>
Með því að nudda kreminu inn í húðina stuðlar þú að endurvakningu í að örvar kollagen framleiðslu sem heldur húðinni stinnri og unglegri.<br>
Notist 2-3 í viku á andlit og háls, ásamt baki.</p>
',
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
                'content' => '
<p><strong>Crystal Peel Exfoliation krem fyrir herra</strong></p>
<p>Pre-shave formúla fyrir herra.</p>

<ul>
<li>Virkar sem hreinsir og skrúbb fyrir herra</li>
<li>Hefur sannað sig í að vinna gegn rakbólum og inngrónum hárum.</li>
<li>Með þessari virku vöru verður raksturinn sem aldrei fyrr</li>
<li>Bætir áferð húðarinnar og gefur hreinleika</li>
<li>Sjáanlegur árangur með fyrstu notkun</li>
</ul>

<p>Þessi virka húðmeðferð er engri lík og áferð húðarinnar verður dásamleg. Mælum með góðu rakakremi eftir meðferðina með ríkum sólarvarnarstuðul þar sem er verið að vinna mikið á yfirborði húðarinnar.</p>
',
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
                'content' => '
<p><strong>Húðslípi-skrúbbsápa fyrir líkamann</strong></p>
<ul>
<li>Örvar og endurnýjar</li>
<li>Tekur í burtu daufa,þurra húð og gefur mýkri og unglegri húð.</li>
<li>Kemur í veg fyrir inngróin hár og vinnur á cellolite/appelsínuhúð.</li>
<li>Hjálpar til við t.d þurra olnboga og excem</li>
<li>Hjálpar til að jafna húðina</li>
<li>Náttúruleg vegetable soap base with olive oil, shea butter og aloe gel</li>
</ul>
<p>Virk innihaldsefni  magnesium oxide crystals and sterile, medical-grade corundum crystals</p>

<p>Húðslípisápan er byltingarkennd skrúbbmeðferð fyrir líkamann.<br>
Sápa til að nota í sturtu eða baði.<br>
Inniheldur korundum og magnesium kristalla úr dauðahafinu.<br>
Nuddað inn í húðina með hringlaga hreyfingum. Leggið áherslu á erfið svæði.<br>
Vinnur vel á appelsínuhúð/cellolite, stinnir og styrkir og endurnýjar húðina strax í fyrstu meðferð.<br>
Inngróin hár og húð með mikla örvefssmyndun - virkar vel það.<br>
Virknin er æðisleg af þessari vöru og hefur hún reynst einnig vel fyrir psoriasis, þurra olnboga, fætur ásamt því að vera besta undirstöðumeðferðin fyrir brúnkukrem eða slíkar vörur/meðferðir.</p>
<p>Húðslípisápan er til í lavender og lemongrass.</p>',
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
                'content' => '
<p><strong>Húðslípi-skrúbbsápa fyrir líkamann</strong></p>
<ul>
<li>Örvar og endurnýjar</li>
<li>Tekur í burtu daufa,þurra húð og gefur mýkri og unglegri húð.</li>
<li>Kemur í veg fyrir inngróin hár og vinnur á cellolite/appelsínuhúð.</li>
<li>Hjálpar til við t.d þurra olnboga og excem</li>
<li>Hjálpar til að jafna húðina</li>
<li>Náttúruleg vegetable soap base with olive oil, shea butter og aloe gel</li>
</ul>
<p>Virk innihaldsefni  magnesium oxide crystals and sterile, medical-grade corundum crystals</p>

<p>Húðslípisápan er byltingarkennd skrúbbmeðferð fyrir líkamann.<br>
Sápa til að nota í sturtu eða baði.<br>
Inniheldur korundum og magnesium kristalla úr dauðahafinu.<br>
Nuddað inn í húðina með hringlaga hreyfingum. Leggið áherslu á erfið svæði.<br>
Vinnur vel á appelsínuhúð/cellolite, stinnir og styrkir og endurnýjar húðina strax í fyrstu meðferð.<br>
Inngróin hár og húð með mikla örvefssmyndun - virkar vel það.<br>
Virknin er æðisleg af þessari vöru og hefur hún reynst einnig vel fyrir psoriasis, þurra olnboga, fætur ásamt því að vera besta undirstöðumeðferðin fyrir brúnkukrem eða slíkar vörur/meðferðir.</p>
<p>Húðslípisápan er til í lavender og lemongrass.</p>',
                'title' => 'Húðslípisápa stór Lavender',
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
                'content' => '
<p><strong>Lip plumping duo eða varatvenna fyrir fylltari varir</strong></p>
<p>Þetta sett inniheldur varaskrúbbinn og varaplumperinn Saman gefa þessar vörur frábæran árangur í átt að flottari vörum.</p>
<p>Inniheldur:</p>
<ul>
<li>Crystal Peel Lip Renewal Exfoliator</li>
<li>Crystal Peel Lip Lift Plumper</li>
</ul>

<p>Þessi frábæra tvenna er góð fyrir þær sem vilja nota náttúrulega aðferð með því að gera varirnar fylltari. Það má nota varaskrúbbinn aðeins út fyrir varirnar líka ásamt því að nudda yfir sjálfar varirnar. Nudda svo létt yfir með fingrum til að strjúka það mesta af og setja svo glossinn á eftir sem gefur fyllinguna. Einnig frábær lausn fyrir sprungnar varir.</p>
',
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
            $page['tech'] = isset($page['tech']) ? $page['tech'] : '';

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
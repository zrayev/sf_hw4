<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller

{
    private $countriesData = [
        'en' => [
            'name' => 'England',
            'text' => 'England is a country that is part of the United Kingdom.It shares land borders with Scotland to the north and Wales to the west. The Irish Sea lies northwest of England and the Celtic Sea lies to the southwest. England is separated from continental Europe by the North Sea to the east and the English Channel to the south. The country covers much of the central and southern part of the island of Great Britain, which lies in the North Atlantic; and includes over 100 smaller islands such as the Isles of Scilly, and the Isle of Wight.',
            'img'  => 'bundles/app/img/england.png'
        ],
        'fr' => [
            'name' => 'France',
            'text' => 'France, officially the French Republic (French: République française),is a sovereign state comprising territory in western Europe and several overseas regions and territories.The European part of France, called Metropolitan France, extends from the Mediterranean Sea to the English Channel and the North Sea, and from the Rhine to the Atlantic Ocean. France spans 640,679 square kilometres (247,368 sq mi) and has a total population of 67 million.It is a unitary semi-presidential republic with the capital in Paris, the country\'s largest city and main cultural and commercial centre. The Constitution of France establishes the state as secular and democratic, with its sovereignty derived from the people.',
            'img' => 'bundles/app/img/france.png'
        ],
        'al' => [
            'name' => 'Albania',
            'text' => 'Albania is a country in Southeastern Europe. It is bordered by Montenegro to the northwest, Kosovo[a] to the northeast, the Republic of Macedonia to the east, and Greece to the south and southeast. It has a coast on the Adriatic Sea to the west and on the Ionian Sea to the southwest. It is less than 72 km (45 mi) from Italy, across the Strait of Otranto which connects the Adriatic Sea to the Ionian Sea.',
            'img' => 'bundles/app/img/albania.png'
        ],
        'at' => [
            'name' => 'Austria',
            'text' => 'Austria is a federal republic and a landlocked country of over 8.5 million people in Central Europe. It is bordered by the Czech Republic and Germany to the north, Hungary and Slovakia to the east, Slovenia and Italy to the south, and Switzerland and Liechtenstein to the west. The territory of Austria covers 83,879 square kilometres (32,386 sq mi). Austria\'s terrain is highly mountainous, lying within the Alps; only 32% of the country is below 500 metres (1,640 ft), and its highest point is 3,798 metres (12,461 ft). The majority of the population speak local Bavarian dialects of German as their native language,[10] and Austrian German in its standard form is the country\'s official language. Other local official languages are Hungarian, Burgenland Croatian, and Slovene.',
            'img' => 'bundles/app/img/austria.png'
        ],
        'be' => [
            'name' => 'Belgium',
            'text' => 'Belgium, is a sovereign state in Western Europe. It is a founding member of the European Union and hosts several of the EU\'s official seats and as well as the headquarters of many major international organizations such as NATO. Belgium covers an area of 30,528 square kilometres (11,787 sq mi) and has a population of about 11 million people.',
            'img' => 'bundles/app/img/belgium.png'
        ],
        'hr' => [
            'name' => 'Croatia',
            'text' => 'Croatia is a sovereign state at the crossroads of Central Europe, Southeast Europe, and the Mediterranean. Its capital city is Zagreb, which forms one of the country\'s primary subdivisions, along with its twenty counties. Croatia covers 56,594 square kilometres (21,851 square miles) and has diverse, mostly continental and Mediterranean climates. Croatia\'s Adriatic Sea coast contains more than a thousand islands. The country\'s population is 4.28 million, most of whom are Croats, with the most common religious denomination being Roman Catholicism.',
            'img' => 'bundles/app/img/croatia.png'
        ],
        'cs' => [
            'name' => 'Czech',
            'text' => 'The Czech Republic  is a landlocked country in Central Europe bordered by Germany to the west, Austria to the south, Slovakia to the southeast and Poland to the northeast. The capital and largest city, Prague, has over 1.2 million residents. The Czech Republic includes the historical territories of Bohemia, Moravia, and Czech Silesia.',
            'img' => 'bundles/app/img/czech.png'
        ],
         'de' => [
            'name' => 'Germany',
            'text' => 'Germany (is a federal parliamentary republic in western-central Europe. It includes 16 constituent states and covers an area of 357,021 square kilometres (137,847 sq mi) with a largely temperate seasonal climate. Its capital and largest city is Berlin. With 81 million inhabitants, Germany is the most populous member state in the European Union. After the United States, it is the second most popular migration destination in the world.',
            'img' => 'bundles/app/img/germany.png'
        ],
         'hu' => [
            'name' => 'Hungary',
            'text' => 'Hungary  is a landlocked country in Central Europe. It is situated in the Carpathian Basin and is bordered by Slovakia to the north, Romania to the east, Serbia to the south, Croatia to the southwest, Slovenia to the west, Austria to the northwest, and Ukraine to the northeast. The country s capital and largest city is Budapest. Hungary is a member of the European Union, NATO, the OECD, the Visegrád Group, and the Schengen Area. The official language is Hungarian, which is the most widely spoken non-Indo-European language in Europe.',
            'img' => 'bundles/app/img/hungary.png'
        ],
         'is' => [
            'name' => 'Iceland',
            'text' => 'Iceland also called the Republic of Iceland,[Note 1] is a Nordic island country between the North Atlantic and the Arctic Ocean. It has a population of 329,100 and an area of 103,000 km2 (40,000 sq mi), making it the most sparsely populated country in Europe. The capital and largest city is Reykjavík. Reykjavík and the surrounding areas in the southwest of the country are home to over two-thirds of the population. Iceland is volcanically and geologically active. The interior consists of a plateau characterised by sand and lava fields, mountains and glaciers, while many glacial rivers flow to the sea through the lowlands. Iceland is warmed by the Gulf Stream and has a temperate climate, despite a high latitude just outside the Arctic Circle. Its high latitude and marine influence still keeps summers chilly, with most of the archipelago having a tundra climate.',
            'img' => 'bundles/app/img/iceland.png'
        ],
         'ie' => [
            'name' => 'Ireland',
            'text' => 'Ireland  is an island in the North Atlantic separated from Great Britain to its east by the North Channel, the Irish Sea, and St Georges Channel. It is the second-largest island of the British Isles, trailing only Great Britain, the third-largest in Europe, and the twentieth-largest on Earth.',
            'img' => 'bundles/app/img/ireland.png'
        ],
         'it' => [
            'name' => 'Italy',
            'text' => 'taly is a unitary parliamentary republic in Europe.Italy covers an area of 301,338 km2 (116,347 sq mi) and has a largely temperate climate; due to its shape, it is often referred to in Italy as lo Stivale (the Boot). With 61 million inhabitants, it is the 4th most populous EU member state. Located in the heart of the Mediterranean Sea, Italy shares open land borders with France, Switzerland, Austria, Slovenia, San Marino and Vatican City.',
            'img' => 'bundles/app/img/italy.png'
        ],
         'ie1' => [
            'name' => 'Northern Ireland',
            'text' => 'Northern Ireland (is a constituent unit of the United Kingdom of Great Britain and Northern Ireland in the northeast of the island of Ireland. It is variously described as a country, province, region, or "part" of the United Kingdom, amongst other terms. Northern Ireland shares a border to the south and west with the Republic of Ireland. In 2011, its population was 1,810,863, constituting about 30% of the island\'s total population and about 3% of the UK\'s population. Established by the Northern Ireland Act 1998 as part of the Good Friday Agreement, the Northern Ireland Assembly holds responsibility for a range of devolved policy matters, while other areas are reserved for the British government. Northern Ireland co-operates with the Republic of Ireland in some areas, and the Agreement granted the Republic the ability to "put forward views and proposals" with "determined efforts to resolve disagreements between [the two governments]".',
            'img' => 'bundles/app/img/northern_ireland.png'
        ],
         'pl' => [
            'name' => 'Poland',
            'text' => 'Poland  is a country in Central Europe, bordered by Germany to the west; the Czech Republic and Slovakia to the south; Ukraine and Belarus to the east; and the Baltic Sea, Kaliningrad Oblast (a Russian exclave) and Lithuania to the north. The total area of Poland is 312,679 square kilometres (120,726 sq mi), making it the 71st largest country in the world and the 9th largest in Europe. With a population of over 38.5 million people Poland is the 34th most populous country in the world,the 8th most populous country in Europe and the sixth most populous member of the European Union, as well as the most populous post-communist member of the European Union. Poland is a unitary state divided into 16 administrative subdivisions.',
            'img' => 'bundles/app/img/poland.png'
        ],
         'pt' => [
            'name' => 'Portugal',
            'text' => 'Portugal  is a country on the Iberian Peninsula, in southwestern Europe. It is the westernmost country of mainland Europe, being bordered by the Atlantic Ocean to the west and south and by Spain to the north and east. The Portugal-Spain border is 1,214 km (754 mi) long and considered the longest uninterrupted border within the European Union. The republic also holds sovereignty over the Atlantic archipelagos of the Azores and Madeira, both autonomous regions with their own regional governments.',
            'img' => 'bundles/app/img/portugal.png'
        ],
         'ro' => [
            'name' => 'Romania',
            'text' => 'Romania is a unitary semi-presidential republic located in Southeastern Europe, bordering the Black Sea, between Bulgaria and Ukraine. It also borders Hungary, Serbia, and Moldova. It covers 238,391 square kilometres (92,043 sq mi) and has a temperate-continental climate. With its 19.94 million inhabitants, it is the seventh most populous member state of the European Union. Its capital and largest city, Bucharest, is the sixth largest city in the EU.  The River Danube, which is Europe s second longest river after the Volga, rises in Germany and flows southeastwards for a distance of 2,857 km course through ten countries before emptying in Romanias Danube Delta. Some of its 1,075 km length bordering the country drains the whole of it. The Carpathian Mountains (the tallest peak is Moldoveanu at 2,544 m, 8346 ft) cross Romania from the north to the southwest.',
            'img' => 'bundles/app/img/romania.png'
        ],
         'ru' => [
            'name' => 'Russia',
            'text' => 'Russia is a country in northern Eurasia. It is a federal semi-presidential republic. At 17,075,400 square kilometres (6,592,800 sq mi), Russia is the largest country in the world, covering more than one-eighth of the Earths inhabited land area. Russia is also the worlds ninth most populous country with nearly 144 million people in November 2014.',
            'img' => 'bundles/app/img/russia.png'
        ],
         'sk' => [
            'name' => 'Slovakia',
            'text' => 'Slovakia is a country in Central Europe. It is bordered by the Czech Republic and Austria to the west, Poland to the north, Ukraine to the east and Hungary to the south. Slovakias territory spans about 49,000 square kilometres (19,000 sq mi) and is mostly mountainous. The population is over 5 million and comprises mostly ethnic Slovaks. The capital and largest city is Bratislava. The official language is Slovak, a member of the Slavic language family.',
            'img' => 'bundles/app/img/slovakia.png'
        ],
         'es' => [
            'name' => 'Spain',
            'text' => 'Spain is a sovereign state largely located on the Iberian Peninsula in southwestern Europe, with a small section of its territory located on the African continent. Its mainland is bordered to the south and east by the Mediterranean Sea except for a small land boundary with Gibraltar; to the north and northeast by France, Andorra, and the Bay of Biscay; and to the west and northwest by Portugal and the Atlantic Ocean. Along with France and Morocco, it is one of only three countries to have both Atlantic and Mediterranean coastlines. Extending to 1,214 km (754 mi), the Portugal–Spain border is the longest uninterrupted border within the European Union.',
            'img' => 'bundles/app/img/spain.png'
        ],
         'se' => [
            'name' => 'Sweden',
            'text' => 'Sweden is a Scandinavian country in Northern Europe. It borders Norway and Finland, and is connected to Denmark by a bridge-tunnel across the Öresund. At 450,295 square kilometres (173,860 sq mi), Sweden is the third-largest country in the European Union by area, with a total population of over 9.8 million. Sweden consequently has a low population density of 21 inhabitants per square kilometre (54/sq mi), with the highest concentration in the southern half of the country. Approximately 85% of the population lives in urban areas. Southern Sweden is predominantly agricultural, while the north is heavily forested. Sweden is part of the geographical area of Fennoscandia.',
            'img' => 'bundles/app/img/sweden.png'
        ],
         'ch' => [
            'name' => 'Switzerland',
            'text' => 'Switzerland ( is a country in Europe. While still named the "Swiss Confederation" for historical reasons, modern Switzerland is a federal directorial republic consisting of 26 cantons, with Bern as the seat of the federal authorities, called Bundesstadt ("federal city"). The country is situated in Western and Central Europe,where it is bordered by Italy to the south, France to the west, Germany to the north, and Austria and Liechtenstein to the east. Switzerland is a landlocked country geographically divided between the Alps, the Swiss Plateau and the Jura, spanning an area of 41,285 km2 (15,940 sq mi). While the Alps occupy the greater part of the territory, the Swiss population of approximately 8 million people is concentrated mostly on the Plateau, where the largest cities are to be found; among them are the two global and economic centres, Zürich and Geneva.',
            'img' => 'bundles/app/img/switzerland.png'
        ],
         'tr' => [
            'name' => 'Turkey',
            'text' => 'Turkey is a parliamentary republic in Eurasia, largely located in Western Asia, with the smaller portion of Eastern Thrace in Southeast Europe. Turkey is bordered by eight countries: Syria and Iraq to the south; Iran, Armenia, and the Azerbaijani exclave of Nakhchivan to the east; Georgia to the northeast; Bulgaria to the northwest; and Greece to the west. The Black Sea is to the north, the Mediterranean Sea to the south, and the Aegean Sea to the west. The Bosphorus, the Sea of Marmara, and the Dardanelles (which together form the Turkish Straits) demarcate the boundary between Thrace and Anatolia; they also separate Europe and Asia. Turkeys location at the crossroads of Europe and Asia makes it a country of significant geostrategic importance.',
            'img' => 'bundles/app/img/turkey.png'
        ],
         'ua' => [
            'name' => 'Ukraine',
            'text' => 'Ukraine  is a country in Eastern Europe,bordered by Russia to the east and northeast, Belarus to the northwest, Poland and Slovakia to the west, Hungary, Romania, and Moldova to the southwest, and the Black Sea and Sea of Azov to the south and southeast, respectively. It has an area of 603,628 km2 (233,062 sq mi), making it the largest country entirely within Europe and the 46th largest country in the world. With a population of about 44.5 million, Ukraine is the 32nd most populous country in the world.',
            'img' => 'bundles/app/img/ukraine.png'
        ],
         'wales' => [
            'name' => 'Wales',
            'text' => 'Wales is a country that is part of the United Kingdom and the island of Great Britain, bordered by England to its east, the Irish Sea to its north and west, and the Bristol Channel to its south. It had a population in 2011 of 3,063,456 and has a total area of 20,779 km2 (8,023 sq mi). Wales has over 1,680 miles (2,700 km) of coastline and is largely mountainous, with its higher peaks in the north and central areas, including Snowdon (Yr Wyddfa), its highest summit. The country lies within the north temperate zone and has a changeable, maritime climate.',
            'img' => 'bundles/app/img/wales.png'
        ],


    ];

    /**
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig', [
            'countries' => $this->countriesData,
        ]);
    }
}

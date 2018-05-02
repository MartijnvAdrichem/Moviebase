<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\Actor;
use App\Genre;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        //$this->genres();

        $BenedictCumberbatch = Actor::create([
            'firstname' => 'Benedict',
            'prefix' => null,
            'lastname' => 'Cumberbatch',
            'biography' => 'Benedict Timothy Carlton Cumberbatch was born and raised in London, England. His parents, Wanda Ventham and Timothy Carlton (Timothy Carlton Congdon Cumberbatch), are both actors. He is a grandson of submarine commander Henry Carlton Cumberbatch, and a great-grandson of diplomat Henry Arnold Cumberbatch CMG. Cumberbatch attended Brambletye School and Harrow School. Whilst at Harrow, he had an arts scholarship and painted large oil canvases. It\'s also where he began acting. After he finished school, he took a year off to volunteer as an English teacher in a Tibetan monastery in Darjeeling, India. On his return, he studied drama at Manchester University. He continued his training as an actor at the London Academy of Music and Dramatic Art graduating with an M.A. in Classical Acting. By the time he had completed his studies, he already had an agent.',
            'birthday' => '1976-7-19',
            'profilephoto' => 'benedict_cumberbatch.jpg'
            ]);
        $BenedictCumberbatch->save();

        $ChiwetelEjiofor = Actor::create([
            'firstname' => 'Chiwetel',
            'prefix' => null,
            'lastname' => 'Ejiofor',
            'biography' => 'English actor Chiwetel Ejiofor is renowned for his portrayal of Solomon Northup in 12 Years a Slave (2013), for which he received Academy Award and Golden Globe Award nominations, along with the BAFTA Award for Best Actor. He is also known for playing Okwe in Dirty Pretty Things (2002), the Operative in Serenity (2005), Lola in Kinky Boots (2005), Luke in Children of Men (2006), Dr. Adrian Helmsley in 2012 (2009) and Dr. Vincent Kapoor in The Martian (2015).',
            'birthday' => '1977-7-10',
            'profilephoto' => 'Chiwetel Ejiofor.jpg'
            ]);
        $ChiwetelEjiofor->save();

        $RachelMcAdams = Actor::create([
            'firstname' => 'Rachel',
            'prefix' => null,
            'lastname' => 'McAdams',
            'biography' => 'Rachel Anne McAdams was born on November 17, 1978 in London, Ontario, Canada, to Sandra Kay (Gale), a nurse, and Lance Frederick McAdams, a truck driver and furniture mover. She is of English, Welsh, Irish, and Scottish descent. Rachel became involved with acting as a teenager and by the age of 13 was performing in Shakespearean productions in summer theater camp; she went on to graduate with honors with a BFA degree in Theater from York University. After her debut in an episode of Disney\'s The Famous Jett Jackson (1998), she co-starred in the Canadian TV series Slings and Arrows (2003), a comedy-drama about the trials and travails of a Shakespearean theater group, and won a Gemini award for her performance in 2003.',
            'birthday' => '1978-11-17',
            'profilephoto' => 'Rachel McAdams.jpg'
            ]);
        $RachelMcAdams->save();

        $BenedictWong = Actor::create([
            'firstname' => 'Benedict',
            'prefix' => null,
            'lastname' => 'Wong',
            'biography' => 'Benedict Wong was born in 1970 in Manchester, England. He is an actor and writer, known for Avengers: Infinity War (2018), Doctor Strange (2016) and The Martian (2015).',
            'birthday' => '1971-6-3',
            'profilephoto' => 'Benedict Wong.jpg'
            ]);
        $BenedictWong->save();

        $MadsMikkelsen = Actor::create([
            'firstname' => 'Mads',
            'prefix' => null,
            'lastname' => 'Mikkelsen',
            'biography' => 'Mads Mikkelsen is a synonym to the great success the Danish film industry has had since the mid-1990s. He was born in Østerbro, Copenhagen, to Bente Christiansen, a nurse, and Henning Mikkelsen, a banker.',
            'birthday' => '1965-11-22',
            'profilephoto' => 'Mads Mikkelsen.jpg'
            ]);
        $MadsMikkelsen->save();

        $TildaSwinton = Actor::create([
            'firstname' => 'Tilda',
            'prefix' => null,
            'lastname' => 'Swinton',
            'biography' => 'She was born Katherine Mathilda Swinton on November 5, 1960, in London, England. Her mother, Judith Balfour, Lady Swinton (née Killen), was Australian, and her father, Major-General Sir John Swinton, an army officer, was English-born. Her ancestry is Scottish, Northern Irish, and English, including a long tapestry of prominent Scottish ancestors. Born into a patrician military family, she was educated at an English and a Scottish boarding school. Tilda subsequently studied Social and Political Science at Cambridge University and graduated in 1983 with a degree in English Literature. During her time as a student, she performed countless stage productions and proceeded to work for a season in the Royal Shakespeare Company.',
            'birthday' => '1960-11-5',
            'profilephoto' => 'Tilda Swinton.jpg'
            ]);
        $TildaSwinton->save();

        $MichaelStuhlbarg = Actor::create([
            'firstname' => 'Michael',
            'prefix' => null,
            'lastname' => 'Stuhlbarg',
            'biography' => 'Michael Stewart Stuhlbarg was born in Long Beach, California. He attended UCLA, and then The Juilliard School in New York City, where he graduated with a Bachelor of Fine Arts. His other studies included time at the Vilnius Conservatory in Lithuania, the British American Drama Academy at Baliol and Keble Colleges at Oxford, and the National Youth Theatre of Great Britain in London, and at Northwestern University\'s National High School Institute "Cherub" Program . While at UCLA, he was awarded a scholarship to study with Marcel Marceau.',
            'birthday' => '1968-7-5',
            'profilephoto' => 'Michael Stuhlbarg.jpg'
            ]);
        $MichaelStuhlbarg->save();

//        $actor = Actor::create([
//            'firstname' => '',
//            'prefix' => null,
//            'lastname' => '',
//            'biography' => '',
//            'birthday' => '',
//            'profilephoto' => ''
//            ]);
//        $actor->save();

        $movie = Movie::create([

            'title' => 'Doctor Strange',
            'description' => 'While on a journey of physical and spiritual healing, a brilliant neurosurgeon is drawn into the world of the mystic arts.',
            'runTime' => 115,
            'releaseDate'=> '2016-10-27',
            'storyLine' => 'Marvel\'s "Doctor Strange" follows the story of the talented neurosurgeon Doctor Stephen Strange who, after a tragic car accident, must put ego aside and learn the secrets of a hidden world of mysticism and alternate dimensions. Based in New York City\'s Greenwich Village, Doctor Strange must act as an intermediary between the real world and what lies beyond, utilising a vast array of metaphysical abilities and artifacts to protect the Marvel Cinematic Universe. Written by Marvel',
            'video' => 'HSzx-zryEgM',
            'mainphoto'=>'doctor_strange.jpg'

        ]);
        $movie->save();
        $movie->genres()->attach([1,2,6]);
        $movie->actors()->attach([
            ['actor_id' => $BenedictCumberbatch->id, 'role' => 'Dr. Stephen Strange'],
            ['actor_id' => $ChiwetelEjiofor->id, 'role' => 'Morde'],
            ['actor_id' => $RachelMcAdams->id, 'role' => 'Christine Palmer'],
            ['actor_id' => $BenedictWong->id, 'role' => 'Wong'],
            ['actor_id' => $MadsMikkelsen->id, 'role' => 'Kaecilius'],
            ['actor_id' => $TildaSwinton->id, 'role' => 'The Ancient One'],
            ['actor_id' => $MichaelStuhlbarg->id, 'role' => 'Dr. Nicodemus West']
        ]);
        $movie->photos()->create(['path' => 'docter_strange_1.jpg']);
        $movie->photos()->create(['path' => 'docter_strange_2.jpg']);
        $movie->photos()->create(['path' => 'docter_strange_3.jpg']);
        $movie->photos()->create(['path' => 'docter_strange_4.jpg']);
        $movie->photos()->create(['path' => 'docter_strange_5.jpg']);
        $movie->photos()->create(['path' => 'docter_strange_6.jpg']);
        $movie->photos()->create(['path' => 'docter_strange_7.jpg']);

        $movie->reviews()->create([
            'title' => 'visually mind-blowing',
            'user_id' => 1,
            'content' => 'In terms of the quality of the film as a whole, I would give Doctor Strange a 7, but because of its visual effects and implications for the Marvel Cinematic Universe, I am totally giving it an 8. Let me explain.

Watching this in theaters with the sometimes too-loud sound, seeing the buildings and streets give way and rotate and otherwise bend themselves completely to a person\'s whim, immediately made me think of Inception. But this was even more hectic. This wasn\'t imaginary, this was real.',
            'rating' => '4'
        ]);

//        factory(App\Actor::class, 250)->create()->each(function($actor){
//
//            //$user->posts()->save(factory(App\Post::class)->make());
//            $actor->save();
//        });
    }


    private function genres(){
        Genre::create([
            'id' => 1,
            'name'=>'Action'
        ])->save();
        Genre::create([
            'id' => 2,
            'name'=>'Adventure'
        ])->save();
        Genre::create([
            'id' => 3,
            'name'=>'Comedy'
        ])->save();
        Genre::create([
            'id' => 4,
            'name'=>'Crime'
        ])->save();
        Genre::create([
            'id' => 5,
            'name'=>'Drama'
        ])->save();
        Genre::create([
            'id' => 6,
            'name'=>'Fantasy'
        ])->save();
        Genre::create([
            'id' => 7,
            'name'=>'Historical'
        ])->save();
        Genre::create([
            'id' => 8,
            'name'=>'Horror'
        ])->save();
        Genre::create([
            'id' => 9,
            'name'=>'Mystery'
        ])->save();
        Genre::create([
            'id' => 10,
            'name'=>'Political'
        ])->save();
        Genre::create([
            'id' => 11,
            'name'=>'Romance'
        ])->save();
        Genre::create([
            'id' => 12,
            'name'=>'Satire'
        ])->save();
        Genre::create([
            'id' => 13,
            'name'=>'Science fiction'
        ])->save();
        Genre::create([
            'id' => 14,
            'name'=>'Thriller'
        ])->save();
        Genre::create([
            'id' => 15,
            'name'=>'Action'
        ])->save();
    }
}

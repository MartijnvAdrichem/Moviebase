<?php

use App\User;
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

        $user = User::create([
            'name' => 'Hans',
            'email' => 'Hans@Hans.nl',
            'password' => bcrypt('secret1')
        ]);
        $user->save();

        $user = User::create([
                'name' => 'Martijn',
            'email' => 'Martijn@Martijn.nl',
            'password' => bcrypt('secret1')
        ]);
        $user->save();
        $user = User::create([
            'name' => 'Piet',
            'email' => 'Piet@Piet.nl',
            'password' => bcrypt('secret1')
        ]);
        $user->save();


        $this->genres();

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


        $RobertDowneyJr = Actor::create([
            'firstname' => 'Robert',
            'prefix' => null,
            'lastname' => 'Downey Jr.',
            'biography' => 'Downey was born April 4, 1965 in Manhattan, New York, the son of writer, director and filmographer Robert Downey Sr. and actress Elsie Downey (née Elsie Ann Ford). Robert\'s father is of half Lithuanian Jewish, one quarter Hungarian Jewish, and one quarter Irish, descent, while Robert\'s mother was of English, Scottish, German, and Swiss-German ancestry. Robert and his sister, Allyson Downey, were immersed in film and the performing arts from a very young age, leading Downey Jr. to study at the Stagedoor Manor Performing Arts Training Center in upstate New York, before moving to California with his father following his parents\' 1978 divorce. In 1982, he dropped out of Santa Monica High School to pursue acting full time. Downey Sr., himself a drug addict, exposed his son to drugs at a very early age, and Downey Jr. would go on to struggle with abuse for decades.',
            'birthday' => '1965-4-4',
            'profilephoto' => 'Robert Downey Jr.jpg'
            ]);
        $RobertDowneyJr->save();


        $ChrisHemsworth = Actor::create([
            'firstname' => 'Chris',
            'prefix' => null,
            'lastname' => 'Hemsworth',
            'biography' => 'Chris Hemsworth was born in Melbourne, Australia, to Leonie (van Os), a teacher of English, and Craig Hemsworth, a social-services counselor. His brothers are actors Liam Hemsworth and Luke Hemsworth. He is of Dutch (from his immigrant maternal grandfather), Irish, English, Scottish, and German ancestry. His uncle, by marriage, was Rod Ansell, the bushman who inspired the film Crocodile Dundee (1986).
',
            'birthday' => '1983-8-11',
            'profilephoto' => 'Chris Hemsworth.jpg'
            ]);
        $ChrisHemsworth->save();


        $MarkRuffalo = Actor::create([
            'firstname' => 'Mark',
            'prefix' => null,
            'lastname' => 'Ruffalo',
            'biography' => 'Mark Ruffalo was born in Kenosha, Wisconsin, to Marie Rose (Hebert), a stylist and hairdresser, and Frank Lawrence Ruffalo, a construction painter. His father\'s ancestry is Italian, and his mother is of half French-Canadian and half Italian descent. Mark moved with his family to Virginia Beach, Virginia, where he lived out most of his teenage years. Following high school, Mark moved with his family to San Diego and soon migrated north, eventually settling in Los Angeles. He took classes at the Stella Adler Conservatory and subsequently co-founded the Orpheus Theatre Company, an Equity-Waiver establishment, where he worked in nearly every capacity. From acting, writing, directing and producing to running the lights and building sets while building his resume. Bartending for nearly nine years to make ends meet and ready to give it all up, a chance meeting and resulting collaboration with playwright/screenwriter Kenneth Lonergan changed everything.',
            'birthday' => '1967-11-22',
            'profilephoto' => 'Mark Ruffalo.jpg'
            ]);
        $MarkRuffalo->save();


        $ChrisEvans = Actor::create([
            'firstname' => 'Chris',
            'prefix' => null,
            'lastname' => 'Evans',
            'biography' => 'He was born in Boston, Massachusetts, the son of Lisa (Capuano), who worked at the Concord Youth Theatre, and G. Robert Evans III, a dentist. His uncle is congressman Mike Capuano. Chris\'s father is of half German and half Welsh/English/Scottish ancestry, while Chris\'s mother is of half Italian and half Irish descent. He has an older sister, Carly Evans, and two younger siblings, a brother named Scott Evans, who is also an actor, and a sister named Shana Evans. The family moved to suburban Sudbury when he was 11 years-old. Bitten by the acting bug in the first grade because his older sister, Carly, started performing, Evans followed suit and began appearing in school plays. While at Lincoln-Sudbury Regional High School, his drama teacher cited his performance as "Leontes" in "The Winter\'s Tale" as exemplary of his skill. After more plays and regional theatre, he moved to New York and attended the Lee Strasberg Theatre Institute.',
            'birthday' => '1981-6-13',
            'profilephoto' => 'Chris Evans.jpg'
            ]);
        $ChrisEvans->save();


        $ScarlettJohansson = Actor::create([
            'firstname' => 'Scarlett',
            'prefix' => null,
            'lastname' => 'Johansson',
            'biography' => 'Scarlett Johansson was born in New York City. Her mother, Melanie Sloan, is from a Jewish family from the Bronx, and her father, Karsten Johansson, is a Danish-born architect, from Copenhagen. She has a sister, Vanessa Johansson, who is also an actress, a brother, Adrian, a twin brother, Hunter Johansson, born three minutes after her, and a paternal half-brother, Christian. Her grandfather was writer Ejner Johansson.',
            'birthday' => '1984-11-22',
            'profilephoto' => 'Scarlett Johansson.jpg'
            ]);
        $ScarlettJohansson->save();


        $TomHolland = Actor::create([
            'firstname' => 'Tom',
            'prefix' => null,
            'lastname' => 'Holland',
            'biography' => 'Thomas Stanley Holland was born in Kingston-upon-Thames, Surrey, to Nicola Elizabeth (Frost), a photographer, and Dominic Holland (Dominic Anthony Holland), who is a comedian and author. His paternal grandparents were from the Isle of Man and Ireland, respectively. He lives with his parents and three younger brothers - Paddy and twins Sam and Harry. Tom attended Donhead Prep School. Then, after a successful eleven plus exam, he became a pupil at Wimbledon College. Having successfully completed his GCSEs, in September 2012 Tom started a two-year course in the BRIT School for Performing Arts & Technology notable for its numerous famous alumni.',
            'birthday' => '1996-6-1',
            'profilephoto' => 'Tom Holland.jpg'
            ]);
        $TomHolland->save();


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

        $movie->reviews()->create([
            'title' => 'A great movie to watch',
            'user_id' => 2,
            'content' => 'Its an amazing movie with great visuals and good acting!',
            'rating' => '5'
        ]);


        $movie = Movie::create([

            'title' => 'Avengers: Infinity War',
            'description' => 'The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.',
            'runTime' => 159,
            'releaseDate'=> '2018-4-25',
            'storyLine' => 'As the Avengers and their allies have continued to protect the world from threats too large for any one hero to handle, a new danger has emerged from the cosmic shadows: Thanos. A despot of intergalactic infamy, his goal is to collect all six Infinity Stones, artifacts of unimaginable power, and use them to inflict his twisted will on all of reality. Everything the Avengers have fought for has led up to this moment - the fate of Earth and existence itself has never been more uncertain',
            'video' => '6ZfuNTqbHE8',
            'mainphoto'=>'Avengers Infinity War.jpg'

        ]);
        $movie->save();
        $movie->genres()->attach([1,2,6]);
        $movie->actors()->attach([
            ['actor_id' => $BenedictCumberbatch->id, 'role' => 'Dr. Stephen Strange'],
            ['actor_id' => $RobertDowneyJr->id, 'role' => 'Iron Man'],
            ['actor_id' => $ChrisHemsworth->id, 'role' => 'Thor'],
            ['actor_id' => $MarkRuffalo->id, 'role' => 'Hulk'],
            ['actor_id' => $ChrisEvans->id, 'role' => 'Captain America'],
            ['actor_id' => $ScarlettJohansson->id, 'role' => 'Black Widow'],
            ['actor_id' => $TomHolland->id, 'role' => 'Spider-Man']
        ]);
        $movie->photos()->create(['path' => 'Infinity_Wars_1.jpg']);
        $movie->photos()->create(['path' => 'Infinity_Wars_2.jpg']);
        $movie->photos()->create(['path' => 'Infinity_Wars_3.jpg']);
        $movie->photos()->create(['path' => 'Infinity_Wars_4.jpg']);
        $movie->photos()->create(['path' => 'Infinity_Wars_5.jpg']);
        $movie->photos()->create(['path' => 'Infinity_Wars_6.jpg']);
        $movie->photos()->create(['path' => 'Infinity_Wars_7.jpg']);
        $movie->photos()->create(['path' => 'Infinity_Wars_8.jpg']);
        $movie->photos()->create(['path' => 'Infinity_Wars_9.jpg']);
        $movie->photos()->create(['path' => 'Infinity_Wars_10.jpg']);
        $movie->photos()->create(['path' => 'Infinity_Wars_11.jpg']);
        $movie->photos()->create(['path' => 'Infinity_Wars_12.jpg']);


        $movie->reviews()->create([
            'title' => 'Infinity War deserved to be the best and grand',
            'user_id' => 1,
            'content' => 'The most anticipated movie of 2018 has now been released and my word, I have to say that Infinity War was brilliant on each scale, whether be its story, Visual Effects and the ensemble cast consisting all the Marvel characters. Every Marvel Fan needs to watch the movie as words cannot describe the magnificience of the movie.',
            'rating' => '4'
        ]);

        $movie->reviews()->create([
            'title' => 'This movie was AMAZING',
            'user_id' => 2,
            'content' => 'This is the best movie ive ever seen!',
            'rating' => '5'
        ]);
        $movie->reviews()->create([
            'title' => 'Bad movie',
            'user_id' => 3,
            'content' => 'Dont watch this garbage movie...',
            'rating' => '1'
        ]);



        $movie = Movie::create([

            'title' => 'Avengers: Age of Ultron',
            'description' => 'When Tony Stark and Bruce Banner try to jump-start a dormant peacekeeping program called Ultron, things go horribly wrong and it\'s up to Earth\'s mightiest heroes to stop the villainous Ultron from enacting his terrible plan.',
            'runTime' => 141,
            'releaseDate'=> '2015-4-22',
            'storyLine' => 'Tony Stark creates the Ultron Program to protect the world, but when the peacekeeping program becomes hostile, The Avengers go into action to try and defeat a virtually impossible enemy together. Earth\'s mightiest heroes must come together once again to protect the world from global extinction',
            'video' => 'tmeOjFno6Do',
            'mainphoto'=>'Avengers Age of Ultron.jpg'

        ]);
        $movie->save();
        $movie->genres()->attach([1,2,13]);
        $movie->actors()->attach([
            ['actor_id' => $RobertDowneyJr->id, 'role' => 'Iron Man'],
            ['actor_id' => $ChrisHemsworth->id, 'role' => 'Thor'],
            ['actor_id' => $MarkRuffalo->id, 'role' => 'Hulk'],
            ['actor_id' => $ChrisEvans->id, 'role' => 'Captain America'],
            ['actor_id' => $ScarlettJohansson->id, 'role' => 'Black Widow'],
        ]);
        $movie->photos()->create(['path' => 'Age_of_Ultron_1.jpg']);
        $movie->photos()->create(['path' => 'Age_of_Ultron_2.jpg']);
        $movie->photos()->create(['path' => 'Age_of_Ultron_3.jpg']);
        $movie->photos()->create(['path' => 'Age_of_Ultron_4.jpg']);
        $movie->photos()->create(['path' => 'Age_of_Ultron_5.jpg']);
        $movie->photos()->create(['path' => 'Age_of_Ultron_6.jpg']);
        $movie->photos()->create(['path' => 'Age_of_Ultron_7.jpg']);
        $movie->photos()->create(['path' => 'Age_of_Ultron_8.jpg']);


        $movie->reviews()->create([
            'title' => 'Avengers: Age of Ultron is a damn good Superhero flick, excellent sequel!',
            'user_id' => 1,
            'content' => 'Avengers: Age of Ultron (2015) is a MARVEL damn good superhero flick and an excellent sequel! Yes it is miles way better than Jurassic World and Star Wars: The Force Awakens and Terminator Genisys I have enjoyed this film much better than Jurassic World, Star Wars and Terminator the new movies. ',
            'rating' => '5'
        ]);

        $movie->reviews()->create([
            'title' => 'Better than the first!',
            'user_id' => 2,
            'content' => 'Avengers age of Ultron is by far the best Marvel movie to date. It has all the elements of the first movie, but steps it up in the action, character and dialog. I went into this movie with very unrealistically high expectations. So when I saw this movie, I was very worried but excited. ',
            'rating' => '4'
        ]);
        $movie->reviews()->create([
            'title' => 'Grossly underwhelming (spoiler free)',
            'user_id' => 3,
            'content' => 'That being said, my initial thoughts on Age of Ultron (AoU) are quite negative. To me, its essentially a carbon copy of IM3. There are problems which strike you repeatedly as you progress throughout the film. The 2 biggest complaints I have with AoU is 1) the tone (comedy) 2) the script/writing.',
            'rating' => '3'
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
